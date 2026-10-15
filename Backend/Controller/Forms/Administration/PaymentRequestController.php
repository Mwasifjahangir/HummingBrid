<?php

namespace Bytecode\Opera\Controller;

/**
 * 
 */
class PaymentRequestController extends \Bytecode\Opera\Controller\Controller {

    private $tpldir = "Forms/Administration/";

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\PaymentRequest();
    }

    public function WEB() {

        $method = $this->http->GetVar("method");
        if ($method == "ProcessForm") {
            return $this->ProcessForm();
        } elseif ($method == "ViewForm") {
            $formid = $this->http->GetVar("formid");
            return $this->ViewForm($formid);
        } elseif ($method == "List") {
            return $this->ListForms();
        } elseif ($method == "Dashboard") {
            $tpl = $this->reg->html->load($this->tpldir . "PaymentRequestDash.php");
            return $tpl->render(array());
        } else {
            return $this->Index();
        }
    }

    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");

        if ($method == "NewForm") {
            $uid = $_SESSION['user']['UserID'];
            return $this->JsonFLush($this->model->NewForm($uid));
        } elseif ($method == "NewFormItem") {
            $fid = $this->http->GetVar("formid");
            return $this->JsonFLush($this->model->NewFormItem($fid));
        } elseif ($method == "UpdateFormItem") {
            $itemid = $this->http->GetVar("itemid");
            $item = $this->http->GetVar("item");
            $value = $this->http->GetVar("value");
            return $this->JsonFLush($this->model->UpdateFormItem($itemid, $item, $value));
        } elseif ($method == "UpdateForm") {
            $formid = $this->http->GetVar("formid");
            $item = $this->http->GetVar("item");
            $value = $this->http->GetVar("value");
            return $this->JsonFLush($this->model->UpdateForm($formid, $item, $value));
        } elseif ($method == "GetFullForm") {
            return $this->GetFullForm();
        } elseif ($method == "SetStatus") {
            $uid = $this->http->PostVar("UID");
            $status = $this->http->PostVar("status");
            $userid = $this->http->PostVar("userid");
            $comment = $this->http->PostVar("comment");
            $this->SetStatus($uid, $status, $userid, $comment);
        } elseif ($method == "QuickApprove") {
            $d = json_decode(base64_decode(urldecode($_GET['d'])));
            $uid = $d->UID;
            $status = "Approved";
            $userid = $d->userid;
            $this->http->Redirect('index.php?module=PaymentRequest&method=List');
            return $this->SetStatus($uid, $status, $userid, '');
        } elseif ($method == "ProcessForm") {
            $this->ProcessForm();
        }
    }

    public function FormsPendingForMyApproval() {
        /* $fid = $this->http->GetVar("formid");
          $rid =$this->http->GetVar("regionid"); */
        $forms = array();
        $data = $this->workflow->GetFormsPendingForMyApproval($_SESSION["user"]["UserID"], 1, $this->http->GetVar("skip"), $this->http->GetVar("take"));
        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsApproved() {
        $forms = array();
        $data = $this->workflow->GetMyFormsApproved($_SESSION["user"]["UserID"], 1, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $data['Forms'][$i]);
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsUnderProcess() {
        $forms = array();
        $data = $this->workflow->GetFormsUnderProcess($_SESSION["user"]["UserID"], 1, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function SetStatus($uid, $status, $userid, $comment) {

        $wf = new \Bytecode\Opera\Model\WorkFlow();

        $wf->SetStatus($uid, $status, $userid, $comment);
        $this->SendStatusUpdateMail($uid, $status, $userid);
        $wfstatus = $wf->GetWorflowFormStatus($uid);
        // still pending? send to next approver
        //var_dump($wfstatus);
        if ($wfstatus["Status"] == "Pending") {
            $this->SendToNextApprover($wfstatus['NextUser'], $uid);
        } elseif ($wfstatus["Status"] === "Approved") {
            
        } elseif ($wfstatus["Status"] === "Rejected") {
            
        }
        return array("status" => "success");
    }

    public function ListForms() {
        $data = $this->model->GetFormsList($_SESSION["user"]["UserID"]);
        $wf = new \Bytecode\Opera\Model\WorkFlow();
        $frmstatus = array();
        for ($i = 0; $i < count($data['closed']); $i++) {
            //????$i
            $frmstatus[$i] = $wf->GetWorflowFormStatus($data['closed'][$i]->UID);
        }
        // Forms pending for my approva
        // TODO: Hardcoded formID
        $pa = $wf->GetFormsPendingApproval($_SESSION["user"]["UserID"], 1);
        $pwfstatus = null;
        $pwforms = array();
        for ($i = 0; $i < count($pa); $i++) {
            $pwfstatus = $wf->GetWorflowFormStatus($pa[$i]->UID);
            // var_dump($pwfstatus );
            if ($pwfstatus['NextUser'] != null && $pwfstatus['NextUser']->UserID === $_SESSION["user"]["UserID"]) {
                //$pwforms[] = $pwfstatus;
                $pwforms[] = array(
                    'form' => $this->model->GetForm($pa[$i]->UID, "UID"),
                    'WF' => $pwfstatus
                );
            }
        }

//        / var_dump($pwforms);
        $tpl = $this->reg->html->load($this->tpldir . "PaymentRequestList.php");
        return $tpl->render(array('formlist' => $data, 'WFStatus' => $frmstatus, 'WFMyApproval' => $pwforms));
    }

    public function GetFullForm() {

        $formid = $this->http->GetVar("formid");
        $d = $this->model->GetFullForm($formid);
        // Enabled approver
        $d["EnabledApprovers"] = array();
        // Only if form is closed
        if ($d["form"]->isDraft === 0) {
            //toDO CHECK IF STATUS IS PENDING
            for ($i = 0; $i < count($d["workflow"]); $i++) {
                //first user and he is in approval list and its status is pending
                if (
                        $i == 0 &&
                        $d["workflow"][$i]->UserID == $_SESSION["user"]["UserID"] && $d["workflow"][$i]->Status === 'Pending'
                ) {
                    // Add to enabled approvers
                    $d["EnabledApprovers"][] = $d["workflow"][$i]->UserID;
                } elseif (
                        $i > 0 && $d["workflow"][$i - 1]->Status === "Approved" && $d["workflow"][$i]->UserID == $_SESSION["user"]["UserID"] && $d["workflow"][$i]->Status === 'Pending'
                ) {
                    // check if previous approver approved the form?
                    $d["EnabledApprovers"][] = $d["workflow"][$i]->UserID;
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
