<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$sid=$_REQUEST['sid'];
$syr=$_SESSION['year'];

$dsql = mysqli_query($con,"SELECT ft2_grade_record.* FROM ft2_grade_record WHERE ft2_grade_record.sid='$sid' AND ft2_grade_record.syr='$syr'");
	
  while($rs = mysqli_fetch_assoc($dsql))
   { 
	    $val1=$rs['grd1'];
		$val2=$rs['grd2'];
		$val3=$rs['grd3'];
		$val4=$rs['grd4'];
   }

?>
<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
<div class="col-xs-12 col-md-3" style="margin-top: 10px;"><div class="col-xs-6 col-md-12" style="padding: 5px 0px;">First Grading</div>    
   <div class="col-xs-6 col-md-12" style="padding: 5px 0px;">
    <input type="number" id="rate1" min="50" max="100" name="rate" value="<?=$val1;?>" onKeyPress="if(this.value.length==3) return false;" style="font-size: 3.0rem; margin-right: 15px; width: 100%; "> </div>  
</div>    
<div class="col-xs-12 col-md-3" style="margin-top: 10px;"><div class="col-xs-6 col-md-12" style="padding: 5px 0px;">Second Grading</div>  
   <div class="col-xs-6 col-md-12" style="padding: 5px 0px;">  
    <input type="number" id="rate2" min="50" max="100" name="rate" value="<?=$val2;?>" onKeyPress="if(this.value.length==3) return false;" style="font-size: 3.0rem; margin-right: 15px; width: 100%; "> </div>    
</div> 
<div class="col-xs-12 col-md-3" style="margin-top: 10px;"><div class="col-xs-6 col-md-12" style="padding: 5px 0px;">Third Grading</div>    
   <div class="col-xs-6 col-md-12" style="padding: 5px 0px;">
    <input type="number" id="rate3" min="50" max="100" name="rate" value="<?=$val3;?>" onKeyPress="if(this.value.length==3) return false;" style="font-size: 3.0rem; margin-right: 15px; width: 100%; "> </div>    
</div> 
<div class="col-xs-12 col-md-3" style="margin-top: 10px;"><div class="col-xs-6 col-md-12" style="padding: 5px 0px;">Fourth Grading</div>  
   <div class="col-xs-6 col-md-12" style="padding: 5px 0px;">  
    <input type="number" id="rate4" min="50" max="100" name="rate" value="<?=$val4;?>" onKeyPress="if(this.value.length==3) return false;" style="font-size: 3.0rem; margin-right: 15px; width: 100%; "> </div>    
</div>  
<div class="col-xs-12 col-md-12" style="margin-top: 10px;">           
    <button class="btn btn-success" type="button" id="btngrde" data-sid="<?=$sid?>" style="margin-top: : 15px; color: #fff; float: right;">Submit Grade</button>
</div>    
    </div>  
<div class="clearfix">  </div>                           
</div>
<script>	
$(document).ready(function(){
var mde='<?=$mde?>';
	
if(mde=='C') { DisabledItems(); }	
	
function DisabledItems() {
    $(':checkbox, :radio, #btngrde, .pcat').prop('disabled', true);
}
		
$(document).on("click","#btngrde",function() {
	var rte1=$('#rate1').val();
	var rte2=$('#rate2').val();
	var rte3=$('#rate3').val();
	var rte4=$('#rate4').val();
	var sid=$(this).data('sid');
				$.ajax({
					   type: "post",
					   url: "resultscontroller.php?prc=GR",
					   data: { sid:sid, rte1:rte1, rte2:rte2, rte3:rte3, rte4:rte4 },					
					   cache: false,	
					   dataType: 'json',					
					   success: function(data){
						var dialog = bootbox.dialog({
							title: 'Notification :',
								size: 'small',
								message: "<span style='color:#1F02FE;'>Student Grade Encoded Successfully!!!</span>", 
								}).on('hidden.bs.modal', function() {
								$('body').addClass('modal-open'); location.reload(); });
							}
						});			
});	
	
$(document).on("keyup","#rate",function() {
	var rte=$('#rate').val();
	if(rte.length>=2) {
		if((rte<50)||(rte>100)) { 
			bootbox.alert("<span style='font-size: 18px; color: #E70A0E; font-weight: 600;'>WARNING:</span><br><br><span style='font-size: 14px; color: #337AB7;'>Invalid Rating Value...<br>Must be from [ 50 - 100 ] Rating Value...</span>");
		} 
		else { 	$('#btngrde').prop('disabled', false); }
	} 
	else { $('#btngrde').prop('disabled', true); return; }
});	
	
});
</script>