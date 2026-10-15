<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Libs;

class OperaException extends \Exception {

    public function __construct() {
        parent::__construct();
    }

    public function ShowException() {
        $_SESSION['ERROR'] = $this;
        header("Location:error.php");
        exit(1);
    }

    public function RegisterException(\Exception $e) {
        $this->code = $e->getCode();
        $this->file = $e->getFile();
        $this->message = $e->getMessage();
    }

    public function RegisterPHPERROR($err) {
        //print_r($err);
        //exit();
        $this->line = $err['errline'];
        $this->file = $err['errfile'];
        switch ($err['errno']) {
            case E_USER_ERROR:
                $this->line = $err['errline'];
                $this->file = $err['errfile'];
                $this->code = E_USER_ERROR;
                $this->message = "FATAL ERROR: " . $err['errstr'] . '<br/>';



                //exit(1);
                break;

            case E_USER_WARNING:

                $this->code = E_USER_WARNING;
                $this->message = "WARNING: " . $err['errstr'] . '<br/>';
                break;

            case E_USER_NOTICE:
                $this->code = E_USER_NOTICE;
                $this->message = "NOTICE: " . $err['errstr'] . '<br/>';
                break;

            default:
                $this->code = 0;
                $this->message = "UKNOWN ERROR: " . $err['errstr'] . '<br/>';
                break;
        }
    }

}
