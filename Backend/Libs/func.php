<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function clean($input) {
    // TODO:IMPLEMENT Array cleaning
    if (is_array($input)) {
        return $input;
    }
    $input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
    $input = strip_tags($input);
    $input = stripslashes($input);
    return $input;
}

function sqlclean($data) {
    if (!isset($data) or empty($data))
        return '';
    if (is_numeric($data))
        return $data;

    $non_displayables = array(
        '/%0[0-8bcef]/', // url encoded 00-08, 11, 12, 14, 15
        '/%1[0-9a-f]/', // url encoded 16-31
        '/[\x00-\x08]/', // 00-08
        '/\x0b/', // 11
        '/\x0c/', // 12
        '/[\x0e-\x1f]/'             // 14-31
    );
    foreach ($non_displayables as $regex)
        $data = preg_replace($regex, '', $data);
    $data = str_replace("'", "''", $data);
    return $data;
}

function TrimArray($Input) {

    if (!is_array($Input))
        return trim($Input);

    return array_map('TrimArray', $Input);
}

function GetEmail($user) {
    return $user->Username . '@freshdelmonte.com';
}

function FormatStatus($status) {
    if ($status == WFSTATUS["REJECTED"]) {
        return "REJECTED";
    }
    if ($status == WFSTATUS['APPROVED']) {
        return "APPROVED";
    }
    if ($status == WFSTATUS['RFI']) {
        return "RFI'ed";
    }

    return "PENDING";
}

function ErrorHandler($errno, $errstr, $errfile, $errline) {
    session_name('OperaX');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }


    $err = array();
    $err['errortype'] = 'Core';
    $err['errno'] = $errno;
    $err['errstr'] = $errstr;
    $err['errline'] = $errline;
    $err['errfile'] = $errfile;
    //$_SESSION['ERROR'] = $err;

    $ex = new Bytecode\Opera\Libs\OperaException();
    $ex->RegisterPHPERROR($err);
    $ex->ShowException();



    /* Don't execute PHP internal error handler */
    return true;
}

function has_string_keys(array $array) {
    return count(array_filter(array_keys($array), 'is_string')) > 0;
}
