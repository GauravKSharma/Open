<?php
require_once 'model.php';
ini_set("display_error",'on');
class Register extends model {
    protected $id;
	protected $userName;
	protected $userType;
	protected $password;
	protected $firstName;
	protected $lastName;
	protected $address;
	protected $email;
	protected $phoneNo;
	protected $gender;
	protected $dob ;
        protected $collegeOrCompany;
        protected $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    
        public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getUserType() {
        return $this->userType;
    }

    public function setUserType($userType) {
        $this->userType = $userType;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
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

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getDob() {
        return $this->dob;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function getCollegeOrCompany() {
        return $this->collegeOrCompany;
    }

    public function setCollegeOrCompany($collegeOrCompany) {
        $this->collegeOrCompany = $collegeOrCompany;
    }

    public function RegisterUser(){
        
			$this->db->Fields ( array (
					"user_name" => $this->getUserName (),
					"user_type" => $this->getUserType (),
					"password" => $this->getPassword (),
					"firstname" => $this->getFirstName (),
					"lastname" => $this->getLastName (),
					"address" => $this->getAddress (),
					"created_on" => date('Y-m-d H:m:s'),
					"email" => $this->getEmail (),
					"phone_no" => $this->getPhoneNo(),
					"gender" => $this->getGender (),
					"college_or_company" => $this->getName () 
			) );
			$this->db->From ("users");
			
			if ($this->db->Insert()) {
                            
				return 1;
			} else {
                            //echo $this->db->lastQuery();die;
				return 0;
			}
		
    }
     public function lastQuery() {
        return $this->_query;
    }
    
    public function checkUnique(){
        $this->db->Fields ( array ( "user_name" ));
        $this->db->From ("users");
        $this->db->Where (array ("user_name" => $this->getUserName()));
        $this->db->Select();
        if ($this->db->resultArray()){
        return 1;
        }
        else{
           return 0;
        }
    }
  
}

?>
