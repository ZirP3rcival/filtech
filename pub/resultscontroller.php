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

function compute_grade($con, $id){
$sql="SELECT id,  
CASE WHEN mch='Y' OR mch='N' THEN '50.00' ELSE mch END AS smch, 
CASE WHEN enu='Y' OR enu='N' THEN '50.00' ELSE enu END AS senu, 
CASE WHEN idf='Y' OR idf='N' THEN '50.00' ELSE idf END AS sidf, 
CASE WHEN esy='Y' OR esy='N' THEN '50.00' ELSE esy END AS sesy 
FROM ft2_asmt_data_result WHERE id = '$id' AND syr='$syr'";
	
$sqlx=mysqli_query($con,$sql);
	while($rg = mysqli_fetch_assoc($sqlx))
	{
		$mch=$rg['smch']; 
		$enu=$rg['senu'];
		$idf=$rg['sidf']; 
		$esy=$rg['sesy']; 
		
		$tot = (($mch+$enu+$idf+$esy)/4);
	
		if(($tot>=50)&($tot<75)) { $rmk='FAILED'; } else if(($tot>=75)&($tot<=100)) { $rmk='PASSED'; }
		
		$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET res='$tot', rte='$rmk' WHERE id = '$id'");
	}
}

if ($prc=='R') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET mch='N', enu='N', idf='N', esy='N' WHERE id = '$id' AND syr='$syr'");
	$msg='Resetting';
}

if ($prc=='GM') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET mch='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id);
	echo 0; exit;
}

if ($prc=='GE') {  
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET enu='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id);
	echo 0; exit;
}

if ($prc=='GI') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET idf='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id);
	echo 0; exit;
}

if ($prc=='GS') { 
	$sql=mysqli_query($con,"UPDATE ft2_asmt_data_result SET esy='$rte' WHERE id = '$id' AND syr='$syr'");
	compute_grade($con, $id);
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