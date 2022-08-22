<!-- countdown timer ============================================ -->
<link rel="stylesheet" href="../css/countdown/jquery.countdownTimer.css">
<script src="../css/countdown/jquery.countdownTimer.js"></script>   
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


$sql1 = mysqli_query($con,"SELECT ft2_asmt_data_result.* FROM ft2_asmt_data_result WHERE ft2_asmt_data_result.grde='$fgrd' AND ft2_asmt_data_result.syr='$syr' AND ft2_asmt_data_result.asid='$fsbj' AND ft2_asmt_data_result.fid='$fid' AND ft2_asmt_data_result.ascode='$fcod' AND ft2_asmt_data_result.sid='$sid'");  
 while($r = mysqli_fetch_assoc($sql1))	{  $xtime=$r['timer'];   }
?>
<div style="float: right;">        	
	<table style="border:0px;">
        <tr>
            <td colspan="4"><span id="hms_timer"></span></td>
        </tr>		
	</table>
<script>
let hrs=0;
let min=0;	
var id='<?=$rid?>';	
	
function convertH2M(hour){
  var timeParts = hour.split(":");
  return Number(timeParts[0]) * 60 + Number(timeParts[1]);
}	

function convertM2H(mins) {
            // getting the hours.
            hrs = Math.floor(mins / 60); 
            // getting the minutes.
            min = mins % 60; 
            // formatting the hours.
            hrs = hrs < 10 ? '0' + hrs : hrs; 
            // formatting the minutes.
            min = min < 10 ? '0' + min : min; 
            // returning them as a string.
          return `${hrs}:${min}`; 
}
var xtime=convertM2H(<?= $xtime?>);
	
    $(function(){
        $('#hms_timer').countdowntimer({
            hours : hrs,
            minutes :min,
            seconds : 00,
            size : "lg",
			timeUp : timeisUp
//					pauseButton : "pauseBtnhms",
//					stopButton : "stopBtnhms"
        });

		function timeisUp() {
        	//Code to be executed when timer expires.
	  		$('#POPMODAL').hide();
			$.ajax({
				   data: { id:id },
				   type: "post",
				   url: "answercontroller.php?prc=TU",
				   cache: false,	
				   success: function(data){
					var dialog = bootbox.dialog({
						title: 'Notification :',
							size: 'small',
							message: "<span style='color:#1F02FE;'TIMES UP!!!<br><br>Assessment Answer Submitted Successfully!!!</span>", 
							}).on('hidden.bs.modal', function() {
							$('body').addClass('modal-open'); location.reload(); });
							}
					});				
        }
    });
	
$(document).ready(function(){
var id='<?=$rid?>';		
	interval = setInterval(function () {
		 var timer = $('#hms_timer').html();
			arr = timer.split(':');
			var hh = $.trim(arr[0]);
			var mm = $.trim(arr[1]);
			var timex=(parseInt(hh)*60)+parseInt(mm);
			console.log(timex); 
			$.ajax({
				   data: { id:id, min:timex },
				   type: "post",
				   url: "answercontroller.php?prc=BX",
				   cache: false,	
				   success: function(data){
					return;
					}
					});		 
     }, (1000+60));
		
})	
$('#POPMODAL').on("hide.bs.modal", function() {
	clearInterval(interval); // stop the interval
	location.reload();
})
</script>	
</div>