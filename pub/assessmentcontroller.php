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

if ($prc=='D') {			
$sql="INSERT INTO ft2_asmt_multiplechoice(ascode, fid, grde, syr, qst, qa1, qa2, qa3, qa4, qky, asid) VALUES ('$fscd', '$fid', '$fgrd', '$syr', '$qst', '$qa1', '$qa2', '$qa3', '$qa4', '$qky', '$fsbj')";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Saving New Assessment Content!!!'; 
    header("location:faculty?page=assessment_records");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Assessment Content Saved Successfully!!!'; 
     header("location:faculty?page=assessment_records");
     exit;
  }   
}

if ($prc=='U') {			
$sql="UPDATE ft2_announcements_data SET title='$T0', info='$T1', ploc='$T2' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Updating Announcement Record!!!'; 
    header("location:faculty?page=assessment_records");
    exit;
  }
 else  
   {
	 $_SESSION['errmsg']='Announcement Record Updated Successfully!!!'; 
     header("location:faculty?page=assessment_records");
     exit;
  }   
}

if ($prc=='D') {			
$sql="DELETE FROM ft2_announcements_data WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Deleting Announcement Record!!!'; 
    header("location:faculty?page=assessment_records");
    exit;
  }
 else  
   {
	 $_SESSION['errmsg']='Announcement Record Deleted Successfully!!!'; 
     header("location:faculty?page=assessment_records");
     exit;
  }   
}
?>