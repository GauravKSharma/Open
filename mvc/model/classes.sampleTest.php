<?php
require_once 'model.php';
ini_set("display_error",'on');

class sampleTest extends model {
	protected $_userName = "";
	protected $_category = "";
        
        public function getCategory() {
		return $this->_category;
	}

	public function setCategory($_category) {
		$this->_category = $_category;
	}

        
	public function getUserName() {
		return $this->_userName;
	}

	public function setUserName($_userName) {
		$this->_userName = $_userName;
	}

	public function category(){
		$this->db->Fields ( array (
				"category_name",
				"id"
		) );
	$this->db->From ( 'category' );
	return $this->db->Select();
	}
	
	
	public function getAll(){
               $cat = $_REQUEST['value'];
		$this->db->Fields ( array (
				'question_bank.question_name',
				'question_options.options',
				'question_bank.answer'
				));
		$this->db->From ( "question_set" );
		$this->db->join ( "question_bank", "question_set.id=question_bank.question_id" );
		$this->db->join ( "category", " question_set.category_id=category.id " );
		$this->db->join ( "question_options", "question_bank.id=question_options.question_id where category.id=" . "'" . $cat . "'" . "and question_set.teacher_name='" . $this->getUserName()."'");
		$this->db->Select ();
                
                return $this->db->resultArray ();
                //echo $this->db->lastQuery();die;
             }
	
	
	public function retrieveQuestion(){
		$teacher = $_REQUEST['value'];
		$this->db->From ( "question_set" );
		$this->db->join ( "question_bank", "question_set.id=question_bank.question_id" );
		$this->db->join ( "category", " question_set.category_id=category.id " );
		$this->db->join ( "question_options", "question_bank.id=question_options.question_id where category.id=1 and question_set.teacher_name ='$teacher' limit 1" );
		$this->db->Select ();
	
		return $this->db->resultArray ();
	}
	
	public function retrieveTeacher(){
		$cat = $_REQUEST['value'];
		
		$this->db->Fields ( array (
				'question_set.teacher_name'
			) );
		$this->db->From ( "question_set" );
		$this->db->join ( "question_bank", "question_set.id=question_bank.question_id" );
		$this->db->join ( "category", " question_set.category_id=category.id " );
		$this->db->join ( "question_options", "  question_bank.id=question_options.question_id where question_set.category_id=$cat" );
		$this->db->groupby( "question_set.teacher_name" );
		$this->db->Select ();
		
		
		
		return $this->db->resultArray ();
	}
}

?>