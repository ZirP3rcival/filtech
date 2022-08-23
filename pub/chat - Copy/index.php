<?php 
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fname=$_SESSION['fname'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="chat/style.css" type="text/css" />
    
<!--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<!--    <script src="../js/vendor/jquery-1.11.3.min.js"></script>  -->
    <script type="text/javascript" src="chat/chat.js"></script>
    <script type="text/javascript">
    
        // ask user for name with popup prompt    
        //var name = prompt("Enter your chat name:", "Guest");
        var name='<?=$fname?>';
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body> <!--onload="setInterval('chat.update()', 2000)"-->

    <div id="page-wrap">
		<p id="name-area"></p>
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p style="color: #06023A;">Your message: </p>
            <textarea id="sendie" maxlength = '200' ></textarea>
        </form>
    
    </div>

</body>

</html>