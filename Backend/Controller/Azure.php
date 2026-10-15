<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bytecode\Opera\Controller;

class AzureController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\Azure();
    }

    public function WEB() {
        parent::WEB();
    }

    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");
        if ($method == "GetProfilePic") {
            $img = $this->GetProfilePic();
            $info = getimagesizefromstring($img);
            header("Content-type: " . $info['mime']);

            return $img;
        }
    }

    public function GetProfilePic() {
        return $this->model->GetProfilePicture($_SESSION['user']['Username']);
    }

}
