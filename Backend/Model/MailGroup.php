<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Model;

class MailGroup extends Model {

    protected $fields = array(
        'MainGroupTitle' => array('type' => 'string'),
        'Email' => array('type' => 'string'),
    );
    protected $updatereadonlyfields = array(
    );
    protected $table = "MailGroups";
    protected $DBID = "MailGroupID";

    public function __construct() {
        parent::__construct();
    }

    public function GetGroup($title) {
        $q = "SELECT * FROM [" . $this->table . "] WHERE MailGroupTitle='" . $title . "'";
        $query = $this->db->Query($q);
        $data = $this->db->FetchAll($query);
        return $data;
    }

}
