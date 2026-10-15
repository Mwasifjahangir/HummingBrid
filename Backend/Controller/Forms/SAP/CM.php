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
class CMController extends \Bytecode\Opera\Controller\Controller {

    private $tpldir = "Forms/SAP/";

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\CM();
        $this->workflow = new WorkFlow();
    }

    public function WEB() {

        $method = $this->http->GetVar("method");
        if ($method == "ProcessForm") {
            return $this->ProcessForm();
        } elseif ($method == "List") {
            return $this->ListForms();
        } elseif ($method == "Dashboard") {
            $tpl = $this->reg->html->load($this->tpldir . "CMDash.php");
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
            $this->http->Redirect('index.php?module=CM&method=List');
            return $this->SetStatus($uid, $status, $userid, '');
        } elseif ($method == "ProcessForm") {
            $this->ProcessForm();
        } elseif ($method == "GetFormsUnderProcess") {
            return $this->JsonFLush($this->FormsUnderProcess());
        } elseif ($method == "GetFormsPendingForMyAction") {
            return $this->JsonFLush($this->FormsPendingForMyApproval());
        } elseif ($method == "GetFormsApproved") {
            return $this->JsonFLush($this->FormsApproved());
        } elseif ($method == "GetCMData") {
            return $this->JsonFLush($this->model->GetCMData());
        } elseif ($method == "SetStatus") {
            $userid = $this->http->PostVar("UserID");
            $comment = $this->http->PostVar("Comments");
            $status = $this->http->PostVar("Status");
            $uid = $this->http->GetVar("UID");

            return $this->JsonFLush($this->SetStatus($uid, $status, $userid, $comment));
        }
        /* elseif($method == "CreateMaterial"){
          return $this->JsonFLush($this->CreateMaterial());
          } */
    }

    public function FormsPendingForMyApproval() {
        /* $fid = $this->http->GetVar("formid");
          $rid =$this->http->GetVar("regionid"); */
        $forms = array();
        $data = $this->workflow->GetFormsPendingForMyApproval($_SESSION["user"]["UserID"], 5, $this->http->GetVar("skip"), $this->http->GetVar("take"));
        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsApproved() {
        $forms = array();
        $data = $this->workflow->GetMyFormsApproved($_SESSION["user"]["UserID"], 5, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $data['Forms'][$i]);
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsUnderProcess() {
        $forms = array();
        $data = $this->workflow->GetFormsUnderProcess($_SESSION["user"]["UserID"], 5, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function SetStatus($uid, $status, $userid, $comment) {
        $fm = new FormMeta();
        $form = $this->model->GetForm($uid, "UID");
        $fmd = $fm->GetFormMeta($form->FormMetaID);
        $model = $this->model;
        $wfm = $this->workflowmanager;
        $tpl = $this->reg->html;
        $mgmodel = new \Bytecode\Opera\Model\MailGroup();
        // SAP Workflow
        $this->workflowmanager->prefinalapprovehook = function() use ($uid, &$form, &$model, &$wfm, &$tpl, &$mgmodel) {


            $sap = new SAP();
            $res = $sap->PostCMData($form);
            //print_r($res);
            $retmod = new \Bytecode\Opera\Model\SAPReturn();
            // ADD Return to DB
            //   var_dump($res);
            if (isset($res["result"]) && isset($res["result"]["RETURN"])) {
                $retmod->Add($res["result"]["RETURN"], $uid);
                //$retmod->AddException("TEST", $uid);
                // CHECK FOR ERRORS in SAP return 
                $error = false;
                for ($i = 0; $i < count($res["result"]["RETURN"]); $i++) {
                    if (trim($res["result"]["RETURN"][$i]["TYPE"]) == "E") {
                        $error = true;
                        break;
                    }
                }

                // IF No Errors , update Customer Number
                if ($error == false) {
                    $model->UpdateCustomerCode(ltrim($res["result"]["PE_KUNNR"], '0'), $uid);
                    return true;
                }
            } else {
                if (isset($res['Exception']) && $res['Exception'] == true) {
                    $retmod->AddException($res['ExceptionMessage'], $uid);
                }
            }


            // Send Email to 
            //return $res;
            return false;
        };
        // POST APPROVAL HOOK
        $this->workflowmanager->postfinalapprovalhook = function() use (&$uid, &$form, &$model, &$wfm, &$tpl, &$mgmodel) {
            $user = new class {

                public $Username = "User";
            };

            // get new form
            $f = $model->GetForm($uid, 'UID');
            $http = new \Bytecode\Opera\Libs\HTTPKernel();
            // Refresh workflow
            $wfm->RefreshWorkFlow();
            $form = new \Bytecode\Opera\Model\Form();
            // TODO HARDCODED FORM ID
            $cmf = $form->GetForm(5);
            $link = $http->BuildLink(array(
                'module=' . $cmf->Controller,
                'method=Index',
                'UID=' . $f->UID
            ));
            $render = $tpl->load($this->tpldir . "Mail/" . "CMCreated.php");
            $mailtpl = $wfm->RenderWorkflowTemplate($render->render(array(
                        'customernumb' => $f->PE_KUNNR,
                        'NAME' => $f->NAME,
                        'FormLink' => $link
                    ))
                    , "", $user);
            $group = $mgmodel->GetGroup("SAPCMCreated");
            $mgrp = array();
            for ($i = 0; $i < count($group); $i++) {
                $mgrp[] = $group[$i]->Email;
            }
            $mail = new \Bytecode\Opera\Libs\Mail();
            $msg = $mail->CreateMessage("SAP CM Customer: " . $f->PE_KUNNR . " Created", $mgrp, $mailtpl);
            $mail->Send($msg);
        };
        $this->workflowmanager->SetForm(5, $fmd->CountryID, $form->UserID, $uid, $form->Code);
        $this->workflowmanager->setFormHTML($this->GetFormHTML($form));
        $this->workflowmanager->SetStatus($status, $userid, $comment);
        return array("status" => "success");
    }

    public function ListForms() {

        $tpl = $this->reg->html->load($this->tpldir . "CMList.php");
        return $tpl->render(array());
    }

    public function GetFullForm() {

        $uid = $this->http->GetVar("UID");
        $d = $this->model->GetFullForm($uid, "UID");
        // Enabled approver
        $d['Actionable'] = 0;
        // Only if form is closed
        if ($d["form"]->isDraft === 0) {
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

        $tpl = $this->reg->html->load($this->tpldir . "CM.php");
        $uid = $this->http->GetVar("UID");
        $msg = new \Bytecode\Opera\Libs\Messaging();
        $sapreturn = new \Bytecode\Opera\Model\SAPReturn();

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
            //var_dump ($ff);
            $frm = $this->model->NewForm($ff);
            $this->ProcessAttachments($frm->UID, 5);
            $wf = new \Bytecode\Opera\Libs\WorkFlow();
            $wf->SetForm(5, $meta->CountryID, $frm->UserID, $frm->UID, $frm->Code);

            // Approvers:
            $app = $this->http->PostVar("approveruserid");

            for ($i = 0; $i < count($app); $i++) {
                $wf->AddUser($app[$i], $i , $frm);
            }

            $wf->InitiateWorkflow();

            $msg->AddSessionMessage("Form Created Successfully!");
            $this->http->Redirect("/index.php?module=CM&method=Index&UID=" . $frm->UID);
        } elseif ($this->http->ISPost() == true && $this->http->GetVar("UID")) {

            $this->UpdateForm($this->http->GetVar("UID"));
            $this->ProcessAttachments($this->http->GetVar("UID"), 5);
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
            if ($wfstatus['Status'] == "APPROVE") {
                $tplparams['formdisabled'] = 'disabled="disabled"';
            }

            $sapreturn = $sapreturn->Get($uid);
            $tpl2 = $this->reg->html->load($this->tpldir . "SAPError.php");
            $table = $tpl2->render(array('saperror' => $sapreturn));
            //echo $frm->PE_MATNR;
            $tplparams['mode'] = 'EXISTING';
            $tplparams['UID'] = $uid;
            $tplparams['sapreturn'] = $table;
            if ($frm->PE_KUNNR != null && trim($frm->PE_KUNNR) != "") {

                $tplparams['customernumb'] = $frm->PE_KUNNR;
            }
        } else {
            $tplparams['mode'] = 'NEW';
            //$tplparams['User'] = $_SESSION['user'];
        }
        return $tpl->render($tplparams);
    }

    /*   public function ViewForm($formid) {

      $tpl = $this->reg->html->load($this->tpldir . "PaymentRequest.php");
      return $tpl->render(array('mode' => 'Existing', 'formid' => $formid, 'userinfo' => $_SESSION['user']));
      } */

    public function UpdateForm($uid) {

        $frm = $this->model->UpdateForm($uid, $_POST);
    }

    private function GetFormHTML($form) {

        $tpl = $this->reg->html->load($this->tpldir . "Mail/" . "CMBody.php");
        return $tpl->render(array('model' => $form));
    }

}
