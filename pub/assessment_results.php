<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fgrd=$_POST['fgrd'];
$fsec=$_POST['fsec'];
$fsbj=$_POST['fsbj'];
$fscd=$_POST['fscd'];

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
if($fsec=='') { $fsec=$_REQUEST['fsec']; }
if($fsbj=='') { $fsbj=$_REQUEST['fsbj']; }
if($fscd=='') { $fscd=$_REQUEST['fscd']; }
?>
<style>
.form-control  {
    color: #0B0237;
	font-weight: 600;
}	
</style>
<div class="content-inner-all">
    <!-- user account info start -->
    <div class="income-order-visit-user-area m-bottom ">
        <div class="container-fluid">           
            <div class="row rowflx" style="margin-bottom: 50px;">
<div class="col-lg-3 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-list-alt" style="margin-right: 15px; font-size: 1.8em;"></span>Assessment Results</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Resulta ng Pagtatasa</h6>
		  </div>	  
<div class="card-block box" style="padding: 10px 15px;">
	<div style="background: #FFF;"> 
 <form method="post" action="?page=assessment_results" id="frmleks" name="frmleks"> </form> 
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">	
<select name="fgrd" required class="form-control" id="fgrd" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php
$dsql = mysqli_query($con,"SELECT DISTINCT(ft2_faculty_schedule.grde),ft2_faculty_schedule.fid, ft2_grade_data.* FROM ft2_faculty_schedule 
INNER JOIN ft2_grade_data ON ft2_faculty_schedule.grde = ft2_grade_data.id
WHERE ft2_faculty_schedule.fid = '$fid' AND ft2_faculty_schedule.syr = '$syr' ORDER BY ft2_grade_data.grd ASC");
	
  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['id'];?>" <?=($fgrd == $rg['id'] ? 'selected' : '');?>><?=$rg['grd'];?></option> 
<?php } ?>  
        </select></div>
	<div class="clearfix"></div>
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Section : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">	
<select name="fsec" required class="form-control" id="fsec" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php
$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_section_data.id, ft2_section_data.sect, ft2_section_data.grd FROM ft2_faculty_schedule INNER JOIN ft2_section_data ON ft2_section_data.id=ft2_faculty_schedule.sec WHERE ft2_faculty_schedule.fid ='$fid' AND ft2_faculty_schedule.grde = '$fgrd' AND ft2_faculty_schedule.syr = '$syr'");
	
  while($rs = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rs['id'];?>"  <?=($fsec== $rs['id'] ? 'selected' : '');?>><?=$rs['sect'];?></option> 
<?php } ?>  
        </select></div>
	<div class="clearfix"></div>
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Subject : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">

<select name="fsbj" required class="form-control" id="fsbj" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php	
$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj FROM ft2_faculty_schedule 
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_faculty_schedule.sjid
WHERE ft2_faculty_schedule.fid = '$fid' AND ft2_faculty_schedule.grde='$fgrd' AND ft2_faculty_schedule.syr = '$syr' GROUP BY ft2_module_subjects.subj
ORDER BY ft2_faculty_schedule.sjid ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['sjid'];?>" <?=($fsbj == $rg['sjid'] ? 'selected' : '');?>><?=$rg['subj'];?></option> 
<?php  } ?>  
        </select>      
        </div>
	<div class="clearfix"></div>   
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Assessment Type : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">

<select name="fscd" required class="form-control" id="fscd" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();">
          <option value="" >- Select -</option>      
<?php 
  $lsql = mysqli_query($con,"SELECT * FROM ft2_faculty_assessment WHERE fid = '$fid' AND grde='$fgrd' AND sec='$fsec' AND asid = '$fsbj ' ORDER BY ascode ASC");
	
  while($rg = mysqli_fetch_assoc($lsql))
   { ?>  
    <option value="<?=$rg['ascode'];?>" <?=($fscd == $rg['ascode'] ? 'selected' : '');?>><?=$rg['scdsc'];?></option> 
<?php } ?>                
</select>      
        </div>
	<div class="clearfix"></div>   
  </div>
    </div>  
	<div class="clearfix">  </div>   
                          
