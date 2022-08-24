<?php
ob_start();
include ('../connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 

$timezone = "Asia/Manila";	# My time zone
date_default_timezone_set($timezone);	# PHP 5
$curdte = date("Y-m-d");	//echo gmdate("l, F d, Y - h:i a",$local); 

$nickname=$_SESSION['fname'];
$syr=$_SESSION['year'];
$cid=$_SESSION['id'];

$grde=$_SESSION['grde'];  	
if($grde=='') { $grde=$_POST['cgrd']; }

$sec=$_SESSION['sec'];  	
if($sec=='') { $sec=$_REQUEST['sec']; }

$msg=$_REQUEST['msg'];
$prc=$_REQUEST['prc'];

$fsbj=$_POST['sbj'];

if($prc=='C') {
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$message = htmlentities(strip_tags($msg));
		 if(($message) != "\n"){
        	
			 if(preg_match($reg_exUrl, $message, $url)) {
       			$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
				}
			 
			$chat="<div>". $nickname . "</div><span>" . $message = str_replace("\n", " ", $message) . "\n</span>";	 
        	$sql0 = mysqli_query($con, "INSERT INTO ft2_chat_msg(cid, grde, asid, chat) VALUES('$cid', '$grde', '$fsbj', '$chat')");
			 echo 0;
		 	}    	
}
if($prc=='R') {
		$chat = array();
			$sql1="SELECT * FROM ft2_chat_msg WHERE grde='$grde' AND asid='$fsbj' ORDER BY log ASC";  

			$sqler = $con->query($sql1);	
			while($r1 = mysqli_fetch_assoc($sqler)) {
				$chat[] = $r1;
			}
}

if($prc=='G') {
$fgrd=$_POST['fgrd'];
	
$chat = array();
$sql = "SELECT ft2_faculty_schedule.*, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj FROM ft2_faculty_schedule 
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_faculty_schedule.sjid
WHERE ft2_faculty_schedule.grde='$fgrd' AND ft2_faculty_schedule.syr = '$syr' GROUP BY ft2_module_subjects.subj
ORDER BY ft2_faculty_schedule.sjid ASC";

$sqler = $con->query($sql);	

while($r = mysqli_fetch_assoc($sqler)) {
    $chat[] = $r;
}
}

if($prc=='S') {
$fgrd=$_POST['fgrd'];
	
$chat = array();
$sql = "SELECT ft2_faculty_schedule.*, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj FROM ft2_faculty_schedule 
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_faculty_schedule.sjid
WHERE ft2_faculty_schedule.fid = '$cid' AND ft2_faculty_schedule.grde='$fgrd' AND ft2_faculty_schedule.syr = '$syr' GROUP BY ft2_module_subjects.subj
ORDER BY ft2_faculty_schedule.sjid ASC";
$sqler = $con->query($sql);	

while($r = mysqli_fetch_assoc($sqler)) {
    $chat[] = $r;
}
}

echo json_encode($chat,JSON_INVALID_UTF8_IGNORE);

?>