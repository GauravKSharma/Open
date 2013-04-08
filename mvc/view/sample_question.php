<?php
session_start();

 $result=$_SESSION['test'];
 $count=count($result);



 static $key=0;
 $ques='';
 $key=$_GET['hdnCounter'];
 if($key<0)
 	$key=0;
 if($key<=$count-1){
        $ques.="Ques." . ($key+1) . " : ";
 	$ques.= $result[$key]['question_name']."<br/>";
 	$a=explode("|",$result[$key]['options']);
 	foreach($a as $key1=>$values1)
 	{	$key1++;
 		$ques.= "<br/><input type='radio' name=$key value=$key1>";
 		$ques.= "   ".$values1;
 	}
	
	
 	$ques.= "<br/><br/>";
 	$key++;
 } 
?>
<pre/>
<?php
echo $ques;

?>