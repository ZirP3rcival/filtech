/* 
Created by: Kenrick Beckett

Name: Chat Engine
*/

var instanse = false;
var state;
var mes;
var file;

function Chat () {
	"use strict";
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
}

//gets the state of the chat
function getStateOfChat(){
	"use strict";
//	if(!instanse){
//		 instanse = true;
		 $.ajax({
			   type: "POST",
			   url: "chat/process.php",
			   data: {  
			   			'function': 'getState',
						'file': file
						},
			   dataType: "json",
			
			   success: function(data){
$.each(data, function(i,dta){		
  $('#chat-area').append($("<p>"+ dta.text[i] +"</p>"));
});
			   },
			});
//	}	 
}

//Updates the chat
function updateChat(){
	"use strict";
//	 if(!instanse){ 
//		 instanse = true; 
//	     $.ajax({
//			   type: "POST",
//			   url: "chat/process.php",
//			   data: {  
//			   			'function': 'update',
//						'state': state,
//						'file': file
//						},
//			   dataType: "json",
//			   success: function(data){
//				   if(data.text){ 
//						for (var i = 0; i < data.text.length; i++) { /*alert(data.text.length);*/
//                            $('#chat-area').append($("<p>"+ data.text[i] +"</p>"));
//                        }								  
//				   }
//				   document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
//				   instanse = false;
//				   state = data.state;
//			   },
//			});
//	 }
//	 else {
//		 setTimeout(updateChat, 1500);
//	 }
		 $.ajax({
			   type: "POST",
			   url: "chat/process.php",
			   data: {  
			   			'function': 'getState',
						'file': file
						},
			   dataType: "json",
			
			   success: function(data){
$.each(data, function(i,dta){		
  $('#chat-area').append($("<p>"+ dta.text[i] +"</p>"));
});
			   },
			});
}

//send the message
function sendChat(message, nickname)
{    "use strict";   
    updateChat();
     $.ajax({
		   type: "POST",
		   url: "chat/process.php",
		   data: {  
		   			'function': 'send',
					'message': message,
					'nickname': nickname,
					'file': file
				 },
		   dataType: "json",
		   success: function(data){
			   updateChat();
		   },
		});
}
