<?php

ini_set("display_errors", "1");

/**
 * 
 * @author root
 * @access
 * @package DB
 *
 */
class DBConnection {

    private static $instance;
    private static $_host = "localhost";
    private static $_user = "root";
    private static $_password = "";
    private static $_database = "oes";
    private $_tableName = "";
    private $_join = "";
    private $_where = "";
    private $_between = "";
    private $_having = "";
    private $_orderBy = "";
    private $_groupBy = "";
    private $_keys = array();
    private $_values = array();
    private $_insertId;
    private $_errorLog = "";
    private $_query = "";
    private $_result = "";

    private function __construct() {
        
    }

    public static function Connect() {
        if (is_null(DBConnection::$instance)) {
            
            $db = mysql_connect(self::$_host, self::$_user, self::$_password);
            if ($db) {
                mysql_select_db(self::$_database, $db);
                self::$instance = new DBConnection();
            }
        }
        return self::$instance;
    }

    private function validConnection() {
        if (is_null(DBConnection::$instance)) {
            echo "Could not connected!";
            exit();
        }
    }

    public function Fields($data = array()) {
        $count = count($data);
        if ($count > 0) {
		$this->_keys=array();
		$this->_values=array();
            foreach ($data as $key => $value) {

                if (!empty($value)) {
                    $this->_keys[] = $key;
                    $this->_values[] = $value;
                }
            }
        }
		return $this;
    }

    public function From($value) {
        if (!empty($value)) {
            $this->_tableName = $value;
        }
		return $this;
    }
    
    public function Between($data,$data1,$operator = "AND") {
        	
        $this->_between .= " BETWEEN ".$data ." ".$operator." ".$data1;
	return $this;		
     
    }
    /*
    public function Having() {
        	
        $this->_between .= " BETWEEN ".$data ." ".$operator." ".$data1;
	return $this;		
     
    }*/
    
    
    public function Join($joinTable, $condition, $type="INNER"){
		if(!empty($this->_tableName) && !empty($joinTable) && !empty($condition) && !empty($type)){
		
			$this->_join .= strtoupper(" ".$type." JOIN ").$joinTable." "; 
			$this->_join .= " ON ".$condition." ";
		}
	}
    public function Where($data = array(), $raw = false, $operator = "AND") {
        $count = count($data);
        if ($count > 0) {

            $index = 0;
            foreach ($data as $key => $value) {
			
			
              
                if ($index >= 1 || !empty($this->_where)) {
						$ope  = strtoupper($operator);
						if(in_array($ope,array("AND","OR"))){
							$this->_where .= " $ope ";
						}
                }
				
				if($raw){
						$this->_where .= " ".$value;
						break;
				}
				
				if (is_string($value)) {
                    $value = " '$value' ";
                }

				
				$op = array("=",">","<",">=","<=");
				$opMatch = false;
				for($i = 0;$i < count($op);$i++){
				
					if(strpos($key, $op[$i]) > 0){
						$opMatch  = true;
						break;
					} 
				}
				if($opMatch){
					$this->_where .= " $key $value";
				} else {
					$this->_where .= " $key =  $value";
				}
                $index++;
            }
        }
		return $this;
    }
	
	public function Like($key,$val, $operator = "AND"){
	        
		if(!empty($key) && !empty($val)){
			if(strlen($this->_where) == 0){
				$this->_where .=  $key." LIKE \"%".$val."%\"";
			} else {
				$ope  = strtoupper($operator);
				if(in_array($ope,array("AND","OR"))){
					$this->_where .= " ".$ope ." ". $key." LIKE \"%".$val."%\"";
				}
			}
		}
		return $this;
	}
	
	public function OrderBy($string = ""){
		if(!empty($string)){
			$this->_orderBy = " ORDER BY " .$string;
		}
		return $this;
	}
	public function GroupBy($string = ""){
		if(!empty($string)){
			$this->_groupBy = " GROUP BY ".$string;
		}
		return $this;
	}
	
	public function Having($string= "",$data,$operator= "="){
		if(!empty($string)){
		    
		    
			$this->_having = " HAVING ".$string. $operator .$data;
		}
		return $this;
	}
	
	
	public function Start(){
	    $this->_query = "START TRANSACTION";
	    $this->_result = mysql_query($this->_query);
            $bool = true;
            return $bool;
	}
	
	public function Rollback(){
	    $this->_query = "ROLLBACK";
	    $this->_result = mysql_query($this->_query);
            $bool = true;
            return $bool;
	}
	
	public function Commit(){
	    $this->_query = "COMMIT";
	    $this->_result = mysql_query($this->_query);
            $bool = true;
            return $bool;
	}
	
