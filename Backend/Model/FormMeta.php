<?php

/**
 * Created by PhpStorm.
 * User: Akamil
 * Date: 8/3/2016
 * Time: 8:48 PM
 */

namespace Bytecode\Opera\Model;

class FormMeta extends Model {

    protected $DBID = "FormMetaID";
    protected $table;
    protected $fields = array(
        'RegionID' => array('type' => 'int'),
        'CountryID' => array('type' => 'int'),
        'SBUID' => array('type' => 'int'),
        'EmployeeName' => array('type' => 'string'),
        'Department' => array('type' => 'string'),
        'OrganizationResponsibility' => array('type' => 'string'),
        'ReportFrom' => array('type' => 'string'),
        'ReportTo' => array('type' => 'string'),
        'CreatorUserID' => array('type' => 'int'),
    );

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->table = "FormMeta";
    }

    /**
     *
     * @param type $FRMPaymentRequestID
     * @return type
     */
    public function GetFormMeta($ID, $type = "ID") {
        if ($type == "UID") {
            $filter = "[UID]";
        } else {
            $filter = $this->DBID;
        }

        $q = $this->db->Query("SELECT * FROM " . $this->table . " WHERE " . $filter . " = '" . $ID . "'");
        $data = $this->db->FetchRow($q);
        // Get User Detals
        $u = new User();
        $user = $u->GetUser($data->CreatorUserID);
        $data->User = $user;
        $WF = new WorkFlow();
        $data->Country = $WF->GetCountry($data->CountryID);
        // SBU??
        //echo $data->SBUID;
        if ($data->SBUID != NULL && (int) $data->SBUID > 0) {
            $q1 = $this->db->Query("SELECT * FROM SBU WHERE  SBUID = '" . (int) $data->SBUID . "'");
            $sbu = $this->db->FetchRow($q1);
            // var_dump($sbu);
            $data->SBU = $sbu;
        }
        return $data;
    }

    public function NewMETA($fields) {
        $fields = $this->FieldMapper($fields);
        $q = $this->InsertQueryBuilder($this->table, $fields);
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);
        return $this->GetFormMeta($id);
    }

}
