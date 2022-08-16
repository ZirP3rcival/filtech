<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];
$syr=$_SESSION['year'];

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="DELETE FROM ft2_module_subjects WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Subject Record!!!'; 
	echo $sql;
    header("location:admin?page=subject_records");
    exit;
  }
 else  
   { $_SESSION['errmsg']='Subject Record Deleted Successfully!!!'; 
     header("location:admin?page=subject_records");
     exit;
  }  
}

if ($prc=='S') {		
$nsubj = strtoupper(mysqli_real_escape_string($con,$_POST['nsubj']));
	
$sql="INSERT INTO ft2_module_subjects(subj) VALUES ('$nsubj')";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Saving Subject Record!!!'; 
    header("location:admin?page=subject_records");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Subject Record Saved Successfully!!!'; 
     header("location:admin?page=subject_records");
     exit;
  }  
}

if ($prc=='A') {		
$zgrd = strtoupper(mysqli_real_escape_string($con,$_POST['zgrd']));
$zsec = strtoupper(mysqli_real_escape_string($con,$_POST['zsec']));
$zsbj = strtoupper(mysqli_real_escape_string($con,$_POST['zsbj']));
$zfac = strtoupper(mysqli_real_escape_string($con,$_POST['zfac']));	
	
$sql="INSERT INTO ft2_faculty_schedule(fid, grde, sec, sjid, syr) VALUES ('$zfac', '$zgrd', '$zsec', '$zsbj', '$syr')";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Saving Subject Assignment Record!!!'; 
	  echo 1;
  }
 else  
   { 
	 $_SESSION['errmsg']='Subject Assignment Record Saved Successfully!!!';    
	   echo 0;
  }  
}
?>