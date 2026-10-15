<?php

/**
 *
 */

namespace Bytecode\Opera\Model;

/**
 *
 */
class MM extends Model {

    /**
     *
     * @var type
     */
    protected $fields = array(
        'PI_MATTYPE' => array('type' => 'string'),
        'PI_MATDESC' => array('type' => 'string'),
        'PE_MATNR' => array('type' => 'string'),
        'MATL_GROUP' => array('type' => 'string'),
        'OLD_MAT_NO' => array('type' => 'string'),
        'BASE_UOM' => array('type' => 'string'),
        'DOCUMENT' => array('type' => 'string'),
        'DIVISION' => array('type' => 'string'),
        'BASIC_MATL' => array('type' => 'string'),
        'NET_WEIGHT' => array('type' => 'decimal'),
        'UNIT_OF_WT' => array('type' => 'string'),
        'PROD_HIER' => array('type' => 'string'),
        'BATCH_MGMT' => array('type' => 'string'),
        'EXTMATLGRP' => array('type' => 'string'),
        'MEDIUM' => array('type' => 'string'),
        'DOC_FORMAT' => array('type' => 'string'),
        'TRANS_GRP' => array('type' => 'string'),
        'PUR_VALKEY' => array('type' => 'string'),
        'STD_DESCR' => array('type' => 'string'),
        'PROD_MEMO' => array('type' => 'string'),
        'MINREMLIFE' => array('type' => 'decimal'),
        'SHELF_LIFE' => array('type' => 'decimal'),
        'PERIOD_IND_EXPIRATION_DATE' => array('type' => 'string'),
        'PLANT' => array('type' => 'string'),
        'PUR_GROUP' => array('type' => 'string'),
        'MRP_TYPE' => array('type' => 'string'),
        'MRP_CTRLER' => array('type' => 'string'),
        'PLND_DELRY' => array('type' => 'decimal'),
        'GR_PR_TIME' => array('type' => 'decimal'),
        'ASSY_SCRAP' => array('type' => 'decimal'),
        'LOTSIZEKEY' => array('type' => 'string'),
        'PROC_TYPE' => array('type' => 'string'),
        'SPPROCTYPE' => array('type' => 'string'),
        'REORDER_PT' => array('type' => 'decimal'),
        'SAFETY_STK' => array('type' => 'decimal'),
        'MINLOTSIZE' => array('type' => 'decimal'),
        'MAXLOTSIZE' => array('type' => 'decimal'),
        'FIXED_LOT' => array('type' => 'decimal'),
        'AVAILCHECK' => array('type' => 'string'),
        'PROFIT_CTR' => array('type' => 'string'),
        'COUNTRYORI' => array('type' => 'string'),
        'PLANT_BATCH_MGMT' => array('type' => 'string'),
        'AUTO_P_ORD' => array('type' => 'string'),
        'VARIANCE_KEY' => array('type' => 'string'),
        'MRP_GROUP' => array('type' => 'string'),
        'MIXED_MRP' => array('type' => 'string'),
        'ALT_BOM_ID' => array('type' => 'string'),
        'ISS_ST_LOC' => array('type' => 'string'),
        'SLOC_EXPRC' => array('type' => 'string'),
        'BACKFLUSH' => array('type' => 'string'),
        'SM_KEY' => array('type' => 'string'),
        'PPC_PL_CAL' => array('type' => 'string'),
        'REPLENTIME' => array('type' => 'decimal'),
        'NO_COSTING' => array('type' => 'string'),
        'LOADINGGRP' => array('type' => 'string'),
        'DEP_REQ_ID' => array('type' => 'string'),
        'PRODUCTION_SCHEDULER' => array('type' => 'string'),
        'PRODPROF' => array('type' => 'string'),
        'STORLOC_PLANT' => array('type' => 'string'),
        'STGE_LOC' => array('type' => 'string'),
        'PRICE_CTRL' => array('type' => 'string'),
        'PRICE_UNIT' => array('type' => 'decimal'),
        'VAL_CAT' => array('type' => 'string'),
        'MOVING_PR' => array('type' => 'decimal'),
        'VAL_CLASS' => array('type' => 'string'),
        'ORIG_GROUP' => array('type' => 'string'),
        'ORIG_MAT' => array('type' => 'string'),
        'QTY_STRUCT' => array('type' => 'string'),
        'SALES_ORG' => array('type' => 'string'),
        'DISTR_CHAN' => array('type' => 'string'),
        'MATL_STATS' => array('type' => 'string'),
        'REBATE_GRP' => array('type' => 'string'),
        'SALES_UNIT' => array('type' => 'string'),
        'ITEM_CAT' => array('type' => 'string'),
        'ACCT_ASSGT' => array('type' => 'string'),
        'MATL_GRP_1' => array('type' => 'string'),
        'MATL_GRP_2' => array('type' => 'string'),
        'MATL_GRP_3' => array('type' => 'string'),
        'MATL_GRP_4' => array('type' => 'string'),
        'MATL_GRP_5' => array('type' => 'string'),
        /* 'HSCODE' => array('type' => 'string'), */
        'GROSSWEIGHT' => array('type' => 'decimal'),
        'PRODUCTH1' => array('type' => 'string'),
        'PRODUCTH2' => array('type' => 'string'),
        'PRODUCTH3' => array('type' => 'string'),
        'PRODUCTH4' => array('type' => 'string'),
        
        // Tax
        'DEPCOUNTRY' => array('type' => 'string'),
        'TAX_TYPE_1' => array('type' => 'string'),
        'TAXCLASS_1' => array('type' => 'string'),
        
        /* 'ALT_UNIT' => array('type' => 'string'),
          'ALT_UNIT_OF_WT' => array('type' => 'string', 'customkey' => 'UNIT_OF_WT'),
          'DENOMINATR' => array('type' => 'int'),
          'NUMERATOR' => array('type' => 'int'),
          'ALT_GROSS_WT' => array('type' => 'int', 'customkey' => 'GROSS_WT'), */
        'UserID' => array('type' => 'int'),
        'FormMetaID' => array('type' => 'int')
    );
    protected $altuomfields = array(
        'ALTUOM' => array('type' => 'string'),
        'ALTGROSSWTUOM' => array('type' => 'string'),
        'ALTDENOMINATR' => array('type' => 'decimal'),
        'ALTNUMERATOR' => array('type' => 'decimal'),
        'ALTGROSSWT' => array('type' => 'decimal'),
        'FRMMMALTUOMID' => array('type' => 'int', 'readonly' => true),
        'FRMMMID' => array('type' => 'int'),
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );
    protected $altuomupdatereadonlyfields = array(
        'FRMMMALTUOMID',
        'FRMMMID'
    );
    protected $langfields = array(
        'Description' => array('type' => 'string', 'unicode' => true),
        'Language' => array('type' => 'string'),
        'FRMMMLangID' => array('type' => 'int', 'readonly' => true),
        'FRMMMID' => array('type' => 'int')
    );
    protected $langreadonlyfields = array(
        'FRMMMLangID',
        'FRMMMID'
    );
    //protected $keys= array('FRMMMID' , 'FRMMMALTUOMID');
    protected $DBID = "FRMMMID";
    protected $table;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FRMMM";
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

