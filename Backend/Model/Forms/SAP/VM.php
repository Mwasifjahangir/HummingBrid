<?php

/**
 *
 */

namespace Bytecode\Opera\Model;

/**
 *
 */
class VM extends Model {

    /**
     *
     * @var type
     */
    protected $fields = array(
        'KTOKK' => array('type' => 'string'),
        'KUNNR' => array('type' => 'string'),
        'RELATEDPARTY' => array('type' => 'string'),
        'VBUND' => array('type' => 'string'),
        'TITLE' => array('type' => 'string'),
        'NAME' => array('type' => 'string'),
        'NAME_2' => array('type' => 'string'),
        'NAME' => array('type' => 'string'),
        'NAME_2' => array('type' => 'string'),
        'NAME_3' => array('type' => 'string', 'unicode' => true),
        'NAME_4' => array('type' => 'string', 'unicode' => true),
        'SORT1' => array('type' => 'string'),
        'STREET' => array('type' => 'string'),
        'DISTRICT' => array('type' => 'string'),
        'POSTL_COD1' => array('type' => 'string'),
        'CITY' => array('type' => 'string'),
        'STCD5' => array('type' => 'string'),
        'STCEG' => array('type' => 'string'),
        'COUNTRY' => array('type' => 'string'),
        'REGION' => array('type' => 'string'),
        'REGIOGROUP' => array('type' => 'string'),
        'PO_BOX' => array('type' => 'string'),
        'FAX' => array('type' => 'string'),
        'E_MAIL' => array('type' => 'string'),
        'TELEPHONE' => array('type' => 'string'),
        'BUKRS' => array('type' => 'string'),
        'AKONT' => array('type' => 'string'),
        'FDGRV' => array('type' => 'string'),
        'ALTKN' => array('type' => 'string'),
        'PERNR' => array('type' => 'string'),
        'ZUAWA' => array('type' => 'string'),
        'ZLSCH' => array('type' => 'string'),
        'ZTERM' => array('type' => 'string'),
        'REPRF' => array('type' => 'string'),
        'ZWELS' => array('type' => 'string'),
        'INCO1' => array('type' => 'string'),
        'INCO2' => array('type' => 'string'),
        'KALSK' => array('type' => 'string'),
        'WEBRE' => array('type' => 'string'),
        'LAND1' => array('type' => 'string'),
        'TELF1' => array('type' => 'string'),
        'EKGRP' => array('type' => 'string'),
        'WAERS' => array('type' => 'string'),
        'EKORG' => array('type' => 'string'),
        'VERKF' => array('type' => 'string'),
        'REGION' => array('type' => 'string'),
        /**
         * Bank Details
         * */
        'BANK_ENABLE' => array('type' => 'int'),
        'BANKS' => array('type' => 'string'),
        'BANKL' => array('type' => 'string'),
        'BANKN' => array('type' => 'string'),
        'KOINH' => array('type' => 'string'),
        'IBAN' => array('type' => 'string'),
        'IBAN_FROM_DATE' => array('type' => 'string'),
        'BOLRE' => array('type' => 'string'),
        'BOIND' => array('type' => 'string'),
        'UMSAE' => array('type' => 'string'),
        'UserID' => array('type' => 'int'),
        'FormMetaID' => array('type' => 'int')
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );
    protected $altuomupdatereadonlyfields = array(
        'FRMVMID'
    );
    //protected $keys= array('FRMMMID' , 'FRMMMALTUOMID');
    protected $DBID = "FRMVMID";
    protected $table;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FRMVM";
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

    public function GetVMData() {
        $sap = new \Bytecode\Opera\Model\SAP();
        $vm = $sap->GetSAPVMData();

        $data = [
            "PE_VENGRP" => $vm["PE_VENGRP"],
            "PE_VENSUBGRP" => $vm["PE_VENSUBGRP"],
            "PE_TRDPRT" => $vm["PE_TRDPRT"],
            "PE_COUNTRY" => $vm["PE_COUNTRY"],
            "PE_COCODE" => $vm["PE_COCODE"],
            "PE_RECACCT" => $vm["PE_RECACCT"],
            "PE_PMTMETHOD" => $vm["PE_PMTMETHOD"],
            "PE_PMTTERM" => $vm["PE_PMTTERM"],
            "PE_PLGRP" => $vm["PE_PLGRP"],
            "PE_PURORG" => $vm["PE_PURORG"],
            "PE_PURGRP" => $vm["PE_PURGRP"],
            "PE_CURR" => $vm["PE_CURR"],
            "PE_SCHGRP" => $vm["PE_SCHGRP"],
            "PE_INCOTERM" => $vm["PE_INCOTERM"],
            "PE_BANK" => $vm["PE_BANK"]
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

    public function UpdateVendorCode($VENNR, $FRMUID) {
        $q = "UPDATE FRMVM SET PE_LIFNR = '" . $VENNR . "' WHERE UID = CONVERT(UNIQUEIDENTIFIER, '" . $FRMUID . "')";
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
        $q = $this->InsertQueryBuilder("FRMVM", $fields2, $this->fields);

        //exit;
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);

        $data = $this->GetForm($id);
        return $data;
    }

    public function UpdateForm($uid, $fields) {
        $fields2 = $this->FieldMapper($fields, array(), $this->updatereadonlyfields);

        //$fields["isDraft"] = 0;
        $where = array(array("UID", $uid));
        $q = $this->UpdateQueryBuilder("FRMVM", $fields2, $where);
        $query = $this->db->Query($q);
        // Delete Bank data if its disabled
        if ($fields['BANK_ENABLE'] == "0") {
            $this->DeleteBankData($uid);
        }
        $form = $this->GetForm($uid, 'UID');
        return $form;
    }

    public function DeleteBankData($uid) {
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
        $ret = "VM-" . bin2hex(random_bytes(7.5));
        return $ret;
    }

}
