<?php
session_start();


include('header1.php');

echo "<br/>";
echo "<br/>";
echo "<br/>";
if(isset($_REQUEST['flag']) && $_REQUEST['flag']!=""){

if($_REQUEST['flag']==2){
	$_SESSION['flag']=2;
include ('../view/loginsuccess_teacher.php');

}
else if($_REQUEST['flag']==3){
	$_SESSION['flag']=3;
include ('../view/loginsuccess_student.php');

}
}

else{
	header("location:../index.php");
}
include('footer.php');

?>
