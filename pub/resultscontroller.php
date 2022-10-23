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
if($id=='') { 	$id=$_POST['id'];  }
$rte=number_format($_POST['rte'],2);

function compute_grade($con, $id, $syr){
$tot=0;	
$x=0;
$mtot=0;	
$sql1="SELECT mch FROM ft2_asmt_data_result WHERE id = '$id' AND syr='$syr'";	
$sqlx=mysqli_query($con,$sql1);
	while($rg = mysqli_fetch_assoc($sqlx))
	{   $mtot=$rg['mch']; }
	 	if($mtot=='N'){ $mtot=0; } 
	 	if(number_format($mtot)>0){ $x++; } 
	
$itot=0;	
$sql2="SELECT idf FROM ft2_asmt_data_result WHERE id = '$id' AND syr='$syr'";	
$sqlx=mysqli_query($con,$sql2);
	while($rg = mysqli_fetch_assoc($sqlx))
	{   $itot=$rg['idf']; } 
	 	if($itot=='N'){ $itot=0; } 
	 	if(number_format($itot)>0){ $x++; } 	
	
$etot=0;	
$sql3="SELECT enu FROM ft2_asmt_data_result WHERE id = '$id' AND syr='$syr'";	
$sqlx=mysqli_query($con,$sql3);
	while($rg = mysqli_fetch_assoc($sqlx))
	{   $etot=$rg['enu']; } 
	 	if($etot=='N'){ $etot=0; } 
	 	if(number_format($etot)>0){ $x++; } 	
	
$stot=0;	
$sql4="SELECT esy FROM ft2_asmt_data_result WHERE id = '$id' AND syr='$syr'";	
$sqlx=mysqli_query($con,$sql4);
	while($rg = mysqli_fetch_assoc($sqlx))
	{   $stot=$rg['esy']; } 
	 	if($stot=='N'){ $stot=0; } 
	 	if(number_format($stot)>0){ $x++; } 
	
$tot=(($mtot+$itot+$etot+$stot)/$x);
	
		if(($tot>=50)&($tot<75)) { $rmk='FAILED'; } else if(($tot>=75)&($tot<=100)) { $rmk='PASSED'; }
		//echo "UPDATE ft2_asmt_data_result SET res='$tot', rte='$rmk' WHERE id = '$id'"; exit;
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET res='$tot', rte='$rmk' WHERE id = '$id'");

}

if ($prc=='R') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET mch='N', enu='N', idf='N', esy='N', res=NULL, rte=NULL WHERE id = '$id' AND syr='$syr'");
	$msg='Resetting';
}

if ($prc=='GM') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET mch='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id, $syr);
	echo 0; exit;
}

if ($prc=='GE') {  
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET enu='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id, $syr);
	echo 0; exit;
}

if ($prc=='GI') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET idf='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id, $syr);
	echo 0; exit;
}

if ($prc=='GS') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET esy='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id, $syr);
	echo 0; exit;
}

if ($prc=='GR') { 
	$sid=$_POST['sid'];
	$rte1=$_POST['rte1'];
	$rte2=$_POST['rte2'];
	$rte3=$_POST['rte3'];
	$rte4=$_POST['rte4'];
	$ave=number_format((($rte1+$rte2+$rte3+$rte4)/4),2);
		if($ave>=75) { $rem='PASSED'; } else { $rem='PASSED'; }
	
	$sql=mysqli_query($con,"UPDATE ft2_grade_record SET grd1='$rte1', grd2='$rte2', grd3='$rte3', grd4='$rte4', ave='$ave', rem='$rem' WHERE sid = '$sid' AND syr='$syr'");
	echo 0; exit;
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