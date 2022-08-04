<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="DELETE FROM tblgrade_data WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Grade Level Record!!!'; 
    session_write_close();
	echo $sql;
    header("location:admin?page=grade_section_settings");
    exit;
  }
 else  
   { $_SESSION['errmsg']='Grade Level Record Deleted Successfully!!!'; 
     session_write_close();
     header("location:admin?page=grade_section_settings");
     exit;
  }  
}

if ($prc=='G') {		
$xgrd = mysqli_real_escape_string($con,$_POST['xgrd']);
	
$sql="INSERT INTO tblgrade_data(grd) VALUES ('$xgrd')";  
 if (!mysqli_query($con,$sql))
  { 
	$errmsg='Error Saving Grade Level Record!!!'; 
    header("location:admin?page=grade_section_settings");
    exit;
  }
 else  
   { 
	 $errmsg='Grade Level Record Saved Successfully!!!'; 
     header("location:admin?page=grade_section_settings");
     exit;
  }  
}
?>