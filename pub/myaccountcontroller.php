<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$page=strtolower($_SESSION['account']);

$syr=$_SESSION['syr'];
$qtr=$_SESSION['qtr'];
$id=$_SESSION['id'];
/*********************************  Update User Record ********************************/
$T0 = mysqli_real_escape_string($con,$_POST['pulnme']);
$T1 = mysqli_real_escape_string($con,$_POST['pufnme']);
$T2 = mysqli_real_escape_string($con,$_POST['pumnme']);
$pcno = mysqli_real_escape_string($con,$_POST['pucno']);
	
$T3=preg_replace("/[^0-9]/", "", $pcno);	
$T7 = mysqli_real_escape_string($con,$_POST['pusqs']);
$T8 = mysqli_real_escape_string($con,$_POST['pusqa']);
$T9 = $T0.', '.$T1.' '.$T2;
	
$T11 = mysqli_real_escape_string($con,$_POST['peadd']);
$T12 = mysqli_real_escape_string($con,$_POST['pusr']);
$T13 = mysqli_real_escape_string($con,$_POST['ppwd']);	
$picr = mysqli_real_escape_string($con,$_POST['picr']);	

$grde = mysqli_real_escape_string($con,$_POST['zgrd']);	
$sec = mysqli_real_escape_string($con,$_POST['zsec']);

$thm1 = mysqli_real_escape_string($con,$_POST['thm1']);
$thm2 = mysqli_real_escape_string($con,$_POST['thm2']);

$sql="UPDATE ft2_users_account SET lnme='$T0', fnme='$T1', mnme='$T2', cno='$T3', sqt='$T7',sqa='$T8', actv='Y', alyas='$T9',eadd='$T11',usr='$T12',pwd=MD5('$T13'), ploc='$picr', grde='$grde', sec='$sec', thm1='$thm1', thm2='$thm2' where id='$id'";  

 if ($con->query($sql) === FALSE) //oop approach //(!mysqli_query($con,$sql)) =procedural approach
  { $_SESSION['errmsg']='Error Updating User Account!!!<br>Please Check All Entries Properly....'; 
    session_write_close();
    header("location:$page?page=my_account");
    exit;
  }
 else  
   { $_SESSION['errmsg']='User Account Record Updated Successfully!'; 
     session_write_close();
	 header("location:$page?page=my_account");
     exit;
  } 