<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Controller;

class DashboardController extends \Bytecode\Opera\Controller\Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\Dashboard();
        $this->workflow = new \Bytecode\Opera\Libs\WorkFlow();
    }

    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");

        if ($method == "LoadMainChartData") {
            $creatoruserid = $_SESSION['user']['UserID'];

            $this->http->GetVar("from") == false ? $from = null : $from = $this->http->GetVar("from");
            $to = $this->http->GetVar("to") == false ? $to = null : $to = $this->http->GetVar("to");
            $formid = (int) $this->http->GetVar("formid");

            return $this->JsonFLush($this->LoadMainChartData($from, $to, $formid, $creatoruserid));
        } elseif ($method == "GetFormsUnderProcess") {
            $skip = (int) $this->http->GetVar("skip");
            $take = (int) $this->http->GetVar("take");
            $creatoruserid = $_SESSION['user']['UserID'];
            $this->http->GetVar("from") == false ? $from = null : $from = $this->http->GetVar("from");
            $to = $this->http->GetVar("to") == false ? $to = null : $to = $this->http->GetVar("to");
            $formid = (int) $this->http->GetVar("formid");
            return $this->JsonFLush($this->GetFormsUnderProcess($skip, $take, $from, $to, $formid, $creatoruserid));
        }  elseif ($method == "GetFormsApproved") {
            $skip = (int) $this->http->GetVar("skip");
            $take = (int) $this->http->GetVar("take");
            $creatoruserid = $_SESSION['user']['UserID'];
            $this->http->GetVar("from") == false ? $from = null : $from = $this->http->GetVar("from");
            $to = $this->http->GetVar("to") == false ? $to = null : $to = $this->http->GetVar("to");
            $formid = (int) $this->http->GetVar("formid");
            return $this->JsonFLush($this->GetFormsApproved($skip, $take, $from, $to, $formid, $creatoruserid));
        }  elseif ($method == "GetFormsForMyApproval") {
            $skip = (int) $this->http->GetVar("skip");
            $take = (int) $this->http->GetVar("take");
            $userid = $_SESSION['user']['UserID'];
            $this->http->GetVar("from") == false ? $from = null : $from = $this->http->GetVar("from");
            $to = $this->http->GetVar("to") == false ? $to = null : $to = $this->http->GetVar("to");
            $formid = (int) $this->http->GetVar("formid");
            return $this->JsonFLush($this->GetFormsForMyApproval($skip, $take, $from, $to, $formid, $userid));
        }
    }

    public function WEB() {
        parent::WEB();
    }

    public function LoadMainChartData($from, $to, $formid, $creatoruserid) {
        $data = $this->model->GetDashboardChartData($creatoruserid, $formid, $from, $to);
        $ret = array();
        // Fix dates 
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->Date != null && $data[$i]->Date != "") {
                $data[$i]->Date = $data[$i]->Date->format("Y-m-d");
                $ret[] = $data[$i];
            }
        }
        return $ret;
    }

    public function GetFormsUnderProcess($skip, $take, $from, $to, $formid, $creatoruserid) {
        return $this->model->GetFormsUnderProcess($skip, $take, $formid, $creatoruserid, $from, $to);
    }
     public function GetFormsApproved($skip, $take, $from, $to, $formid, $creatoruserid) {
        return $this->model->GetFormsApproved($skip, $take, $formid, $creatoruserid, $from, $to);
    }
    public function GetFormsForMyApproval($skip, $take, $from, $to, $formid, $userid) {
        return $this->model->GetFormsForMyApproval($skip, $take, $formid, $userid, $from, $to);
    }

}
