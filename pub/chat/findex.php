<?php 
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$cfid=$_SESSION['id'];
$cfname=$_SESSION['fname'];
$csyr=$_SESSION['year'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chat</title>
    <link rel="stylesheet" href="chat/style.css" type="text/css" />
<style>    
.cmsg {
    margin-top: 5px;
    padding-left: 20px;	
	}

</style>	
</head>

<body> <!--onload="setInterval('chat.update()', 2000)"-->

    <div id="page-wrap">
		<div class="col-xs-12 col-md-12" id="room" style="padding: 0px;">
  <div class="col-xs-12 col-md-6" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">
	<div class="col-xs-12 col-md-12" style="margin-top:0px; float: left; padding: 0px;">	
	<select name="cfgrd" required class="form-control" id="cfgrd" style="display: inline-block; position:inherit; width:96%;" form="frmleks" title="Pumili ng isa sa talaan">
			  <option value="" >- Select Grade -</option>
	<?php
	$dsql = mysqli_query($con,"SELECT DISTINCT(ft2_faculty_schedule.grde),ft2_faculty_schedule.fid, ft2_grade_data.* FROM ft2_faculty_schedule 
	INNER JOIN ft2_grade_data ON ft2_faculty_schedule.grde = ft2_grade_data.id
	WHERE ft2_faculty_schedule.fid = '$cfid' AND ft2_faculty_schedule.syr = '$csyr' ORDER BY ft2_grade_data.grd ASC");

	  while($rg = mysqli_fetch_assoc($dsql))
	   {  ?>   
		<option value="<?=$rg['id'];?>" <?=($cfgrd == $rg['id'] ? 'selected' : '');?>><?=$rg['grd'];?></option> 
	<?php } ?>  
			</select></div>
	<div class="clearfix"></div>
  </div>

  <div class="col-xs-12 col-md-6" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">
	<div class="col-xs-12 col-md-12" style="margin-top:0px; float: right; padding: 0px;">
	<select name="cfsbj" required class="form-control" id="cfsbj" style="display: inline-block; position:inherit; width:96%; float: right;" form="frmleks" title="Pumili ng isa sa talaan">
			  <option value="" >- Select Subject -</option>
	</select>      
			</div>
	<div class="clearfix"></div>   
  </div>			
		</div>
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p style="color: #06023A;">Your message: </p>
            <textarea class="form-control"  id="sendie" maxlength = '200' ></textarea>
        </form>
    
    </div>

</body>

</html>
<script>
$(document).ready(function(){    
var cfid ='<?=$cfid?>';
var gd = sessionStorage.gd; 
var sc = sessionStorage.sc; 
	
setInterval(function () {
	if((gd!='')&&(sc!=''))	{
		refreshchatroom(gd,sc);
	}
}, (1000*120)); 	 
	 
function refreshchatroom(grd, sbj) {
	var cid='<?=$cfid?>';
	var cht = $('#chat-area').height();
       $.ajax({
		    data: { cgrd:grd, sbj:sbj },
			type: "post",
			url: "chat/process.php?prc=R",
			cache: false,	
			dataType: 'JSON',
				success: function(data){
					$("#chat-area").empty();
				   $.each(data, function(i,ac){
					   if(ac.cid==cid) { 
                            $('#chat-area').append($("<div style='text-align: right;'>"+ ac.chat +"</div>"));  }
					   else {
						    $('#chat-area').append($("<div>"+ ac.chat +"</div>"));   }
                        });			
					var $textarea = $('#chat-area');
    				$textarea.scrollTop($textarea[0].scrollHeight);
				   }
	    });		
}	 
	 
$('#sendie').keyup(function(e) {	
  var cfsbj= document.getElementById("cfsbj").value; 
  var cfgrd = document.getElementById("cfgrd").value; 	
  if (e.keyCode == 13) { 
    var text = $(this).val();
    var maxLength = $(this).attr("maxlength");  
    var length = text.length; 
                    // send 
    if (length <= maxLength + 1) {          
       $.ajax({
			data: { msg:text, sbj:cfsbj, cgrd:cfgrd },
			type: "post",
			url: "chat/process.php?prc=C",
			cache: false,	
				success: function(data){
					$('#sendie').val("");
					refreshchatroom(cfgrd ,cfsbj);
					return;
					}
	    });	
     } 
    }
});
	
	
$(document).on("change","#cfgrd",function() {	
  var cfgrd = document.getElementById("cfgrd").value;  	
  $.ajax({
	data: { fgrd:cfgrd },
    type: 'POST',
    url: 'chat/process.php?prc=S',
	dataType: 'json',
    success: function (data) {
	     $('#cfsbj').empty();	
	     $('#cfsbj').append('<option value="" >- Select Subject-</option> '); 
	     $.each(data, function(i,sbj){
         $('#cfsbj').append('<option value="' + sbj.sjid + '">' + sbj.subj + '</option>');   	 
	});		 
  }   
  });		
});		
	 
$(document).on("change","#cfsbj",function() {	
  var cfgrd = document.getElementById("cfgrd").value;  
  var cfsbj= document.getElementById("cfsbj").value; 	
	sessionStorage.setItem('gd',cfgrd);
	sessionStorage.setItem('sc',cfsbj);
     refreshchatroom(cfgrd, cfsbj);		
});		
	
});	 
</script>