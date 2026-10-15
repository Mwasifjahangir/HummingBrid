<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author bytecode
 */

namespace Bytecode\Opera\Controller;

class UserController extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\User();
    }

    public function LoggedIn() {
        if (
                isset($_SESSION['state']) &&
                isset($_SESSION['access_token']) &&
                isset($_SESSION['preferred_username']) &&
                isset($_SESSION['given_name']) &&
                isset($_SESSION['refresh_token']) &&
                isset($_SESSION['user']) &&
                $_SESSION['user']['UserID'] != 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function WEB() {
        parent::WEB();
        $method = $this->http->GetVar("method");
        if ($method == "Login") {
            return $this->Login();
        } elseif ($method == "ProcessLogin") {
            $user = $this->http->PostVar('_username');
            $password = $this->http->PostVar('_password');
            return $this->ProcessLogin($user, $password);
        } elseif ($method === "Logout") {
            session_destroy();
            $this->http->Redirect("index.php");
        }
    }

    public function Login() {
        $tpl = $this->reg->html->loadTemplate("Login.php");
        $tplparams = array();
        $msg = new \Bytecode\Opera\Libs\Messaging();
        $tplparams['messages'] = $msg;
        return $tpl->render($tplparams);
    }

    public function ProcessLogin($uname, $pwd) {
        $msg = new \Bytecode\Opera\Libs\Messaging();
        $res = $this->model->GetUserByUN($uname);
        if ($res != NULL && count($res) > 0) {
            // var_dump($res);
            $_SESSION['user'] = array("UserID" => $res->UserID, "DisplayName" => $res->DisplayName, "Username" => $res->Username);

            $this->http->Redirect("index.php?module=MM&method=List");
        } else {
            $msg->AddSessionMessage("Unable to login : Invalid Username or Password");
            $this->http->Redirect("Login.php?module=User&method=Login");
        }
    }
    public function SetLastURL(){
        if (strpos($_SERVER['REQUEST_URI'] , "oauth.php") === FALSE){
            $_SESSION['LastURI'] ="//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        }
    }
    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");

        if ($method == "GetAllUsers") {

            return $this->JsonFLush($this->model->GetAllUsers());
        }
    }

}
