<?php

namespace Bytecode\Opera\Model;

class AssetTransfer extends Model {

    /**
     *
     * @var type 
     */
    protected $fields = array(
        'CurrentLocation' => array('type' => 'string'),
        'CurrentDepartment' => array('type' => 'string'),
        'NewLocation' => array('type' => 'string'),
        'NewDepartment' => array('type' => 'string'),
        'ReasonForTransfer' => array('type' => 'string'),
        'UserID' => array('type' => 'int'),
        'FormMetaID' => array('type' => 'int')
    );
    protected $assetlineitemfields = array(
        'AssetNumber' => array('type' => 'string'),
        'Serial' => array('type' => 'string'),
        'AssetDescription' => array('type' => 'string'),
        'DateOfPurchase' => array('type' => 'string'),
        'UsefulLife' => array('type' => 'string'),
        'Quantity' => array('type' => 'int'),
        'OriginalValue' => array('type' => 'decimal'),
        'NBV' => array('type' => 'decimal'),
        'FRMAssetTransferID' => array('type' => 'int'),
        'FRMAssetTransferItemID' => array('type' => 'int', 'readonly' => true),
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );
    protected $assetlineitemreadonlyfields = array(
        'FRMAssetTransferID',
        'FRMAssetTransferItemID'
    );
    protected $costcenterfields = array(
        'FRMATCostCenterAllocationID' => array('type' => 'int', 'readonly' => true),
        'CostCenter' => array('type' => 'string'),
        'Percentage' => array('type' => 'decimal'),
        'ValueAllocated' => array('type' => 'decimal'),
        'FRMAssetTransferID' => array('type' => 'int'),
    );
    protected $costcenterupdatereadonlyfields = array(
        'FRMAssetTransferID',
        'FRMATCostCenterAllocationID'
    );

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FRMAssetTransfer";
    }

    public function GetForm($ID, $type = "ID") {
        if ($type == "UID") {
            $filter = "[UID]";
        } else {
            $filter = "[FRMAssetTransferID]";
        }

        $q = $this->db->Query("SELECT * FROM [dbo].[FRMAssetTransfer] WHERE " . $filter . " = '" . $ID . "'");
        $data = $this->db->FetchRow($q);
        return $data;
    }

    public function GetFullForm($ID, $type = "ID") {
        $wf = new WorkFlow();
        $f = new File();
        $m = new FormMeta();
        $ret = array();
        $ret['mainform'] = $this->GetForm($ID, $type);
        $ret['lineitems'] = $this->GetLineItems($ret['mainform']->FRMAssetTransferID);
        $ret['costcenteralloc'] = $this->GetCostCenterAllocation($ret['mainform']->FRMAssetTransferID);
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
        $q = $this->InsertQueryBuilder("FRMAssetTransfer", $fields2);
        //  echo $q;
        //exit();
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);
        $this->SetLineItem($fields, $id);
        $this->SetCostCenterLineItem($fields, $id);
        $data = $this->GetForm($id);
        return $data;
    }

    public function SetLineItem($fields, $FRMATID) {
        $d = $this->NormalizeFields($fields, $this->assetlineitemfields);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->assetlineitemfields);
            $data["FRMAssetTransferID"] = $FRMATID;

            $q = "";
            // Update?
            if ($data["FRMAssetTransferItemID"] != "" && (int) $data["FRMAssetTransferItemID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->assetlineitemfields, $this->assetlineitemreadonlyfields);
                $where = array(array("FRMAssetTransferItemID", $data['FRMAssetTransferItemID']));

                $q = $this->UpdateQueryBuilder("FRMAssetTransferItems", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMAssetTransferItems", $data, $this->assetlineitemfields);
            }
            //echo $q;
            //exit();
            $query = $this->db->Query($q);
        }
    }

    public function SetCostCenterLineItem($fields, $FRMATID) {
        $d = $this->NormalizeFields($fields, $this->costcenterfields);
        // var_dump($d);
        //print_r($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->costcenterfields);
            $data["FRMAssetTransferID"] = $FRMATID;

            $q = "";
            // Update?
            if ($data["FRMATCostCenterAllocationID"] != "" && (int) $data["FRMATCostCenterAllocationID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->costcenterfields, $this->costcenterupdatereadonlyfields);
                $where = array(array("FRMATCostCenterAllocationID", $data['FRMATCostCenterAllocationID']));

                $q = $this->UpdateQueryBuilder("FRMATCostCenterAllocation", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMATCostCenterAllocation", $data, $this->costcenterfields);
            }
            //echo $q;
            $query = $this->db->Query($q);
        }
    }

    public function UpdateForm($uid, $fields) {
        $frm = $this->GetForm($uid, "UID");
        //   var_dump($frm);
        $id = $frm->FRMAssetTransferID;
        //Main Fields
        $fields2 = $this->FieldMapper($fields, array(), $this->updatereadonlyfields);

        //$fields["isDraft"] = 0;
        $where = array(array("UID", $uid));
        $q = $this->UpdateQueryBuilder("FRMAssetTransfer", $fields2, $where);
        $query = $this->db->Query($q);
        $this->SetLineItem($fields, $id);
        $this->SetCostCenterLineItem($fields, $id);
        $form = $this->GetForm($uid, 'UID');
        return $form;
    }

    /**
     * 
     * @param type $ID
     * @return type
     */
    public function GetLineItems($ID) {

        $q = "SELECT * FROM FRMAssetTransferItems WHERE [FRMAssetTransferID] = " . (int) $ID . " ORDER BY FRMAssetTransferItemID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GetCostCenterAllocation($ID) {
        $q = "SELECT * FROM FRMATCostCenterAllocation WHERE [FRMAssetTransferID] = " . (int) $ID . " ORDER BY FRMATCostCenterAllocationID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GenrateCode() {
        $dr = new \DateTime('NOW');
        $ret = "AT-" . bin2hex(random_bytes(7.5));
        return $ret;
    }

}
