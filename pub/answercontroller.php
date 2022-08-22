<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

$id = mysqli_real_escape_string($con,$_POST['id']);
$vl = mysqli_real_escape_string($con,$_POST['vl']);

if ($prc=='M') {		
	//$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_mc SET ans='$vl' WHERE id='$id'");   	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_mc AS t, 
							(
								SELECT id, ans, aky 
								FROM ft2_asmt_data_mc 
								WHERE id = '$id'
							) AS temp
							SET rslt = '0', t.ans='$vl' WHERE temp.id = t.id");
	
	$sql2=mysqli_query($con,"UPDATE ft2_asmt_data_mc AS t, 
							(
								SELECT id, ans, aky 
								FROM ft2_asmt_data_mc 
								WHERE id = '$id'
							) AS temp
							SET rslt = '1' WHERE temp.id = t.id AND t.ans = t.aky");
	echo 0;
}

if ($prc=='MX') {		 	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_result SET mch='Y' WHERE id = '$id'");
	echo 0;
}

if ($prc=='E') {		 	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_en SET ans='$vl' WHERE id = '$id'");
	echo 0;
}

if ($prc=='EX') {		 	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_result SET enu='Y' WHERE id = '$id'");
	echo 0;
}

if ($prc=='S') {		 	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_es SET ans='$vl' WHERE id = '$id'");
	echo 0;
}

if ($prc=='SX') {		 	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_result SET esy='Y' WHERE id = '$id'");
	echo 0;
}


if ($prc=='I') {		 	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_id SET ans='$vl' WHERE id = '$id'");
	echo 0;
}

if ($prc=='IX') {		 	
	$sql1=mysqli_query($con,"UPDATE ft2_asmt_data_result SET idf='Y' WHERE id = '$id'");
	echo 0;
}
?>