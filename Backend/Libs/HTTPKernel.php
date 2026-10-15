<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTTPKernel
 *
 * @author bytecode
 */

namespace Bytecode\Opera\Libs;

class HTTPKernel {

    public $baseurl = CONFIG['BASE']['URL'];
    public $file = "index.php";
    public $getvars = array();

    //put your code here

    public function PostVar($key) {

        if (isset($_POST[$key])) {
            return clean($_POST[$key]);
        }
        return false;
    }

    public function GetVar($key) {

        if (isset($_GET[$key])) {
            return clean($_GET[$key]);
        }
        return false;
    }

    public function ISPost() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        } else {
            return false;
        }
    }

    public function Redirect($url, $getvars = array()) {
        header("Location:" . $url);
        exit();
    }

    public function BuildLink($params) {
        $base = $this->baseurl . "/" . $this->file . "?" . implode("&", $params);
        return $base;
    }

}
