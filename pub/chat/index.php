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
</head>

<body> <!--onload="setInterval('chat.update()', 2000)"-->

    <div id="page-wrap">
<!--		<div class="col-xs-12 col-md-12" id="name-area"></div>-->
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p style="color: #06023A;">Your message: </p>
            <textarea id="sendie" maxlength = '200' ></textarea>
        </form>
    
    </div>

</body>

</html>
<script>
 $(document).ready(function(){   
refreshchatroom(); 
function refreshchatroom() {
	var cht = $('#chat-area').height();
       $.ajax({
			type: "post",
			url: "chat/process.php?prc=R",
			cache: false,	
			dataType: 'JSON',
				success: function(data){
				   $.each(data, function(i,ac){
                            $('#chat-area').append($("<p>"+ ac.chat +"</p>"));
                        });								  
				   }
				   //document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
		   		   //$('#chat-area').scrollTop(cht);
	    });		
}	 
	 
$('#sendie').keyup(function(e) {			 
  if (e.keyCode == 13) { 
    var text = $(this).val();
    var maxLength = $(this).attr("maxlength");  
    var length = text.length; 
                    // send 
    if (length <= maxLength + 1) {          
       $.ajax({
			data: { msg:text },
			type: "post",
			url: "chat/process.php?prc=C",
			cache: false,	
				success: function(data){
					$('#sendie').val("");
					refreshchatroom();
					return;
					}
	    });	
     } 
    }
});
	 
});	 
</script>