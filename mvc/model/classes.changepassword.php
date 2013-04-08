<?php
require_once 'model.php';
class ChangePassword extends model {
     private $userName;
    private $password;
    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

public function UpdatePassword(){
    $this->db->Fields ( array (
					"password" => $this->getPassword () 
			) );
			$this->db->From ( "users" );
			$this->db->Where ( array (
					"user_name" => $this->getUserName () 
			) );
			$this->db->Update ();
			if ($this->db->Update () == 'true') {
				return 1;
			} else {
				return 0;
			}
}
public function CheckCurrentPassword(){
    $this->db->From ( "users" );
			$this->db->Where ( array (
					"user_name" => $this->getUserName () 
			) );
			return $this->db->Select ();
		}

   
}

?>
