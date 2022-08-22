<!-- countdown timer ============================================ -->
<link rel="stylesheet" href="../css/countdown/jquery.countdownTimer.css">
<script src="../css/countdown/jquery.countdownTimer.js"></script>   
<div style="float: right;">        	
	<table style="border:0px;">
        <tr>
            <td colspan="4"><span id="hms_timer"></span></td>
        </tr>		
	</table>
<script>
    $(function(){
        $('#hms_timer').countdowntimer({
            hours : 3,
            minutes :10,
            seconds : 10,
            size : "lg",
//					pauseButton : "pauseBtnhms",
//					stopButton : "stopBtnhms"
        });
    });
</script>	
</div>