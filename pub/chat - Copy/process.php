<?php
ob_start();
include ('../connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 

$timezone = "Asia/Manila";	# My time zone
date_default_timezone_set($timezone);	# PHP 5
$curdte = date("Y-m-d");	//echo gmdate("l, F d, Y - h:i a",$local); 

$syr=$_SESSION['year'];
$cid=$_SESSION['id'];
$grde=$_SESSION['grde'];  	
$sec=$_SESSION['sec'];

    $function = $_POST['function'];
    
    $log = array();
	$cfile='chat-'.$curdte.'.txt';

if(!is_file($cfile)){
    $fcreate = fopen($cfile, 'w') or die("Can't create file");
}

    switch($function) {
    
    	 case('getState'):
//        	 if(file_exists($cfile)){
//               $lines = file($cfile);
//        	 }
//             $log['state'] = count($lines); 
			$log = array();
			$sql1="SELECT * FROM ft2_chat_msg ORDER BY log ASC";  
			echo $sql1;
			
			$sqler = $con->query($sql1);	
			while($r1 = mysqli_fetch_assoc($sqler)) {
				$log[] = $r1;
			}
        	 break;	
    	
    	 case('update'):
//        	$state = $_POST['state']; 
//        	if(file_exists($cfile)){
//        	   $lines = file($cfile);
//        	 }
//        	 $count =  count($lines);
//        	 if($state == $count){
//        		 $log['state'] = $state;
//        		 $log['text'] = false;
//        		 
//        		 }
//        		 else{
//        			 $text= array();
//        			 $log['state'] = $state + count($lines) - $state;
//        			 foreach ($lines as $line_num => $line)
//                       {
//        				   if($line_num >= $state){
//                         $text[] =  $line = str_replace("\n", "", $line);
//        				   }
//         
//                        }
//        			 $log['text'] = $text; 
//        		 }
			$log = array();
			$sql1="SELECT * FROM ft2_chat_msg WHERE grde='$grde' AND sec='$sec' ORDER BY log ASC";  

			$sqler = $con->query($sql1);	
			while($r1 = mysqli_fetch_assoc($sqler)) {
				$log[] = $r1;
			}

             break;
    	 
    	 case('send'):
		  $nickname = htmlentities(strip_tags($_POST['nickname']));
			 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			  $message = htmlentities(strip_tags($_POST['message']));
		 if(($message) != "\n"){
        	
			 if(preg_match($reg_exUrl, $message, $url)) {
       			$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
				}
			 
			 $chat="<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n";
				 
        	$sql0 = mysqli_query($con, "INSERT INTO ft2_chat_msg(cid, grde, sec, chat) VALUES('$cid', '$grde', '$sec', '$chat')");
			 
        	// fwrite(fopen($cfile, 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n"); 
		 }
        	 break;
    	
    }
    
    echo json_encode($log);

?>