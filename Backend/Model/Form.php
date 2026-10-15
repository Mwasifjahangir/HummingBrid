<?php
/**
 * Created by PhpStorm.
 * User: Akamil
 * Date: 8/13/2016
 * Time: 5:52 PM
 */
namespace Bytecode\Opera\Model;
class Form extends Model{
    protected $table = "Forms";
    protected $DBID = "Form";

    public function __construct() {
        parent::__construct();

    }
    public  function GetForm($formid){
        $q = "SELECT * FROM Forms WHERE [FormID] = ".(int)$formid;
        $query = $this->db->Query($q);
        return $this->db->FetchRow($query);
    }
    public function GetAllForms(){
        $q = "SELECT * FROM Forms ORDER BY Title";
        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

}