<?php
$timezone = "Asia/Manila";	# My time zone
date_default_timezone_set($timezone);	# PHP 5
$curdte = date("Y-m-d");	//echo gmdate("l, F d, Y - h:i a",$local); 


    $function = $_POST['function'];
    
    $log = array();
	$cfile='chat-'.$curdte.'.txt';

if(!is_file($cfile)){
    $fcreate = fopen($cfile, 'w') or die("Can't create file");
}

    switch($function) {
    
    	 case('getState'):
        	 if(file_exists($cfile)){
               $lines = file($cfile);
        	 }
             $log['state'] = count($lines); 
        	 break;	
    	
    	 case('update'):
        	$state = $_POST['state']; 
        	if(file_exists($cfile)){
        	   $lines = file($cfile);
        	 }
        	 $count =  count($lines);
        	 if($state == $count){
        		 $log['state'] = $state;
        		 $log['text'] = false;
        		 
        		 }
        		 else{
        			 $text= array();
        			 $log['state'] = $state + count($lines) - $state;
        			 foreach ($lines as $line_num => $line)
                       {
        				   if($line_num >= $state){
                         $text[] =  $line = str_replace("\n", "", $line);
        				   }
         
                        }
        			 $log['text'] = $text; 
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
			 
        	
        	 fwrite(fopen($cfile, 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n"); 
		 }
        	 break;
    	
    }
    
    echo json_encode($log);

?>