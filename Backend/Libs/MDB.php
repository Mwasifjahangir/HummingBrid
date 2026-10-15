<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Libs;
require_once 'Config/config.php';
class MDB {

    public $db;
    private $db_name = CONFIG['MONGO']['DB_NAME'];
    public function __construct() {
        try {
            $client = new \MongoDB\Client("mongodb://10.80.64.121:27017");
            //var_dump(new \MongoDB\Client("mongodb://10.80.0.46:27017")  );
            $this->db = $client->selectDatabase($this->db_name);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
