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
$qky = strtoupper(mysqli_real_escape_string($con,$_POST['nqky']));	

if ($prc=='N') {
$sql="INSERT INTO ft2_asmt_multiplechoice(ascode, fid, grde, syr, qst, qa1, qa2, qa3, qa4, qky, asid) VALUES ('$fscd', '$fid', '$fgrd', '$syr', '$qst', '$qa1', '$qa2', '$qa3', '$qa4', '$qky', '$fsbj')";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Saving New Assessment Content!!!'; 
    header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Assessment Content Saved Successfully!!!'; 
     header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
     exit;
  }   
}

if ($prc=='U') {		
$id=$_REQUEST['id'];
$sql="UPDATE ft2_asmt_multiplechoice SET ascode='$fscd', fid='$fid', grde='$fgrd', syr='$syr', qst='$qst', qa1='$qa1', qa2='$qa2', qa3='$qa3', qa4='$qa4', qky='$qky', asid='$fsbj' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Saving New Assessment Content!!!'; 
    header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Assessment Content Saved Successfully!!!'; 
     header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
     exit;
  }    
}

if ($prc=='D') {	
$id=$_REQUEST['id'];	
$sql="DELETE FROM ft2_asmt_multiplechoice WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Deleting Announcement Record!!!'; 
    header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
    exit;
  }
 else  
   {
	 $_SESSION['errmsg']='Announcement Record Deleted Successfully!!!'; 
     header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
     exit;
  }   
}
?>