<?php

namespace Bytecode\Opera\Controller;

class CreditNoteRequestController extends \Bytecode\Opera\Controller\Controller {

    private $tpldir = "Forms/Finance/";

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\CreditNoteRequest();
    }

    public function WEB() {
        parent::WEB();
        $method = $this->http->GetVar("method");
        if ($method == "ProcessForm") {
            return $this->ProcessForm();
        } elseif ($method == "ViewForm") {
            
        } else {
            return $this->Index();
        }
    }

    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");
        if ($method == "NewForm") {
            $uid = $_SESSION['user']['UserID'];
            return $this->JsonFLush($this->model->NewForm($uid));
            
        }
    }

    public function Index() {
        $tpl = $this->reg->html->load($this->tpldir . "CreditNoteRequest.php");

        return $tpl->render(array('mode' => 'New', 'userinfo' => $_SESSION['user']));
    }

}
