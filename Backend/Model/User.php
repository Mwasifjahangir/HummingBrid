<?php

/**
 * Description of User
 *
 * @author bytecode
 */

namespace Bytecode\Opera\Model;

class User extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = "User";
    }

    public function GetUser($UserID) {
        $q = "SELECT * FROM Users WHERE UserID='" . $UserID . "'";
        $query = $this->db->Query($q);
        return $this->db->FetchRow($query);
    }

    public function GetUserByUN($un) {
        $q = "SELECT * FROM Users WHERE Username='" . $un . "'";
        // echo $q;
        $query = $this->db->Query($q);
        return $this->db->FetchRow($query);
    }

    public function GetAllUsers() {
        $q = "SELECT * FROM Users  ORDER BY UserID";
        $query = $this->db->Query($q);
        return $this->db->FetchAll($query);
    }

    public function UserExist($user) {
        $q = "SELECT COUNT(*) AS UserCount FROM Users WHERE [Username] = '" . $user . "' ";
        $query = $this->db->Query($q);
        $d = $this->db->FetchRow($query);
        if ((int) $d->UserCount == 1) {
            return true;
        }
        return false;
    }

    public function GetUserRefreshToken($username) {
        $q = "SELECT [Token] FROM Users WHERE [Username] = '" . $username . "'";
        $query = $this->db->Query($q);
        $data = $this->db->FetchRow($query);
        return $data->Token;
    }

    public function SetRefreshToken($user, $token) {
        if ($this->UserExist($user)) {
            $q = "UPDATE Users SET [Token]='" . $token . "' WHERE [Username]='" . $user . "'";
            $query = $this->db->Query($q);
            return true;
        }
        return false;
    }

}