	public function LastInsertedId(){
		return (mysql_insert_id());
	}
	
    public function Select() {
        $bool = false;
        $this->_query = "";
        
        $fields = " * ";

        if (count($this->_values) > 0) {
            $fields = implode(', ', $this->_values);
        }

      

        $table = $this->_tableName;

        if (!empty($table)) {
			$this->_query .= "SELECT ";
			$this->_query .= $fields;
			
            $this->_query .= " FROM " . $this->_tableName. $this->_join;
            $where = $this->_where;

            if (!empty($where)) {
                $this->_query .= " WHERE " . $where;
            }
	    if (!empty($this->_between)) {
                $this->_query .= $this->_between;
            }
			if (!empty($this->_groupBy)) {
                $this->_query .= $this->_groupBy;
            }
	    if (!empty($this->_having)) {
                $this->_query .= $this->_having;
            }
			if (!empty($this->_orderBy)) {
                $this->_query .= $this->_orderBy;
            }
            $this->_result = mysql_query($this->_query);
            $bool = true;
        }
	//echo $this->_query;
	//die;
        $this->_values="";
        $this->_join="";
        $this->_where="";
    return $this->_result;
    }
    

    public function Insert() {
        $bool = false;

        $this->_query = "";
       

        $countKey = count($this->_keys);
        $countValue = count($this->_values);
        $data = array();

        if (($countKey > 0 && $countValue > 0) && $countKey == $countValue) {
			$this->_query .= "INSERT INTO  ";
            $fields = array();
            $valuesData = array();

            for ($i = 0; $i < $countKey; $i++) {

                $val = $this->_values [$i];
                if (is_string($val)) {
                    $val = " \"$val\" ";
                }
                $valuesData [] = $val;
            }

            $fields = implode(", ", $this->_keys);
            $values = implode(", ", $valuesData);

            $table = $this->_tableName;

            if (!empty($table)) {
                $this->_query .= "$table ($fields) values($values)";

                $sql = mysql_query($this->_query);

                $this->_insertId = mysql_insert_id();
                if ($this->_insertId > 0) {
                    $bool = true;
                }
            }
        }
        
    //echo ($this->_query);
	//echo "<br/>";die;
        return $bool;
    }

    public function Update() {
        $bool = false;

        $this->_query = "";
       

        $countKey = count($this->_keys);
        $countValue = count($this->_keys);
        $data = array();

        if (($countKey > 0 && $countValue > 0) && $countKey == $countValue) {
			$this->_query .= "UPDATE ";
            $fields = "";

            for ($i = 0; $i < $countKey; $i++) {
                $val = $this->_values [$i];
                if (is_string($val)&&!strpos($val,"+")) {
                    $val = " '$val' ";
                }
                $data [] = "`" . $this->_keys[$i] . "` = " . $val;
            }

            if (count($data) > 0) {
                $fields .= " SET " . implode(", ", $data);
            }

            $table = $this->_tableName;

            if (!empty($table) && strlen($fields) > 0) {
                $this->_query .= $this->_tableName . $fields;
                $where = $this->_where;
                if (!empty($where)) {
                    $this->_query .= " WHERE " . $where;
                }

                $sql = mysql_query($this->_query);
                $bool = true;
            }
        }

        return $bool;
    }

    public function Delete() {
        $bool = false;

        $this->_query = "";
      

        $table = $this->_tableName;
        $where = $this->_where;

        if (!empty($table) && strlen($where) > 0) {
			$this->_query .= "DELETE FROM ";
            $this->_query .= $this->_tableName;

            if (!empty($where)) {
                $this->_query .= " WHERE " . $where;
            }

            $sql = mysql_query($this->_query);
            $bool = true;
        }

        return $bool;
    }

    public function lastQuery() {
        return $this->_query;
    }

    public function affectedRows() {
        return mysql_affected_rows();
    }

    public function lastInsertId() {
        return $this->_insertId;
    }

    private function _keys($data = array()) {
        $this->_keys = $data;
    }

    private function _value($data = array()) {
        $this->_values = $data;
    }

    public function resultArray() {
        $records = array();
        if (!empty($this->_result)) {
// 			$records = mysql_fetch_assoc ( $this->_result );
            while ($row = mysql_fetch_assoc($this->_result)) {
                $records[] = $row;
            }
        }
        return $records;
    }

}
/*
$db = DBConnection::Connect();
// $db->fields(array("firstname"=>"deepak1","lastname"=>"gupta1"));
// $db->where(array("id"=>"42"));
$db->from("users");
$db->select();
// $db->insert();
// $db->update();
// $db->delete();

//echo $db->lastQuery();
$result = $db->resultArray();
echo "<pre/>";
print_r($result);

*/
