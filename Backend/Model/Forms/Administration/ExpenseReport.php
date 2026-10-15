<?php

namespace Bytecode\Opera\Model;

class ExpenseReport extends Model {

    /**
     *
     * @var type 
     */
    protected $fields = array(
        'FormMetaID' => array('type' => 'int'),
        'EntertainmentTotal' => array('type' => 'decimal'),
        'GiftsTotal' => array('type' => 'decimal'),
        'CompanyAutoTotal' => array('type' => 'decimal'),
        'TravelExpenseTotal' => array('type' => 'decimal'),
        'GrossTotal' => array('type' => 'decimal'),
        'CheckAdvancesTotal' => array('type' => 'decimal'),
        'NetTotal' => array('type' => 'decimal'),
        'UserID' => array('type' => 'int'),
        'FormMetaID' => array('type' => 'int')
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );
    protected $erautoexpfields = array(
        'AutoDate' => array('type' => 'string'),
        'AutoCurrency' => array('type' => 'string'),
        'AutoExchangeRate' => array('type' => 'decimal'),
        'AutoFuelGAL' => array('type' => 'decimal'),
        'AutoFuelCost' => array('type' => 'decimal'),
        'AutoOilQTS' => array('type' => 'decimal'),
        'AutoOilCost' => array('type' => 'decimal'),
        'AutoWash' => array('type' => 'decimal'),
        'AutoTires' => array('type' => 'decimal'),
        'AutoRepairs' => array('type' => 'decimal'),
        'AutoPark' => array('type' => 'decimal'),
        'AutoTolls' => array('type' => 'decimal'),
        'AutoMisc' => array('type' => 'decimal'),
        'AutoTotal' => array('type' => 'decimal'),
        'FRMExpenseReportID' => array('type' => 'int'),
        'FRMERAutoExpenseID' => array('type' => 'int', 'readonly' => true),
    );
    protected $erautoreadonlyfields = array(
        'FRMExpenseReportID',
        'FRMERAutoExpenseID'
    );
    //Checks
    protected $erchecks = array(
        'FRMExpenseReportCheckID' => array('type' => 'int', 'readonly' => true),
        'CheckDate' => array('type' => 'string'),
        'CheckDescription' => array('type' => 'string'),
        'CheckCurrency' => array('type' => 'string'),
        'CheckExchangeRate' => array('type' => 'decimal'),
        'CheckAmount' => array('type' => 'decimal'),
        'CheckTotal' => array('type' => 'decimal'),
        'FRMExpenseReportID' => array('type' => 'int'),
    );
    protected $erchecksupdatesreadonlufields = array(
        'FRMExpenseReportID',
        'FRMExpenseReportCheckID'
    );
    // Main Expense
    protected $ermainexp = array(
        'FRMERMainExpenseID' => array('type' => 'int', 'readonly' => true),
        'MainDate' => array('type' => 'string'),
        'MainLocation' => array('type' => 'string'),
        'MainDescription' => array('type' => 'string'),
        'MainExchangeRate' => array('type' => 'string'),
        'MainCurrency' => array('type' => 'string'),
        'MainTransportation' => array('type' => 'decimal'),
        'MainLodging' => array('type' => 'decimal'),
        'MainPersonalMeals' => array('type' => 'decimal'),
        'MainIncidental' => array('type' => 'decimal'),
        'MainTotal' => array('type' => 'decimal'),
        'FRMExpenseReportID' => array('type' => 'int'),
    );
    protected $ermainexpupdatesreadonlufields = array(
        'FRMExpenseReportID',
        'FRMERMainExpenseID'
    );
    // Other Exp


