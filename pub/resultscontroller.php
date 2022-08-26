<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

$fgrd=$_REQUEST['fgrd']; 
$fsbj=$_REQUEST['fsbj']; 
$fscd=$_REQUEST['fscd']; 
$fcat=$_REQUEST['fcat']; 

$qst = mysqli_real_escape_string($con,$_POST['nqst']);
$qa1 = mysqli_real_escape_string($con,$_POST['nqa1']);
$qa2 = mysqli_real_escape_string($con,$_POST['nqa2']);
$qa3 = mysqli_real_escape_string($con,$_POST['nqa2']);
$qa4 = mysqli_real_escape_string($con,$_POST['nqa4']);
$qky = $_POST['nqky'];	
$id=$_REQUEST['id'];

if ($prc=='R') { 
	$sql="INSERT INTO ft2_asmt_enumeration(ascode, fid, grde, syr, qst, qky, asid) VALUES ('$fscd', '$fid', '$fgrd', '$syr', '$qst', '$qky', '$fsbj')";  
	$msg='Saving';
}

 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error '.$msg.' Assessment Content!!!'; 
    header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']=$msg.' Assessment Content Successfull!!!'; 
     header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
     exit;
  }   
?>