<?php
ini_set("display_error","1");
//session_start();
if(isset($_SESSION['uname'])){
include 'header_student.php';
}
else{
echo "<h2 style='color:lightblue'>sorry you are logged out.</h2>";
header('location:../index.php');	
}
?>
