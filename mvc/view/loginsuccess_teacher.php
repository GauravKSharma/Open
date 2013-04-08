<?php
if(isset($_SESSION['uname'])){
include 'header_teacher.php';
}
else{
echo "<h2 style='color:lightblue'>sorry you are logged out.</h2>";
header('location:../index.php');	
}
?>
