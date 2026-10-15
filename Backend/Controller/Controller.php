<?php

/**
 * 
 */

namespace Bytecode\Opera\Controller;

class Controller {

    protected $http;
    protected $reg;
    protected $model;
    protected $workflow;
    protected $user;
    protected $mail;
    protected $workflowmanager;

    public function __construct() {
        $this->reg = \opera\bytecode\Registry::getInstance();
        $this->http = $this->reg->http;
        $this->mail = $this->reg->mail;
        $this->user = isset($_SESSION['user']) ? $_SESSION['user'] : 0;
        $this->workflowmanager = new \Bytecode\Opera\Libs\WorkFlow();
        $this->workflowmanager->prefinalapprovehook = function() {
            return true;
        };
        $this->workflowmanager->postfinalapprovalhook = function () {
            return true;
        };
    }

    /*
     * RPC Request eg json etc
     */

    public function RPC() {
        
    }

    /**
     * Normal Request
     */
    public function WEB() {
        
    }

    public function ProcessAttachments($frmuid, $formid) {
        $fm = new \Bytecode\Opera\Model\File();
        // get the files;
        $files = $this->http->PostVar("FormFiles");
        if ($files != false) {
            $flist = explode(",", $files);

            if (count($flist) > 0) {
                echo $files;
                for ($i = 0; $i < count($flist); $i++) {
                    $fm->AttachFile($flist[$i], $frmuid, $formid);
                }
            }
        }
    }

    public function JsonFLush($data) {
        return json_encode($data);
    }

}
