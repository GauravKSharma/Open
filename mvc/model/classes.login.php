<?php
require_once 'model.php';
class logIn extends model {

    protected $userName;
    protected $password;
    protected $userType;
    
    
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

    public function getUserType() {
        return $this->userType;
    }

    public function setUserType($userType) {
        $this->userType = $userType;
    }
    
    public function FindUsers() {
		
		
		
		 
			$this->db->Fields ( array (
					"user_name",
					"password",
					"user_type" 
			) );
			$this->db->From ( "login" );
			$this->db->Where ( array (
					"user_name" => $this->getUserName (),
					"password" => $this->getPassword () 
			) );
			
			return $this->db->Select();
			
		}
                public function resultlogin() {
		return $this->db->resultArray ();
                }
    



public function checkUser() {
$this->db->Fields ( array (				
			  "password",
                          "email"
			) );
			$this->db->From ( "users" );
			$this->db->Where ( array (
					"user_name" => $this->getUserName (),
					"user_type" => $this->getUserType () 
			) );
			
			return $this->db->Select();
                        
}
}
?>
