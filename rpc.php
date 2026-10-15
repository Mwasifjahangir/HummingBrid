<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'boot.php';
try {
    if (isset($_GET['nojson']) == false) {
        header('Content-Type: application/json');
    }

    $c = new Bytecode\Opera\Controller\MainController();

    echo $c->RPC();
} catch (Exception $exc) {
    /* $ex = new Bytecode\Opera\Libs\OperaException();
      $ex->RegisterException($exc);
      $ex->ShowException(); */
    throw $exc;
}