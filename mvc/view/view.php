<?php
include '../lang/constant.php';
session_start();



if(isset($_REQUEST['msg'])){
    echo '<script type="text/javascript">alert("Link sent successfully"); </script>';
}
unset($_REQUEST['msg']);

include('header1.php');

echo "<br/>";
echo "<br/>";
echo "<br/>";
if(isset($_REQUEST['flag'])){

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
	header("location:../mainpage.php");
}

include('footer1.php');
?>
