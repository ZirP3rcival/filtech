<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

$syr=$_SESSION['year'];

$fgrd=$_REQUEST['fgrd']; 
$fsec=$_REQUEST['fsec']; 
$fsbj=$_REQUEST['fsbj']; 
$fscd=$_REQUEST['fscd']; 

$id=$_REQUEST['rid'];
if($$id=='') { 	$id=$_POST['id'];  }
$rte=number_format($_POST['rte'],2);

if ($prc=='R') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET mch='N', enu='N', idf='N', esy='N' WHERE id = '$id'");
	$msg='Resetting';
}

if ($prc=='GM') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET mch='$rte' WHERE id = '$id'");
	echo 0;
}

if ($prc=='GE') {  
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET enu='$rte' WHERE id = '$id'");
	echo 0;
}

if ($prc=='GI') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET idf='$rte' WHERE id = '$id'");
	echo 0;
}


 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error '.$msg.' Student Assessment Record!!!'; 
    header("location:faculty?page=assessment_results&fgrd=$fgrd&fsbj=$fsbj&fsec=$fsec&fscd=$fscd");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']=$msg.' Student Assessment Record Successfull!!!'; 
     header("location:faculty?page=assessment_results&fgrd=$fgrd&fsbj=$fsbj&fsec=$fsec&fscd=$fscd");
     exit;
  }   
?>