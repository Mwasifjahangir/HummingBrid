<?php

namespace Bytecode\Opera\Model;

class PurchaseRequisition extends Model {

    /**
     *
     * @var type 
     */
    protected $fields = array(
        'PRTotal' => array('type' => 'decimal'),
        'PRType' => array('type' => 'string'),
        'DeliveryDate' => array('type' => 'string'),
        'PurchaseReason' => array('type' => 'string'),
        'UserID' => array('type' => 'int'),
        'FormMetaID' => array('type' => 'int')
    );
    protected $prlineitemfields = array(
        'Description' => array('type' => 'string'),
        'Currency' => array('type' => 'string'),
        'ExchangeRate' => array('type' => 'decimal'),
        'Units' => array('type' => 'int'),
        'UnitCost' => array('type' => 'decimal'),
        'LineTotal' => array('type' => 'decimal'),
        'FRMPurchaseRequisitionID' => array('type' => 'int'),
        'FRMPRLineItemID' => array('type' => 'int', 'readonly' => true),
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );
    protected $prlineitemupdatereadonlyfields = array(
        'FRMPurchaseRequisitionID',
        'FRMPRLineItemID'
    );
    protected $costcenterfields = array(
        'FRMPRCostCenterAllocationID' => array('type' => 'int', 'readonly' => true),
        'CostCenter' => array('type' => 'string'),
        'Percentage' => array('type' => 'decimal'),
        'ValueAllocated' => array('type' => 'decimal'),
        'FRMPurchaseRequisitionID' => array('type' => 'int'),
    );
    protected $costcenterupdatereadonlyfields = array(
        'FRMPurchaseRequisitionID',
        'FRMPRCostCenterAllocationID'
    );

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FRMPurchaseRequisition";
    }

    /**
     * 
     * @param type $ID
     * @param type $type
     * @return type
     */
    public function GetForm($ID, $type = "ID") {
        if ($type == "UID") {
            $filter = "[UID]";
        } else {
            $filter = "[FRMPurchaseRequisitionID]";
        }

        $q = $this->db->Query("SELECT * FROM [dbo].[FRMPurchaseRequisition] WHERE " . $filter . " = '" . $ID . "'");
        $data = $this->db->FetchRow($q);
        return $data;
    }

    public function GetFullForm($ID, $type = "ID") {
        $wf = new WorkFlow();
        $f = new File();
        $m = new FormMeta();
        $ret = array();
        $ret['mainform'] = $this->GetForm($ID, $type);
        $ret['prlineitems'] = $this->GetPRLineItems($ret['mainform']->FRMPurchaseRequisitionID);
        $ret['costcenteralloc'] = $this->GetCostCenterAllocation($ret['mainform']->FRMPurchaseRequisitionID);
        $ret["files"] = $f->GetFiles($ret["mainform"]->UID);
        $ret["meta"] = $m->GetFormMeta($ret["mainform"]->FormMetaID);
        $ret["workflow"] = $wf->GetWorkFlow($ret["mainform"]->UID);
        return $ret;
    }

    public function NewForm($fields) {
        $fields2 = $this->FieldMapper($fields);
        $fields2["Code"] = $this->GenrateCode();
        $fields2["UID"] = com_create_guid();

        $fields2["isDraft"] = 0;
        $q = $this->InsertQueryBuilder("FRMPurchaseRequisition", $fields2);
        //  echo $q;
        //exit();
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);
        $this->SetPRLineItem($fields, $id);
        $this->SetCostCenterLineItem($fields, $id);
        $data = $this->GetForm($id);
        return $data;
    }

    public function SetPRLineItem($fields, $FRMPRID) {
        $d = $this->NormalizeFields($fields, $this->prlineitemfields);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->prlineitemfields);
            $data["FRMPurchaseRequisitionID"] = $FRMPRID;

            $q = "";
            // Update?
            if ($data["FRMPRLineItemID"] != "" && (int) $data["FRMPRLineItemID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->prlineitemfields, $this->prlineitemupdatereadonlyfields);
                $where = array(array("FRMPRLineItemID", $data['FRMPRLineItemID']));

                $q = $this->UpdateQueryBuilder("FRMPRLineItems", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMPRLineItems", $data, $this->prlineitemfields);
            }
            //echo $q;
            //exit();
            $query = $this->db->Query($q);
        }
    }

    public function SetCostCenterLineItem($fields, $FRMPRID) {
        $d = $this->NormalizeFields($fields, $this->costcenterfields);
        // var_dump($d);
        //print_r($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->costcenterfields);
            $data["FRMPurchaseRequisitionID"] = $FRMPRID;

            $q = "";
            // Update?
            if ($data["FRMPRCostCenterAllocationID"] != "" && (int) $data["FRMPRCostCenterAllocationID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->costcenterfields, $this->costcenterupdatereadonlyfields);
                $where = array(array("FRMPRCostCenterAllocationID", $data['FRMPRCostCenterAllocationID']));

                $q = $this->UpdateQueryBuilder("FRMPRCostCenterAllocation", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMPRCostCenterAllocation", $data, $this->costcenterfields);
            }
            //echo $q;
            $query = $this->db->Query($q);
        }
    }

    /**
     * 
     * @param type $ID
     * @return type
     */
    public function GetPRLineItems($ID) {

        $q = "SELECT * FROM FRMPRLineItems WHERE [FRMPurchaseRequisitionID] = " . (int) $ID . " ORDER BY FRMPRLineItemID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GetCostCenterAllocation($ID) {
        $q = "SELECT * FROM FRMPRCostCenterAllocation WHERE [FRMPurchaseRequisitionID] = " . (int) $ID . " ORDER BY FRMPRCostCenterAllocationID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GenrateCode() {
        $dr = new \DateTime('NOW');
        $ret = "PR-" . bin2hex(random_bytes(7.5));
        return $ret;
    }

}
