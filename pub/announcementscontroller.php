<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

$T0 = mysqli_real_escape_string($con,$_POST['title']);
$T1 = mysqli_real_escape_string($con,$_POST['info']);
$T2 = mysqli_real_escape_string($con,$_POST['picr']);
$id = mysqli_real_escape_string($con,$_REQUEST['id']);

if ($prc=='S') {			
$sql="INSERT INTO tblnews_data(title, info, ploc) VALUES ('$T0','$T1','$T2')";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Saving New Announcement Record!!!'; 
    header("location:admin?page=announcements");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='New Announcement Record Saved Successfully!!!'; 
     header("location:admin?page=announcements");
     exit;
  }   
}

if ($prc=='U') {			
$sql="UPDATE tblnews_data SET title='$T0', info='$T1', ploc='$T2' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Updating Announcement Record!!!'; 
    header("location:admin?page=announcements");
    exit;
  }
 else  
   {
	 $_SESSION['errmsg']='Announcement Record Updated Successfully!!!'; 
     header("location:admin?page=announcements");
     exit;
  }   
}

if ($prc=='D') {			
$sql="DELETE FROM tblnews_data WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Deleting Announcement Record!!!'; 
    header("location:admin?page=announcements");
    exit;
  }
 else  
   {
	 $_SESSION['errmsg']='Announcement Record Deleted Successfully!!!'; 
     header("location:admin?page=announcements");
     exit;
  }   
}
?>