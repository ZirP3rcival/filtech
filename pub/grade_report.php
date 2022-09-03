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
$txgrd=$_REQUEST['txgrd']; 
$txsec=$_REQUEST['txsec']; 
$txsbj=$_REQUEST['txsbj']; 

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
                <img src="../img/logo/banner_ft.png" style="background: #000; padding: 10px; height: 45px; width: 300px;">
           </div>   
           <div class="col-xs-12 col-lg-9">
			 <h4 class="text-white card-title" style="margin: 5px; color: #000; text-align: left;"><?=$txsbj?> - Subject Grade Report</h4>
			 <h5 class="text-white card-title" style="margin: 5px; color: #000; text-align: left;">Grade : <?=$txgrd?> / Section : <?=$txsec?></h5>
		  </div>
        	<div class="no-printx" style="margin-top: -25px;">
				<button class="no-print btn btn-info fa fa-print" id="printpagebutton" style="margin-right: 0px; margin-top: 0px; padding: 0px 10px; font-size: 24px;" ></button>
			</div>			
		</div>		    
<div class="row" style="font-size: 12px; font-weight: 600; padding-left: 20px;">
<div class="col-xs-5" style="padding: 0px;">Name of Students</div>
<div class="col-xs-1" style="padding: 0px; text-align: center;">1st Grading</div>
<div class="col-xs-1" style="padding: 0px; text-align: center;">2nd Grading</div>
<div class="col-xs-1" style="padding: 0px; text-align: center;">3rd Grading</div>
<div class="col-xs-1" style="padding: 0px; text-align: center;">4th Grading</div>
<div class="col-xs-1" style="padding: 0px; text-align: center;">Average Grade</div>
<div class="col-xs-1" style="padding: 0px; text-align: center;">Remarks</div>
</div>
<div class="row" style="font-size: 11px; font-weight: 500; margin-top: 0px; padding-left: 20px;">
<?php 
$sql2 = mysqli_query($con,"SELECT ft2_grade_record.*, ft2_users_account.* FROM ft2_grade_record
		INNER JOIN ft2_users_account ON ft2_users_account.id = ft2_grade_record.sid
		WHERE ft2_grade_record.grde = '$fgrd' AND ft2_grade_record.sec = '$fsec' AND ft2_grade_record.sjid='$fsbj' 
		AND ft2_grade_record.fid='$fid' AND ft2_grade_record.syr='$syr'");  
		while($r2 = mysqli_fetch_assoc($sql2))	{  
    ?>                                   
	<div class="col-xs-5" style="padding: 5px;"><?=$r2['alyas'];?></div>
	<div class="col-xs-1" style="padding: 5px; text-align: center;"><?=$r2['grd1'];?></div>
	<div class="col-xs-1" style="padding: 5px; text-align: center;"><?=$r2['grd2'];?></div>
	<div class="col-xs-1" style="padding: 5px; text-align: center;"><?=$r2['grd3'];?></div>
	<div class="col-xs-1" style="padding: 5px; text-align: center;"><?=$r2['grd4'];?></div>
	<div class="col-xs-1" style="padding: 5px; text-align: center;"><?=$r2['ave'];?></div>
	<div class="col-xs-1" style="padding: 5px; text-align: center;"><?=$r2['rem'];?></div>
 <?php } ?> 
    </div>
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