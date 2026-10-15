<?php

/**
 * 
 */

namespace Bytecode\Opera\Model;

/**
 * 
 */
class CreditNoteRequest extends \Bytecode\Opera\Model\Model {

    protected $fields = array(
        "decimal" => array(
            'LocalTotal',
            'USDTotal'
        ),
        "numeric" => array(
            'isInStorePromo',
            'isStandDisplay',
            'isFloorDisplay',
            'isRebate',
            'isGondolaRent',
            'isListingFees',
            'isOpeningFees',
            'isOthers',
            'UserID',
            'FormID',
            'RegionID',
            'CountryID'
        ),
        "string" => array(
            'AtLocation',
            'BranchLetter',
            'Comments',
            'UID'
        )
    );

    public function __construct() {
        parent::__construct();
    }

    public function NewForm($userid) {
        $q = "INSERT INTO [dbo].[FRMCreditNoteRequest]
           (
           [UserID]
           ,[FormID]
           ,[isDraft]
           ,[CreatedOn]
           ,[UpdatedOn])
         VALUES
           ('" . $userid . "'
            ,'2'   
            ,'1'  
            ,GETDATE()
            ,GETDATE()
          )";
        $query = $this->db->Query($q);
        $id = $this->db->LastID($query);
        $code = $this->GenrateCode($id);
        $this->SetCode($id, $code);
        // for UID
        $data = $this->GetForm($id);
        return array('ID' => $id, 'Code' => $code, 'UID' => $data->UID);
    }

    public function AddItem($formid) {
        $q = "INSERT INTO [dbo].[FRMCreditNoteRequestItems]
           ([RefNo]
           ,[PeriodFrom]
           ,[PeriodTo]
           ,[ItemCode]
           ,[ProductDescription]
           ,[ProductionDate]
           ,[Amount]
           ,[Currency]
           ,[FRMCreditNoteRequestID])
     VALUES
           (''
           ,GETDATE()
           ,GETDATE()
           ,''
           ,''
           ,GETDATE()
           ,0.00
           ,''
           ,'" . (int) $formid . "')";
        $query = $this->db->query($q);
        $itemid = $this->db->LastID($query);
        return array("FRMCreditNoteRequestItemID" => $itemid);
    }

    /**
     * 
     * @param type $id
     * @param type $item
     * @param type $value
     * @return type
     */
    public function UpdateForm($id, $item, $value) {
        $value = $this->FormatField($item, $value);
        $q = "UPDATE [dbo].[FRMCreditNoteRequest] SET [" . $item . "] = '" . $value . "' WHERE [FRMCreditNoteRequestID]=" . (int) $id;
        $query = $this->db->Query($q);
        return array("status" => "success");
    }

    /**
     * 
     * @param type $id
     * @param type $data
     * @return boolean
     */
    public function MultiUpdateForm($id, $data) {
        $q = "UPDATE [dbo].[FRMCreditNoteRequest] SET ";
        foreach ($data as $key => $value) {
            $value = $this->FormatField($key, $value);
            $q .= "[" . $key . "] = '" . $value . "',";
        }
        // remove last comman
        $q = substr($q, 0, -1);

        $q .= " WHERE [FRMCreditNoteRequestID] = " . (int) $id;
        //echo $q;
        $query = $this->db->Query($q);
        return true;
    }

    /**
     * 
     * @param type $itemid
     * @param type $item
     * @param type $value
     * @return type
     */
    public function UpdateFormItem($itemid, $item, $value) {
        //echo $value;
        $value = $this->FormatField($item, $value);
        $q = "UPDATE [dbo].[FRMCreditNoteRequestItems]
   SET [" . $item . "] = '" . $value . "'
 WHERE  [FRMCreditNoteRequestItemID] = " . (int) $itemid;
        // echo $q;
        $query = $this->db->Query($q);
        return array("status" => "success");
    }

    public function SetCode($FRMCreditNoteRequestID, $code) {
        $q = "UPDATE  [dbo].[FRMCreditNoteRequest]
 SET Code = '" . $code . "'
 WHERE FRMCreditNoteRequestID = " . (int) $FRMCreditNoteRequestID;
        $query = $this->db->Query($q);
        return true;
    }

    public function GenrateCode($id) {
        $dr = new \DateTime('NOW');
        $ret = $dr->format("Ymd") . "-" . $id;
        return $ret;
    }

}
