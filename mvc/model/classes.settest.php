<?php

require_once 'model.php';

class settest extends model{
	 protected $id ;  
	 protected $teacher_id;     
	 protected $created_on;     
	 protected $no_of_questions;              
	 protected $time;    
	 protected $testtype;    
	 protected $category_id;
	 protected $teacher_name;
	 protected $negativeMarking;
	 protected $link;
	/**
	 * @return the $link
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param field_type $link
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @return the $negativeMarking
	 */
	public function getNegativeMarking() {
		return $this->negativeMarking;
	}

	/**
	 * @param field_type $negativeMarking
	 */
	public function setNegativeMarking($negativeMarking) {
		$this->negativeMarking = $negativeMarking;
	}

	/**
	 * @return the $testtype
	 */
	public function getTesttype() {
		return $this->testtype;
	}

	/**
	 * @return the $teacher_name
	 */
	public function getTeacher_name() {
		return $this->teacher_name;
	}

	/**
	 * @param field_type $testtype
	 */
	public function setTesttype($testtype) {
		$this->testtype = $testtype;
	}

	/**
	 * @param field_type $teacher_name
	 */
	public function setTeacher_name($teacher_name) {
		$this->teacher_name = $teacher_name;
	}

	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $teacher_id
	 */
	public function getTeacher_id() {
		return $this->teacher_id;
	}

	/**
	 * @return the $created_on
	 */
	public function getCreated_on() {
		return $this->created_on;
	}

	/**
	 * @return the $no_of_students
	 */
	public function getNo_of_questions() {
		return $this->no_of_questions;
	}

	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return the $time
	 */
	public function getTime() {
		return $this->time;
	}

	/**
	 * @return the $category_id
	 */
	public function getCategory_id() {
		return $this->category_id;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $teacher_id
	 */
	public function setTeacher_id($teacher_id) {
		$this->teacher_id = $teacher_id;
	}

	/**
	 * @param field_type $created_on
	 */
	public function setCreated_on($created_on) {
		$this->created_on = $created_on;
	}

	/**
	 * @param field_type $no_of_students
	 */
	public function setNo_of_questions($no_of_questions) {
		$this->no_of_questions = $no_of_questions;
	}

	/**
	 * @param field_type $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * @param field_type $time
	 */
	public function setTime($time) {
		$this->time = $time;
	}

	/**
	 * @param field_type $category_id
	 */
	public function setCategory_id($category_id) {
		$this->category_id = $category_id;
	}
	
	public function teacherId(){
		$this->db->from("users");
		$this->db->fields(array("id"));
		$this->db->Where ( array (
				"user_name" => $this->getTeacher_name()));
		$a=$this->db->Select();
		$b=mysql_fetch_assoc($a);
		
		//echo $this->db->lastQuery();
		//print_r($a);
		$this->setTeacher_id($b['id']);
		//echo $this->getTeacher_id();
	}
	
	public function saveTest(){
		$this->db->from("test");
		$this->db->fields(array("teacher_id"=>$this->getTeacher_id(),
				"no_of_questions"=>$this->getNo_of_questions(),
				"time"=>$this->getTime(),
				"category_id"=>$this->getCategory_id(),
				"testtype"=>$this->getTesttype(),
				"negative_marking"=>$this->getNegativeMarking(),
				"created_on" => date('Y-m-d H:m:s')
		));
		$this->db->insert();
		//echo $this->db->lastQuery();
		$this->id= $this->db->lastInsertId();
		
	}
	
	public function generateLink(){
	$this->link="http://localhost/Open/trunk/mvc/controller/controller.php?method=startTest&testid=".base64_encode($this->id);
	return $this->link;
	}
	
   
}

?>