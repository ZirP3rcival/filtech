<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="DELETE FROM tblsyr_data WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Academic Year Record!!!'; 
	echo $sql;
    header("location:admin?page=academic_year_settings");
    exit;
  }
 else  
   { $_SESSION['errmsg']='Academic Year Record Deleted Successfully!!!'; 
     header("location:admin?page=academic_year_settings");
     exit;
  }  
}

if ($prc=='A') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
$set = mysqli_real_escape_string($con,$_REQUEST['set']);	

$sqln=mysqli_query($con, "UPDATE tblsyr_data SET stat='N' WHERE id<>'$id'");  	
$sql="UPDATE tblsyr_data SET stat='$set' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Setting Academic Year Record!!!'; 
    header("location:admin?page=academic_year_settings");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Academic Year Record Set Successfully!!!'; 
     header("location:admin?page=academic_year_settings");
     exit;
  }  
}

if ($prc=='S') {		
$nsyr = mysqli_real_escape_string($con,$_POST['nsyr']);
	
$sql="INSERT INTO tblsyr_data(syr,stat) VALUES ('$nsyr','N')";  
 if (!mysqli_query($con,$sql))
  { 
	$errmsg='Error Saving Academic Year Record!!!'; 
    header("location:admin?page=academic_year_settings");
    exit;
  }
 else  
   { 
	 $errmsg='Academic Year Record Saved Successfully!!!'; 
     header("location:admin?page=academic_year_settings");
     exit;
  }  
}
?>