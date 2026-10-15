<?php

namespace Bytecode\Opera\Libs;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DB {

    public $connection;
    private $username = CONFIG['MSSQL']['USER'];
    private $password = CONFIG['MSSQL']['PASSWORD'];
    private $host = CONFIG['MSSQL']['HOST'];
    private $db = CONFIG['MSSQL']['DB'];
    private $port = CONFIG['MSSQL']['PORT'];

    public function __construct() {
        //$this->username = $config["DB"]["username"];
    }

    public function Connect() {
        $this->connection = sqlsrv_connect($this->host . "," . $this->port, array('Database' => $this->db, 'UID' => $this->username, 'PWD' => $this->password, "CharacterSet" => "UTF-8", "ConnectionPooling" => "1"));
       // var_dump(sqlsrv_errors());
        if (!$this->connection) {
            throw new \Exception("Unable to connect to DB");

            /* ,"MultipleActiveResultSets"=>'0' */

            // $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
    }

    public function Query($query , $params = array()) {

        if (count($params) > 0){
            $ret = sqlsrv_query($this->connection, $query . "; SELECT SCOPE_IDENTITY() AS LASTID" ,$params);
        }
        else{
            $ret = sqlsrv_query($this->connection, $query . "; SELECT SCOPE_IDENTITY() AS LASTID");
        }

        if (!$ret) {
            die(print_r(sqlsrv_errors(), true) . $query);
        } else {
            return $ret;
        }
    }

    public function MultiQuery($q) {
        
    }

    public function FetchAll($query) {
        /* $ret = array();
          while ($row = $query->fetch_object()) {
          $ret[] = $row;
          }
          return $ret; */
        $ret = array();
        while ($obj = sqlsrv_fetch_object($query)) {
            $ret[] = $obj;
        }
        return $ret;
    }

    public function FetchRow($query) {
        return sqlsrv_fetch_object($query);
    }

    public function LastID($query) {

        sqlsrv_next_result($query);
        sqlsrv_fetch($query);
        return sqlsrv_get_field($query, 0);
    }

    public function Close() {
        
    }

}
