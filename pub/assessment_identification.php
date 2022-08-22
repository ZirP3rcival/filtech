<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];
$rid=$_REQUEST['rid'];
$fid=$_REQUEST['fid'];
$fsbj=$_REQUEST['fsbj'];
$fgrd=$_REQUEST['fgrd'];
$fsyr=$_REQUEST['fsyr'];
$fcod=$_REQUEST['fcod'];
?>
<?php include('countdown_timer.php');?>

<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
<div class="col-md-12 col-xs-12" style="padding:0px 15px; border-right : 1px solid #ddd; box-shadow : 5px 0px 5px 1px #eaeaea; margin-bottom: 15px;">
<?php
	
$ssql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_data_id WHERE sid='$sid' AND ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND asid='$fsbj'"); 	
  while($rz = mysqli_fetch_assoc($ssql))
   { $mc = $rz['ctr'];  }	

if($mc<=0) {
	$fsql = mysqli_query($con,"SELECT * FROM ft2_asmt_identification WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' ORDER BY RAND()"); // LIMIT $lmit
	  while($r = mysqli_fetch_assoc($fsql))
	   { 
		   $aky=$r['qky'];
		   $qno=$r['id'];
		   
	       $sqlx = mysqli_query($con, "INSERT INTO ft2_asmt_data_id(sid, qno, ans, aky, ascode, syr, fid, grde, asid) VALUES('$sid', '$qno', '', '$aky', '$fcod', '$fsyr', '$fid', '$fgrd', '$fsbj')");
	   }
}
	//think of solution to display assessment	
	$i=0;
	$fsql = mysqli_query($con,"SELECT ft2_asmt_data_id.*, ft2_asmt_data_id.id AS aid, ft2_asmt_identification.* FROM ft2_asmt_identification 
INNER JOIN ft2_asmt_data_id ON ft2_asmt_data_id.qno=ft2_asmt_identification.id
WHERE ft2_asmt_data_id.ascode = '$fcod' AND ft2_asmt_data_id.fid='$fid' AND ft2_asmt_data_id.grde='$fgrd'
AND ft2_asmt_data_id.syr='$syr' AND ft2_asmt_data_id.asid='$fsbj'"); 
  while($r = mysqli_fetch_assoc($fsql))
   { $i++; $ans=$r['ans']; $aid=$r['aid']; 
		if($ans<>'') { $clr='#82BAEB'; } else { $clr='#fff'; }
?>
<div class="col-xs-12 col-md-12" id="qst<?=$aid?>" style="background: <?=$clr?>; float: left; margin: 20px 5px 10px 5px; text-align: justify; font-size: 13px; color: #010C3E; line-height: 25px;"><em><strong><?=$i?>. <?=$r['qst'];?></strong></em></div><br /><br />
 <div class="col-xs-12 col-md-11" style="margin-left: 25px;">
	  <input class="form-control pcat" id="en<?=$aid?>" name="en<?=$aid?>" data-id="<?=$aid?>" required style="width: 100%" value="<?=$ans?>">
 </div>
<?php  }?>
</div>
   
 <button class="btn btn-info btnen" type="button" id="btnen" data-rid="<?=$rid?>" style="float:right;margin-bottom: 15px;">Submit Answers</button>
    </div>  
<div class="clearfix">  </div>                           
</div>
<!--script type="text/javascript">
var count = 600;
startCountdown();

function doCountdown() {
    count--;

    if (count > 0) {
        //document.getElementById("timer").innerHTML = count + " seconds left";
		var newText = count + " time left";
		//Change the text using the text method.
		$('#timer').text(newText);
        setTimeout("doCountdown()", 1000);
    } else {
        //hitPhpScript();
    }
}		
	
function startCountdown() {
    count = 600;
    doCountdown();
}	
</script-->	
<script>
//var timer2 = "1:30";
//var interval = setInterval(function() {
//
//
//  var timer = timer2.split(':');
//  //by parsing integer, I avoid all extra string processing
//  var minutes = parseInt(timer[0], 10);
//  var seconds = parseInt(timer[1], 10);
//  --seconds;
//  minutes = (seconds < 0) ? --minutes : minutes;
//  if (minutes < 0) clearInterval(interval);
//  seconds = (seconds < 0) ? 59 : seconds;
//  seconds = (seconds < 10) ? '0' + seconds : seconds;
//  //minutes = (minutes < 10) ?  minutes : minutes;
//  $('#timer').html(minutes + ':' + seconds);
//  timer2 = minutes + ':' + seconds;
//}, 1000);	
	
$(document).ready(function(){
	
$(document).on("change",".pcat",function() {
var id=$(this).data('id'); 
var vl=document.getElementById("en"+id).value;		
	$.ajax({
		   data: { id:id, vl:vl },
		   type: "post",
		   url: "answercontroller.php?prc=I",
		   cache: false,	
		   success: function(data){
			   $('#qst'+id).css('background','#82baeb');
			   return;
				}
			});	  
});		
	
$(document).on("click","#btnen",function() {
var id=$(this).data('rid');
bootbox.confirm("Submit Identification Answer?", function(result) {	
  if (result) {	 	
	  $('#POPMODAL').hide();
	$.ajax({
		   data: { id:id },
		   type: "post",
		   url: "answercontroller.php?prc=IX",
		   cache: false,	
		   success: function(data){
			var dialog = bootbox.dialog({
				title: 'Notification :',
					size: 'small',
					message: "<span style='color:#1F02FE;'>Identification Answer Submitted Successfully!!!</span>", 
					}).on('hidden.bs.modal', function() {
					$('body').addClass('modal-open'); location.reload(); });
					}
			});		  
  }
 });	  
});		

});
</script>