<?php

class Admin {

    private $db;
    private $messages = [];
    public function __construct() {
        $this->db = new \Bytecode\Opera\Libs\DB();
        
    }

    public function MigratePendingFormApprover($formid, $fromuserid, $touserid) {
        $q = "UPDATE WFTrack SET UserID = " . (int) $touserid . " WHERE [FormID] = ".(int) $formid ." AND [Status]";
        
    }

}
