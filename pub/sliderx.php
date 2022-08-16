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
	.slider .source {
		font-size: 20px;
		text-align: left;
	}
	.dashone-comment {
    text-align: left;
    height: 480px;
}
{}
</style>
<!--<h1>Pure CSS Text Carousel</h1>-->
<div class="content-slider">
  <div class="slider">
	<div class="mask">
	  <ul>
<!--
<?php	
$i=0;		  
$sqlmd="SELECT * FROM `ft2_module_records` WHERE syr='$syr' ORDER BY RAND() LIMIT 5"; 
$sqler = $con->query($sqlmd);	
while($r = mysqli_fetch_assoc($sqler)) { $i++;
?>	  
-->
		<li class="anim<?=$i?>">
		  <div class="source"><?=$r['title']?></div>
		  <div class="quote">
			  <div class="embed-container" style="position: relative; padding-bottom: 59.27%; height: 0; overflow: hidden; max-width: 100%;">
				 <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
				  src="https://docs.google.com/presentation/d/e/2PACX-1vQ6CMug9aFZe-FioeIiZl8Ly78hzBJB9mmgX-OdjPIyFLRbkKJ7ahQwZZnbt1urHAMT-uMut4VRIoQC/embed?start=true&loop=true&delayms=30000" frameborder="0" width="960" height="569" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
			</div>
		  </div>
		</li>
<!--<?php } ?>		-->
	  </ul>
	</div>
  </div>
</div>
<script>
$(document).ready(function(){
SRCExtract();
function SRCExtract(){
	$.ajax({
	 	type: "POST",
	 	url: "srcextract.php",
//	 	data: { uid:uid, prc:prc },
	 	cache: false,
	 	success: function(tdta){
			var dialog = bootbox.dialog({
          	title: 'Notification :',
				size: 'small',
          	message: "<span style='color:#1F02FE;'>User Account Record Removed Successfully!!!</span>", 
            }).on('hidden.bs.modal', function() {
           	$('body').addClass('modal-open'); location.reload(); });
	 	}
	});
}
	
});
</script>		