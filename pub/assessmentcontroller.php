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
$qky = $_POST['nqky'];	
$id=$_REQUEST['id'];

if ($prc=='N1') { 
	$sql="INSERT INTO ft2_asmt_enumeration(ascode, fid, grde, syr, qst, qky, asid) VALUES ('$fscd', '$fid', '$fgrd', '$syr', '$qst', '$qky', '$fsbj')";  
	$msg='Saving';
}
else if ($prc=='U1') {		
	$sql="UPDATE ft2_asmt_enumeration SET ascode='$fscd', fid='$fid', grde='$fgrd', syr='$syr', qst='$qst', qky='$qky', asid='$fsbj' WHERE id='$id'"; 
	$msg='Updating';   	
}
else if ($prc=='D1') {		
	$sql="DELETE FROM ft2_asmt_enumeration WHERE id='$id'";  
	$msg='Deleting'; 
}

if ($prc=='N2') {
	$sql="INSERT INTO ft2_asmt_essay(ascode, fid, grde, syr, qst, asid) VALUES ('$fscd', '$fid', '$fgrd', '$syr', '$qst', '$fsbj')";  
	$msg='Saving';
}
else if ($prc=='U2') {		
	$sql="UPDATE ft2_asmt_essay SET ascode='$fscd', fid='$fid', grde='$fgrd', syr='$syr', qst='$qst', asid='$fsbj' WHERE id='$id'"; 
	$msg='Updating';   	
}
else if ($prc=='D2') {		
	$sql="DELETE FROM ft2_asmt_essay WHERE id='$id'";  
	$msg='Deleting'; 
}

if ($prc=='N3') {
	$sql="INSERT INTO ft2_asmt_identification(ascode, fid, grde, syr, qst, qky, asid) VALUES ('$fscd', '$fid', '$fgrd', '$syr', '$qst', '$qky', '$fsbj')";  
	$msg='Saving';
}
else if ($prc=='U3') {		
	$sql="UPDATE ft2_asmt_identification SET ascode='$fscd', fid='$fid', grde='$fgrd', syr='$syr', qst='$qst', qky='$qky', asid='$fsbj' WHERE id='$id'"; 
	$msg='Updating';   	
}
else if ($prc=='D3') {		
	$sql="DELETE FROM fft2_asmt_identification WHERE id='$id'";  
	$msg='Deleting'; 
}

if ($prc=='N4') {
	$sql="INSERT INTO ft2_asmt_multiplechoice(ascode, fid, grde, syr, qst, qa1, qa2, qa3, qa4, qky, asid) VALUES ('$fscd', '$fid', '$fgrd', '$syr', '$qst', '$qa1', '$qa2', '$qa3', '$qa4', '$qky', '$fsbj')";  
	$msg='Saving';
}
else if ($prc=='U4') {		
	$sql="UPDATE ft2_asmt_multiplechoice SET ascode='$fscd', fid='$fid', grde='$fgrd', syr='$syr', qst='$qst', qa1='$qa1', qa2='$qa2', qa3='$qa3', qa4='$qa4', qky='$qky', asid='$fsbj' WHERE id='$id'"; 
	$msg='Updating';   	
}
else if ($prc=='D4') {		
	$sql="DELETE FROM ft2_asmt_multiplechoice WHERE id='$id'";  
	$msg='Deleting'; 
}

 if (!mysqli_query($con,$sql))
  {  
	$_SESSION['errmsg']='Error '.$msg.' Assessment Content!!!'; 
    header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
    exit;
  }
 else  
   { 
	 $_SESSION['errmsg']=$msg.' Assessment Content Successfull!!!'; 
     header("location:faculty?page=assessment_records&fgrd=$fgrd&fsbj=$fsbj&fscd=$fscd&fcat=$fcat");
     exit;
  }   
?>