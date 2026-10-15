<?php

namespace Bytecode\Opera\Controller;
use Bytecode\Opera\Model\WorkFlow;
/**
 * 
 */
class PaymentRequestController extends \Bytecode\Opera\Controller\Controller {

    private $tpldir = "Forms/Administration/";

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\PaymentRequest();
        $this->workflow = new WorkFlow();
    }

    public function WEB() {

        $method = $this->http->GetVar("method");
        if ($method == "ProcessForm") {
            return $this->ProcessForm();
        } elseif ($method == "List") {
            return $this->ListForms();
        } else {
            return $this->Index();
        }
    }

    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");

        if ($method == "GetFullForm") {
            return $this->GetFullForm();
        } elseif ($method == "QuickApprove") {
            $d = json_decode(base64_decode(urldecode($_GET['d'])));
            $uid = $d->UID;
            $status = "APPROVE";
            $userid = $d->userid;
            $this->http->Redirect('index.php?module=PR&method=List');
            return $this->SetStatus($uid, $status, $userid, '');
        } elseif ($method == "GetFormsUnderProcess") {
            return $this->JsonFLush($this->FormsUnderProcess());
        } elseif ($method == "GetFormsPendingForMyAction") {
            return $this->JsonFLush($this->FormsPendingForMyApproval());
        } elseif ($method == "GetFormsApproved") {
            return $this->JsonFLush($this->FormsApproved());
        } elseif ($method == "SetStatus") {
            $userid = $this->http->PostVar("UserID");
            $comment = $this->http->PostVar("Comments");
            $status = $this->http->PostVar("Status");
            $uid = $this->http->GetVar("UID");

            return $this->JsonFLush($this->SetStatus($uid, $status, $userid, $comment));
        }
    }

    public function FormsPendingForMyApproval() {
        /* $fid = $this->http->GetVar("formid");
          $rid =$this->http->GetVar("regionid"); */
        $forms = array();
        $data = $this->workflow->GetFormsPendingForMyApproval($_SESSION["user"]["UserID"], 6, $this->http->GetVar("skip"), $this->http->GetVar("take"));
        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsApproved() {
        $forms = array();
        $data = $this->workflow->GetMyFormsApproved($_SESSION["user"]["UserID"], 6, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $data['Forms'][$i]);
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsUnderProcess() {
        $forms = array();
        $data = $this->workflow->GetFormsUnderProcess($_SESSION["user"]["UserID"], 6, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function SetStatus($uid, $status, $userid, $comment) {
        $fm = new FormMeta();
        $form = $this->model->GetFullForm($uid, "UID");
        // print_r($form);
        $fmd = $form['meta'];

        $wfm = $this->workflowmanager;
        $tpl = $this->reg->html;
        $mgmodel = new \Bytecode\Opera\Model\MailGroup();
        $this->workflowmanager->SetForm(6, $fmd->CountryID, $form['mainform']->UserID, $uid, $form['mainform']->Code);
        $this->workflowmanager->setFormHTML($this->GetFormHTML($form));
        //print_r($this->GetFormHTML($form));
        $this->workflowmanager->SetStatus($status, $userid, $comment);
        return array("status" => "success");
    }

    public function ListForms() {

        $tpl = $this->reg->html->load($this->tpldir . "PaymentRequestList.php");
        return $tpl->render(array());
    }

    public function GetFullForm() {

        $uid = $this->http->GetVar("UID");
        $d = $this->model->GetFullForm($uid, "UID");
        //  print_r($d);
        // Enabled approver
        $d['Actionable'] = 0;
        // Only if form is closed
        if ($d["mainform"]->isDraft === 0) {
            //toDO CHECK IF STATUS IS PENDING
            for ($i = 0; $i < count($d["workflow"]); $i++) {
                //first user and he is in approval list and its status is pending
                if (
                        $i == 0 &&
                        $d["workflow"][$i]->UserID == $_SESSION["user"]["UserID"] && $d["workflow"][$i]->Status === 'PENDING'
                ) {
                    // Add to enabled approvers
                    $d["Actionable"] = 1;
                } elseif (
                        $i > 0 && $d["workflow"][$i - 1]->Status === "APPROVE" && $d["workflow"][$i]->UserID == $_SESSION["user"]["UserID"] && $d["workflow"][$i]->Status === 'PENDING'
                ) {
                    // check if previous approver approved the form?
                    $d["Actionable"] = 1;
                }
            }
        }
        return $this->JsonFLush($d);
    }

    public function Index() {
        $tpl = $this->reg->html->load($this->tpldir . "PaymentRequest.php");
        $uid = $this->http->GetVar("UID");
        $msg = new \Bytecode\Opera\Libs\Messaging();


        // Post?

        if ($this->http->ISPost() == true && $this->http->GetVar("UID") == false) {
            //echo 'POST';
            //var_dump($_POST);
            $guid = com_create_guid();
            $userid = $_SESSION['user']['UserID'];
            $countryid = $this->http->PostVar('Country');
            $regionid = $this->http->PostVar('Region');

            $meta = new FormMeta();

            $meta = $meta->NewMETA(array_merge($_POST, array('CreatorUserID' => $userid)));
            $formfields["FormMetaID"] = $meta->FormMetaID;
            $formfields["UserID"] = $userid;
            $formfields["UID"] = $guid;
            $ff = array_merge($_POST, $formfields);
            //echo $userid;
            //var_dump ($ff);
            $frm = $this->model->NewForm($ff);
            $fullf = $this->model->GetFullForm($frm->UID, 'UID');
            $this->ProcessAttachments($frm->UID, 6);
            $wf = new \Bytecode\Opera\Libs\WorkFlow();

            $wf->setFormHTML($this->GetFormHTML($fullf));
            $wf->SetForm(6, $meta->CountryID, $frm->UserID, $frm->UID, $frm->Code);

            // Approvers:
            $app = $this->http->PostVar("approveruserid");

            for ($i = 0; $i < count($app); $i++) {

                $wf->AddUser($app[$i], $i);
            }

            $wf->InitiateWorkflow();

            $msg->AddSessionMessage("Form Created Successfully!");

            $this->http->Redirect("/index.php?module=PurchaseRequisition&method=Index&UID=" . $frm->UID);
        } elseif ($this->http->ISPost() == true && $this->http->GetVar("UID")) {

            $this->UpdateForm($this->http->GetVar("UID"));
            $msg->AddMessage("Form Updated Successfully");
        }/* elseif ($this->http->GetVar("C") && base64_decode($this->http->GetVar("C")) == "CREATE") {
          $sapreturn = $this->CreateMaterial();
          } */

        $tplparams = array();
        $tplparams['userinfo'] = $_SESSION['user'];
        $tplparams['messages'] = $msg;

        if ($uid) {
            $frm = $this->model->GetForm($uid, 'UID');
            $wfstatus = $this->workflow->GetWorflowStatus($uid);
            // for approved disable submit button
            $tplparams['mode'] = 'EXISTING';
            $tplparams['UID'] = $uid;
            if ($wfstatus['Status'] == "APPROVE") {
                $tplparams['formdisabled'] = 'disabled="disabled"';
            }
        } else {
            $tplparams['mode'] = 'NEW';
            //$tplparams['User'] = $_SESSION['user'];
        }
        return $tpl->render($tplparams);
    }

    public function ViewForm($formid) {

        $tpl = $this->reg->html->load($this->tpldir . "PaymentRequest.php");
        return $tpl->render(array('mode' => 'Existing', 'formid' => $formid, 'userinfo' => $_SESSION['user']));
    }

    // Email Controllers
}
