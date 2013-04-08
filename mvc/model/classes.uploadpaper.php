<?php
require_once 'model.php';
class upload extends model{
    
	
	protected $_id = "";
	protected $_quessetid = "";
	protected $_userName = "";
	protected $_category = "";
	protected $_question = "";
	protected $_questionname = "";
	protected $_answer = "";
	protected $_option = array();
	    
	
        
        public function getId() {
		return $this->_id;
	}

	public function setId($_id) {
		$this->_id = $_id;
	}
	public function getQuessetid() {
		return $this->_quessetid;
	}

	public function setQuessetid($_quessetid) {
		$this->_quessetid = $_quessetid;
	}

	public function getUserName() {
		return $this->_userName;
	}

	public function getCategory() {
		return $this->_category;
	}

	public function getQuestion() {
		return $this->_question;
	}

	public function getQuestionname() {
		return $this->_questionname;
	}

	public function getAnswer() {
		return $this->_answer;
	}

	public function getOption() {
		$option = implode("|", $this->_option);
		return $option;
	}

	public function setUserName($_userName) {
		$this->_userName = $_userName;
	}

	public function setCategory($_category) {
		$this->_category = $_category;
	}

	public function setQuestion($_question) {
		$this->_question = $_question;
	}

	public function setQuestionname($_questionname) {
		$this->_questionname = $_questionname;
	}

	public function setAnswer($_answer) {
		$this->_answer = $_answer;
	}

	public function setOption($_option = array()) {
		$this->_option = $_option;
		
	}

	public function updateQuestionNumber(){
		$this->db->Fields( array(
				"no_questions" =>"`no_questions` + ". $this->getQuestion()
				
		) );
		$this->db->From( 'question_set' );
		$this->db->Where(array(
				"category_id" => $this->getCategory(),
				"teacher_name" => $this->getUserName(),
		));
		
		return $this->db->Update();
		//echo $this->db->lastQuery();die;
	}
    
	public function uploadPaper() {
    
		$this->db->Fields(array("teacher_id" => 1,"category_id" => $this->getCategory(),"no_questions" => $this->getQuestion(),"teacher_name" => $this->getUserName(), "created_on" => date('Y-m-d H:m:s') ) );
		$this->db->From ( 'question_set' );
		if ($this->db->Insert () == 'true') {
			return $this->db->LastInsertedId();
		} else {
			return 0;
		}
	
	}
	
	
	
	public function uploadQuestionAnswer() {
		
		$get=$this->getQuessetid();
		$this->db->Fields ( array ("question_id" => $get ,"question_name" => $this->getQuestionName (),"answer" => $this->getAnswer ()) );
		$this->db->From ( 'question_bank' );
		$this->db->Insert ();
		
		
		$getValue=$this->db->LastInsertedId();
		$this->db->Fields ( array ("id" => " ", "question_id" => $getValue ,"options" => $this->getOption() ));
		$this->db->From ( 'question_options' );
		
		
		
		if ($this->db->Insert () == 'true') {
			echo $this->db->lastquery();
			return 1;
		} else {
			return 0;
		}
			
	
	}
	
	
	public function viewUploadPaper() {
		$this->db->Fields ( array (
                                "id", 
				"teacher_name",
				"category_id",
				"no_questions",
				"created_on"
		) );
		$this->db->From ( 'question_set' );
		$this->db->Where ( array ("teacher_name" => $this->getUserName ()
		) );
		return $this->db->Select();
                //echo $this->db->lastQuery();die; 
			
	}
	
   

}
?>
