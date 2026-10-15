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
class MMController extends \Bytecode\Opera\Controller\Controller {

    private $tpldir = "Forms/SAP/";

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\MM();
        $this->workflow = new WorkFlow();
    }

    public function WEB() {

        $method = $this->http->GetVar("method");
        if ($method == "ProcessForm") {
            return $this->ProcessForm();
        } elseif ($method == "List") {
            return $this->ListForms();
        } elseif ($method == "Dashboard") {
            $tpl = $this->reg->html->load($this->tpldir . "MMDash.php");
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
        } elseif ($method == "QuickApprove") {
            $d = json_decode(base64_decode(urldecode($_GET['d'])));
            $uid = $d->UID;
            $status = "APPROVE";
            $userid = $d->userid;
            $this->http->Redirect('index.php?module=MM&method=List');
            return $this->SetStatus($uid, $status, $userid, '');
        } elseif ($method == "ProcessForm") {
            $this->ProcessForm();
        } elseif ($method == "GetFormsUnderProcess") {
            return $this->JsonFLush($this->FormsUnderProcess());
        } elseif ($method == "GetFormsPendingForMyAction") {
            return $this->JsonFLush($this->FormsPendingForMyApproval());
        } elseif ($method == "GetFormsApproved") {
            return $this->JsonFLush($this->FormsApproved());
        } elseif ($method == "GetMMData") {
            return $this->JsonFLush($this->model->GetMMData());
        } elseif ($method == "SearchMaterial") {
            return $this->JsonFLush($this->SearchMaterial());
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

    public function SearchMaterial() {

        $mattype = $this->http->GetVar("mattype");
        $matgrp1 = $this->http->GetVar("matgrp1");
        $matgrp4 = $this->http->GetVar("matgrp4");
        $netweight = $this->http->GetVar("netweight");
        $matgrp = $this->http->GetVar("matgrp");
        $countryori = $this->http->GetVar("countryori");
        $prodhier = $this->http->GetVar("prodhier");

        return $this->model->SearchMaterial($mattype, $netweight, $matgrp, $countryori, $matgrp1, $matgrp4, $prodhier);
    }

    public function CreateMaterial() {
        $uid = $this->http->GetVar("UID");
        $frm = $this->model->GetForm($uid, "UID");
        $sap = new SAP();
        $res = $sap->PostMMData($frm->PI_MATTYPE, $frm->PI_MATDESC, $frm);
        return $res;
    }

    public function FormsPendingForMyApproval() {
        /* $fid = $this->http->GetVar("formid");
          $rid =$this->http->GetVar("regionid"); */
        $forms = array();
        $data = $this->workflow->GetFormsPendingForMyApproval($_SESSION["user"]["UserID"], 3, $this->http->GetVar("skip"), $this->http->GetVar("take"));
        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsApproved() {
        $forms = array();
        $data = $this->workflow->GetMyFormsApproved($_SESSION["user"]["UserID"], 3, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $data['Forms'][$i]);
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsUnderProcess() {
        $forms = array();
        $data = $this->workflow->GetFormsUnderProcess($_SESSION["user"]["UserID"], 3, $this->http->GetVar("skip"), $this->http->GetVar("take"));

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
            // Already created in SAP (e.g. a previous approval failed after the BAPI call)? Don't create it again
            $current = $model->GetForm($uid, "UID");
            if ($current->PE_MATNR != null && trim($current->PE_MATNR) != "") {
                $this->reg->logger->Info("MM {$uid} already has material {$current->PE_MATNR}, skipping SAP creation", "Controller\MM");
                return true;
            }

            $sap = new SAP();
            $res = $sap->PostMMData($form->PI_MATTYPE, $form->PI_MATDESC, $form);
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

                // SAP returned a material number => material exists, persist it even if RETURN has E messages
                $matnr = isset($res["result"]["PE_MATNR"]) ? ltrim($res["result"]["PE_MATNR"], '0') : "";
                if ($matnr != "") {
                    if ($error) {
                        $this->reg->logger->Info("MM {$uid}: material {$matnr} created with error messages in SAP RETURN", "Controller\MM");
                    }
                    $model->UpdateMATNR($matnr, $uid);
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
            $mmf = $form->GetForm(3);
            $link = $http->BuildLink(array(
                'module=' . $mmf->Controller,
                'method=Index',
                'UID=' . $f->UID
            ));
            $render = $tpl->load($this->tpldir . "Mail/" . "MMCreated.php");
            $mailtpl = $wfm->RenderWorkflowTemplate($render->render(array(
                        'matdesc' => $f->PI_MATDESC,
                        'matnr' => $f->PE_MATNR,
                        'FormLink' => $link
                    ))
                    , "", $user);
            $group = $mgmodel->GetGroup("SAPMMCreated");
            $mgrp = array();
            for ($i = 0; $i < count($group); $i++) {
                $mgrp[] = $group[$i]->Email;
            }
            $mail = new \Bytecode\Opera\Libs\Mail();
            $msg = $mail->CreateMessage("SAP MM Material: " . $f->PE_MATNR . " Created", $mgrp, $mailtpl);
            $mail->Send($msg);
        };
        $this->workflowmanager->SetForm(3, $fmd->CountryID, $form->UserID, $uid, $form->Code);
        $this->workflowmanager->setFormHTML($this->GetFormHTML($form));
        $this->workflowmanager->SetStatus($status, $userid, $comment);
        return array("status" => "success");
    }

    public function ListForms() {

        $tpl = $this->reg->html->load($this->tpldir . "MMList.php");
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

        $tpl = $this->reg->html->load($this->tpldir . "MM.php");
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
            $reason = $this->http->PostVar('REASONFORCREAT');
            $_POST['PI_MATDESC'] = trim($_POST['PI_MATDESC']);
            //$mattype = $this->http->PostVar('MATTYPE');
            $meta = new FormMeta();
            
            $meta = $meta->NewMETA(array_merge($_POST, array('CreatorUserID' => $userid)));
            $formfields["FormMetaID"] = $meta->FormMetaID;
            $formfields["UserID"] = $userid;
            $formfields["UID"] = $guid;
            $ff = array_merge($_POST, $formfields);
            //var_dump ($ff);
            $frm = $this->model->NewForm($ff);
            $this->ProcessAttachments($frm->UID, 3);   
            
            $wf = new \Bytecode\Opera\Libs\WorkFlow();
            $wf->SetForm(3, $meta->CountryID, $frm->UserID, $frm->UID, $frm->Code);

            // Approvers:
            $app = $this->http->PostVar("approveruserid");

            for ($i = 0; $i < count($app); $i++) {

                $wf->AddUser($app[$i], $i , $frm);
            }
            
            $wf->InitiateWorkflow();
            /*   $sap = new SAP();
              $res =  $sap->PostMMData($frm->PI_MATTYPE , $frm->PI_MATDESC , $frm ); */
            // var_dump($res);
            $msg->AddSessionMessage("Form Created Successfully!");
            $this->http->Redirect("/index.php?module=MM&method=Index&UID=" . $frm->UID);
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
            if ($frm->PE_MATNR != null && trim($frm->PE_MATNR) != "") {

                $tplparams['matnr'] = $frm->PE_MATNR;
            }
            $tplparams['createmm'] = '';
        } else {
            $tplparams['mode'] = 'NEW';
            //$tplparams['User'] = $_SESSION['user'];
            $tplparams['createmm'] = 'disabled=""';
        }
        return $tpl->render($tplparams);
    }

    /*   public function ViewForm($formid) {

      $tpl = $this->reg->html->loadTemplate($this->tpldir . "PaymentRequest.php");
      return $tpl->render(array('mode' => 'Existing', 'formid' => $formid, 'userinfo' => $_SESSION['user']));
      } */

    public function UpdateForm($uid) {
        $_POST['PI_MATDESC'] = trim($_POST['PI_MATDESC']);
        //$mattype = $this->http->PostVar('MATTYPE');
//        $formfields["FormMetaID"] = $meta->FormMetaID;
        //$formfields["UserID"] = $userid;
        //$formfields["UID"] = $guid;
        //$ff = array_merge($_POST, $formfields);
        //var_dump ($ff);
        $frm = $this->model->UpdateForm($uid, $_POST);
    }

    private function GetFormHTML($form) {

        $tpl = $this->reg->html->load($this->tpldir . "Mail/" . "MMBody.php");
        return $tpl->render(array('model' => $form));
    }

}
