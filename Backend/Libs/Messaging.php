<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Messaging
 *
 * @author bytecode
 */

namespace Bytecode\Opera\Libs;

class Messaging {

    public $errors = array();
    public $messages = array();

    public function __construct() {
        
    }

    public function AddMessage($message) {
        $this->messages[] = $message;
    }

    public function AddSessionMessage($message) {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        }
        $_SESSION['messages'][] = $message;
    }

    public function GetMessages() {
        $return = array();
        if (isset($_SESSION['messages'])) {
            // flag set to remove messages on next call
            $_SESSION['removemessages'] = true;
            $return = array_merge($this->messages , $_SESSION['messages']);
            // remove from session
            //unset($_SESSION['messages']);
        }
        else{
            $return = $this->messages;
        }
        
        return $return;
    }

    public function AddError($error) {
        $this->errors[] = $error;
    }

    public function GetErrors() {
        return $this->errors;
    }

}
