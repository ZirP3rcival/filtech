<?php
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$rows = array();
$syr=$_SESSION['year'];

$sqlc="SELECT * FROM `ft2_module_records` WHERE syr='$syr' ORDER BY RAND() LIMIT 5";  
$sqlr = $con->query($sqlc);	
while($r = mysqli_fetch_assoc($sqlr)) {
	$rows[] = $r;
}
	echo json_encode($rows,JSON_INVALID_UTF8_IGNORE);	
?>