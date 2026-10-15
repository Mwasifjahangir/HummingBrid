<?php

/**
 * Created by PhpStorm.
 * User: Akamil
 * Date: 8/7/2016
 * Time: 6:50 PM
 */

namespace Bytecode\Opera\Libs;

use Bytecode\Opera\Model\Form;
use Bytecode\Opera\Model\User;

class WorkFlow {

    private $reg;
    private $model;
    private $CountryID;
    private $CreatorUserID;
    private $CreatorUser;
    private $FRMUID;
    private $FormID;
    private $Form;
    private $WorkFlowData;
    private $mail;
    private $tpl;
    private $tpldir = "Mail/";
    private $htmlcachedir = "Cache/HTML/";
    private $pdfcachedir = "Cache/PDF/";
    private $FormCode;
    private $FormHTML;
    private $FilesHTML;
    private $FormHeaderHtml = "";
    public $prefinalapprovehook;
    public $postfinalapprovalhook;

    public function __construct() {
        $this->model = new \Bytecode\Opera\Model\WorkFlow();
        $this->reg = \opera\bytecode\Registry::getInstance();
        $this->logger = $this->reg->logger;
        /* $this->http = $this->reg->http;
          $this->mail = $this->reg->mail; */
        $this->prefinalapprovehook = function() {
            return false;
        };
        $this->postfinalapprovalhook = function() {
            return false;
        };
    }

    public function setFormHTML($html) {
        $this->FormHTML = $html;
    }

    public function getFormTitle() {
        return $this->Form->Title . " " . $this->FormCode;
    }

    public function SetForm($formid, $countryid, $creatoruserid, $frmuid, $code) {
        $this->CountryID = $countryid;
        $this->FormID = $formid;
        $this->CreatorUserID = $creatoruserid;
        $this->FRMUID = $frmuid;
        $this->FormCode = $code;
        $this->RefreshWorkFlow();
    }

    public function InitiateWorkflow() {
        $this->RefreshWorkFlow();
        $http = new HTTPKernel();

        $data = array(
            'FormTitle' => $this->getFormTitle(),
            'FormCode' => $this->FormCode,
            'FormLink' => $http->BuildLink(array(
                'module=' . $this->Form->Controller,
                'method=Index',
                'UID=' . $this->FRMUID
            ))
        );
        // New Email to initiator
        $tpl = $this->reg->html->load($this->tpldir . "WorkflowFormCreated.php");
        $ren = $tpl->render(array('model' => $data));
        $template = $this->RenderWorkflowTemplate($this->FormHTML, $ren, $this->CreatorUser);
        $mail = new Mail();
        $em = $mail->CreateMessage('Form ' . $this->FormCode . ' Created', GetEmail($this->CreatorUser), $template);
        $mail->Send($em);
        $this->SendToNextInlineUser();
    }

    public function AddUser($UserID, $Order, $frm) {

        return $this->model->AddUser($UserID, $this->CreatorUserID, $this->FRMUID, $Order, $this->FormID, $frm->Code);
    }

    public function SetStatus($status, $userid, $comments) {
        $this->logger->info("libs\workflow SetStatus request received: with {$status}, {$userid}, {$comments}");
        // Get Workflow Status:
        $wfstatus = $this->model->GetWorflowStatus($this->FRMUID);
        // Last approver? call hook
        $this->logger->info("Current worflow status: {$wfstatus['Status']}");
        if ($wfstatus['Status'] == 'PENDING'){
            $finalapprover = $this->model->IsLastApprover($this->FRMUID, $userid);
            if ($status == WFSTATUS["APPROVED"] && $finalapprover) {
                $this->logger->info("invoked approval process");
                $precheck = $this->prefinalapprovehook->__invoke();
                if (!$precheck) {
                    $this->logger->info("approval process failed");
    
                    //   echo 'retturning';
                    return false;
                }
            }else{
                $this->logger->info("approval process not invoked");
            }
            // SET In DB
            $this->model->SetStatus($this->FRMUID, $status, $userid, $comments);
            $this->RefreshWorkFlow();
    
            // Send Update To Initiator
            $this->SendWorkFlowUpdateToInitiator($status, $userid);
            // post workflow Status and (form is approved)
            $wfstatus = $this->model->GetWorflowStatus($this->FRMUID);
            if ($wfstatus['Status'] == WFSTATUS["APPROVED"]) {
                $postcheck = $this->postfinalapprovalhook->__invoke();
                if (!$postcheck) {
                    //   echo 'retturning';
                    return false;
                }
            }
        }
    }

