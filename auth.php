<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *//*
  $use_sts = true;

  // iis sets HTTPS to 'off' for non-SSL requests
  if ($use_sts && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
  header('Strict-Transport-Security: max-age=31536000');
  } elseif ($use_sts) {
  header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], true, 301);
  // we are in cleartext at the moment, prevent further execution and output
  die();
  } */
$uc = new \Bytecode\Opera\Controller\UserController();
if ($uc->LoggedIn() === false) {
    $uc->SetLastURL();
    $reg->http->Redirect('/oauth.php');
    exit();
}