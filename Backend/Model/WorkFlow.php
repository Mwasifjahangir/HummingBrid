<?php

/**
 * @author Ahmed Kamil <ahmedk@freshdelmonte.com>
 * 
 */

namespace Bytecode\Opera\Model;

use \YaLinqo\Enumerable;

class WorkFlow extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = "WFTrack";
        $this->logger = $this->reg->logger;
    }

    /* public function GetWorkFlow($formid, $countryid) {
      $q = "SELECT * FROM Workflows WHERE ";
      if ($formid > 0) {
      $q .= "  FormID = " . (int) $formid;
      }
      if ($countryid > 0) {
      $q .= " AND CountryID = " . (int) $countryid;
      }
      //   echo $q;
      $query = $this->db->Query($q);
      $data = $this->db->FetchRow($query);
      return $data;
      } */

    public function GetRegions($formid) {

        $er = "SELECT * FROM RegionFormEnabled WHERE FormID=" . $formid;
        $erq = $this->db->Query($er);
        $erdata = $this->db->FetchAll($erq);

        // since its STDClass , use map function to get id , output = "1,2,3,4"
        $qexp = implode(', ', array_map(function($c) {
                    return $c->RegionID;
                }, $erdata));
        $q = $this->db->Query("SELECT * FROM [Regions] WHERE RegionID IN (" . $qexp . ") ORDER BY RegionID");
        $ret = $this->db->FetchAll($q);
        return $ret;
    }

    public function GetCountries($regionid, $formid) {
        $ec = "SELECT * FROM CountryFormEnabled WHERE FormID=" . $formid;
        $ecq = $this->db->Query($ec);
        $ecdata = $this->db->FetchAll($ecq);


        // since its STDClass , use map function to get id , output = "1,2,3,4"
        $qexp = implode(', ', array_map(function($c) {
                    return $c->CountryID;
                }, $ecdata));
        $q = $this->db->Query("SELECT * FROM [Countries]  WHERE CountryID IN (" . $qexp . ") AND RegionID = " . $regionid . " ORDER BY CountryID");
        $ret = $this->db->FetchAll($q);
        //var_dump($ret);
        for ($i = 0; $i < count($ret); $i++) {
            $ret[$i]->ExchangeRates = $this->GetExchnageRates($ret[$i]->CountryID);
        }

        return $ret;
    }

    public function GetCountry($countryid) {
        $q = "SELECT * FROM Countries WHERE CountryID = " . (int) $countryid;
        $query = $this->db->Query($q);
        $data = $this->db->FetchRow($query);
        return $data;
    }
        public function GetRegion($regionid) {
        $q = "SELECT * FROM Regions WHERE RegionID = " . (int) $regionid;
        $query = $this->db->Query($q);
        $data = $this->db->FetchRow($query);
        return $data;
    }

    public function GetExchnageRates($countryid) {
        $q = "SELECT * FROM ExchangeRates WHERE CountryID=" . (int) $countryid;
        $query = $this->db->Query($q);
        $data = $this->db->FetchAll($query);
        return $data;
    }

    /* public function GetByRegion($RegionID) {
      $q = $this->db->Query("SELECT * FROM [" . $this->table . "] WHERE RegionID='" . $RegionID . "' ORDER BY CountryID ");
      $ret = $this->db->FetchAll($q);

      return $ret;
      } */

    public function GetWorkFlowDefaultUsers($formid, $countryid, $usergroup = "", $SBU = "") {
        $usergroupfilter = "";
        if ($usergroup != false && $usergroup != null && trim((string) $usergroup) != "") {
            $usergroupfilter = " [UserGroup] = '" . $usergroup . "' ";
        } else {
            $usergroupfilter = "UserGroup IS NULL";
        }
        $SBUfilter = "";
        if ($SBU != false && $SBU != null && (int) $SBU > 0) {
            $SBUfilter = " [SBUID] = '" . (int) $SBU . "' ";
        } else {
            $SBUfilter = " [SBUID] IS NULL ";
        }
        $q = "SELECT WFDefaultApprovers.UserID, WFDefaultApprovers.UserID, WFDefaultApprovers.UserOrder, WFDefaultApprovers.CountryID , WFDefaultApprovers.FormID ,Users.DisplayName, Users.Username
FROM  WFDefaultApprovers INNER JOIN
         Users ON WFDefaultApprovers.UserID = Users.UserID WHERE WFDefaultApprovers.FormID = " . (int) $formid . " AND WFDefaultApprovers.CountryID = " . (int) $countryid . " AND " . $usergroupfilter . " AND " . $SBUfilter . "  ORDER BY UserOrder ASC";
        $query = $this->db->Query($q);
        $data = $this->db->FetchAll($query);
        return $data;
    }

    public function GetSBUList($countryid) {
        $q = 'SELECT *   FROM [dbo].[SBU]  WHERE [CountryID] = ' . (int) $countryid;
        $query = $this->db->Query($q);
        $data = $this->db->FetchAll($query);
        return $data;
    }

    public function GetWorkFlowFormUser($uid) {
        $q = "SELECT *
  FROM [WorkFlowDefaultUsers] WHERE WorkflowUsersForm = " . $uid;
        $query = $this->db->Query($q);
        $data = $this->db->FetchAll($query);
        return $data;
    }

    public function DeleteAllWorkFlowFormUser($guid) {
        $q = "DELETE FROM [dbo].[WorkflowUsersForm] WHERE [UID] ='" . $guid . "'";
        $query = $this->db->Query($q);
        return true;
    }

    /**
     * Get forms that require the specific user approval
     */
    public function GetFormsPendingForMyApproval($userid, $formid, $skip, $take, $from = '', $to = '') {

        $total = 0;
        $params = array(
            array($userid, SQLSRV_PARAM_IN),
            array($formid, SQLSRV_PARAM_IN),
            array($skip, SQLSRV_PARAM_IN),
            array($take, SQLSRV_PARAM_IN),
            array($from, SQLSRV_PARAM_IN),
            array($to, SQLSRV_PARAM_IN),
            array(&$total, SQLSRV_PARAM_OUT)
        );
        $q = "{call GetFormsPendingForMyApproval( ?, ? , ? , ? , ? , ? , ?)}";
        //$q = "EXEC [dbo].[GetFormsPendingForMyApproval] @UserID = ".$userid.", @FormID = ".$formid." , @Skip = ".$skip." , @Take = ".$take;
        $query = $this->db->Query($q, $params);
        $frms = $this->db->FetchAll($query);
        // Two times to get last insert id ignored
        sqlsrv_next_result($query);

        sqlsrv_next_result($query);
        /* echo $total;
          var_dump($frms); */

        return array("Forms" => $frms, "Total" => $total);
    }

    public function GetFormsUnderProcess($userid, $formid, $skip, $take, $from = '', $to = '') {
        $total = 0;
        $params = array(
            array($userid, SQLSRV_PARAM_IN),
            array($formid, SQLSRV_PARAM_IN),
            array($skip, SQLSRV_PARAM_IN),
            array($take, SQLSRV_PARAM_IN),
            array($from, SQLSRV_PARAM_IN),
            array($to, SQLSRV_PARAM_IN),
            array(&$total, SQLSRV_PARAM_OUT)
        );
        //print_r($params);
        // print_r($params);
        $q = "{call GetFormUnderProcess( ?, ? , ? , ? , ? , ? , ?)}";
        //$q = "EXEC [dbo].[GetFormsPendingForMyApproval] @UserID = ".$userid.", @FormID = ".$formid." , @Skip = ".$skip." , @Take = ".$take;
        $query = $this->db->Query($q, $params);
        $frms = $this->db->FetchAll($query);
        // Two times to get last insert id ignored
        sqlsrv_next_result($query);

        sqlsrv_next_result($query);
        /* echo $total;
          var_dump($frms); */

        return array("Forms" => $frms, "Total" => $total);
    }

    public function GetMyFormsApproved($userid, $formid, $skip, $take, $from = '', $to = '') {
        $total = 0;
        $params = array(
            array($userid, SQLSRV_PARAM_IN),
            array($formid, SQLSRV_PARAM_IN),
            array($skip, SQLSRV_PARAM_IN),
            array($take, SQLSRV_PARAM_IN),
            array($from, SQLSRV_PARAM_IN),
            array($to, SQLSRV_PARAM_IN),
            array(&$total, SQLSRV_PARAM_OUT)
        );
        $q = "{call GetMyFormsApproved( ?, ? , ? , ? , ? , ? , ?)}";

        $query = $this->db->Query($q, $params);
        $frms = $this->db->FetchAll($query);

        // Two times to get last insert id ignored
        sqlsrv_next_result($query);
        sqlsrv_next_result($query);
        /* echo $total;
          var_dump($frms); */

        return array("Forms" => $frms, "Total" => $total);
    }

    public function IsLastApprover($uid, $userid) {
        $wf = $this->GetWorkFlow($uid);
        // get last approver
        $last = array_pop($wf);
        if ($last->UserID == $userid) {
            return true;
        }
        return false;
    }

    /**
     * Check if WF of related form is in progress , rejected or approved 
     * @param type $uid
     */
    public function GetWorflowStatus($uid) {
        $user = $this->GetWorkFlow($uid);
        $status = "";
        $approvecount = 0;
        $nextuser;
        $ret = array(
            'Status' => "",
            'NextUser' => ""
        );
        for ($i = 0; $i < count($user); $i++) {
            // to match if approver count == total users in approval list i.e form is approved
            if ($user[$i]->Status === WFSTATUS["APPROVED"]) {
                $approvecount++;
            }
            // if reject return and break loop
            elseif ($user[$i]->Status === WFSTATUS["REJECTED"]) {
                $status = WFSTATUS["REJECTED"];

                break;
            }
            //previous user approved the request but form is still pending
            elseif ($user[$i]->Status === WFSTATUS["PENDING"] && $i > 0 && $user[$i - 1]->Status === WFSTATUS["APPROVED"]) {
                $status = WFSTATUS["PENDING"];
                $nextuser = $user[$i];
            }
            // Only 1 user in workflow and its pending
            elseif ($user[$i]->Status === WFSTATUS["PENDING"] && count($user) === 1) {
                $status = WFSTATUS["PENDING"];
                $nextuser = $user[$i];
            }
            // first user in form ie preliminary approval ?
            elseif ($user[$i]->Status === WFSTATUS["PENDING"] && count($user) > 1 && $i == 0) {
                $status = WFSTATUS["PENDING"];
                $nextuser = $user[$i];
            } elseif ($user[$i]->Status === WFSTATUS["RFI"]) {
                $status = WFSTATUS["RFI"];
            }
        }
        // All users approved?
        if (count($user) === $approvecount) {
            $ret['Status'] = WFSTATUS["APPROVED"];
            $ret['NextUser'] = "";
        }
        // Rejected?
        elseif ($status === WFSTATUS["REJECTED"]) {
            $ret['Status'] = WFSTATUS["REJECTED"];
        }
        // still in progress
        else {
            $ret['Status'] = WFSTATUS["PENDING"];
            isset($nextuser) ? $ret['NextUser'] = $nextuser : $ret['NextUser'] = null;
        }
        return $ret;
    }

    public function GetWorkflow($uid) {
        try {
            $q = "SELECT WFTrack.UpdatedOn, WFTrack.FormID, WFTrack.FRMUID, WFTrack.UserID, WFTrack.UserOrder, WFTrack.Status, WFTrack.Comments, WFTrack.WFTrackID,
            AppUser.DisplayName As DisplayName, AppUser.Username AS Username,
            CU.DisplayName As CreatorDisplayName, CU.Username AS CreatorUserName

            FROM WFTrack
            INNER JOIN
            Users  Appuser ON WFTrack.UserID = AppUser.UserID
            INNER  JOIN
            Users CU ON WFTrack.CreatorUserID = CU.UserID
            
            WHERE WFTrack.FRMUID = '" . $uid . "' ORDER BY WFTrack.UserOrder ASC";
            $query = $this->db->Query($q);

            $data = $this->db->FetchAll($query);
            return $data;
        } catch (Exception $e) {
            // Code that runs if an exception occurs
            echo "Caught exception: " . $e->getMessage();
            
        }


        
    }

    public function SetStatus($uid, $status, $userid, $comment) {
        $this->logger->Info("set  status request received: {$uid}, {$status}, {$userid}, {$comment} " );
        // Parameterized: a quote in the comment must not break the query after SAP has already been called
        $q = "UPDATE [WFTrack] SET [UpdatedOn] = GETDATE(), [Comments] = ?, [Status] = ? WHERE [FRMUID] = CONVERT(UNIQUEIDENTIFIER, ?) AND [UserID] = ?";
        $query = $this->db->Query($q, array($comment, $status, $uid, $userid));
        return true;
    }

    public function AddUser($userid, $creatoruserid, $frmuid, $order, $formid, $formcode) {
        $primaryKeyColumn = 'WFTrackID';
        $check_q = "SELECT [$primaryKeyColumn] FROM [dbo].[WFTrack] 
                    WHERE [UserID] = " . (int) $userid . " 
                    AND [FRMUID] = CONVERT(UNIQUEIDENTIFIER, '" . $frmuid . "')";
        $this->logger->Info("check Query {$check_q}", "Backend\Model\WORKFLOW");
        $check_query = $this->db->Query($check_q);
        $existing_record = $this->db->FetchRow($check_query); 

        if ($existing_record) {
        $this->logger->Info("return existing {$existing_record->$primaryKeyColumn}", "Backend\Model\WORKFLOW");

            return $existing_record->$primaryKeyColumn;
        } 
        else {
        $this->logger->Info("Inserting New");

            $q = "INSERT INTO [dbo].[WFTrack]
                    (
                        [UserID]
                    , [CreatorUserID]
                    , [UserOrder]
                    , [FRMUID]
                    , [Status]
                    , [Comments]
                    , [FormID]
                    , [FormCode]
                    )
                    VALUES
                    (
                        " . (int) $userid . "
                        , " . (int) $creatoruserid . "
                        , " . (int) $order . "
                        , CONVERT(UNIQUEIDENTIFIER, '" . $frmuid . "')
                        , 'PENDING'
                        , ''
                        , " . (int) $formid . "
                        , '" . $formcode . "'"
                    . ")";
                    
            $query = $this->db->Query($q);
            $id = $this->db->LastID($query);
            return $id;
        }
       
    }

    public function UpdateStatus($frmuid, $status, $userid, $comments) {

        $q = " UPDATE WFTrack SET [Status] = ? , [Comments] = ? WHERE [FRMUID] = CONVERT(UNIQUEIDENTIFIER, ?) AND [UserID] = ?";
        $query = $this->db->Query($q, array($status, $comments, $frmuid, $userid));
    }

    public function GetFormStats($formid = 0, $userid = 0) {
        if ($formid != 0) {
            
        }
    }

}
