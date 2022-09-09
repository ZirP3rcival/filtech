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
//$lsql = mysqli_query($con,"SELECT COUNT(*) FROM ft2_asmt_essay WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj'"); 
//while($rf = mysqli_fetch_assoc($lsql)) { $lmit = $rf['itm']; }
	
$ssql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_data_es WHERE sid='$sid' AND ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND asid='$fsbj'"); 	
  while($rz = mysqli_fetch_assoc($ssql))
   { $mc = $rz['ctr'];  }	

if($mc<=0) {
	$fsql = mysqli_query($con,"SELECT * FROM ft2_asmt_essay WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' ORDER BY RAND()"); // LIMIT $lmit
	  while($r = mysqli_fetch_assoc($fsql))
	   { 
		   $aky=$r['qky'];
		   $qno=$r['id'];
		   
	       $sqlx = mysqli_query($con, "INSERT INTO ft2_asmt_data_es(sid, qno, ans, ascode, syr, fid, grde, asid) VALUES('$sid', '$qno', '', '$fcod', '$fsyr', '$fid', '$fgrd', '$fsbj')");
	   }
}
	//think of solution to display assessment	
	$i=0;
	$fsql = mysqli_query($con,"SELECT ft2_asmt_data_es.*, ft2_asmt_data_es.id AS aid, ft2_asmt_essay.* FROM ft2_asmt_essay 
INNER JOIN ft2_asmt_data_es ON ft2_asmt_data_es.qno=ft2_asmt_essay.id
WHERE ft2_asmt_data_es.ascode = '$fcod' AND ft2_asmt_data_es.fid='$fid' AND ft2_asmt_data_es.grde='$fgrd'
AND ft2_asmt_data_es.syr='$syr' AND ft2_asmt_data_es.asid='$fsbj' AND ft2_asmt_data_es.sid='$sid'"); 
  while($r = mysqli_fetch_assoc($fsql))
   { $i++; $ans=$r['ans']; $aid=$r['aid']; 
		if($ans<>'') { $clr='#82BAEB'; } else { $clr='#fff'; }
?>
<div class="col-xs-12 col-md-12" id="qst<?=$aid?>" style="background: <?=$clr?>; float: left; margin: 20px 5px 10px 5px; text-align: justify; font-size: 13px; color: #010C3E; line-height: 25px;"><em><strong><?=$i?>. <?=$r['qst'];?></strong></em></div><br /><br />
 <div class="col-xs-12 col-md-11" style="margin-left: 25px;">
	  <textarea class="form-control pcat" id="en<?=$aid?>" name="en<?=$aid?>" data-id="<?=$aid?>" rows="5" required style="width: 100%" ><?=$ans?></textarea>  
 </div>
<?php  }?>
</div>
<?php if($mde!='C') {	?>      
 <button class="btn btn-info btnen" type="button" id="btnen" data-rid="<?=$rid?>" style="float:right;margin-bottom: 15px;">Submit Answers</button>
<?php } else { ?>
    <button class="btn btn-success" type="button" id="btnschk" data-rid="<?=$rid?>" style="float:right; margin-bottom: 15px; color: #000;">Submit Grade</button>
    <input type="number" id="rate" min="50" max="100" name="rate" value="<?=$val;?>" onKeyPress="if(this.value.length==3) return false;" style="font-size: 3.0rem; float:right; margin-right: 15px; width: 100px; ">
<?php } ?>      
    </div>  
<div class="clearfix">  </div>                           
</div>
<script>	
$(document).ready(function(){
var mde='<?=$mde?>';
	
if(mde=='C') { DisabledItems(); }	
	
function DisabledItems() {
    $(':checkbox, :radio, #btnschk, .pcat').prop('disabled', true);
}
		
$(document).on("change",".pcat",function() {
var id=$(this).data('id'); 
var vl=document.getElementById("en"+id).value;		
	$.ajax({
		   data: { id:id, vl:vl },
		   type: "post",
		   url: "answercontroller.php?prc=S",
		   cache: false,	
		   success: function(data){
			   $('#qst'+id).css('background','#82baeb');
			   return;
				}
			});		  
});	
	
$(document).on("click","#btnen",function() {
var id=$(this).data('rid');
bootbox.confirm("Submit Essay Answer?", function(result) {	
  if (result) {	 	
	  $('#POPMODAL').hide();
	$.ajax({
		   data: { id:id },
		   type: "post",
		   url: "answercontroller.php?prc=SX",
		   cache: false,	
		   success: function(data){
			var dialog = bootbox.dialog({
				title: 'Notification :',
					size: 'small',
					message: "<span style='color:#1F02FE;'>Essay Answer Submitted Successfully!!!</span>", 
					}).on('hidden.bs.modal', function() {
					$('body').addClass('modal-open'); location.reload(); });
					}
			});		  
  }
 });	  
});		
	
$(document).on("click","#btnschk",function() {
	var rte=$('#rate').val();
	var id=$(this).data('rid');
				$.ajax({
					   type: "post",
					   url: "resultscontroller.php?prc=GS",
					   data: { id:id, rte:rte },					
					   cache: false,	
					   dataType: 'json',					
					   success: function(data){
						var dialog = bootbox.dialog({
							title: 'Notification :',
								size: 'small',
								message: "<span style='color:#1F02FE;'>Essay Assessment Grade Submitted Successfully!!!</span>", 
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
		else { 	$('#btnschk').prop('disabled', false); }
	} 
	else { $('#btnschk').prop('disabled', true); return; }
});	
	
});
</script>