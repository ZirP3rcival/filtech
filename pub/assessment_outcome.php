<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];
$grd=$_SESSION['grde'];  	
$sec=$_SESSION['sec'];

if($fsbj=='') { $fsbj=$_REQUEST['fsbj']; }
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
 <form method="post" action="?page=assessment_outcome" id="frmleks" name="frmleks"> </form> 
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Subject : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">

<select name="fsbj" required class="form-control" id="fsbj" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php	
$dsql = mysqli_query($con,"SELECT ft2_asmt_data_result.sid, ft2_asmt_data_result.grde, ft2_asmt_data_result.sec, ft2_asmt_data_result.syr, ft2_asmt_data_result.asid, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj 
FROM ft2_asmt_data_result
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_asmt_data_result.asid
WHERE ft2_asmt_data_result.sid='$sid' AND ft2_asmt_data_result.grde='$grd' AND ft2_asmt_data_result.sec='$sec' AND ft2_asmt_data_result.syr = '$syr'
GROUP BY ft2_module_subjects.subj ORDER BY ft2_module_subjects.subj ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['sjid'];?>" <?=($fsbj == $rg['sjid'] ? 'selected' : '');?>><?=$rg['subj'];?></option> 
<?php  } ?>  
        </select>      
        </div>
	<div class="clearfix"></div>   
  </div>
    </div>  
                          
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
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
<div class="row">
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;">Assessment Type</div>
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;">Assessment Grade</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Score</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Remarks</div>
<div class="clearfix"></div>
</div>
</li>
<?php 
$dsql = mysqli_query($con,"SELECT ft2_asmt_data_result.*,
CASE WHEN mch='Y' OR mch='N' THEN '50.00' ELSE mch END AS mch, 
CASE WHEN enu='Y' OR enu='N' THEN '50.00' ELSE enu END AS enu, 
CASE WHEN idf='Y' OR idf='N' THEN '50.00' ELSE idf END AS idf, 
CASE WHEN esy='Y' OR esy='N' THEN '50.00' ELSE esy END AS esy,
ft2_module_subjects.id AS sjid, ft2_module_subjects.subj, ft2_assessment_set.*
FROM ft2_asmt_data_result
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_asmt_data_result.asid
INNER JOIN ft2_assessment_set ON ft2_assessment_set.ascode = ft2_asmt_data_result.ascode
WHERE ft2_asmt_data_result.sid='$sid' AND ft2_asmt_data_result.grde='$grd' AND ft2_asmt_data_result.sec='$sec' AND ft2_asmt_data_result.syr = '$syr' AND ft2_asmt_data_result.asid='$fsbj' GROUP BY ft2_module_subjects.subj ORDER BY ft2_module_subjects.subj ASC");
  while($rx = mysqli_fetch_assoc($dsql))
   { 
	  $mch=$rx['mch'];   $rid=$rx['rid']; $sid=$rx['sid'];
	  $idf=$rx['idf'];   $res=$rx['res']; if($res=='') { $res='0'; }
	  $enu=$rx['enu'];   if(($res>=50)&($res<75)) { $rc="#D9534F"; } else if(($res>=75)&($res<=100)) { $rc="#0084FF"; }
	  $esy=$rx['esy'];   $rte=$rx['rte'];
	  $fcod=$rx['ascode']; 
    ?>      
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
<div class="row">
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['scdsc']?></div>
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['mch']?> | <?=$rx['enu']?> | <?=$rx['idf']?> | <?=$rx['esy']?> </div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['res']?></div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><span style="color: <?=$rc?>"><?=$rx['rte']?></span></div>
<div class="clearfix"></div>
</div>
</li>                                 
 <?php } ?></div>   
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
var fsbj= document.getElementById("fsbj").value;			
	
$(document).on("click",".mcbtn",function() {	
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_multiplechoice.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Multiple Choice Assessment Content');
	$('#POPMODAL').modal('show');  	
});		
	
$(document).on("click",".enbtn",function() {	
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_enumeration.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Enumeration Assessment Content');
	$('#POPMODAL').modal('show');  	
});
	
$(document).on("click",".idbtn",function() {	
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_identification.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Identification Assessment Content');
	$('#POPMODAL').modal('show');  	
});
	
$(document).on("click",".esbtn",function() {	
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_essay.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Essay Assessment Content');
	$('#POPMODAL').modal('show');  	
});
				
$(document).on("click","#brpt",function() {	
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');	
var url = 'assessment_report.php?fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsec='+fsec;
	window.open(url, 'blank');
});
	
});
</script>	