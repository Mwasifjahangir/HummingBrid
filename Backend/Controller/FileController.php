<?php

namespace Bytecode\Opera\Controller;

class FileController extends Controller {

    protected $uploadir = './Files/';

    public function __construct() {
        parent::__construct();
        $this->model = new \Bytecode\Opera\Model\File();
    }

    public function WEB() {
        parent::WEB();
    }

    public function RPC() {
        parent::RPC();
        $method = $this->http->GetVar("method");
        if ($method == "ProcessUpload") {
            return $this->JsonFLush($this->ProccessUpload());
        } elseif ($method == "GetFiles") {
            $uid = $this->http->GetVar("UID");
            return $this->JsonFLush($this->GetFiles($uid));
        } elseif ($method == "Get") {
            $code = $this->http->GetVar("Code");
            return $this->JsonFLush($this->Get($code));
        }
    }

    public function Get($code) {
        $f = $this->model->GetFile($code);
        $path = $this->uploadir . $f->Code;

        $fp = fopen($path, 'rb');
        $header = trim($f->MimeType);
        if ($header == "") {
            $header = "application/octet-stream";
        }
// send the right headers
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $header);
        header('Content-Disposition: attachment; filename=' . $f->Name);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));


// dump the picture and stop the script
        fpassthru($fp);
        exit;
    }

    public function GetFiles($uid) {
        return $this->model->GetFiles($uid);
    }

    public function ProccessUpload() {
        $file = $_FILES['file'];
        //var_dump($file);
        $type = $file['type'];
        $return = array();
        //$formid = $this->http->GetVar("formid");
        // $uid = $this->http->GetVar("UID");
        //$finfo = new finfo(FILEINFO_MIME);
        //$finfo->file($file['']);
        for ($i = 0; $i < count($file["name"]); $i++) {
            $pinfo = pathinfo($file['name'][$i]);
            $data = array();
            $newfilenew = com_create_guid();
            $data['Name'] = $file['name'][$i];
            $data['Path'] = $this->uploadir;
            $data['Mime'] = $file['type'][$i];
            $data['Code'] = $newfilenew;

            $move = move_uploaded_file($file['tmp_name'][$i], $this->uploadir . trim($newfilenew, '{}'));

            $this->model->AddFile($data, $_SESSION['user']['UserID']);
            $return[] = $newfilenew;
        }

        return array("message" => "success", "UploadedFiles" => $return);
    }

}
