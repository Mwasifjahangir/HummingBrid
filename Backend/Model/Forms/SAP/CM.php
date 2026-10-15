<?php

/**
 *
 */

namespace Bytecode\Opera\Model;

/**
 *
 */
class CM extends Model {

    /**
     *
     * @var type
     */
    protected $fields = array(
        'RELATEDPARTY' => array('type' => 'string'),
        'LEGALSTATUS' => array('type' => 'string'),
        'KTOKD' => array('type' => 'string'),
        'NIELS' => array('type' => 'string'),
        'LIFNR' => array('type' => 'string'),
        'VBUND' => array('type' => 'string'),
        'TITLE' => array('type' => 'string'),
        'NAME' => array('type' => 'string'),
        'NAME_2' => array('type' => 'string'),
        'SORT1' => array('type' => 'string'),
        'STREET' => array('type' => 'string'),
        'DISTRICT' => array('type' => 'string'),
        'POSTL_COD1' => array('type' => 'string'),
        'CITY' => array('type' => 'string'),
        'COUNTRY' => array('type' => 'string'),
        'REGION' => array('type' => 'string'),
        'PO_BOX' => array('type' => 'string'),
        'BUKRS' => array('type' => 'string'),
        'AKONT' => array('type' => 'string'),
        'FDGRV' => array('type' => 'string'),
        'ALTKN' => array('type' => 'string'),
        'PERNR' => array('type' => 'string'),
        'ZUAWA' => array('type' => 'string'),
        'ZTERM' => array('type' => 'string'),
        'ZWELS' => array('type' => 'string'),
        'VKORG' => array('type' => 'string'),
        'VTWEG' => array('type' => 'string'),
        'SPART' => array('type' => 'string'),
        'VKBUR' => array('type' => 'string'),
        'VKGRP' => array('type' => 'string'),
        'KDGRP' => array('type' => 'string'),
        'WAERS' => array('type' => 'string'),
        'KALKS' => array('type' => 'string'),
        'PLTYP' => array('type' => 'string'),
        'VERSG' => array('type' => 'string'),
        'AWAHR' => array('type' => 'int'),
        'KVGR1' => array('type' => 'string'),
        'KVGR2' => array('type' => 'string'),
        'VSBED' => array('type' => 'string'),
        'VWERK' => array('type' => 'string'),
        'KZAZU' => array('type' => 'string'),
        'BOKRE' => array('type' => 'string'),
        'PRFRE' => array('type' => 'string'),
        'INCO1' => array('type' => 'string'),
        'INCO2' => array('type' => 'string'),
        'SALES_ZTERM' => array('type' => 'string'),
        'KTGRD' => array('type' => 'string'),
        'TELEPHONE' => array('type' => 'string'),
        'R_3_USER' => array('type' => 'string'),
        'FAX' => array('type' => 'string'),
        'E_MAIL' => array('type' => 'string'),
        'STCD5' => array('type' => 'string'),
        'STCEG' => array('type' => 'string'),
        'Comments' => array('type' => 'string'),
        'UserID' => array('type' => 'int'),
        'FormMetaID' => array('type' => 'int')
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );
    protected $altuomupdatereadonlyfields = array(
        'FRMCMID'
    );
    //protected $keys= array('FRMMMID' , 'FRMMMALTUOMID');
    protected $DBID = "FRMCMID";
    protected $table;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FRMCM";
    }

    /**
     *
     * @param type $FRMPaymentRequestID
     * @return type
     */
    public function GetForm($ID, $type = "ID") {
        if ($type == "UID") {
            $filter = "[UID]";
            $ID = "CONVERT(UNIQUEIDENTIFIER, '" . $ID . "')";
        } else {
            $filter = $this->DBID;
            $ID = "'" . $ID . "'";
        }

        $q = $this->db->Query("SELECT * FROM " . $this->table . " WHERE " . $filter . " = " . $ID . "");
        $data = $this->db->FetchRow($q);

        return $data;
    }

    public function GetCMData() {
        $sap = new \Bytecode\Opera\Model\SAP();
        $cm = $sap->GetSAPCMData();
        $data = [
            "PE_COCODE" => $cm["PE_COCODE"],
            "PE_RECACCT" => $cm["PE_RECACCT"],
            "PE_PMTTERM" => $cm["PE_PMTTERM"],
            "PE_SORTKEY" => $cm["PE_SORTKEY"],
            "PE_PLGRP" => $cm["PE_PLGRP"],
            "PE_SALESORG" => $cm["PE_SALESORG"],
            "PE_SALESOFF" => $cm["PE_SALESOFF"],
            "PE_DISTCH" => $cm["PE_DISTCH"],
            "PE_DIV" => $cm["PE_DIV"],
            "PE_SALESGRP" => $cm["PE_SALESGRP"],
            "PE_CUSTGRP" => $cm["PE_CUSTGRP"],
            "PE_CURR" => $cm["PE_CURR"],
            "PE_PRICELIST" => $cm["PE_PRICELIST"],
            "PE_CUSGRP1" => $cm["PE_CUSGRP1"],
            "PE_CUSGRP2" => $cm["PE_CUSGRP2"],
            "PE_SHIPCOND" => $cm["PE_SHIPCOND"],
            "PE_DELPLANT" => $cm["PE_DELPLANT"],
            "PE_INCOTERM1" => $cm["PE_INCOTERM1"],
            "PE_ACCASGRP" => $cm["PE_ACCASGRP"],
            "PE_CUSTACCGRP" => $cm["PE_CUSTACCGRP"],
            "PE_TRDPRT" => $cm["PE_TRDPRT"],
            "PE_COUNTRY" => $cm["PE_COUNTRY"],
            "PE_CPDEPT" => $cm["PE_CPDEPT"],
            "PE_CPFUNC" => $cm["PE_CPFUNC"],
            "PE_SA_SOF" => $cm["PE_SA_SOF"],
            "PE_SG_SOF" => $cm["PE_SG_SOF"],
            "PE_SO_DV" => $cm["PE_SO_DV"],
            "PE_SO_DC" => $cm["PE_SO_DC"],
        ];
        // convert objects to array
        $data = json_decode(json_encode($data), true);
        return TrimArray($data);
    }

    /**
     *
     * @param type $FRMPaymentRequestItemID
     * @return type
     */
    public function GetFullForm($ID, $type = "ID") {
        // Get Main Form
        $wf = new WorkFlow();
        $f = new File();
        $m = new FormMeta();
        $ret = array();
        $ret["form"] = $this->GetForm($ID, $type);
        $ret["files"] = $f->GetFiles($ret["form"]->UID);
        $ret["meta"] = $m->GetFormMeta($ret["form"]->FormMetaID);
        $ret["workflow"] = $wf->GetWorkFlow($ret["form"]->UID);
        // for is in draf? load default workflow as the WF is not saved
        /* if ($ret["form"]->isDraft > 0) {
          // TODO:Dynamic ID
          $ret["workflow"] = $wf->GetWorkFlowDefaultUsers(1);
          } else {
          $ret["workflow"] = $wf->GetFormWorkFlow($ret["form"]->UID);
          } */


        return $ret;

        //get items
        //$items =
    }

    public function UpdateCustomerCode($CUNR, $FRMUID) {
        $q = "UPDATE FRMCM SET PE_KUNNR = '" . $CUNR . "' WHERE UID = CONVERT(UNIQUEIDENTIFIER, '" . $FRMUID . "')";
        $this->db->Query($q);
    }

    /**
     *
     * @param type $userid
     * @return type
     */
    public function NewForm($fields) {

        $fields2 = $this->FieldMapper($fields);
        $fields2["Code"] = $this->GenrateCode();
        $fields2["UID"] = com_create_guid();

        $fields2["isDraft"] = 0;
        $q = $this->InsertQueryBuilder($this->table, $fields2);
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);

        $data = $this->GetForm($id);
        return $data;
    }

    public function UpdateForm($uid, $fields) {
        $fields2 = $this->FieldMapper($fields, array(), $this->updatereadonlyfields);

        //$fields["isDraft"] = 0;
        $where = array(array("UID", $uid));
        $q = $this->UpdateQueryBuilder($this->table, $fields2, $where);
        $query = $this->db->Query($q);
        // Delete Bank data if its disabled
        /* if ($fields['BANK_ENABLE'] == "0") {
          $this->DeleteBankData($uid);
          } */
        $form = $this->GetForm($uid, 'UID');
        return $form;
    }

    /*  public function DeleteBankData($uid) {
      $q = "UPDATE [dbo].[FRMVM]
      SET [BANK_COUNTRY] = NULL
      ,[BANKS] = NULL
      ,[BANKN] = NULL
      ,[KOINH] = NULL
      ,[BANKL] = NULL
      ,[IBAN] = NULL
      ,[IBAN_FROM_DATE] = NULL

      WHERE [UID] = '" . $uid . "'";
      $query = $this->db->Query($q);
      }
     */

    /**
     *
     * @param type $id
     * @param type $item
     * @param type $value
     * @return type
     */
    public function FormatStringToNull($val) {
        if ($val == null || trim($val) == "") {
            return "NULL";
        } else {
            return "'" . $val . "'";
        }
    }

    /* public function UpdateForm($id, $item, $value)
      {
      $value = $this->FormatField($item, $value);
      $q = "UPDATE [dbo].[FRMPaymentRequest] SET [" . $item . "] = '" . $value . "' WHERE FRMPaymentRequestID=" . (int)$id;
      $query = $this->db->Query($q);
      return array("status" => "success");
      } */

    /**
      /**
     *
     * @param type $id
     * @return string
     */
    public function GenrateCode() {
        $dr = new \DateTime('NOW');
        $ret = "CM-" . bin2hex(random_bytes(7.5));
        return $ret;
    }

}