</div>
	</div>
</div>  
<div class="col-lg-9 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-pencil-square-o" style="margin-right: 15px; font-size: 2em;"></span>Student Assessment Grade	 
			 <button class="btn btn-info btn-sm fa fa-print" id="brpt" name="brpt" style="font-size: 16px; padding: 6px; margin-left: 15px; float: right;"  data-rid="<?=$rid?>" data-sid="<?=$sid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$fgrd?>" data-fsec="<?=$fsec?>" data-fscd="<?=$fscd?>"></button>	
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Grado ng Estudyante sa Pagtatasa</h6>
		  </div>
<div class="card-block">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;"><div class="row">
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;">Photo</div>
<div class="col-xs-10 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">Name of Students</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Assessment Type</div>
<div class="col-xs-2 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">Assessment Contents</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Result</div>
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px; text-align: center;">Reset</div>
<div class="clearfix"></div>
</div.
></li>
<?php 
if(($fgrd!='') && ($fsec!='') && ($fsbj!='') && ($fscd!=''))	{
$dsql = mysqli_query($con,"SELECT ft2_users_account.*, ft2_asmt_data_result.*,ft2_asmt_data_result.id as rid, ft2_module_subjects.*, ft2_assessment_set.*
FROM ft2_users_account 
INNER JOIN ft2_asmt_data_result ON ft2_asmt_data_result.sid = ft2_users_account.id 
INNER JOIN ft2_assessment_set ON ft2_assessment_set.ascode = ft2_asmt_data_result.ascode
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_asmt_data_result.asid
WHERE ft2_asmt_data_result.grde = '$fgrd' AND ft2_asmt_data_result.sec = '$fsec' AND ft2_asmt_data_result.fid='$fid' 
AND ft2_asmt_data_result.asid='$fsbj' AND ft2_asmt_data_result.ascode='$fscd'
ORDER BY alyas ASC");
 
  while($rx = mysqli_fetch_assoc($dsql))
   { $sphoto='data:image/png;base64,'.''.$rx['ploc']; 
	  $mch=$rx['mch'];   $rid=$rx['rid']; $sid=$rx['sid'];
	  $idf=$rx['idf'];   $res=$rx['res']; if($res=='') { $res='0'; }
	  $enu=$rx['enu'];   if(($res>=50)&($res<75)) { $rc="#D9534F"; } else if(($res>=75)&($res<=100)) { $rc="#0084FF"; }
	  $esy=$rx['esy'];   $rte=$rx['rte'];
	  $fcod=$rx['ascode']; 
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;">
<div class="row">
	<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;"><img src="<?=$sphoto?>" class="img-responsive logo" style="padding: 0px; width: 50%;" onerror="this.src='../img/missing.png'"></div>
	<div class="col-xs-10 col-md-3" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['alyas'];?></div>
	<div class="col-xs-12 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['scdsc'];?></div>
	<div class="col-xs-8 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">
				<?php if($mch!='N') { 		
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_multiplechoice WHERE ft2_asmt_multiplechoice.grde='$fgrd' AND ft2_asmt_multiplechoice.syr='$syr' AND ft2_asmt_multiplechoice.asid='$fsbj' AND ft2_asmt_multiplechoice.fid='$fid' AND ft2_asmt_multiplechoice.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-info btn-sm fa fa-file-text-o mcbtn" data-rid="<?=$rid?>" data-sid="<?=$sid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$fgrd?>" data-fsec="<?=$fsec?>" data-fscd="<?=$fscd?>" data-val="<?=$mch?>" title="Multiple Choice Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>	
				
				<?php if($enu!='N') {
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_enumeration WHERE ft2_asmt_enumeration.grde='$fgrd' AND ft2_asmt_enumeration.syr='$syr' AND ft2_asmt_enumeration.asid='$fsbj' AND ft2_asmt_enumeration.fid='$fid' AND ft2_asmt_enumeration.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-success btn-sm fa fa-file-text-o enbtn" data-rid="<?=$rid?>" data-sid="<?=$sid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$fgrd?>" data-fsec="<?=$fsec?>" data-fscd="<?=$fscd?>" data-val="<?=$enu?>"  title="Enumeration Type Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>		
				
				<?php if($idf!='N') {
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_identification WHERE ft2_asmt_identification.grde='$fgrd' AND ft2_asmt_identification.syr='$syr' AND ft2_asmt_identification.asid='$fsbj' AND ft2_asmt_identification.fid='$fid' AND ft2_asmt_identification.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-warning btn-sm fa fa-file-text-o idbtn" data-rid="<?=$rid?>" data-sid="<?=$sid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$fgrd?>" data-fsec="<?=$fsec?>" data-fscd="<?=$fscd?>" data-val="<?=$idf?>"  title="Identification Type Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>		
				
				<?php if($esy!='N') {
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_essay WHERE ft2_asmt_essay.grde='$fgrd' AND ft2_asmt_essay.syr='$syr' AND ft2_asmt_essay.asid='$fsbj' AND ft2_asmt_essay.fid='$fid' AND ft2_asmt_essay.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-primary btn-sm fa fa-file-text-o esbtn" data-rid="<?=$rid?>" data-sid="<?=$sid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$fgrd?>" data-fsec="<?=$fsec?>" data-fscd="<?=$fscd?>" data-val="<?=$esy?>" title="Essay Type Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>								
		 </div>
	<div class="col-xs-12 col-md-2" style="padding-bottom: 0px; padding-right: 0px; font-size: 13px; font-weight: 600;"><?=$res?> | <span style="color: <?=$rc?>"><?=$rte?></span></div>
	<div class="col-xs-10 col-md-1" style="padding-bottom: 0px; padding-right: 0px;">
		<a href="resultscontroller.php?prc=R&rid=<?=$rid?>&fsbj=<?=$fsbj?>&fgrd=<?=$fgrd?>&fsec=<?=$fsec?>&fscd=<?=$fscd?>" class="trash" style="margin-right:10px;" title="Reset Assessment" onclick="return confirm('Reset Assessment?')">
					<button class="btn btn-danger btn-sm fa fa-refresh rsbtn"  style="font-size: 16px; padding: 6px; margin-left: 15px;"></button>	
		</a>	
	</div>
	 <div class="clearfix"></div>
 </div>
 </li>

 <?php }} ?></div>   
</div> 
</div>  
            </div>           
        </div>
    </div>
    <!-- user account info end -->
</div>
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
var fgrd= document.getElementById("fgrd").value;
var fsbj= document.getElementById("fsbj").value;	
var fsec= document.getElementById("fsec").value;	
var fscd= document.getElementById("fscd").value;
var ftxt= $("#fscd option:selected").text();			
	
$(document).on("click",".mcbtn",function() {	
	var rid=$(this).data('rid');
	var sid=$(this).data('sid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fscd');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_multiplechoice.php?rid='+rid+'&sid='+sid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Multiple Choice Assessment Content');
	$('#POPMODAL').modal('show');  	
});		
	
$(document).on("click",".enbtn",function() {	
	var rid=$(this).data('rid');
	var sid=$(this).data('sid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fscd');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_enumeration.php?rid='+rid+'&sid='+sid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Enumeration Assessment Content');
	$('#POPMODAL').modal('show');  	
});
	
$(document).on("click",".idbtn",function() {	
	var rid=$(this).data('rid');
	var sid=$(this).data('sid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fscd');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_identification.php?rid='+rid+'&sid='+sid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Identification Assessment Content');
	$('#POPMODAL').modal('show');  	
});
	
$(document).on("click",".esbtn",function() {	
	var rid=$(this).data('rid');
	var sid=$(this).data('sid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fscd');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_essay.php?rid='+rid+'&sid='+sid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Essay Assessment Content');
	$('#POPMODAL').modal('show');  	
});
				
$(document).on("click","#brpt",function() {	
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fscd=$(this).data('fscd');	
var url = 'assessment_report.php?fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fscd='+fscd+'&fsec='+fsec;
	window.open(url, 'blank');
});
	
});
</script>	