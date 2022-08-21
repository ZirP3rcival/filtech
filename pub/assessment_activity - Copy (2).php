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
					 <div class="col-xs-12 col-md-3"  style="color: #050247; padding: 4px; font-size: 12px; font-weight: 700;">Teacher</div>
					 <div class="col-xs-12 col-md-3"  style="color: #050247; padding: 4px; font-size: 12px; ">Subject</div>
					 <div class="col-xs-12 col-md-3"  style="color: #050247; padding: 4px; font-size: 14px; ">Assessment Code</div>
					 <div class="col-xs-6 col-md-1"  style="color: #050247;?>; padding: 4px; font-size: 14px; ">Duration<br><span style="font-size: 11px">(in minutes)</span></div>
				</div>
				 <div class="clearfix" style="border-bottom: 1px solid #000"></div>
				<div class="list-group" style="margin-bottom: 5px;">
				<?php 
				$rowsPerPageRV = 5;
				// Get the search variable from URL
				$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
				$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
				$cp=$currentPageRV;

				$dsql = mysqli_query($con,"SELECT ft2_faculty_assessment.*, ft2_users_account.id, ft2_users_account.alyas, ft2_module_subjects.* FROM ft2_faculty_assessment 
				INNER JOIN ft2_users_account ON ft2_users_account.id=ft2_faculty_assessment.fid
				INNER JOIN ft2_module_subjects ON ft2_module_subjects.id=ft2_faculty_assessment.asid
				WHERE ft2_faculty_assessment.grde='$grd' AND ft2_faculty_assessment.sec='$sec' AND used='Y'
				ORDER BY ft2_faculty_assessment.scdsc ASC LIMIT $offsetRV, $rowsPerPageRV"); 
				  while($r = mysqli_fetch_assoc($dsql))
				   { $fid=$r['fid'];
					 $fsbj=$r['asid'];
					 $fcod=$r['ascode'];
					?>            		                       
				<div class="dvhvr" style="padding: 5px 0px; margin: 0px; border-bottom: #413E3E 1px solid;">
				<div class="col-xs-12 col-md-10" style="padding-bottom: 0px;">
				<i class="fa fa-list-ol"  style="margin-right: 15px; font-size: 2em; float: left;"></i>
				 <div class="col-xs-12 col-md-3"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; font-weight: 700;"><?=strtoupper($r['alyas'])?></div>
				 <div class="col-xs-12 col-md-3"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; "><?=$r['subj'];?></div> 
				 <div class="col-xs-12 col-md-3"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 14px; "><?=$r['scdsc'];?></div>
				 <div class="col-xs-6 col-md-1"  style="color: #021926; padding: 4px 10px 4px 0px; font-size: 14px; "><?=$r['timer'];?></div>
				 </div>
				<div class="col-xs-12 col-md-2 user-img" style="font-size: 11px; color: #042601; float: right; padding: 5px;">
				
				<?php  		
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_multiplechoice WHERE ft2_asmt_multiplechoice.grde='$grd' AND ft2_asmt_multiplechoice.syr='$syr' AND ft2_asmt_multiplechoice.asid='$fsbj' AND ft2_asmt_multiplechoice.fid='$fid' AND ft2_asmt_multiplechoice.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-info btn-sm fa fa-file-text-o mcbtn" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-syr="<?=$syr?>" data-fcod="<?=$fcod?>" title="Multiple Choice Assessment" style="font-size: 18px; padding: 6px;"></button>
				<?php } ?>	
				
				<?php 
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_enumeration WHERE ft2_asmt_enumeration.grde='$grd' AND ft2_asmt_enumeration.syr='$syr' AND ft2_asmt_enumeration.asid='$fsbj' AND ft2_asmt_enumeration.fid='$fid' AND ft2_asmt_enumeration.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-success btn-sm fa fa-file-text-o enbtn" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-syr="<?=$syr?>" data-fcod="<?=$fcod?>"  title="Enumeration Type Assessment" style="font-size: 18px; padding: 6px;"></button>
				<?php }  ?>		
				
				<?php 
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_identification WHERE ft2_asmt_identification.grde='$grd' AND ft2_asmt_identification.syr='$syr' AND ft2_asmt_identification.asid='$fsbj' AND ft2_asmt_identification.fid='$fid' AND ft2_asmt_identification.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-warning btn-sm fa fa-file-text-o idbtn" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-syr="<?=$syr?>" data-fcod="<?=$fcod?>"  title="Identification Type Assessment" style="font-size: 18px; padding: 6px;"></button>
				<?php }  ?>		
				
				<?php 
				$msql = mysqli_query($con,"SELECT COUNT(*) as ctr FROM ft2_asmt_essay WHERE ft2_asmt_essay.grde='$grd' AND ft2_asmt_essay.syr='$syr' AND ft2_asmt_essay.asid='$fsbj' AND ft2_asmt_essay.fid='$fid' AND ft2_asmt_essay.ascode='$fcod'"); 
				  while($rm = mysqli_fetch_assoc($msql))	{ $mctr=$rm['ctr']; }   
					if($mctr>0)   { ?>
						<button class="btn btn-primary btn-sm fa fa-file-text-o esbtn" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$grd?>" data-syr="<?=$syr?>" data-fcod="<?=$fcod?>"  title="Essay Type Assessment" style="font-size: 18px; padding: 6px;"></button>
				<?php }  ?>								
				</div><div class="clearfix"></div>
				</div>
				 <?php }  ?>
				 </div>
				 <!-- Pagination -->
				<div style="float: left; width: 100%; margin-bottom: 10px;">
							<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=assessment_activity&prc=<?=$prc;?>&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
							<div style="width:60%; float:left; font-size:11px;">
							  <?php
				$sql = mysqli_query($con,"SELECT COUNT(*) AS crt, ft2_faculty_assessment.*, ft2_users_account.id, ft2_users_account.alyas, ft2_module_subjects.* FROM ft2_faculty_assessment 
				INNER JOIN ft2_users_account ON ft2_users_account.id=ft2_faculty_assessment.fid
				INNER JOIN ft2_module_subjects ON ft2_module_subjects.id=ft2_faculty_assessment.asid
				WHERE ft2_faculty_assessment.grde='$grd' AND ft2_faculty_assessment.sec='$sec' AND used='Y'
				ORDER BY ft2_faculty_assessment.scdsc ASC LIMIT $rowsPerPageRV");  

				$row = mysqli_fetch_assoc($sql);
				$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

				if($currentPageRV > 1) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=assessment_activity&ppageRV='.($currentPageRV-1).'"></a>'; }

				if($totalPagesRV < $rowsPerPageRV) { $d=$totalPagesRV; }
				else { $d=$currentPageRV + $rowsPerPageRV; }

				if($d > $totalPagesRV) { $d=$totalPagesRV; }
				else { $d=$totalPagesRV; }

				//echo $d.' '.$totalPagesRV;
				for ($x=1;$x<=$d;$x++)
				{  if ($cp==$x) 
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#FF6AC4; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
				   }
				  else
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#162831; margin-left:2px; color:#fff; font-size:11px;" href="?page=assessment_activity&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
				}
				 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 

				if($currentPageRV < $totalPagesRV) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=assessment_activity&ppageRV='.($currentPageRV+1).'"></a>'; }
				?>
							</div>
							<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=assessment_activity&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
				<div class="clearfix"></div>	        
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
	
$(document).on("click",".mcbtn",function() {
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fcod');
	$('#content').empty();
	$("#content").load('assessment_multiplechoice.php?fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod);
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Multiple Choice Assessment Content');
	$('#POPMODAL').modal('show');
});	
	
$(document).on("click",".esbtn",function() {
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fcod');
	$('#content').empty();
	$("#content").load('assessment_essay.php?fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod);
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