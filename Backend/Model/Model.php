<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Model;

class Model {

    protected $db;
    protected $table;
    protected $reg;
    protected $fields = array();
    protected $updatereadonlyfields = array();

    public function __construct() {
        $this->reg = \opera\bytecode\Registry::getInstance();
        $this->db = $this->reg->db;
        $this->logger = $this->reg->logger;
    }

    function FormatField($item, $value) {
        if (in_array($item, $this->fields["numeric"])) {
            return (int) $value;
        } elseif (in_array($item, $this->fields["decimal"])) {
            return (float) $value;
        } else {
            return $value;
        }
    }

    public function FormatField2($item, $value, $type) {


        switch ($type) {
            case "string":
                return (string) str_replace("'", "''", $value);
            case "decimal":
                return (float) $value;
            case "int":
                return (int) $value;
            case "UID":
                return "CONVERT(UNIQUEIDENTIFIER, '" . $value . "')";
        }

        // field not found
        return false;
    }

    public function FieldMapper($data, $customfields = array(), $ignorefields = array(), $usecustomkeys = false) {
        $ret = array();
        $fields = $this->fields;
        if (count($customfields) > 0) {
            $fields = $customfields;
        }
        // data is object? , covert to array

        if (is_object($data)) {
            $data = json_decode(json_encode($data), true);
        }
        // var_dump($ignorefields );
        //var_dump ($data);
        foreach ($fields as $key => $value) {

            // for objects
            if (isset($data[$key]) && in_array($key, $ignorefields) == false) {
                $returnkey = $key;
                // customkey?
                if (isset($fields[$key]["customkey"]) && $usecustomkeys == true) {
                    $returnkey = $fields[$key]["customkey"];
                }
                $ret[$returnkey] = $this->FormatField2($key, $data[$key], $fields[$key]["type"]);
            }
        }
        return $ret;
    }

    public function NormalizeFields($data, $fields) {
        $return = array();
        foreach ($fields as $key => $value) {
            if (isset($data[$key]) && is_array($data[$key])) {
                foreach ($data[$key] as $key1 => $value1) {
                    //eg key1 = 0 , key = ALT_UOM
                    $return[$key1][$key] = $value1;
                }
            }
        }
        return $return;
    }

    public function InsertQueryBuilder($table, $data, $fieldmap = array()) {

        $q = "INSERT INTO " . $table;
        $colums = " (";
        $values = " VALUES (";
        //print_r($fieldmap);
        // exit;
        foreach ($data as $key => $value) {
            isset($fieldmap[$key]['unicode']) == true ? $unicode = "N" : $unicode = "";
            if (!isset($fieldmap[$key]['readonly'])) {
                $colums .= "[" . $key . "] ,";
                $values .= $unicode . "'" . $value . "',";
            }
        }
        // remove trailing commas
        $colums = substr($colums, 0, - 1);
        $values = substr($values, 0, -1);

        $colums .= ")  ";
        $values .= ")  ";

        $ret = $q . $colums . $values;
        //echo $ret;
        // echo $ret;
        return $ret;
    }

    public function UpdateQueryBuilder($table, $data, $filter, $fieldmap = array()) {
        $q = "UPDATE " . $table . " SET ";
        $map = function($value) {
            return "[" . $value[0] . "] = '" . $value[1] . "'";
        };
        $querymap = function($key, $value) use ($fieldmap) {

            //  if (!isset($fieldmap[$key]['readonly'])) {
            return "[" . $key . "] = '" . $value . "'";
            // }
        };


        $queryvalues = array_map($querymap, array_keys($data), $data);
        $q .= implode(",", $queryvalues);
        if (count($filter) > 0) {
            $q .= "WHERE ";
            $where = array_map($map, $filter);
            $q .= implode(' AND ', $where);
        }
        // echo $q;
        return $q;
    }

    /**
     *
     * @param type $id
     * @param type $data
     * @return boolean
     */
    public function MultiUpdateForm($id, $data) {


        $q = "UPDATE [dbo].[FRMPaymentRequest] SET ";
        foreach ($data as $key => $value) {
            $value = $this->FormatField($key, $value);
            $q .= "[" . $key . "] = '" . $value . "',";
        }
        // remove last comman
        $q = substr($q, 0, -1);

        $q .= " WHERE [FRMPaymentRequestID] = " . (int) $id;
        //echo $q;
        $query = $this->db->Query($q);
        return true;
    }

}
