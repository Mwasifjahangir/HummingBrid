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
class VMController extends \Bytecode\Opera\Controller\Controller {

    private $tpldir = "Forms/SAP/";

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\VM();
        $this->workflow = new WorkFlow();
        $this->reg = \opera\bytecode\Registry::getInstance();
        $this->logger = $this->reg->logger;
    }

    public function WEB() {

        $method = $this->http->GetVar("method");
        if ($method == "ProcessForm") {
            return $this->ProcessForm();
        } elseif ($method == "List") {
            return $this->ListForms();
        } elseif ($method == "Dashboard") {
            $tpl = $this->reg->html->load($this->tpldir . "VMDash.php");
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
        } elseif ($method == "GetVMData") {
            return $this->JsonFLush($this->model->GetVMData());
        } elseif ($method == "SearchMaterial") {
            return $this->JsonFLush($this->SearchMaterial());
        } elseif ($method == "SetStatus") {
            $userid = $this->http->PostVar("UserID");
            $comment = $this->http->PostVar("Comments");
            $status = $this->http->PostVar("Status");
            $uid = $this->http->GetVar("UID");

            return $this->JsonFLush($this->SetStatus($uid, $status, $userid, $comment));
            // return true;
        }
        /* elseif($method == "CreateMaterial"){
          return $this->JsonFLush($this->CreateMaterial());
          } */
    }

    public function Index() {

        $tpl = $this->reg->html->load($this->tpldir . "VM.php");
        $uid = $this->http->GetVar("UID");
        $msg = new \Bytecode\Opera\Libs\Messaging();
        $sapreturn = new \Bytecode\Opera\Model\SAPReturn();

        // Post?

        if ($this->http->ISPost() == true && $this->http->GetVar("UID") == false) {

            $guid = com_create_guid();
            $userid = $_SESSION['user']['UserID'];
            $countryid = $this->http->PostVar('Country');
            $regionid = $this->http->PostVar('Region');
            $reason = $this->http->PostVar('REASONFORCREAT');
            //$_POST['PI_MATDESC'] = trim($_POST['PI_MATDESC']);
            //$mattype = $this->http->PostVar('MATTYPE');
            $meta = new FormMeta();

            $meta = $meta->NewMETA(array_merge($_POST, array('CreatorUserID' => $userid)));
            $formfields["FormMetaID"] = $meta->FormMetaID;
            $formfields["UserID"] = $userid;
            $formfields["UID"] = $guid;

            // GROUP
            // isset($_POST['GRUPP']) == true ? $formfields["FDGRV"] = $_POST['GRUPP'] : $formfields["FDGRV"] = NULL;
            // Company Code  Field Mapping
            isset($_POST['COMP_CODE']) == true ? $formfields["BUKRS"] = $_POST['COMP_CODE'] : $formfields["BUKRS"] = NULL;
            isset($_POST['RCOMP']) == true ? $formfields["VBUND"] = $_POST['RCOMP'] : $formfields["VBUND"] = NULL;
            isset($_POST['BOLRE']) == true ? $formfields["BOLRE"] = "X" : $formfields["BOLRE"] = "";
            isset($_POST['BOIND']) == true ? $formfields["BOIND"] = "X" : $formfields["BOIND"] = "";
            isset($_POST['UMSAE']) == true ? $formfields["UMSAE"] = "X" : $formfields["UMSAE"] = "";
            //isset($_POST['ZLSCH']) == true ? $formfields["ZWELS"] = $_POST['ZLSCH'] : $formfields["ZLSCH"] = NULL;


            $ff = array_merge($_POST, $formfields);
            //var_dump ($ff);
            $frm = $this->model->NewForm($ff);

            //FILES
            /* $filesystem = new \FileUpload\FileSystem\Simple();
              $pathresolver = new \FileUpload\PathResolver\Simple('./Files');
              //$filenamegenerator = new \FileUpload\FileNameGenerator\Simple();
              $fileupload = new \FileUpload\FileUpload($_FILES['files'], $_SERVER);
              list($filesuploaded, $fileheaders) = $fileupload->processAll();

              // $fileupload->setFileNameGenerator($filenamegenerator);

              $fileupload->setPathResolver($pathresolver);
              $fileupload->setFileSystem($filesystem);
              var_dump($filesuploaded);
              var_dump($filesheaders); */
            $this->ProcessAttachments($frm->UID, 4);
            $wf = new \Bytecode\Opera\Libs\WorkFlow();
            $wf->SetForm(4, $meta->CountryID, $frm->UserID, $frm->UID, $frm->Code);

            // Approvers:
            $app = $this->http->PostVar("approveruserid");

            for ($i = 0; $i < count($app); $i++) {

                $wf->AddUser($app[$i], $i , $frm);
            }

            $wf->InitiateWorkflow();

            // var_dump($res);
            $msg->AddSessionMessage("Form Created Successfully!");
            $this->http->Redirect("/index.php?module=VM&method=Index&UID=" . $frm->UID);
        } elseif ($this->http->ISPost() == true && $this->http->GetVar("UID")) {
            isset($_POST['COMP_CODE']) == true ? $_POST["BUKRS"] = $_POST['COMP_CODE'] : $_POST["BUKRS"] = NULL;
            isset($_POST['RCOMP']) == true ? $_POST["VBUND"] = $_POST['RCOMP'] : $_POST["VBUND"] = NULL;
            $this->UpdateForm($this->http->GetVar("UID"));
            $this->ProcessAttachments($this->http->GetVar("UID"), 4);
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

            if ($frm->PE_LIFNR != null && trim($frm->PE_LIFNR) != "") {

                $tplparams['vendornumb'] = $frm->PE_LIFNR;
            }
            $tplparams['mode'] = 'EXISTING';
            $tplparams['UID'] = $uid;
            $tplparams['sapreturn'] = $table;

            $tplparams['createmm'] = '';
        } else {
            $tplparams['mode'] = 'NEW';

            $tplparams['createmm'] = 'disabled=""';
        }
        return $tpl->render($tplparams);
    }

    public function ListForms() {

        $tpl = $this->reg->html->load($this->tpldir . "VMList.php");
        return $tpl->render(array());
    }

    public function FormsPendingForMyApproval() {
        /* $fid = $this->http->GetVar("formid");
          $rid =$this->http->GetVar("regionid"); */
        $forms = array();
        $data = $this->workflow->GetFormsPendingForMyApproval($_SESSION["user"]["UserID"], 4, $this->http->GetVar("skip"), $this->http->GetVar("take"));
        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $this->workflow->GetWorflowStatus($data['Forms'][$i]->FRMUID));
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsApproved() {
        $forms = array();
        $data = $this->workflow->GetMyFormsApproved($_SESSION["user"]["UserID"], 4, $this->http->GetVar("skip"), $this->http->GetVar("take"));

        for ($i = 0; $i < count($data['Forms']); $i++) {


            $forms[] = array("f" => $this->model->GetForm($data['Forms'][$i]->FRMUID, "UID"), "wf" => $data['Forms'][$i]);
        }

        return array("Forms" => $forms, "Total" => $data["Total"]);
    }

    public function FormsUnderProcess() {
        $forms = array();
        $data = $this->workflow->GetFormsUnderProcess($_SESSION["user"]["UserID"], 4, $this->http->GetVar("skip"), $this->http->GetVar("take"));

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
            $this->logger->Info("inside prefinalapprovehook, ");
            // Already created in SAP (e.g. a previous approval failed after the BAPI call)? Don't create it again
            $current = $model->GetForm($uid, "UID");
            if ($current->PE_LIFNR != null && trim($current->PE_LIFNR) != "") {
                $this->logger->Info("VM {$uid} already has vendor {$current->PE_LIFNR}, skipping SAP creation");
                return true;
            }
            $sap = new SAP();
            $res = $sap->PostVMData($form);
            // var_dump($res);
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

                // SAP returned a vendor number => vendor exists, persist it even if RETURN has E messages
                $lifnr = isset($res["result"]["PE_LIFNR"]) ? ltrim($res["result"]["PE_LIFNR"], '0') : "";
                if ($lifnr != "") {
                    if ($error) {
                        $this->logger->Info("VM {$uid}: vendor {$lifnr} created with error messages in SAP RETURN");
                    }
                    $this->logger->info("successfully vendor created");
                    $model->UpdateVendorCode($lifnr, $uid);
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
        $this->workflowmanager->postfinalapprovalhook = function() use ($uid, &$form, &$model, &$wfm, &$tpl, &$mgmodel) {
            $user = new class {

                public $Username = "User";
            };

            // get new form
            $f = $model->GetForm($uid, 'UID');

            // Refresh workflow
            $wfm->RefreshWorkFlow();
            $http = new \Bytecode\Opera\Libs\HTTPKernel();
            // TODO HARDCODED FORM ID
            $form = new \Bytecode\Opera\Model\Form();
            $vmf = $form->GetForm(4);
            $link = $http->BuildLink(array(
                'module=' . $vmf->Controller,
                'method=Index',
                'UID=' . $f->UID
            ));
            $render = $tpl->load($this->tpldir . "Mail/" . "VMCreated.php");

            $mailtpl = $wfm->RenderWorkflowTemplate($render->render(array(
                        'NAME' => $f->NAME,
                        'vendornumb' => $f->PE_LIFNR,
                        'FormLink' => $link
                    ))
                    , "", $user);
            $group = $mgmodel->GetGroup("SAPVMCreated");
            $mgrp = array();
            for ($i = 0; $i < count($group); $i++) {
                $mgrp[] = $group[$i]->Email;
            }
            $mail = new \Bytecode\Opera\Libs\Mail();
            $msg = $mail->CreateMessage("SAP VM Vendor: " . $f->PE_LIFNR . " Created", $mgrp, $mailtpl);
            $mail->Send($msg);
        };
        $this->workflowmanager->SetForm(4, $fmd->CountryID, $form->UserID, $uid, $form->Code);
        $this->workflowmanager->setFormHTML($this->GetFormHTML($form));
        //FOR TESTING
        $this->workflowmanager->SetStatus($status, $userid, $comment);
        return array("status" => "success");
    }

    public function UpdateForm($uid) {
        //$_POST['PI_MATDESC'] = trim($_POST['PI_MATDESC']);
        //$mattype = $this->http->PostVar('MATTYPE');
//        $formfields["FormMetaID"] = $meta->FormMetaID;
        //$formfields["UserID"] = $userid;
        //$formfields["UID"] = $guid;
        //$ff = array_merge($_POST, $formfields);
        //var_dump ($ff);
        $frm = $this->model->UpdateForm($uid, $_POST);
    }

    private function GetFormHTML($form) {

        $tpl = $this->reg->html->load($this->tpldir . "Mail/" . "VMBody.php");
        return $tpl->render(array('model' => $form));
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

}
