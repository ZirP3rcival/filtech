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
	$_SESSION['errmsg']='Error Saving Grade Level Record!!!'; 
    header("location:admin?page=grade_section_settings");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Grade Level Record Saved Successfully!!!'; 
     header("location:admin?page=grade_section_settings");
     exit;
  }  
}

if ($prc=='S') {		
$ngrd = mysqli_real_escape_string($con,$_POST['zgrd']);
$nsec = mysqli_real_escape_string($con,$_POST['zsec']);
	
$sql="INSERT INTO tblsection_data(grd,sect,stat) VALUES ('$ngrd','$nsec','N')";  
 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error Saving New Section Record!!!'; 
    header("location:admin?page=grade_section_settings");
    exit;
  }
 else  
   { $sql=mysqli_query($con,"UPDATE tblgrade_data SET stat='Y' WHERE id='$ngrd'"); 
	 $_SESSION['errmsg']='Section Record Saved Successfully!!!'; 
     header("location:admin?page=grade_section_settings");
     exit;
  }   
}

if ($prc=='R') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	

$resu = mysqli_query($con,"Select * FROM tblsection_data WHERE id='$id' and stat='N'");
$count=mysqli_num_rows($resu);
 if ($count==0)
  {
    $_SESSION['errmsg']='Error Removing Section Record!!!<br>Section Already Contains Record...';
    header("location:admin?page=grade_section_settings");
    exit;
  }	
	
$sql="DELETE FROM tblsection_data WHERE id='$id' and stat='N'";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Deleting Section Record!!!'; 
    header("location:admin?page=grade_section_settings");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Section Record Deleted Successfully!!!'; 
     header("location:admin?page=grade_section_settings");
     exit;
  }  
}
?>