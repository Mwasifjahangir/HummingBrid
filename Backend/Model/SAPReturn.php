<?php

/**
 * Created by PhpStorm.
 * User: Akamil
 * Date: 8/13/2016
 * Time: 5:52 PM
 */

namespace Bytecode\Opera\Model;

class SAPReturn extends Model {

    protected $fields = array(
        'TYPE' => array('type' => 'string'),
        'NUMBER' => array('type' => 'string'),
        'ID' => array('type' => 'string'),
        'MESSAGE' => array('type' => 'string'),
        'FRMUID' => array('type' => 'string')
    );
    protected $updatereadonlyfields = array(
    );
    protected $table = "SAPReturn";
    protected $DBID = "SAPReturnID";

    public function __construct() {
        parent::__construct();
    }

    public function Get($FRMUID) {
        $q = "SELECT * FROM SAPReturn WHERE [FRMUID] =  CONVERT(UNIQUEIDENTIFIER, '" . $FRMUID . "') ORDER BY SAPReturnID ASC";
        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    private function DeleteAll($FRMUID) {
        $q = "DELETE FROM SAPReturn WHERE [FRMUID] =  CONVERT(UNIQUEIDENTIFIER, '" . $FRMUID . "')";
        $query = $this->db->Query($q);
    }

    public function Add($data, $FRMUID) {
        //   print_r($data);
        $this->DeleteAll($FRMUID);
        for ($i = 0; $i < count($data); $i++) {
            $d = $this->FieldMapper($data[$i]);
            $d['FRMUID'] = $FRMUID;
            $q = $this->InsertQueryBuilder('SAPReturn', $d);
            $this->db->Query($q);
        }
    }

    public function AddException($exception, $FRMUID) {
        $this->DeleteAll($FRMUID);
        $data = array(
            'TYPE' => "E",
            'NUMBER' => "0",
            'ID' => "NA",
            'MESSAGE' => trim($exception),
            'FRMUID' => $FRMUID
        );
        $q = $this->InsertQueryBuilder('SAPReturn', $data);
        $this->db->Query($q);
    }

}
