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
$mde=$_REQUEST['mde'];
$val=$_REQUEST['val'];
if($sid==$fid) { $sid=$_REQUEST['sid']; }
?>

<?php if($mde=='') {	include('countdown_timer.php');  } ?>

<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
<div class="col-md-12 col-xs-12" style="padding:0px 15px; border-right : 1px solid #ddd; box-shadow : 5px 0px 5px 1px #eaeaea; margin-bottom: 15px;">
<?php	
$ssql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_data_mc WHERE sid='$sid' AND ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND asid='$fsbj'"); 	
  while($rz = mysqli_fetch_assoc($ssql))
   { $mc = $rz['ctr'];  }	

if($mc<=0) {
	$fsql = mysqli_query($con,"SELECT * FROM ft2_asmt_multiplechoice WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' ORDER BY RAND()"); // LIMIT $lmit
	  while($r = mysqli_fetch_assoc($fsql))
	   { 
		   $aky=$r['qky'];
		   $qno=$r['id'];
		   
	       $sqlx = mysqli_query($con, "INSERT INTO ft2_asmt_data_mc(sid, qno, ans, aky, rslt, ascode, syr, fid, grde, asid) VALUES('$sid', '$qno', '', '$aky', '0', '$fcod', '$fsyr', '$fid', '$fgrd', '$fsbj')");
	   }
}
	//think of solution to display assessment	
	$i=0; $tot=0;
	$fsql = mysqli_query($con,"SELECT ft2_asmt_data_mc.*, ft2_asmt_data_mc.id AS aid, ft2_asmt_multiplechoice.* FROM ft2_asmt_multiplechoice 
INNER JOIN ft2_asmt_data_mc ON ft2_asmt_data_mc.qno=ft2_asmt_multiplechoice.id
WHERE ft2_asmt_data_mc.ascode = '$fcod' AND ft2_asmt_data_mc.fid='$fid' AND ft2_asmt_data_mc.grde='$fgrd'
AND ft2_asmt_data_mc.syr='$syr' AND ft2_asmt_data_mc.asid='$fsbj' AND ft2_asmt_data_mc.sid='$sid'"); 
	
  while($r = mysqli_fetch_assoc($fsql))
   { $i++; $ans=$r['ans']; $aid=$r['aid']; $rslt=$r['rslt'];
		if($ans<>'') { $clr='#82BAEB'; } else { $clr='#fff'; }
	    if($mde=='C') {
	    	if($rslt=='1') { $faw='fa fa-check'; $tot+=1; } else { $faw='fa fa-times'; }
		}
?>
<div class="col-xs-12 col-md-12" id="qst<?=$aid?>" style="background: <?=$clr?>; float: left; margin: 20px 5px 10px 5px; text-align: justify; font-size: 13px; color: #010C3E; line-height: 25px;"><span class="<?=$faw; ?>"></span>
<em><strong><?=$i?>. <?=$r['qst'];?></strong></em></div><br /><br />
 <div class="col-xs-12 col-md-12" style="margin-left: 25px;">
	  <input type="radio" class="pcat" name="mc<?=$i?>" data-id="<?=$aid?>" data-val="A" <?=($ans== 'A' ? 'checked' : '');?>>&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>A. </strong><?=$r['qa1'];?></span><br/>
	  <input type="radio" class="pcat" name="mc<?=$i?>" data-id="<?=$aid?>" data-val="B" <?=($ans== 'B' ? 'checked' : '');?>>&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>B. </strong><?=$r['qa2'];?></span><br/>
	  <input type="radio" class="pcat" name="mc<?=$i?>" data-id="<?=$aid?>" data-val="C" <?=($ans== 'C' ? 'checked' : '');?>>&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>C. </strong><?=$r['qa3'];?></span><br/>
	  <input type="radio" class="pcat" name="mc<?=$i?>" data-id="<?=$aid?>" data-val="D" <?=($ans== 'D' ? 'checked' : '');?>>&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>D. </strong><?=$r['qa4'];?></span><br/>
 </div>
 <input type="hidden" id="ans<?=$aid?>" name="ans<?=$aid?>" value="" required> 
<?php  }?>
</div>

<?php if($mde!='C') {	?>  
	<button class="btn btn-info btnen" type="button" id="btnmc" data-rid="<?=$rid?>" style="float:right; margin-bottom: 15px;">Submit Answers</button>
<?php } else { ?>
    <button class="btn btn-success" type="button" id="btnmchk" data-rid="<?=$rid?>" style="float:right; margin-bottom: 15px; color: #000;">Submit Grade</button>
    <span style="font-size: 3.5rem; float:left; margin-right: 15px; "><strong style="color: #100570;"><?=$tot?></strong> / <?=$i?></span>
    <input type="number" id="rate" min="50" max="100" name="rate" value="<?=$val;?>" onKeyPress="if(this.value.length==3) return false;" style="font-size: 3.0rem; float:right; margin-right: 15px; width: 100px; ">
<?php } ?>   
    </div>  
<div class="clearfix">  </div>                           
</div>
<script>
$(document).ready(function(){
var mde='<?=$mde?>';
var tot='<?=$tot?>';	
	
if(mde=='C') { DisabledItems(); }	
	
function DisabledItems() {
    $(':checkbox, :radio, #btnmchk').prop('disabled', true);
}
	
$(document).on("click",".pcat",function() {
	var id=$(this).data('id');
	var vl=$(this).data('val');
	$('#ans'+id).val(vl);
	$.ajax({
		   data: { id:id, vl:vl },
		   type: "post",
		   url: "answercontroller.php?prc=M",
		   cache: false,	
		   success: function(data){
			   $('#qst'+id).css('background','#82baeb');
			   return;
				}
			});	
});	
	
$(document).on("click","#btnmc",function() {
var id=$(this).data('rid');
bootbox.confirm("Submit Multiple Choice Answer?", function(result) {	
  if (result) {	 	
	  $('#POPMODAL').hide();
	$.ajax({
		   data: { id:id },
		   type: "post",
		   url: "answercontroller.php?prc=MX",
		   cache: false,	
		   success: function(data){
			var dialog = bootbox.dialog({
				title: 'Notification :',
					size: 'small',
					message: "<span style='color:#1F02FE;'>Multiple Choice Answer Submitted Successfully!!!</span>", 
					}).on('hidden.bs.modal', function() {
					$('body').addClass('modal-open'); location.reload(); });
					}
			});		  
  }
 });	  
});	
	
$(document).on("click","#btnmchk",function() {
	var rte=$('#rate').val();
	var id=$(this).data('rid');
				$.ajax({
					   type: "post",
					   url: "resultscontroller.php?prc=GM",
					   data: { id:id, rte:rte },					
					   cache: false,	
					   dataType: 'json',					
					   success: function(data){
						var dialog = bootbox.dialog({
							title: 'Notification :',
								size: 'small',
								message: "<span style='color:#1F02FE;'>Multiple Choice Grade Submitted Successfully!!!</span>", 
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
		else { 	$('#btnmchk').prop('disabled', false); }
	} 
	else { $('#btnmchk').prop('disabled', true); return; }
});	
		

});
</script>