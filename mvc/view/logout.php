<?php
session_start();
if(isset($_SESSION['uname']))
unset($_SESSION['uname']);
header('location:http://localhost/Open/trunk/mvc/mainpage.php');
?>
