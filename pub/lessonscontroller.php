<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];
$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="DELETE FROM ft2_module_records WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Lessons Module Record!!!'; 
	echo $sql;
    header("location:admin?page=lessons_module");
    exit;
  }
 else  
   { $_SESSION['errmsg']='Lessons Module Record Deleted Successfully!!!'; 
     header("location:admin?page=lessons_module");
     exit;
  }  
}

if ($prc=='A') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
$set = mysqli_real_escape_string($con,$_REQUEST['set']);	

$sqln=mysqli_query($con, "UPDATE ft2_active_year SET stat='N' WHERE id<>'$id'");  	
$sql="UPDATE ft2_active_year SET stat='$set' WHERE id='$id'";  
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
$title = mysqli_real_escape_string($con,$_POST['title']);
$flink = mysqli_real_escape_string($con,$_POST['flink']);
$grd = mysqli_real_escape_string($con,$_REQUEST['grd']);
$sbj = mysqli_real_escape_string($con,$_REQUEST['sbj']);	
	
$sql="INSERT INTO ft2_module_records(fid, title, flink, syr, grde, asid) VALUES ('$fid','$title','$flink','$syr','$grd','$sbj')";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Saving Lesson Record!!!'; 
    header("location:admin?page=lessons_module");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Lesson Record Saved Successfully!!!'; 
     header("location:admin?page=lessons_module");
     exit;
  }  
}

if ($prc=='U') {		
$title = mysqli_real_escape_string($con,$_POST['title']);
$flink = mysqli_real_escape_string($con,$_POST['flink']);
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
	
$sql="UPDATE ft2_module_records SET title='$title', flink='$flink' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Updating Lesson Record!!!'; 
    header("location:admin?page=lessons_module");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Lesson Record Updated Successfully!!!'; 
     header("location:admin?page=lessons_module");
     exit;
  }  
}

if ($prc=='T') {		
$fscd = mysqli_real_escape_string($con,$_POST['fscd']);
$ftxt = mysqli_real_escape_string($con,$_POST['ftxt']);
$fid = mysqli_real_escape_string($con,$_POST['fid']);
$fnoi = mysqli_real_escape_string($con,$_POST['fnoi']);
$fgrd = mysqli_real_escape_string($con,$_POST['fgrd']);
$fsbj = mysqli_real_escape_string($con,$_POST['fsbj']);	
$fmin = mysqli_real_escape_string($con,$_POST['fmin']);	
	
$sql="INSERT INTO ft2_faculty_assessment(ascode, scdsc, fid, itm, grde, asid, timer) VALUES ('$fscd','$ftxt','$fid','$fnoi','$fgrd','$fsbj','$fmin')";  

 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Saving New Assessment Record!!!'; 
    echo 1;
  }
 else  
   { 
	$_SESSION['errmsg']='New Assessment Record Saved Successfully!!!'; 
    echo 0;
  }  
}

if ($prc=='C') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);	
$set = mysqli_real_escape_string($con,$_REQUEST['set']);	

$sql="UPDATE ft2_faculty_assessment SET used='$set' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Setting Assessment Status!!!'; 
    header("location:faculty?page=assessment_settings");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']='Setting Assessment Status Set Successfully!!!'; 
     header("location:faculty?page=assessment_settings");
     exit;
  }  
}

if ($prc=='D') {		
$id = mysqli_real_escape_string($con,$_REQUEST['id']);
	
$sql="DELETE FROM ft2_faculty_assessment WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting Assessment Record!!!'; 
	echo $sql;
    header("location:faculty?page=assessment_settings");
    exit;
  }
 else  
   { $_SESSION['errmsg']='Assessment Record Deleted Successfully!!!'; 
     header("location:faculty?page=assessment_settings");
     exit;
  }  
}

if ($prc=='M') {	
$id = mysqli_real_escape_string($con,$_POST['id']);	
$fscd = mysqli_real_escape_string($con,$_POST['fscd']);
$ftxt = mysqli_real_escape_string($con,$_POST['ftxt']);
$fnoi = mysqli_real_escape_string($con,$_POST['fnoi']);
$fmin = mysqli_real_escape_string($con,$_POST['fmin']);	
	
$sql="UPDATE ft2_faculty_assessment SET ascode='$fscd', scdsc='$ftxt', itm='$fnoi', timer='$fmin' WHERE id='$id'";  
 if (!mysqli_query($con,$sql))
  { 
	$_SESSION['errmsg']='Error Updating Assessment Record!!!'; 
    echo 1;
  }
 else  
   { 
	 $_SESSION['errmsg']='Assessment Record Updated Successfully!!!'; 
     echo 0;
  }  
}

?>