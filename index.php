<?php

// error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//require_once 'Backend/Views/index.php';
require_once './boot.php';
require_once './auth.php';

//Main controller
try {


    $c = new \Bytecode\Opera\Controller\MainController();

    $maintpl = $reg->html->load('index.php');
    $content = $c->WEB();
    $tplvar = array('maincontent' => $content);
    $tplvar['MODE'] = CONFIG['MODE'];
    if (isset($_SESSION['user'])) {
        $tplvar['userinfo'] = $_SESSION['user'];
    } else {
        $tplvar['userinfo'] = array("UserID" => 0, "DisplayName" => "Guest", "Username" => "Guest");
    }
    echo $maintpl->render($tplvar);
//Remove flash messages
    if (isset($_SESSION['removemessages'])) {
        unset($_SESSION['messages']);
        unset($_SESSION['removemessages']);
    }
} catch (Exception $exc) {
    /*  $ex = new Bytecode\Opera\Libs\OperaException();
      $ex->RegisterException($exc);
      $ex->ShowException(); */
    throw $exc;
}