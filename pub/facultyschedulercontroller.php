<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

if ($prc=='S') {	
$fid = mysqli_real_escape_string($con,$_POST['fid']);	
$sfgrd = mysqli_real_escape_string($con,$_POST['sfgrd']);
$sfsec = mysqli_real_escape_string($con,$_POST['sfsec']);	
$syr=$_SESSION['year'];	

$sqlu=mysqli_query($con,"UPDATE ft2_section_data SET fid='$fid', stat='Y' WHERE grd='$sfgrd' AND sect='$sfsec'");  
$sqls=mysqli_query($con,"INSERT INTO ft2_faculty_schedule(fid, grde, sec, syr) VALUES('$fid','$sfgrd','$sfsec','$syr')");  
	 $_SESSION['errmsg']='Faculty Schedule Saved Successfully!!!'; 
     header("location:admin?page=faculty_scheduler");
     exit;
}

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="DELETE FROM ft2_grade_data WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Grade Level Record!!!'; 
    session_write_close();
	echo $sql;
    header("location:admin?page=faculty_scheduler");
    exit;
  }
 else  
   { $_SESSION['errmsg']='Grade Level Record Deleted Successfully!!!'; 
     session_write_close();
     header("location:admin?page=faculty_scheduler");
     exit;
  }  
}
?>