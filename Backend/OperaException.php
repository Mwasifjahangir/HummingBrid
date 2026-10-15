<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera;

/**
 * Description of Exception
 *
 * @author bytecode
 */
class OperaException extends \Exception {
    //put your code here
    private $messageArray = array();
    public function __construct($arr) {
        $this->messageArray = $arr;
    }
    public function getMessageArray(){
        return $this->messageArray;
    }
    public function setMessageArray($arr){
        $this->messageArray = $arr;
        
    }
}
