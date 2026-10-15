<?php

/**
 * Created by PhpStorm.
 * User: Akamil
 * Date: 8/1/2016
 * Time: 10:43 PM
 */

namespace Bytecode\Opera\Controller;

use Bytecode\Opera\Model\FormMeta;
use Bytecode\Opera\Model\SAP;
use Bytecode\Opera\Model\WorkFlow;

/**
 *
 */
class ExpenseReportController extends \Bytecode\Opera\Controller\Controller {

    private $tpldir = "Forms/Administration/";

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\ExpenseReport();
        $this->workflow = new WorkFlow();
    }

    public function WEB() {

        $method = $this->http->GetVar("method");
        if ($method == "ProcessForm") {
            return $this->ProcessForm();
        } elseif ($method == "List") {
            return $this->ListForms();
        } elseif ($method == "Dashboard") {
            $tpl = $this->reg->html->load($this->tpldir . "ExpenseReportDash.php");
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
        } elseif ($method == "UpdateForm") {
            $formid = $this->http->GetVar("formid");
            $item = $this->http->GetVar("item");
            $value = $this->http->GetVar("value");
            return $this->JsonFLush($this->model->UpdateForm($formid, $item, $value));
        } elseif ($method == "GetFullForm") {
            return $this->GetFullForm();
        } elseif ($method == "QuickApprove") {
            $d = json_decode(base64_decode(urldecode($_GET['d'])));
            $uid = $d->UID;
            $status = "APPROVE";
            $userid = $d->userid;
            $this->http->Redirect('index.php?module=ExpenseReport&method=List');
            return $this->SetStatus($uid, $status, $userid, '');
        } elseif ($method == "ProcessForm") {
            $this->ProcessForm();
        } elseif ($method == "GetFormsUnderProcess") {
            return $this->JsonFLush($this->FormsUnderProcess());
        } elseif ($method == "GetFormsPendingForMyAction") {
            return $this->JsonFLush($this->FormsPendingForMyApproval());
        } elseif ($method == "GetFormsApproved") {
            return $this->JsonFLush($this->FormsApproved());
        } elseif ($method == "GetPRData") {
            return $this->JsonFLush($this->model->GetCMData());
        } elseif ($method == "SetStatus") {
            $userid = $this->http->PostVar("UserID");
            $comment = $this->http->PostVar("Comments");
            $status = $this->http->PostVar("Status");
            $uid = $this->http->GetVar("UID");

            return $this->JsonFLush($this->SetStatus($uid, $status, $userid, $comment));
        } elseif ($method == "PDFExport") {
            $uid = $this->http->GetVar("UID");
            $f = $this->PDFExport($uid);
           header("Location:" . CONFIG["BASE"]["URL"] . "/" . $f);
        }
        /* elseif($method == "CreateMaterial"){
          return $this->JsonFLush($this->CreateMaterial());
          } */
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
        $form = $this->model->GetFullForm($uid, "UID");
        $fmd = $form['meta'];

        //print_r($form);
        $wfm = $this->workflowmanager;
        $tpl = $this->reg->html;
        $mgmodel = new \Bytecode\Opera\Model\MailGroup();
        $this->workflowmanager->SetForm(1, $fmd->CountryID, $form['mainform']->UserID, $uid, $form['mainform']->Code);
        $this->workflowmanager->setFormHTML($this->GetFormHTML($form));
        //print_r($form);
        //  print_r($this->GetFormHTML($form));
        $this->workflowmanager->SetStatus($status, $userid, $comment);
        return array("status" => "success");
    }

    public function ListForms() {

        $tpl = $this->reg->html->load($this->tpldir . "ExpenseReportList.php");
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

        $tpl = $this->reg->html->load($this->tpldir . "ExpenseReport.php");
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

            $wf = new \Bytecode\Opera\Libs\WorkFlow();
            $fullfrm = $this->model->GetFullForm($frm->UID, 'UID');
            $wf->setFormHTML($this->GetFormHTML($fullfrm));
            $wf->SetForm(1, $meta->CountryID, $frm->UserID, $frm->UID, $frm->Code);
            $this->ProcessAttachments($frm->UID, 1);
            // Approvers:
            $app = $this->http->PostVar("approveruserid");

            for ($i = 0; $i < count($app); $i++) {

                $wf->AddUser($app[$i], $i, $frm);
            }

            $wf->InitiateWorkflow();

            $msg->AddSessionMessage("Form Created Successfully!");


            $this->http->Redirect("/index.php?module=ExpenseReport&method=Index&UID=" . $frm->UID);
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

    /*   public function ViewForm($formid) {

      $tpl = $this->reg->html->loadTemplate($this->tpldir . "PaymentRequest.php");
      return $tpl->render(array('mode' => 'Existing', 'formid' => $formid, 'userinfo' => $_SESSION['user']));
      } */

    public function UpdateForm($uid) {

        $frm = $this->model->UpdateForm($uid, $_POST);
    }

    public function PDFExport($uid) {
        $form = $this->model->GetFullForm($uid, "UID");
        //print_r($form);
        $wf = new \Bytecode\Opera\Libs\WorkFlow();
        $fmd = $form['meta'];

        $wf->SetForm(1, $fmd->CountryID, $form['mainform']->UserID, $uid, $form['mainform']->Code);
        $wf->setFormHTML($this->GetFormHTML($form));
        return $wf->PDFExport($uid);
    }

    private function GetFormHTML($form) {

        $tpl = $this->reg->html->load($this->tpldir . "Mail/" . "ExpenseReportBody.php");
        return $tpl->render(array('model' => $form));
    }

}
