<?php

require_once 'model.php';

class result extends model {
	protected $id;        
	protected $test_id;
	protected $student_id;
		 protected $marks;     
	protected $percentage;
	protected $correctAns=array();
        protected $chosenAns=array();
        protected $noOfQuestions;
        public function setNoOfQuestions($noOfQuestions){
            $this->noOfQuestions=$noOfQuestions;
        }
        public function getNoOfQuestions(){
            return $this->noOfQuestions;
        }
        public function getMarks(){
            return $this->marks;
        }
        //protected $marks;
       // protected $percentage;
//        protected $studentName;
//        public function setStudentName($studentName){
//            $this->studentName=$studentName;
//        }
//public function getStudentName(){
//    return $this->studentName;
//}
    
        /**
	 * @return the $testInfo
	 */
	public function getCorrectAns() {
		return $this->correctAns;
	}

	/**
	 * @param multitype: $correctAns
	 */
	public function setCorrectAns($correctAns) {
		$this->correctAns = $correctAns;
	}
        public function getChosenAns() {
		return $this->chosenAns;
	}

	/**
	 * @param multitype: $correctAns
	 */
	public function setChosenAns($chosenAns) {
		$this->chosenAns = $chosenAns;
	}
        

	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $test_id
	 */
	public function getTest_id() {
		return $this->test_id;
	}

	/**
	 * @return the $student_id
	 */
	public function getStudent_id() {
		return $this->student_id;
	}

	/**
	 * @return the $marks
	 */
	

	/**
	 * @return the $percentage
	 */
	public function getPercentage() {
		return $this->percentage;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $test_id
	 */
	public function setTest_id($test_id) {
		$this->test_id = $test_id;
	}

	/**
	 * @param field_type $student_id
	 */
	public function setStudent_id($student_id) {
		$this->db->from("users");
	$this->db->fields(array("id"));
	$this->db->where(array("user_name"=>$student_id));
	$result=mysql_fetch_assoc($this->db->Select());
         $this->student_id=$result['id'];//die;
	}

	/**
	 * @param field_type $marks
	 */
	

	/**
	 * @param field_type $percentage
	 */
	
public function calculatemarks($negativeMarking){

$marks=0;
//print_r($this->chosenAns);
//print_r($this->correctAns);die;

foreach($this->chosenAns as $key=>$values){
//   echo "<br/>". $result[0]['answer'];
   //echo $this->chosenAns[$key]."=".$this->correctAns[$key];
   
   if(($this->chosenAns[$key]==$this->correctAns[$key])){
       
      $marks++;
   }
   else{
       
      $marks=$marks-$negativeMarking;
   }
  
}
$this->marks=$marks;
//echo $this->marks;die;
 $this->percentage=($this->marks*100)/$this->noOfQuestions;//die;
}
public function saveResult(){
    $this->db->from("result");
    $this->db->fields(array("test_id"=>$this->test_id,
        "student_id"=>$this->student_id,
        "marks"=>$this->marks,
        "percentage"=>$this->percentage
        
            ));
    $this->db->insert();
   // echo $this->db->lastQuery();
	
}
}
?>