        $data->ALTUOM = $this->GetAltUOM($data->FRMMMID);
        $data->Lang = $this->GetLang($data->FRMMMID);
        return $data;
    }

    /**
     * 
     * @param type $ID
     * @return type
     */
    public function GetAltUOM($ID) {

        $q = "SELECT * FROM FRMMMALTUOM WHERE [FRMMMID] = " . (int) $ID . " ORDER BY FRMMMALTUOMID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GetLang($ID) {

        $q = "SELECT * FROM [FRMMMLang] WHERE [FRMMMID] = " . (int) $ID . " ORDER BY FRMMMLangID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GetMMData() {
        $sap = new SAP();

        $data = $sap->GetMMData();

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

    public function UpdateMATNR($MATNR, $FRMUID) {
        $q = "UPDATE FRMMM SET PE_MATNR = '" . $MATNR . "' WHERE UID = CONVERT(UNIQUEIDENTIFIER, '" . $FRMUID . "')";
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
        $q = $this->InsertQueryBuilder("FRMMM", $fields2);
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);
        $this->SetAltUOM($fields, $id);
        $this->SetLang($fields, $id);
        $data = $this->GetForm($id);
        return $data;
    }

    public function SetAltUOM($fields, $FRMMMID) {
        $d = $this->NormalizeFields($fields, $this->altuomfields);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->altuomfields);
            $data["FRMMMID"] = $FRMMMID;

            $q = "";
            // Update?
            if ($data["FRMMMALTUOMID"] != "" && (int) $data["FRMMMALTUOMID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->altuomfields, $this->altuomupdatereadonlyfields);
                $where = array(array("FRMMMALTUOMID", $data['FRMMMALTUOMID']));
                //var_dump($this->altuomupdatereadonlyfields);
                $q = $this->UpdateQueryBuilder("FRMMMALTUOM", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMMMALTUOM", $data, $this->altuomfields);
            }
            //echo $q;
            $query = $this->db->Query($q);
        }
        //$fields = $this->FieldMapper($fields , $this->altuomfields);
    }

    public function SetLang($fields, $FRMMMID) {
        $d = $this->NormalizeFields($fields, $this->langfields);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->langfields);
            $data["FRMMMID"] = $FRMMMID;

            $q = "";
            // Update?
            if ($data["FRMMMLangID"] != "" && (int) $data["FRMMMLangID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->langfields, $this->langreadonlyfields);
                $where = array(array("FRMMMLangID", $data['FRMMMLangID']));
                $q = $this->UpdateQueryBuilder("FRMMMLang", $data2, $where , $this->langfields);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMMMLang", $data, $this->langfields);
            }
            //echo $q;
            $query = $this->db->Query($q);
        }
    }

    public function UpdateForm($uid, $fields) {
        $fields2 = $this->FieldMapper($fields, array(), $this->updatereadonlyfields);

        //$fields["isDraft"] = 0;
        $where = array(array("UID", $uid));
        $q = $this->UpdateQueryBuilder("FRMMM", $fields2, $where);
        //  echo $q;
        $query = $this->db->Query($q);



        $form = $this->GetForm($uid, 'UID');
        $this->SetAltUOM($fields, $form->FRMMMID);
        $this->SetLang($fields, $form->FRMMMID);
        //$id = $this->db->LastID($query);

        /* $data = $this->GetForm($id);
          return $data; */
    }

    public function SearchMaterial($mattype, $netweight, $matgrp, $countryori, $matgrp1, $matgrp4, $prodhier) {


        $filter = array();
        $filter[] = "SELECT TOP 10 * FROM FRMMM WHERE PI_MATTYPE = '" . $mattype . "'";
        if ($netweight)
            $filter[] = " NET_WEIGHT = " . $netweight;
        if ($matgrp)
            $filter[] = " FRMMM.MATL_GROUP = '" . $matgrp . "'";
        if ($countryori)
            $filter[] = " FRMMM.COUNTRYORI = '" . $countryori . "'";
        if ($matgrp1)
            $filter[] = " FRMMM.MATL_GRP_1 = '" . $matgrp1 . "'";
        if ($matgrp4)
            $filter[] = "FRMMM.MATL_GRP_4 = " . $matgrp4 . "'";
        if ($prodhier)
            $filter[] = "FRMMM.PROD_HIER = '" . $prodhier . "'";
        $q = implode(" AND ", $filter);
        //echo $q;
        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
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
        $ret = "MM-" . bin2hex(random_bytes(7.5));
        return $ret;
    }

}
