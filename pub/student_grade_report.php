<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];
$grd=$_SESSION['grde'];  	
$sec=$_SESSION['sec'];  
$fname=$_SESSION['fname'];  

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
			 <h3 class="text-white card-title" style="margin: 5px; color: #000; text-align: left; font-weight: 700;">Student Grade Report</h3>
		  </div>
           <div class="col-xs-12 col-lg-12">
			 <h5 class="text-white card-title" style="margin: 5px; color: #000; text-align: left;">Student Name : <strong><?=$fname?></strong></h5>
			 <h5 class="text-white card-title" style="margin: 5px; color: #000; text-align: left;">Grade : <em><strong><?=$fgrd?></strong></em> / Section : <em><strong><?=$fsec?></strong></em></h5>
		  </div>       	
        	<div class="no-printx" style="margin-top: -25px;">
				<button class="no-print btn btn-info fa fa-print" id="printpagebutton" style="margin-right: 0px; margin-top: 0px; padding: 0px 10px; font-size: 24px;" ></button>
			</div>			
		</div>		    
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;">
<div class="row" style="margin-top: 0px;">
<div class="col-xs-10 col-md-5" style="padding-bottom: 0px; padding-right: 0px;">Subject</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">1st Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">2nd Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">3rd Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">4th Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">Average Grade</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">Remarks</div>
<div class="clearfix"></div>
</div>
</li>
<?php 
$dsql = mysqli_query($con,"SELECT ft2_asmt_data_result.sid, ft2_asmt_data_result.grde, ft2_asmt_data_result.sec, ft2_asmt_data_result.syr, ft2_asmt_data_result.asid, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj 
FROM ft2_asmt_data_result
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_asmt_data_result.asid
WHERE ft2_asmt_data_result.sid='$sid' AND ft2_asmt_data_result.grde='$grd' AND ft2_asmt_data_result.sec='$sec' AND ft2_asmt_data_result.syr = '$syr'
GROUP BY ft2_module_subjects.subj ORDER BY ft2_module_subjects.subj ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  $fsbj=$rg['sjid'];
	   $sql2 = mysqli_query($con,"SELECT ft2_grade_record.*, ft2_users_account.* FROM ft2_grade_record
		INNER JOIN ft2_users_account ON ft2_users_account.id = ft2_grade_record.sid
		WHERE ft2_grade_record.grde = '$grd' AND ft2_grade_record.sec = '$sec' AND ft2_grade_record.sjid='$fsbj' 
		AND ft2_grade_record.sid='$sid' AND ft2_grade_record.syr='$syr'"); 				 
		while($r2 = mysqli_fetch_assoc($sql2))	{  
			$sid=$r2['id'];
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;">
<div class="row" style="margin-top: 0px;">
	<div class="col-xs-10 col-md-5" style="padding: 5px 20px;"><?=$rg['subj'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd1'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd2'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd3'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd4'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['ave'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['rem'];?></div>
	 <div class="clearfix"></div>
 </div>
 </li>

 <?php } } ?></div>  
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