    protected $erotherexp = array(
        'FRMEROtherExpenseID' => array('type' => 'int', 'readonly' => true),
        'OtherDate' => array('type' => 'string'),
        'OtherExchangeRate' => array('type' => 'decimal'),
        'OtherCurrency' => array('type' => 'string'),
        'OtherEntertain' => array('type' => 'decimal'),
        'OtherGifts' => array('type' => 'decimal'),
        'OtherDescription' => array('type' => 'decimal'),
        'OtherIncidental' => array('type' => 'decimal'),
        'OtherTotal' => array('type' => 'decimal'),
        'FRMExpenseReportID' => array('type' => 'int'),
    );
    protected $erotherexpupdatesreadonlufields = array(
        'FRMExpenseReportID',
        'FRMEROtherExpenseID'
    );

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FRMExpenseReport";
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
            $filter = "[FRMExpenseReportID]";
        }

        $q = $this->db->Query("SELECT * FROM [dbo].[FRMExpenseReport] WHERE " . $filter . " = '" . $ID . "'");
        $data = $this->db->FetchRow($q);
        return $data;
    }

    public function GetFullForm($ID, $type = "ID") {
        $wf = new WorkFlow();
        $f = new File();
        $m = new FormMeta();
        $u = new User();
        $ret = array();
        $ret['mainform'] = $this->GetForm($ID, $type);
        $ret['autoexp'] = $this->GetAutoExp($ret['mainform']->FRMExpenseReportID);
        $ret['checks'] = $this->GetChecks($ret['mainform']->FRMExpenseReportID);
        $ret['mainexp'] = $this->GetMainExp($ret['mainform']->FRMExpenseReportID);
        $ret['otherexp'] = $this->GetOtherExp($ret['mainform']->FRMExpenseReportID);
        $ret["files"] = $f->GetFiles($ret["mainform"]->UID);
        $ret["meta"] = $m->GetFormMeta($ret["mainform"]->FormMetaID);
        $ret["workflow"] = $wf->GetWorkFlow($ret["mainform"]->UID);
        
        return $ret;
    }

    public function NewForm($fields) {
        //   print_r($fields);

        $wf = new WorkFlow();
        $fields2 = $this->FieldMapper($fields);
        $codedata = array(
            "Region" => $wf->GetRegion($fields["RegionID"]),
            "Country" => $wf->GetCountry($fields["CountryID"])
        );
        //print_r($codedata);
        $fields2["Code"] = $this->GenrateCode($codedata);
        $fields2["UID"] = com_create_guid();

        $fields2["isDraft"] = 0;
        $q = $this->InsertQueryBuilder("FRMExpenseReport", $fields2);
        //  echo $q;
        //exit();
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);
        $this->SetAutoExp($fields, $id);
        $this->SetChecks($fields, $id);
        $this->SetMainExp($fields, $id);
        $this->SetOtherExp($fields, $id);
        $data = $this->GetForm($id);
        return $data;
    }

    public function SetAutoExp($fields, $FRMERID) {
        // remove auto 
        //  $fields = $this->ArrayKeyRemoveText("Auto", $fields);
        //print_r($fields);
        $d = $this->NormalizeFields($fields, $this->erautoexpfields);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->erautoexpfields);
            $data["FRMExpenseReportID"] = $FRMERID;

            $q = "";
            // Update?
            if ($data["FRMERAutoExpenseID"] != "" && (int) $data["FRMERAutoExpenseID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->erautoexpfields, $this->erautoreadonlyfields);
                $where = array(array("FRMERAutoExpenseID", $data['FRMERAutoExpenseID']));

                $q = $this->UpdateQueryBuilder("FRMERAutoExpense", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMERAutoExpense", $data, $this->erautoexpfields);
            }
            //echo $q;
            //exit();
            $query = $this->db->Query($q);
        }
    }

    public function SetChecks($fields, $FRMERID) {
        $d = $this->NormalizeFields($fields, $this->erchecks);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->erchecks);
            $data["FRMExpenseReportID"] = $FRMERID;

            $q = "";
            // Update?
            if ($data["FRMExpenseReportCheckID"] != "" && (int) $data["FRMExpenseReportCheckID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->erchecks, $this->erchecksupdatesreadonlufields);
                $where = array(array("FRMExpenseReportCheckID", $data['FRMExpenseReportCheckID']));

                $q = $this->UpdateQueryBuilder("FRMERChecks", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMERChecks", $data, $this->erchecks);
            }
            //echo $q;
            //exit();
            $query = $this->db->Query($q);
        }
    }

    public function SetMainExp($fields, $FRMERID) {
        $d = $this->NormalizeFields($fields, $this->ermainexp);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->ermainexp);
            $data["FRMExpenseReportID"] = $FRMERID;

            $q = "";
            // Update?
            if ($data["FRMERMainExpenseID"] != "" && (int) $data["FRMERMainExpenseID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->ermainexp, $this->ermainexpupdatesreadonlufields);
                $where = array(array("FRMERMainExpenseID", $data['FRMERMainExpenseID']));

                $q = $this->UpdateQueryBuilder("FRMERMainExpense", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMERMainExpense", $data, $this->ermainexp);
            }
            //echo $q;
            //exit();
            $query = $this->db->Query($q);
        }
    }

    public function SetOtherExp($fields, $FRMERID) {
        $d = $this->NormalizeFields($fields, $this->erotherexp);
        // var_dump($d);
        for ($i = 0; $i < count($d); $i++) {
            $data = $this->FieldMapper($d[$i], $this->erotherexp);
            $data["FRMExpenseReportID"] = $FRMERID;

            $q = "";
            // Update?
            if ($data["FRMEROtherExpenseID"] != "" && (int) $data["FRMEROtherExpenseID"] > 0) {
                // remap data removing readonly
                $data2 = $this->FieldMapper($d[$i], $this->erotherexp, $this->erotherexpupdatesreadonlufields);
                $where = array(array("FRMEROtherExpenseID", $data['FRMEROtherExpenseID']));

                $q = $this->UpdateQueryBuilder("FRMEROtherExpense", $data2, $where);
            }
            //OR NEW
            else {
                $q = $this->InsertQueryBuilder("FRMEROtherExpense", $data, $this->erotherexp);
            }
            //echo $q;
            //exit();
            $query = $this->db->Query($q);
        }
    }

    /**
     * 
     * @param type $ID
     * @return type
     */
    public function GetAutoExp($ID) {

        $q = "SELECT * FROM FRMERAutoExpense WHERE [FRMExpenseReportID] = " . (int) $ID . " ORDER BY FRMERAutoExpenseID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GetChecks($ID) {
        $q = "SELECT * FROM FRMERChecks WHERE [FRMExpenseReportID] = " . (int) $ID . " ORDER BY FRMExpenseReportCheckID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GetMainExp($ID) {
        $q = "SELECT * FROM FRMERMainExpense WHERE [FRMExpenseReportID] = " . (int) $ID . " ORDER BY FRMERMainExpenseID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GetOtherExp($ID) {
        $q = "SELECT * FROM FRMEROtherExpense WHERE [FRMExpenseReportID] = " . (int) $ID . " ORDER BY FRMEROtherExpenseID";

        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function GenrateCode($data) {
        $dr = new \DateTime('NOW');
        //  var_dump($data);
        //  $ret = "ER-" . bin2hex(random_bytes(7.5));
        $code = $data["Region"]->Title . "-" . $data["Country"]->Title . "-" . "ER" . "-" . $dr->format("YmdHis");
        // print_r($code);
        return $code;
    }

    private function ArrayKeyRemoveText($text, $data) {
        $isAssociative = false;
        if (has_string_keys($data)) {
            $data = array($data);
            $isAssociative = true;
        }
        //  print_r($data);
        for ($i = 0; $i < count($data); $i++) {
            foreach ($data[$i] as $key => $value) {
                $data[$i][preg_replace('/^' . $text . '/', '', $key)] = $value;
                unset($data[$i][$key]);
            }
        }
        //  print_r($data);
        if ($isAssociative) {
            return $data[0];
        }
        return $data;
    }

    public function UpdateForm($uid, $fields) {
        $frm = $this->GetForm($uid, "UID");
     //   var_dump($frm);
        $id = $frm->FRMExpenseReportID;
        //Main Fields
        $fields2 = $this->FieldMapper($fields, array(), $this->updatereadonlyfields);

        //$fields["isDraft"] = 0;
        $where = array(array("UID", $uid));
        $q = $this->UpdateQueryBuilder("FRMExpenseReport", $fields2, $where);
        $query = $this->db->Query($q);
        $this->SetAutoExp($fields, $id);
        $this->SetChecks($fields, $id);
        $this->SetMainExp($fields, $id);
        $this->SetOtherExp($fields, $id);

        $form = $this->GetForm($uid, 'UID');
        return $form;
    }

}
