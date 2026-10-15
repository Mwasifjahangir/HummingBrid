<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'boot.php';
$c = new \Bytecode\Opera\Controller\UserController();

echo $c->WEB();
if (isset($_SESSION['removemessages'])) {
    unset($_SESSION['messages']);
    unset($_SESSION['removemessages']);
}

