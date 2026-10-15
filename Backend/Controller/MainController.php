<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Controller;

class MainController extends Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $this->user = new \Bytecode\Opera\Controller\UserController();
    }

    public function WEB() {
        parent::WEB();
        $module = $this->http->GetVar('module');
        if ($module == "PaymentRequest") {
            $prc = new PaymentRequestController();
            return $prc->WEB();
        } elseif ($module == "PurchaseRequisition") {
            $prc = new PurchaseRequisitionController();
            return $prc->WEB();
        } elseif ($module == "ExpenseReport") {
            $erc = new ExpenseReportController();
            return $erc->WEB();
        } elseif ($module == "CreditNoteRequest") {
            $cnr = new CreditNoteRequestController();
            return $cnr->WEB();
        } elseif ($module == "PassportWithdrawal") {
            $pw = new PassportWithdrawalController();
            return $pw->WEB();
        } elseif ($module == "AssetTransfer") {
            $at = new AssetTransferController();
            return $at->WEB();
        } elseif ($module == "MM") {
            $mm = new MMController();
            return $mm->WEB();
        } elseif ($module == "VM") {
            $vm = new VMController();
            return $vm->WEB();
        } elseif ($module == "CM") {
            $cm = new CMController();
            return $cm->WEB();
        } elseif ($module == "IncidentReport") {
            $ir = new IncidentReport();
            return $ir->WEB();
        } elseif ($module == "User") {
            return $this->user->WEB();
        } else {
            return $this->Index();
        }
    }

    public function Index() {
        $tpl = $this->reg->html->load("MainDashboard.php");

        return $tpl->render(array());
    }

    public function RPC() {
        parent::RPC();
        $module = $this->http->GetVar('module');
        if ($module == "PaymentRequest") {
            $prc = new PaymentRequestController();
            return $prc->RPC();
        } elseif ($module == "PassportWithdrawal") {
            $pw = new PassportWithdrawalController();
            return $pw->RPC();
        } elseif ($module == "PurchaseRequisition") {
            $prc = new PurchaseRequisitionController();
            return $prc->RPC();
        } elseif ($module == "ExpenseReport") {
            $erc = new ExpenseReportController();
            return $erc->RPC();
        } elseif ($module == "AssetTransfer") {
            $at = new AssetTransferController();
            return $at->RPC();
        } elseif ($module == "WorkFlow") {
            $wfc = new WorkFlowController();
            return $wfc->RPC();
        } elseif ($module == "MM") {
            $mm = new MMController();
            return $mm->RPC();
        } elseif ($module == "User") {
            $uc = new UserController();
            return $uc->RPC();
        } elseif ($module == "VM") {
            $vm = new VMController();
            return $vm->RPC();
        } elseif ($module == "CM") {
            $cm = new CMController();
            return $cm->RPC();
        } elseif ($module == "Azure") {
            $az = new AzureController();
            return $az->RPC();
        } elseif ($module == "File") {
            $fc = new FileController();
            return $fc->RPC();
        } elseif ($module == "Dashboard") {
            $dc = new DashboardController();

            return $dc->RPC();
        }
    }

}
