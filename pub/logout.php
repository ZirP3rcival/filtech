<?php
ob_start();
include ('connection.php');
######################################
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$id=$_SESSION['id'];	
$sqlup = mysqli_query($con,"UPDATE `tblsinfo_data` SET login='N' WHERE id='$id'");
//destroy all session
unset($_SESSION['id']);
session_destroy();
$_SESSION['errmsg'] ="Account Logout Successfully!!!";
header("location:index.php");
exit;
?>