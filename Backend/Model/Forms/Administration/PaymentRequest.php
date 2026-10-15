<?php

/**
 * 
 */

namespace Bytecode\Opera\Model;

/**
 * 
 */
class PaymentRequest extends Model {

    /**
     *
     * @var type 
     */
    protected $fields = array(
        'FormMetaID' => array('type' => 'int'),
        'PaymentMode' => array('type' => 'decimal'),
        'TotalLocal' => array('type' => 'decimal'),
        'TotalUSD' => array('type' => 'decimal'),
        'UserID' => array('type' => 'int'),
        'Comments' => array('type' => 'string'),
    );
    protected $pyrlineitemfields = array(
        'MainDate' => array('type' => 'string'),
        'Vendor' => array('type' => 'string'),
        'Item' => array('type' => 'string'),
        'QTY' => array('type' => 'int'),
        'UnitCost' => array('type' => 'decimal'),
        'ExchangeRate' => array('type' => 'decimal'),
        'Currency' => array('type' => 'string'),
        'LineTotal' => array('type' => 'decimal'),
        'PRMPaymentRequestID' => array('type' => 'int'),
        'FRMPYRLineItemID' => array('type' => 'int', 'readonly' => true),
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );
    protected $pyrlineitemupdatereadonlyfields = array(
        'FRMPaymentRequestID',
        'FRMPYRLineItemID'
    );

    /* protected $xfields = array(
      "decimal" => array('UnitCost', 'Amount', 'LocalTotal', 'USDTotal'),
      "numeric" => array('Quantity'),
      "string" => array()
      ); */

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FRMPaymentRequest";
    }

    /**
     * 
     * @param type $FRMPaymentRequestID
     * @return type
     */
    public function GetForm($ID, $type = "ID") {
        if ($type == "UID") {
            $filter = "[UID]";
        } else {
            $filter = "[FRMPaymentRequestID]";
        }

        $q = $this->db->Query("SELECT * FROM [dbo].[FRMPaymentRequest] WHERE " . $filter . " = '" . $ID . "'");
        $data = $this->db->FetchRow($q);
        return $data;
    }

    /**
     * 
     * @param type $FRMPaymentRequestItemID
     * @return type
     */
    public function GetFormItems($ID) {

        $q = "SELECT * FROM FRMPaymentRequestItems WHERE [FRMPaymentRequestID] = " . (int) $ID . " ORDER BY FRMPaymentRequestItemID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    /**
     * 
     * @param type $FRMPaymentRequestItemID
     * @return type
     */
    public function GetFullForm($ID, $type = "ID") {
        $wf = new WorkFlow();
        $f = new File();
        $m = new FormMeta();
        $ret = array();
        $ret['mainform'] = $this->GetForm($ID, $type);
        $ret['pyrlineitems'] = $this->GetPYRLineItems($ret['mainform']->FRMPaymentRequestID);
        $ret["files"] = $f->GetFiles($ret["mainform"]->UID);
        $ret["meta"] = $m->GetFormMeta($ret["mainform"]->FormMetaID);
        $ret["workflow"] = $wf->GetWorkFlow($ret["mainform"]->UID);
        return $ret;
    }

    public function GetPYRLineItems($ID) {

        $q = "SELECT * FROM FRMPYRLineItems WHERE [FRMPaymentRequestID] = " . (int) $ID . " ORDER BY FRMPYRLineItemID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    /**
     * 
     * @param type $userid
     * @return type
     */
    public function NewForm($fields) {
        $wf = new WorkFlow();
        $fields2 = $this->FieldMapper($fields);
        $codedata = array(
            "Region" => $wf->GetRegion($fields["RegionID"]),
            "Country" => $wf->GetCountry($fields["CountryID"])
        );
        $fields2["Code"] = $this->GenrateCode();
        $fields2["UID"] = com_create_guid();

        $fields2["isDraft"] = 0;
        $q = $this->InsertQueryBuilder("FRMPaymentRequest", $fields2);
        //  echo $q;
        //exit();
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);
        $this->SetPYRLineItem($fields, $id);

        $data = $this->GetForm($id);
        return $data;
    }

    public function SetPYLineItem($fields, $FRMPYRID) {
        $d = $this->NormalizeFields($fields, $this->pyrlineitemfields);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->pyrlineitemfields);
            $data["FRMPaymentRequestID"] = $FRMPYRID;

            $q = "";
            // Update?
            if ($data["FRMPaymentRequestID"] != "" && (int) $data["FRMPYRLineItemID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->pyrlineitemfields, $this->pyrlineitemupdatereadonlyfields);
                $where = array(array("FRMPYRLineItemID", $data['FRMPYRLineItemID']));

                $q = $this->UpdateQueryBuilder("FRMPYRLineItems", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMPYRLineItems", $data, $this->pyrlineitemfields);
            }
            //echo $q;
            //exit();
            $query = $this->db->Query($q);
        }
    }

    /**
     * 
     * @param type $id
     * @return string
     */
    public function GenrateCode($data) {
        $dr = new \DateTime('NOW');
        //  var_dump($data);
        //  $ret = "ER-" . bin2hex(random_bytes(7.5));
        $code = $data["Region"]->Title . "-" . $data["Country"]->Title . "-" . "PY" . "-" . $dr->format("YmdHis");
        // print_r($code);
        return $code;
    }

}