    public function SendWorkFlowUpdateToInitiator($status, $userid) {
        $us = new User();
        $http = new HTTPKernel();
        $appuser = $us->GetUser($userid);
        $params = array(
            'FormTitle' => $this->getFormTitle(),
            'FormCode' => $this->FormCode,
            'FormLink' => $http->BuildLink(array(
                'module=' . $this->Form->Controller,
                'method=Index',
                'UID=' . $this->FRMUID
            )),
            'ApproverUser' => $appuser,
            'Status' => FormatStatus($status)
        );
        $tpl = $this->reg->html->load($this->tpldir . "WorkflowUpdate.php");
        $ren = $tpl->render(array('model' => $params));
        $template = $this->RenderWorkflowTemplate($this->FormHTML, $ren, $this->CreatorUser);
        $mail = new Mail();
        $em = $mail->CreateMessage('Form ' . $this->FormCode . ' Update', GetEmail($this->CreatorUser), $template);
        $mail->Send($em);

        // Send to  Next Inline Approver, Dont Send in case of RFI
        if ($status != WFSTATUS['RFI']) {
            $this->SendToNextInlineUser();
        }
    }

    public function SendToNextInlineUser() {
        $http = new HTTPKernel();
        $wfstats = $this->model->GetWorflowStatus($this->FRMUID);
        //  var_dump($wfstats);
        // var_dump($wfstats);
        // Most 
        if ($wfstats["Status"] == "PENDING") {
            $us = new User();
            //$appuser = $us->GetUser($wfstats["NextUser"]);
            $tpl = $this->reg->html->load($this->tpldir . "WorkflowActionRequired.php");
            $params = array(
                'FormTitle' => $this->getFormTitle(),
                'FormCode' => $this->FormCode,
                'FormLink' => $http->BuildLink(array(
                    'module=' . $this->Form->Controller,
                    'method=Index',
                    'UID=' . $this->FRMUID
                )),
                'ApproverUser' => $wfstats["NextUser"],
            );
            $ren = $tpl->render(array('model' => $params));
            $mail = new Mail();
            $template = $this->RenderWorkflowTemplate($this->FormHTML, $ren, $wfstats["NextUser"]);
            $em = $mail->CreateMessage('Form ' . $this->FormCode . ' requires your action', GetEmail($wfstats["NextUser"]), $template);
            $mail->Send($em);
        } elseif ($wfstats["Status"] == "APPROVE" || $wfstats["Status"] == "REJECT") {

            $tpl = $this->reg->html->load($this->tpldir . "WorkflowFinished.php");
            $params = array(
                'FormTitle' => $this->getFormTitle(),
                'FormCode' => $this->FormCode,
                'FormLink' => $http->BuildLink(array(
                    'module=' . $this->Form->Controller,
                    'method=Index',
                    'UID=' . $this->FRMUID
                )),
                'Status' => FormatStatus($wfstats["Status"])
            );
            $ren = $tpl->render(array('model' => $params));
            $mail = new Mail();
            $template = $this->RenderWorkflowTemplate($this->FormHTML, $ren, $this->CreatorUser);
            $em = $mail->CreateMessage('Form ' . $this->FormCode . ' Update', GetEmail($this->CreatorUser), $template);
            $mail->Send($em);
        }


        //$table = $tpl->render(array('mainform' => $form, 'formlist' => $formlist, 'workflow' => $workflow, 'user' => $_SESSION['user'], 'files' => $files));
    }

