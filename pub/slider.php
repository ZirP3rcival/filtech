<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$syr=$_SESSION['year'];
?>
<style>
	.slider { 
		top: 0px;
    	margin: 0px;
		height: 500px;
	}
	.mask {
		overflow: hidden;
		height: 100%;
	}
	iframe { 
		width: 100%!important;
	} 
	.punch-viewer-content{
		top: 0px!important;
		width: 100%!important;
	}
	.slider {
		width: 100%;
	}
	.slider .source {
		font-size: 20px;
		text-align: left;
	}
	.slider li {
		width: 100%!important; 
	}
	.dashone-comment {
    text-align: left;
    height: 500px;
}
{}
</style>
<!--<h1>Pure CSS Text Carousel</h1>-->
<div class="content-slider">
  <div class="slider">
	<div class="mask">
	  <ul id="sldrlist">  

	  </ul>
	</div>
  </div>
</div>
<!-- ######################################################################## -->
<script>
$(document).ready(function(){
SRCExtract();
function SRCExtract(){
	$.ajax({
	 	type: "POST",
	 	url: "srcextract.php",
//	 	data: { uid:uid, prc:prc },
	 	cache: false,
	 	success: function(data){
		var content=''; 
		var i = 0;
	    $.each(JSON.parse(data), function(i,sl){
			i+=1;
			
let data = sl.flink;
var parser = new DOMParser();

var parsedIframe = parser.parseFromString(data, "text/html");
let iFrame = parsedIframe.getElementsByTagName("iframe");

// Read URL:
let sldrsrc = iFrame[0].src;
console.log(sldrsrc);			
			
			content += '<li class="anim'+i+'">';
		    content += '<div class="source">'+sl.title+'</div>';
		    content += '<div class="quote">';
			content += '  <div class="embed-container" style="position: relative; padding-bottom: 59.27%; height: 0; overflow: hidden; max-width: 100%;">';
			content += '	 <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"';
			content += '	  src="'+sldrsrc+'" frameborder="0" width="100%" height="100%" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';
			content += '</div>';
		    content += '</div>';
		    content += '</li>';
		});
		$(content).appendTo("#sldrlist");
	 }
	});
}
	
});
</script>