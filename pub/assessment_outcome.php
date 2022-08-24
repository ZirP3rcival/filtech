<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];
$grd=$_SESSION['grde'];  	
$sec=$_SESSION['sec'];
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
<div class="col-lg-12 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-pencil-square-o" style="margin-right: 15px; font-size: 2em;"></span>Assessment Activity</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng Pagsusulit</h6>
		  </div>	  
		<div class="card-block box" style="padding: 10px 15px;">
			<div style="background: #FFF;"> 
			     <div class="col-xs-12 col-md-10" style="padding-bottom: 0px;">
			     <i class="fa fa-book"  style="margin-right: 15px; font-size: 2em; float: left;"></i>
					 <div class="col-xs-12 col-md-3"  style="color: #050247; padding: 4px; font-size: 13px; font-weight: 700;">Teacher</div>
					 <div class="col-xs-12 col-md-3"  style="color: #050247; padding: 4px; font-size: 13px; ">Subject</div>
					 <div class="col-xs-12 col-md-3"  style="color: #050247; padding: 4px; font-size: 13px; ">Assessment Code</div>
					 <div class="col-xs-6 col-md-1"  style="color: #050247;?>; padding: 4px; font-size: 13px; ">Duration<br><span style="font-size: 11px">(in minutes)</span></div>
				</div>
					 <div class="col-xs-12 col-md-2"  style="color: #E70A0E; padding: 4px; font-size: 11px; ">Blank Icons Means <strong>NOT</strong> Available or <strong>DONE</strong> Already</div>
				 <div class="clearfix" style="border-bottom: 1px solid #000"></div>
				<div class="list-group" style="margin-bottom: 5px;">
				<?php 
				$dsql = mysqli_query($con,"SELECT ft2_faculty_assessment.*, ft2_users_account.id, ft2_users_account.alyas, ft2_module_subjects.* FROM ft2_faculty_assessment 
				INNER JOIN ft2_users_account ON ft2_users_account.id=ft2_faculty_assessment.fid
				INNER JOIN ft2_module_subjects ON ft2_module_subjects.id=ft2_faculty_assessment.asid
				WHERE ft2_faculty_assessment.grde='$grd' AND ft2_faculty_assessment.sec='$sec' AND used='Y'
				ORDER BY ft2_faculty_assessment.scdsc ASC"); 
					
				  while($r = mysqli_fetch_assoc($dsql))
				   { $fid=$r['fid'];
					 $fsbj=$r['asid'];
					 $fcod=$r['ascode'];
					 $timer=$r['timer'];	
					
				$sql1 = mysqli_query($con,"SELECT COUNT(ft2_asmt_data_result.id) AS ctr, ft2_asmt_data_result.* FROM ft2_asmt_data_result WHERE ft2_asmt_data_result.grde='$grd' AND ft2_asmt_data_result.syr='$syr' AND ft2_asmt_data_result.asid='$fsbj' AND ft2_asmt_data_result.fid='$fid' AND ft2_asmt_data_result.ascode='$fcod' AND ft2_asmt_data_result.sid='$sid'");  
				  while($r1 = mysqli_fetch_assoc($sql1))	{ 
					  $xst=$r1['ctr']; $rid=$r1['id'];
					  $mch=$r1['mch']; 
					  $idf=$r1['idf']; 
					  $enu=$r1['enu']; 
					  $esy=$r1['esy']; 					  
					  
					  if($xst<=0){
						  $sqli1 = mysqli_query($con, "INSERT INTO ft2_asmt_data_result(sid, ascode, syr, fid, grde, sec, asid, timer ) VALUES('$sid', '$fcod', '$syr', '$fid', '$grd', '$sec','$fsbj', '$timer')");
					  }
				  } 					
					?>            		                       
				<div class="dvhvr" style="padding: 5px 0px; margin: 0px; border-bottom: #413E3E 1px solid;">
				<div class="col-xs-12 col-md-10" style="padding-bottom: 0px;">
				<i class="fa fa-list-ol"  style="margin-right: 15px; font-size: 2em; float: left;"></i>
				 <div class="col-xs-12 col-md-3"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; font-weight: 700;"><?=strtoupper($r['alyas'])?></div>
				 <div class="col-xs-12 col-md-3"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; "><?=$r['subj'];?></div> 
				 <div class="col-xs-12 col-md-3"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; "><?=$r['scdsc'];?></div>
				 <div class="col-xs-6 col-md-1"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; "><?=$r['timer'];?></div>
				 </div>
				<div class="col-xs-12 col-md-2 user-img" style="font-size: 11px; color: #042601; float: right;">
				
				<?php if($mch=='N') { 		
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_multiplechoice WHERE ft2_asmt_multiplechoice.grde='$grd' AND ft2_asmt_multiplechoice.syr='$syr' AND ft2_asmt_multiplechoice.asid='$fsbj' AND ft2_asmt_multiplechoice.fid='$fid' AND ft2_asmt_multiplechoice.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-info btn-sm fa fa-file-text-o mcbtn" data-rid="<?=$rid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-fsyr="<?=$syr?>" data-fcod="<?=$fcod?>" title="Multiple Choice Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>	
				
				<?php if($enu=='N') {
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_enumeration WHERE ft2_asmt_enumeration.grde='$grd' AND ft2_asmt_enumeration.syr='$syr' AND ft2_asmt_enumeration.asid='$fsbj' AND ft2_asmt_enumeration.fid='$fid' AND ft2_asmt_enumeration.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-success btn-sm fa fa-file-text-o enbtn" data-rid="<?=$rid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-fsyr="<?=$syr?>" data-fcod="<?=$fcod?>"  title="Enumeration Type Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>		
				
				<?php if($idf=='N') {
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_identification WHERE ft2_asmt_identification.grde='$grd' AND ft2_asmt_identification.syr='$syr' AND ft2_asmt_identification.asid='$fsbj' AND ft2_asmt_identification.fid='$fid' AND ft2_asmt_identification.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-warning btn-sm fa fa-file-text-o idbtn" data-rid="<?=$rid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-fsyr="<?=$syr?>" data-fcod="<?=$fcod?>"  title="Identification Type Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>		
				
				<?php if($esy=='N') {
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_essay WHERE ft2_asmt_essay.grde='$grd' AND ft2_asmt_essay.syr='$syr' AND ft2_asmt_essay.asid='$fsbj' AND ft2_asmt_essay.fid='$fid' AND ft2_asmt_essay.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-primary btn-sm fa fa-file-text-o esbtn" data-rid="<?=$rid?>" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-fsyr="<?=$syr?>" data-fcod="<?=$fcod?>"  title="Essay Type Assessment" style="font-size: 16px; padding: 6px;"></button>
				<?php } } ?>								
				</div><div class="clearfix"></div>
				</div>
				 <?php }  ?>
				 </div>
			</div>  
		<div class="clearfix">  </div>                          
		</div>
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
bootbox.alert("<span style='font-size: 18px; color: #E70A0E; font-weight: 600;'>WARNING:</span><br><br><span style='font-size: 14px; color: #337AB7;'>Continuous Countdown Timer Implemented!!!<br><br>Automatic Saving and Locking of Assessment when Timer Ends...</span>");
	
$(document).on("click",".mcbtn",function() {	
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fcod');
	$('#content').empty();
	$("#content").load('assessment_multiplechoice.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod);
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
	var fcod=$(this).data('fcod');
	$('#content').empty();
	$("#content").load('assessment_enumeration.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod);
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Enumeration Assessment Content'+'<div id="timer" style="float: right; margin-right:25px;"></div>');
	$('#POPMODAL').modal('show');	  
});		
	
$(document).on("click",".idbtn",function() {	
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fcod');
	$('#content').empty();
	$("#content").load('assessment_identification.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod);
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Identification Assessment Content'+'<div id="timer" style="float: right; margin-right:25px;"></div>');
	$('#POPMODAL').modal('show');
});	
	
$(document).on("click",".esbtn",function() {
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fcod');
	$('#content').empty();
	$("#content").load('assessment_essay.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod);
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Essay Assessment Content');
	$('#POPMODAL').modal('show');	  
});		
	
$(document).on("click","#editor",function() {
	 window.open('https://docs.google.com/presentation/u/0/','_blank');
});		
	
});
</script>	