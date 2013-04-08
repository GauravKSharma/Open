<?php
ini_set ( "display_errors", "1" );
/**
 *
 * @author Deepak K. Gupta
 * @access Public
 */

require_once 'singleton.php';
abstract class model {
	protected $db = "";
	function __construct() {
		$this->db = DBConnection::Connect ();
	}
}
class MyModel extends model {
	private $_id = "";
	private $_userName = "";
	private $_utype = "";
	private $_password = "";
	private $_firstname = "";
	private $_lastname = "";
	private $_address = "";
	private $_email = "";
	private $_phone = "";
	private $_gender = "";
	private $_name = "";
	private $_dob = "";
	private $_feedback = "";
	private $_category = "";
	private $_question = "";
	private $_questionname = "";
	private $_answer = "";
	private $_option = "";
	private $_time = "";
	
	
	public function getId() {
		return $this->_id;
	}
	public function getUserName() {
		return $this->_userName;
	}
	public function getUserType() {
		return $this->_utype;
	}
	public function getPassword() {
		return $this->_password;
	}
	public function getFirstName() {
		return $this->_firstname;
	}
	public function getLastName() {
		return $this->_lastname;
	}
	public function getAddress() {
		return $this->_address;
	}
	public function getEmail() {
		return $this->_email;
	}
	public function getPhone() {
		return $this->_phone;
	}
	public function getGender() {
		return $this->_gender;
	}
	public function getName() {
		return $this->_name;
	}
	public function getDOB() {
		return $this->_dob;
	}
	public function getFeedBack() {
		return $this->_feedback;
	}
	public function getCategory() {
		return $this->_category;
	}
	public function getQuestion() {
		return $this->_question;
	}
	public function getQuestionName() {
		return $this->_questionname;
	}
	public function getAnswer() {
		return $this->_answer;
	}
	public function getOption() {
		return $this->_option;
	}
	public function getTime() {
		return $this->_time;
	}
	
	
	
	
	public function setOption($value = "") {
		$this->_option = $value;
	}
	public function setAnswer($value = "") {
		$this->_answer = $value;
	}
	public function setQuestionName($value = "") {
		$this->_questionname = $value;
	}
	public function setQuestion($value = "") {
		$this->_question = $value;
	}
	public function setCategory($value = "") {
		$this->_category = $value;
	}
	public function setId($value = "") {
		$this->_id = $value;
	}
	public function setUserName($value = "") {
		$this->_userName = $value;
	}
	public function setUserType($value = "") {
		$this->_utype = $value;
	}
	public function setPassword($value = "") {
		$this->_password = $value;
	}
	public function setFirstName($value = "") {
		$this->_firstname = $value;
	}
	public function setLastName($value = "") {
		$this->_lastname = $value;
	}
	public function setAddress($value = "") {
		$this->_address = $value;
	}
	public function setEmail($value = "") {
		$this->_email = $value;
	}
	public function setPhone($value = "") {
		$this->_phone = $value;
	}
	public function setGender($value = "") {
		$this->_gender = $value;
	}
	public function setName($value = "") {
		$this->_name = $value;
	}
	public function setDOB($value = "") {
		$this->_dob = $value;
	}
	public function setFeedBack($value) {
		$this->_feedback = $value;
	}
	public function setTime($value) {
		$this->_time = $value;
	}
	
	
	public function FindUsers() {
		
		$table = $_REQUEST ['tablename'];
		
		if ($table == 't') {
		 $this->db->Fields ( array (
					"teacher_user",
					"category_id",
					"no_questions" 
			) );
		 $this->db->From ( $table );
		 $this->db->Where ( array (
					"teacher_user" => $this->getUserName () 
			) );
		        return $this->db->Select();
			
		}
		
		if ($table == 'login') {
			$this->db->Fields ( array (
					"user_name",
					"password",
					"user_type" 
			) );
			$this->db->From ( $table );
			$this->db->Where ( array (
					"user_name" => $this->getUserName (),
					"password" => $this->getPassword () 
			) );
			
			return $this->db->Select();
			
		}
		
		if ($table == 'users') {
			// $this->db->Fields(array("user_name","password","user_type"));
			$this->db->From ( $table );
			$this->db->Where ( array (
					"user_name" => $this->getUserName () 
			) );
			return $this->db->Select ();
		}
	}
	
