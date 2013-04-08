
<?php 
//session_start();
//echo "hiii";
require_once("../model/model.php");
//echo "hiii";
$obj1 = new MyModel();
//echo "<pre/>";
$cat=$_GET['hdnCounter1'];
$result=$obj1->sample_question($cat);
$count=count($result);
//$_SESSION['count']=$count;
echo "no of element" . $count ."<br/><br/><br/>";
//print_r($result);
//echo $result[0]['question_name'];
//echo "hiiii";
static $key=0;
$key=$_GET['hdnCounter'];
if($key<0)
	$key=0;
if($key<=$count-1){
   echo  $key+1 . " ->";
	echo $result[$key]['question_name']."<br/>";
	$a=explode("|",$result[$key]['option']);
	foreach($a as $key1=>$values1)
	{	$key1++;
		echo "<br/>" .$key1;
		echo " -> ".$values1;
	}
	
	
	echo "<br/><br/>";
	$key++;
}


?>



<!-- string substr ( string $string , int $start [, int $length ] ) -->
