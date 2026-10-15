<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Model;

class Dashboard extends Model {

    protected $table = "";
    protected $DBID = "";

    public function __construct() {
        parent::__construct();
    }

    public function GetDashboardChartData($CreatorUserID = 0, $FormID = 0, $From = "NULL", $To = "NULL") {
        $params = array(
            array($CreatorUserID, SQLSRV_PARAM_IN),
            array($FormID, SQLSRV_PARAM_IN),
            array($From, SQLSRV_PARAM_IN),
            array($To, SQLSRV_PARAM_IN),
        );
        //print_r($params);
        //    print_r($params);
        $q = "{call GetDashboardFormStats( ?, ? , ? , ?) }";

        $query = $this->db->Query($q, $params);
        //sqlsrv_next_result($query);
        //  sqlsrv_next_result($query);


        $data = $this->db->FetchAll($query);
        // Two times to get last insert id ignored
        //  
        // 
        //print_r($data);
        return $data;
    }

    public function GetFormsUnderProcess($skip, $take, $formid = 0, $userid = 0, $from = '', $to = '') {
        $ret = array();
        $m = new WorkFlow();
        $wfm = new \Bytecode\Opera\Libs\WorkFlow();
        $wf = new WorkFlow();
        $f = new Form();
        $allforms = $f->GetAllForms();
        $informlist = array();
        $wfs = null;
        for ($i = 0; $i < count($allforms); $i++) {
            $informlist[$allforms[$i]->FormID] = $allforms[$i];
        }
        $cdata = $m->GetFormsUnderProcess($userid, $formid, $skip, $take, $from, $to);
        $data = $cdata["Forms"];
		var_dump($cdata);
        for ($i = 0; $i < count($data); $i++) {
            $wfs = $wf->GetWorflowStatus($data[$i]->FRMUID);
            print_r($data[$i]);
            print_r($wfs);
            //  print_r($wfs);
            $ret[] = array(
                "FormTitle" => $informlist[$data[$i]->FormID]->Title,
                "Controller" => $informlist[$data[$i]->FormID]->Controller,
                "FRMUID" => $data[$i]->FRMUID,
                "Code" => $data[$i]->FormCode,
                "CreatedOn" => $data[$i]->CreatedOn,
                "UpdatedOn" => $data[$i]->UpdatedOn,
                "PendingWith" => "Vijay kumaaar"
				
                // "PendingWith" => $wfs["NextUser"]->DisplayName
            );
        }
        return array(
            "Total" => $cdata["Total"],
            "Forms" => $ret
        );
    }

    public function GetFormsApproved($skip, $take, $formid = 0, $userid = 0, $from = '', $to = '') {
        $ret = array();
        $m = new WorkFlow();
        $wfm = new \Bytecode\Opera\Libs\WorkFlow();
        $wf = new WorkFlow();
        $f = new Form();
        $allforms = $f->GetAllForms();
        $informlist = array();
        $wfs = null;
        for ($i = 0; $i < count($allforms); $i++) {
            $informlist[$allforms[$i]->FormID] = $allforms[$i];
        }
        $cdata = $m->GetMyFormsApproved($userid, $formid, $skip, $take, $from, $to);
        $data = $cdata["Forms"];

        for ($i = 0; $i < count($data); $i++) {
            //   $wfs = $wf->GetWorflowStatus($data[$i]->FRMUID);
            //  print_r($wfs);
            $ret[] = array(
                "FormTitle" => $informlist[$data[$i]->FormID]->Title,
                "Controller" => $informlist[$data[$i]->FormID]->Controller,
                "FRMUID" => $data[$i]->FRMUID,
                "Code" => $data[$i]->FormCode,
                "CreatedOn" => $data[$i]->CreatedOn,
                "UpdatedOn" => $data[$i]->UpdatedOn,
            );
        }
        return array(
            "Total" => $cdata["Total"],
            "Forms" => $ret
        );
    }

    public function GetFormsForMyApproval($skip, $take, $formid = 0, $userid = 0, $from = '', $to = '') {
        $ret = array();
        $m = new WorkFlow();
        $wfm = new \Bytecode\Opera\Libs\WorkFlow();
        $wf = new WorkFlow();
        $f = new Form();
        $allforms = $f->GetAllForms();
        $informlist = array();
        $wfs = null;
        for ($i = 0; $i < count($allforms); $i++) {
            $informlist[$allforms[$i]->FormID] = $allforms[$i];
        }
        $cdata = $m->GetFormsPendingForMyApproval($userid, $formid, $skip, $take, $from, $to);
        $data = $cdata["Forms"];

        for ($i = 0; $i < count($data); $i++) {
            //   $wfs = $wf->GetWorflowStatus($data[$i]->FRMUID);
            //  print_r($wfs);
            $ret[] = array(
                "FormTitle" => $informlist[$data[$i]->FormID]->Title,
                "Controller" => $informlist[$data[$i]->FormID]->Controller,
                "FRMUID" => $data[$i]->FRMUID,
                "Code" => $data[$i]->FormCode,
                "CreatedOn" => $data[$i]->CreatedOn,
                "UpdatedOn" => $data[$i]->UpdatedOn,
                "CreatorUser" => $data[$i]->DisplayName
            );
        }
        return array(
            "Total" => $cdata["Total"],
            "Forms" => $ret
        );
    }

}
