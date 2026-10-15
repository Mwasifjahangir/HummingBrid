<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Controller;

class WorkFlowController extends \Bytecode\Opera\Controller\Controller {

    //private $workflow;

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\WorkFlow();
        $this->workflow = new \Bytecode\Opera\Libs\WorkFlow();
    }

    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");

        if ($method == "FormDefaultUsers") {
            $fid = $this->http->GetVar("formid");
            $cid = $this->http->GetVar("countryid");
            return $this->JsonFlush($this->model->NewForm());
        } elseif ($method == "GetWorkFlow") {
            $fid = $this->http->GetVar("formid");
            $cid = $this->http->GetVar("countryid");
            return $this->JsonFLush($this->model->GetWorkFlow($fid, $cid));
        } elseif ($method == "GetWorkFlowDefaultApprovers") {
            $countryid = $this->http->GetVar("countryid");
            $formid = $this->http->GetVar("formid");
            $usergroup = $this->http->GetVar("usergroup");
            $sbu = $this->http->GetVar("SBUID");
            
            return $this->JsonFLush($this->model->GetWorkFlowDefaultUsers($formid, $countryid, $usergroup, $sbu));
        }/* elseif ($method == "SetStatus") {
          $uid = $this->http->GetVar("UID");
          $status = $this->http->GetVar("status");
          $userid = $this->http->GetVar("userid");
          $comment = $this->http->GetVar("comment");

          return array("status" => "success");
          } */ elseif ($method == "GetRegions") {
            $fid = $this->http->GetVar("formid");

            return $this->JsonFLush($this->model->GetRegions($fid));
        } elseif ($method == "GetSBUList") {
            $cid = $this->http->GetVar("countryid");
            return $this->JsonFlush($this->model->GetSBUList($cid));
            
        } elseif ($method == "GetCountries") {
            $fid = $this->http->GetVar("formid");
            $rid = $this->http->GetVar("regionid");

            return $this->JsonFLush($this->model->GetCountries($rid, $fid));
        }
    }

}
