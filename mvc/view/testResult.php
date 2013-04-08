<?php
session_start();
$get=$_SESSION['get'];
//print_r($get);
foreach($get as $key=>$values)
	$correctAns[]=$get[$key]['answer'];

foreach ($correctAns as $key=>$values){
	$options="options".$key;
	echo "<pre>";
	echo 'Ques ;'.($key+1).$get[$key]['question_name']."</pre>";
	if($values==$_REQUEST[$options]){
		echo "<p style='color:green'>Correct Answer</p>";
	}
	else {
		
		echo "<p style='color:red'>Wrong Answer</p>"."<p style='color:green'>Correct Ans:$values</p>";
	}
}