<?php
require_once 'model.php';
class feedback extends model{
    
     protected $feedback;
     protected $name;
     protected $email;

    
    public function getFeedback() {
        return $this->feedback;
    }

    public function setFeedback($feedback) {
        $this->feedback = $feedback;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
public function AddFeedback(){
    $this->db->Fields ( array (
					"feedback" => $this->getFeedback(),
					"email" => $this->getEmail(),
					"name" => $this->getName() 
			) );
			
			$this->db->From ( 'feedback' );
			$rowAffected= $this->db->Insert ();
			//echo $this->db->lastQuery();die;
			if ($rowAffected) {
				return 1;
			} else {
				return 0;
			}
}

}
?>
