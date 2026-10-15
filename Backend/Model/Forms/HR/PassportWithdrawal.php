<?php

namespace Bytecode\Opera\Model;

class PassportWithdrawal extends Model {

    protected $fields = array(
        'HRLocation' => array('type' => 'string'),
        'HRDepartment' => array('type' => 'string'),
        'HREmployeeName' => array('type' => 'string'),
        'DMID' => array('type' => 'string'),
        'HRPosition' => array('type' => 'string'),
        'Reason' => array('type' => 'string'),
        'RequiredOn' => array('type' => 'string'),
        'ReturnOn' => array('type' => 'string'),
        'TravellingOn' => array('type' => 'string'),
        'UserID' => array('type' => 'int'),
        'FormMetaID' => array('type' => 'int')
    );
    protected $updatereadonlyfields = array(
        'UserID',
        'FormMetaID',
    );

    public function __construct() {
        parent::__construct();
        $this->table = "FRMHRPassportWithdrawl";
    }

    /**
     * 
     * @param type
     * @return type
     */
    public function GetForm($ID, $type = "ID") {
        if ($type == "UID") {
            $filter = "[UID]";
        } else {
            $filter = "[FRMHRPassportWithdrawID]";
        }

        $q = $this->db->Query("SELECT * FROM [dbo].[FRMHRPassportWithdrawl] WHERE " . $filter . " = '" . $ID . "'");
        $data = $this->db->FetchRow($q);
        return $data;
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

        $ret["files"] = $f->GetFiles($ret["mainform"]->UID);
        $ret["meta"] = $m->GetFormMeta($ret["mainform"]->FormMetaID);
        $ret["workflow"] = $wf->GetWorkFlow($ret["mainform"]->UID);
        return $ret;
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
        $fields2["Code"] = $this->GenrateCode($codedata);
        $fields2["UID"] = com_create_guid();

        $fields2["isDraft"] = 0;
        $q = $this->InsertQueryBuilder("FRMHRPassportWithdrawl", $fields2);
        //  echo $q;
        //exit();
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);


        $data = $this->GetForm($id);
        return $data;
    }

    public function GetHRLocations() {
        $q = "SELECT * FROM HRLocations ORDER BY HRLocationID ASC";
        $query = $this->db->Query($q);
        $data = $this->db->FetchAll($query);
        return $data;
    }

    public function GetHRMasterEmpList() {
        // Get Locations
        $locations = $this->GetHRLocations();
        $hr = $sap->GetSAPHREMPData();
        $data = [
            "PE_EMP_DATA" => $hr["PE_EMP_DATA"]
        ];
        //$location = array();
        //$locationarr = array();
        //   $departmentstrace = array();
        //$departments = array();
        //Locaion 
        $data = json_decode(json_encode($data), true);
        $locations = json_decode(json_encode($locations), true);
        $locations = TrimArray($locations);

        $data = TrimArray($data);
        //var_dump($data);
        $uniquelocations = array();
        for ($i = 0; $i < count($data["PE_EMP_DATA"]); $i++) {
            // Search In Locations
            for ($j = 0; $j < count($locations); $j++) {
                if (array_key_exists($locations[$j]["Location"], $uniquelocations) == FALSE) {
                    // $uniquelocations[$locations[$j]["Location"]]["Employees"] = array();

                    $uniquelocations[$locations[$j]["Location"]]["Departments"] = array();
                }
                // check if departmnet exists?
                if (array_key_exists($data["PE_EMP_DATA"][$i]["BTEXT"], $uniquelocations[$locations[$j]["Location"]]["Departments"]) == FALSE) {
                    $uniquelocations[$locations[$j]["Location"]]["Departments"][$data["PE_EMP_DATA"][$i]["BTEXT"]] = array();
                }
            }
        }

        for ($i = 0; $i < count($data["PE_EMP_DATA"]); $i++) {
            // Search In Locations
            for ($j = 0; $j < count($locations); $j++) {
                // create locations array in unique locations
                if ($locations[$j]["WERKS"] == $data["PE_EMP_DATA"][$i]["WERKS"] && $locations[$j]["BUKRS"] == $data["PE_EMP_DATA"][$i]["BUKRS"]) {
                    $uniquelocations[$locations[$j]["Location"]]["Departments"][$data["PE_EMP_DATA"][$i]["BTEXT"]][] = $data["PE_EMP_DATA"][$i];
                    //break;
                }
            }
        }



        return TrimArray($uniquelocations);
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
        $code = $data["Region"]->Title . "-" . $data["Country"]->Title . "-" . "HRPW" . "-" . $dr->format("YmdHis");
        // print_r($code);
        return $code;
    }

}
