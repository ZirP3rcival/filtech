<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];
$grd=$_SESSION['grde'];  	
$sec=$_SESSION['sec']; 
$fsbj=$_REQUEST['fsbj']; 
$fsxt=$_REQUEST['fsxt']; 

$dsql = mysqli_query($con,"SELECT ft2_section_data.*, ft2_grade_data.id, ft2_grade_data.grd AS grde FROM ft2_section_data
INNER JOIN ft2_grade_data ON ft2_section_data.grd = ft2_grade_data.id 
WHERE ft2_grade_data.id='$grd' AND ft2_section_data.id='$sec'
ORDER BY ft2_section_data.sect ");
	
  while($r = mysqli_fetch_assoc($dsql))
   {   $fgrd=$r['grde'];  	
	   $fsec=$r['sect']; 
   }
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include_once('header.php');?>  
<style>
html, body {
    background: #fff!important;
}
	.row { margin: 0px; margin-top: 15px; }	

.no-printx { 
  z-index: 10000!important; 
  position:relative!important;
  float: right!important;
  } 
	
	.list-group-item { padding: 5px; }	
    
@media print{
  #printPageButton {
    display: none!important;
  }
  
    .no-print, .no-print *
    {
        display: none !important;
    }
    @page {
      size: portrait;
    }
  @page {size: portrait; }
}	
</style>	
<body>	
        <div class="container-fluid">  
		<div class="row">          
           <div class="col-xs-12 col-lg-3" style="margin-left: 0px;">
                <img src="../img/logo/banner_ft.png" style="background: #000; padding: 10px; height: 45px; width: 300px;">
           </div>   
           <div class="col-xs-12 col-lg-9">
			 <h4 class="text-white card-title" style="margin: 5px; color: #000; text-align: left;"><?=$fsxt?> - Subject Assessment Report</h4>
			 <h5 class="text-white card-title" style="margin: 5px; color: #000; text-align: left;">Grade : <?=$fgrd?> / Section : <?=$fsec?></h5>
		  </div>
        	<div class="no-printx" style="margin-top: -25px;">
				<button class="no-print btn btn-info fa fa-print" id="printpagebutton" style="margin-right: 0px; margin-top: 0px; padding: 0px 10px; font-size: 24px;" ></button>
			</div>			
		</div>		    
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
<div class="row" style="margin-top: 0px;">
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;">Assessment Type</div>
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;">Assessment Grade</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Score</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Remarks</div>
<div class="clearfix"></div>
</div>
</li>
<?php 
$dsql = mysqli_query($con,"SELECT ft2_asmt_data_result.*,
CASE WHEN mch='Y' OR mch='N' THEN 'N/A' ELSE mch END AS mch, 
CASE WHEN enu='Y' OR enu='N' THEN 'N/A' ELSE enu END AS enu, 
CASE WHEN idf='Y' OR idf='N' THEN 'N/A' ELSE idf END AS idf, 
CASE WHEN esy='Y' OR esy='N' THEN 'N/A' ELSE esy END AS esy,
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
<div class="row" style="margin-top: 0px;">
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['scdsc']?></div>
<div class="col-xs-2 col-md-4" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['mch']?> | <?=$rx['enu']?> | <?=$rx['idf']?> | <?=$rx['esy']?> </div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['res']?></div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><span style="color: <?=$rc?>"><?=$rx['rte']?></span></div>
<div class="clearfix"></div>
</div>
</li>                                 
 <?php } ?></div>   
</div>    
</body>
</html>
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
$("#printpagebutton").click(function(){	
   var printButton = document.getElementById("printpagebutton");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
  });			
});
</script>	