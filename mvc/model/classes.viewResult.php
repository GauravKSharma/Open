<?php
require_once 'model.php';
class result extends model{

        protected $_userName = "";
	
        
        public function getUserName() {
		return $this->_userName;
	}
	public function setUserName($_userName) {
		$this->_userName = $_userName;
	}
        
        
        
        public function viewResultStudent() {
            $this->db->Fields ( array (
					"marks",
					"percentage",
					"test_id" 
			) );
			$this->db->From ( "result" );
			$this->db->Where ( array ( "student_id = (Select id from users where user_name=" . $this->getUserName() .')'
					 
			) );
			
			return $this->db->Select();
			//echo $this->db->lastQuery();
		}
        public function viewTestId() {
            $this->db->Fields ( array (
					"id" 
			) );
			$this->db->From ( "test" );
			$this->db->Where ( array ( "teacher_id = (Select id from users where user_name=" . $this->getUserName() .')'
					 
			) );
			
			$this->db->Select();
                        //print_r ($this->db->resultArray());
                        
                        $this->db->Fields ( array (
                                        "users.firstname",
                                        "result.test_id",
					"result.marks",
					"result.percentage"
			) );
			$this->db->From ( "result" );
			$this->db->join ("users","users.id=result.student_id");
                        $this->db->Where ( array ( "result.test_id in (" . $this->db->resultArray() . " )") );
			
			$this->db->Select();
                        return $this->db->resultArray();
	
             }        
                
        }
?>
