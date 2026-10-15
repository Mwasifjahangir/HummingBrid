<?php

namespace Bytecode\Opera\Model;

class File extends \Bytecode\Opera\Model\Model {

    public function __construct() {
        $this->table = "File";

        parent::__construct();
    }

    public function GetFiles($uid) {
        $q = "SELECT * FROM [dbo].[Files] WHERE [FRMUID] = '" . $uid . "'";
        $query = $this->db->Query($q);
        $data = $this->db->FetchAll($query);
        return $data;
    }

    public function GetFile($code) {
        $q = "SELECT * FROM [dbo].[Files] WHERE [Code] = '" . $code . "'";
        $query = $this->db->Query($q);
        $data = $this->db->FetchRow($query);
        return $data;
    }

    public function AttachFile($fileuid, $frmuid, $formid) {
        $q = "UPDATE [dbo].[Files] SET [FRMUID] = '" . $frmuid . "' , [FormID] = '" . (int) $formid . "' WHERE [Code] = '" . $fileuid . "'";
        //echo $q;
        $query = $this->db->Query($q);
    }

    public function AddFile($data, $userid) {
        $q = "INSERT INTO [dbo].[Files]
           ([Name]
           ,[Path]
           ,[CreatedOn]
           ,[UpdatedOn]
           ,[MimeType]
           ,[UserID]
           ,[Code]
           )
     VALUES
           ('" . $data['Name'] . "'
           ,'" . $data['Path'] . "'
           ,GETDATE()
           ,GETDATE()
           ,'" . $data['Mime'] . "'
           ,'" . $userid . "'
           ,'" . $data['Code'] . "')";

        $query = $this->db->Query($q);
    }

}
