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
$sec=$_SESSION['sec'];
$msg=$_REQUEST['msg'];
$prc=$_REQUEST['prc'];

if($prc=='C') {
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$message = htmlentities(strip_tags($msg));
		 if(($message) != "\n"){
        	
			 if(preg_match($reg_exUrl, $message, $url)) {
       			$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
				}
			 
			$chat="<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n";	 
        	$sql0 = mysqli_query($con, "INSERT INTO ft2_chat_msg(cid, grde, sec, chat) VALUES('$cid', '$grde', '$sec', '$chat')");
			 echo 0;
		 	}    	
}
if($prc=='R') {
		$chat = array();
			$sql1="SELECT * FROM ft2_chat_msg WHERE grde='$grde' AND sec='$sec' ORDER BY log ASC";  

			$sqler = $con->query($sql1);	
			while($r1 = mysqli_fetch_assoc($sqler)) {
				$chat[] = $r1;
			}
}

echo json_encode($chat,JSON_INVALID_UTF8_IGNORE);

?>