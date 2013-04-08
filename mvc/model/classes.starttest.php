<?php


require_once 'model.php';
class starttest extends model{
	protected $testId;
	protected $category;
        protected $noOfQuestion;
       
public function setNoOfQuestion($noOfQuestion){
    $this->noOfQuestion;
}
public function getNoOfQuestion(){
    return $this->noOfQuestion;
}
        /**
	 * @return the $testId
	 */
	public function getTestId() {
		return $this->testId;
	}

	/**
	 * @param field_type $testId
	 */
	public function setTestId($testId) {
		$this->testId = $testId;
	}

	/**
	 * @return the $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param field_type $category
	 */
	public function setCategory($category) {
		$this->category = $category;
	}
public function fetchTestInfo(){
	$this->db->from("test");
	$this->db->fields(array());
	$this->db->where(array("id"=>$this->getTestId()));
	$result=mysql_fetch_assoc($this->db->Select());
      //  echo   $this->db->lastQuery();die;
	$this->setCategory($result['category_id']);
        $this->noOfQuestion=$result['no_of_questions'];
       return $result;
}



public function sample_question() {
	$this->db->Fields ( array (
			'question_name',
			'question_set.category_id',
			'category.category_name',
			'question_options.options',
                        'answer'
	) );
	$this->db->From ( "question_bank" );
	$this->db->join ( "question_set", "question_bank.question_id=question_set.id" );
	$this->db->join ( "category", " question_set.category_id=category.id " );
	$this->db->join ( "question_options", "  question_bank.id=question_options.question_id where category.id=$this->category limit $this->noOfQuestion" );
$this->db->where(array());
	// $this->db->Where(array(""=>$fname,"password"=>$lname));
	$this->db->Select ();
	//echo $this->db->lastQuery();die;
	// echo $this->db->lastQuery();
	return $this->db->resultArray ();
}
public function quesAns(){
	$this->db->Fields(array('answer'));
	$this->db->From('question_bank');
        //$this->db->join('',"");
	$this->db->where(array('question_id'=>1));
	$this->db->Select();
	echo $this->db->lastQuery();
	return $this->db->resultArray ();
}
}

?>