	public function AddUser() {
		$table = $_REQUEST ['tablename'];
		$value = $_REQUEST ['value'];
		
		if ($table == 'users') {
			$this->db->Fields ( array (
					"user_name" => $this->getUserName (),
					"user_type" => $this->getUserType (),
					"password" => $this->getPassword (),
					"firstname" => $this->getFirstName (),
					"lastname" => $this->getLastName (),
					"address" => $this->getAddress (),
					"created_on" => 'date(Y-m-d H:m:s)',
					"email" => $this->getEmail (),
					"phone_no" => $this->getPhone (),
					"gender" => $this->getGender (),
					"college_or_company" => $this->getName () 
			) );
			$this->db->From ( $table );
			// $this->db->Insert();
			// echo $this->db->lastQuery();
			if ($this->db->Insert () == 'true') {
				return 1;
			} else {
				return 0;
			}
		}
		
		if ($table == 'feedback') {
			$this->db->Fields ( array (
					"feedback" => $this->getFeedback (),
					"email" => $this->getEmail (),
					"name" => $this->getFirstName () 
			) );
			
			$this->db->From ( $table );
			$y = $this->db->Insert ();
			
			if ($y == 'true') {
				return 1;
			} else {
				return 0;
			}
		}
		if(!$this->getAnswer()){
		    
		$this->db->Fields(array("teacher_id" => 1,"category_id" => $this->getCategory(),"time" => $this->getTime(),"no_questions" => $this->getQuestion(),"teacher_user" => $this->getUserName() ) );
			$this->db->From ( 't' );
			//$this->db->Insert ();
			//echo $this->db->lastQuery ();die;
		
			
			if ($this->db->Insert () == 'true') {
				return 0;
			} else {
			        return 1;
			}
		
		}
		
		if ($table == 't') {	
		$this->db->Fields ( array ("question_id" => 1,"question_name" => $this->getQuestionName (),"answer" => $this->getAnswer ()) );
			$this->db->From ( 't1' );
			$this->db->Insert ();
			
		$this->db->Fields ( array ("question_id" => 1,"options" => $this->getOption ()) );
			$this->db->From ( 't5' );
			$this->db->Insert ();
			
			if ($this->db->Insert () == 'true') {
				return 0;
			} else {
			        return 1;
			}
			
		    
	        }
	

		
	}
	
	public function UpdateUser() {
		$table = $_REQUEST ['tablename'];
		$value = $_REQUEST ['value'];
		
		if ($table == 'login') {
			$this->db->Fields ( array (
					"password" => $this->getPassword () 
			) );
			$this->db->From ( $table );
		}
		
		if ($table == 'users' && $value == 'profileupdate') {
			$this->db->Fields ( array (
					"firstname" => $this->getFirstName (),
					"lastname" => $this->getLastName (),
					"address" => $this->getAddress (),
					"email" => $this->getEmail (),
					"college_or_company" => $this->getName () 
			) );
			$this->db->From ( $table );
			$this->db->Where ( array (
					"user_name" => $this->getUserName () 
			) );
			$this->db->Update ();
			if ($this->db->Update () == 'true') {
				header ( "location:../view/view.php?flag=3" );
			} else {
				return 0;
			}
		}
		
		if ($table == 'users' && $value == 'changepassword') {
			$this->db->Fields ( array (
					"password" => $this->getPassword () 
			) );
			$this->db->From ( $table );
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
	}
	public function DeleteUser() {
		$this->db->From ( "hello" );
		$this->db->Where ( array ("id" => 11) );
		$this->db->Delete ();
		echo $this->db->lastQuery ();
	}
	public function Start() {
		$this->db->Start ();
	}
	public function Rollback() {
		$this->db->Rollback ();
	}
	public function Commit() {
		$this->db->Commit ();
	}
	public function resultlogin() {
		return $this->db->resultArray ();
	}
	public function sample_question($cat) {
		$this->db->Fields ( array (
				'question_name',
				'question_set.category_id',
				'category.category_name',
				'question_options.option' 
		) );
		$this->db->From ( "question_bank" );
		$this->db->join ( "question_set", "question_bank.question_id=question_set.id" );
		$this->db->join ( "category", " question_set.category_id=category.id " );
		$this->db->join ( "question_options", "  question_bank.id=question_options.question_id where category.id=$cat" );
		
		// $this->db->Where(array(""=>$fname,"password"=>$lname));
		$this->db->Select ();
		// echo $this->db->lastQuery();
		// echo $this->db->lastQuery();
		return $this->db->resultArray ();
	}
        public function quesAns(){
            $this->db->Fields(array('answer'));
            $this->db->From('question_bank');
            $this->db->where(array('question_id'=>1));
            $this->db->Select();
            echo $this->db->lastQuery();
            return $this->db->resultArray ();
        }
}
// $obj = new MyModel();
// $obj->Start();
// $obj->AddUser();
// $obj->UpdateUser();
// $obj->DeleteUser();
// $obj->FindUsers();
// $obj->Commit();
// $obj->Rollback();

?>