<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

$fgrd=$_REQUEST['fgrd']; 
$fsec=$_REQUEST['fsec']; 
$fsbj=$_REQUEST['fsbj']; 
$fscd=$_REQUEST['fscd']; 

$dsql = mysqli_query($con,"SELECT * from ft2_assessment_set WHERE ascode = '$fscd'");
	
  while($rg = mysqli_fetch_assoc($dsql))
   {  $scd = $rg['scdsc'];  }
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
                <img src="../img/logo/banner_ft.png" style="background: #000; padding: 10px; height: 40px; width: 300px;">
           </div>   
           <div class="col-xs-12 col-lg-9">
			 <h4 class="text-white card-title" style="margin-top: 10px; color: #000; text-align: left;">Student Assessment Grade - <?=$scd?></h4>
		  </div>
        	<div class="no-printx">
				<button class="no-print btn btn-info fa fa-print" id="printpagebutton" style="margin-right: 0px; margin-top: 0px; padding: 0px 10px; font-size: 24px;" ></button>
			</div>			
		</div>		    
<div class="row">
<div class="col-xs-7" style="float: left; font-weight: 600;">Name of Students</div>
<div class="col-xs-5" style="float: right; font-weight: 600;">Result</div>
</div>
<?php 
$dsql = mysqli_query($con,"SELECT ft2_users_account.*, ft2_asmt_data_result.*,ft2_asmt_data_result.id as rid
FROM ft2_users_account 
INNER JOIN ft2_asmt_data_result ON ft2_asmt_data_result.sid = ft2_users_account.id 
WHERE ft2_asmt_data_result.grde = '$fgrd' AND ft2_asmt_data_result.sec = '$fsec' AND ft2_asmt_data_result.fid='$fid' 
AND ft2_asmt_data_result.asid='$fsbj' AND ft2_asmt_data_result.ascode='$fscd'
ORDER BY alyas ASC");

  while($rx = mysqli_fetch_assoc($dsql))
   { 
	  $rid=$rx['rid']; $sid=$rx['sid'];
	  $res=$rx['res']; if($res=='') { $res='0'; }
	  if(($res>=50)&($res<75)) { $rc="#D9534F"; } else if(($res>=75)&($res<=100)) { $rc="#0084FF"; }
	  $rte=$rx['rte'];
	  $fcod=$rx['ascode']; 
    ?>                                   

<div class="row" style="margin-top: 5px; font-size: 12px;">
	<div class="col-xs-7" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['alyas'];?></div>
	<div class="col-xs-5" style="padding-bottom: 0px; padding-right: 0px; font-size: 13px; font-weight: 600;"><?=$res?> | <span style="color: <?=$rc?>"><?=$rte?></span></div>
	 <div class="clearfix"></div>
 </div>
 <?php } ?> 
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