    public function SendWorkFlowUpdate($to, $title, $body) {
        $tpl = $this->reg->html->load($this->tpldir . "WorkflowTemplate.php");
        $ren = $tpl->render(array('mainform' => $form, 'formlist' => $formlist, 'workflow' => $workflow, 'user' => $_SESSION['user'], 'files' => $files));
    }

    public function RenderWorkflowUpdate($status, $userinfo) {
        
    }

    public function RenderWorkflowTemplate($formhtml, $workflowhtml, $user, $hidewfsummary = false) {

        $params = array(
            // to User
            'User' => $user,
            'CreatorUser' => $this->CreatorUser,
            //Headers
            'FormHeader' => $this->FormHeaderHtml,
            // WOrkflow Data
            'WorkFlow' => $this->WorkFlowData,
            // Type of update (Workflow Body)
            'WorkFlowHTML' => $workflowhtml,
            'FormHTML' => $formhtml
        );
        if ($hidewfsummary == true) {
            $params["HideWFSummary"] = true;
        }
        //print_r($params);
        //print_r($params);

        $tpl = $this->reg->html->load($this->tpldir . "WorkflowTemplate.php");
        $ren = $tpl->render(array('model' => $params));
        // finally render the templat
        $wrapper = $this->reg->html->load($this->tpldir . "WorkFlowWrapper.php");
        return $wrapper->render(array('html' => $ren));
    }

    public function RefreshWorkFlow() {

        //
        $f = new Form();
        $u = new User();
        $this->Form = $f->GetForm($this->FormID);
        $this->CreatorUser = $u->GetUser($this->CreatorUserID);
        $this->WorkFlowData = $this->model->GetWorkFlow($this->FRMUID);
        // Genrate Form Headers HTML
        $this->GenrateFormHeaderHTML();
        // Genrate Form Header
    }

    public function GenrateFormHeaderHTML() {
        $http = new HTTPKernel();
        $params = array(
            'CreatorUser' => $this->CreatorUser,
            'FormCode' => $this->FormCode,
            'Form' => $this->Form,
            'FormLink' => $http->BuildLink(array(
                'module=' . $this->Form->Controller,
                'method=Index',
                'UID=' . $this->FRMUID
            ))
        );
        $wrapper = $this->reg->html->load($this->tpldir . "WorklflowFormHeader.php");
        $this->FormHeaderHtml = $wrapper->render(array('model' => $params));
    }

    public function HTMLExport() {
        $this->RefreshWorkFlow();
        $params = array();
        $html = $this->RenderWorkflowTemplate($this->FormHTML, "", $this->CreatorUser, true);
        $fname = md5($html) . ".html";
        $htmltemp = file_put_contents($this->htmlcachedir . "" . $fname, $html);
        return $this->htmlcachedir . "" . $fname;
    }

    public function PDFExport() {

        $fhtml = $this->HTMLExport();
        $pparams = array(
            'binary' => CONFIG["BASE"]["PDFEXPORTUTIL"],
            'ignoreWarnings' => true,
            'commandOptions' => array(
                'useExec' => true, // Can help if generation fails without a useful error message
                'procEnv' => array(
                    // Check the output of 'locale' on your system to find supported languages
                    'LANG' => 'en_US.utf-8',
                ),
        ));
        $p = new \mikehaertl\wkhtmlto\Pdf($pparams);
        $p->addPage(realpath($fhtml));
        $pfname = $this->FormCode . "" . rand(0, 9999) . ".pdf";


        $p->saveAs($this->pdfcachedir . "" . $pfname);
        //echo $p->getError();
        return $this->pdfcachedir . "" . $pfname;
    }

}
