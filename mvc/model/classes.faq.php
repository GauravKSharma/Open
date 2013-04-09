<?php
require_once 'model.php';
class faqResponse extends model {
	
	protected $_username = '';
	protected $_response = '';
	protected $_faqid = '';
	protected $_faqquestion = '';
	protected $_category = '';

	public function getCategory() {
		return $this->_category;
	}
	
	public function setCategory($_category) {
		$this->_category = $_category;
	}

	public function getFaqquestion() {
		return $this->_faqquestion;
	}

	public function setFaqquestion($_faqquestion) {
		$this->_faqquestion = $_faqquestion;
	}

	public function getFaqid() {
		return $this->_faqid;
	}

	public function setFaqid($_faqid) {
		$this->_faqid = $_faqid;
	}

	public function getResponse() {
		return $this->_response;
	}

	public function setResponse($_response) {
		$this->_response = $_response;
	}

	public function getUsername() {
		return $this->_username;
	}

	public function setUsername($_username) {
		$this->_username = $_username;
	}

	
	
	public function viewFaq() {
		$value = $_REQUEST ['value'];
		$ress = '';
		$this->db->fields ( array (
                "users.firstname",
				"faq.faq_question",
				"faq.category_id" 
		) );
                $this->db->From ( "faq" );
		$this->db->join ( "users","faq.user_id = users.id");
		$this->db->Where ( array ("category_id" => $value) );
		
	
		$resul = $this->db->Select ();
               // echo $this->db->lastQuery();die;
		
		while ( $row = mysql_fetch_assoc ( $resul ) ) {
			$ress .= "<img src='../images/400-myprofile.png' height=50px width=60px>";
			$ress .= "<b>";
                        $ress .= $row ['firstname'];
			$ress .= "</b>";
                        $ress .= "<br/>";
                        $ress .= "Ques : ";
                        $ress .= $row ['faq_question'];
			$faqid = $row ['category_id'];
			$this->db->fields ( array (
					"response" 
			) );
			$this->db->from ( "faq_response where faq_id=$faqid" );
			$sql = $this->db->Select ();
			//echo $this->db->lastQuery();die;
			$ress .= "<br/>";
			$ress .= "<br/>";
			$ress .= "<br/>";
			$ress .= "Reply:";
			$ress .= "<br/>";
			while ( $row1 = mysql_fetch_assoc ( $sql ) ) {
				$ress .= $row1 ['response'];
				$ress .= "<br/>";
			}
			$ress .= "<br/>";
			$ress .= "<br/>";
			$ress .= "<form action='../controller/controller.php?method=response' method='post'> ";
			$ress .= "<textarea name='message' rows='8' cols='40' required='required'></textarea><br/>";
			$ress .= "<input type='hidden' value=" .$row['category_id'] . " name='faqId'>";
			$ress .= "<pre>";
			$ress .= "<input type='submit' value='Add Comments'>";
			$ress .= "</pre>";
			$ress .= "</form> ";
			
		}
		//echo $res;die;
		return $ress;
	}
	
	
	public function postResponse() {
		$this->db->Fields ( array (
				"id"
				));
		$this->db->From ( 'users' );
		$this->db->Where (array (
				"user_name" => $this->getUsername()
		));
		$this->db->Select ();
		$value = $this->db->resultArray();
		//echo $this->db->lastQuery();
		
		
		
		
		$this->db->Fields ( array (
				"faq_id" => $this->getFaqid(),
				"response" => $this->getResponse(),
				"user_id" => ($value[0]['id'])
		) );
			
		$this->db->From ( 'faq_response' );
		$rowAffected= $this->db->Insert ();
		if ($rowAffected) {
			return 1;
		} else {
			return 0;
		}
	}
	
	
	public function postQuestion() {
		$this->db->Fields ( array (
				"id"
		));
		$this->db->From ( 'users' );
		$this->db->Where (array (
				"user_name" => $this->getUsername()
		));
		$this->db->Select ();
		$value = $this->db->resultArray();
		
		
		$this->db->Fields ( array (
				"user_id" => ($value[0]['id']),
				"faq_question"=>$this->getFaqquestion(),
				"category_id" =>$this->getCategory()
		) );
			
		$this->db->From ( 'faq' );
		
		if ($this->db->Insert ()) {
			return 1;
			
		} else {
			return 0;
			
		}
		
	}
}

?>
