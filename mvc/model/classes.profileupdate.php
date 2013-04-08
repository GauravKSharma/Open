<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classes
 *
 * @author Gaurav
 */
require_once 'model.php';
class ProfileUpdate extends model{
	
	protected $_id = "";
	protected $_userName = "";
	protected $_utype = "";
	protected $_password = "";
	protected $_firstname = "";
	protected $_lastname = "";
	protected $_address = "";
	protected $_email = "";
	protected $_phone = "";
	protected $_college_or_company = "";
	
	public function getCollegeOrCompanyName() {
		return $this->college_or_company;
	}
	
	public function setCollegeOrCompanyName($college_or_company) {
		$this->college_or_company = $college_or_company;
	}
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhoneNo() {
        return $this->phoneNo;
    }

    public function setPhoneNo($phoneNo) {
        $this->phoneNo = $phoneNo;
    }

    
    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

                
  
public function UpdateProfile(){
    	$this->db->Fields ( array (
					"firstname" => $this->getFirstName (),
					"lastname" => $this->getLastName (),
					"address" => $this->getAddress (),
					"email" => $this->getEmail (),
                                        "phone_no" => $this->getPhoneNo (),
					"college_or_company" => $this->getCollegeOrCompanyName(),
                                        "updated_on" => date('Y-m-d H:m:s')
			) );
			$this->db->From ( "users" );
			$this->db->Where ( array (
					"user_name" => $this->getUserName () 
			) );
			
                        
			if ($this->db->Update () == 'true') {
                            //echo $this->db->lastQuery ();die;
				return 1;
				
			} else {
				return 0;
			}
}
public function RetrieveInformation(){
    $this->db->From ( "users" );
			$this->db->Where ( array (
					"user_name" => $this->getUserName () 
			) );
			//return 
			return $this->db->Select ();
                        //echo $this->db->lastQuery ();die;
   
}
}
?>
