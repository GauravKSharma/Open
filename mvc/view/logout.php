<?php
session_start();
if(isset($_SESSION['uname']))
session_unset();
header('location:../index.php');
?>
