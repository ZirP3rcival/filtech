<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
if($fsbj=='') { $fsbj=$_REQUEST['fsbj']; }
if($fscd=='') { $fscd=$_REQUEST['fscd']; }
if($fcat=='') { $fcat=$_REQUEST['fcat']; }
$mde=$_REQUEST['mde'];

if($mde=='U1') {
	$id=$_REQUEST['id']; 
	$csql = mysqli_query($con,"SELECT * FROM ft2_asmt_enumeration WHERE id='$id'"); 
	  while($r = mysqli_fetch_assoc($csql))
	   {
		   	$qst=$r['qst'];
		    $qky=$r['qky'];
	   }
}
?>

<div class="card-block box" style="padding: 0px;">
	<div style="background: #FFF;"> 
 <div class="col-12 col-md-12" style="border-right:1px solid #828080; border-bottom:0px solid #828080; padding:0px;">
<form action="assessmentcontroller.php?prc=<?=$mde?>&fgrd=<?=$fgrd?>&fscd=<?=$fscd?>&fsbj=<?=$fsbj?>&fcat=<?=$fcat?>&id=<?=$id?>"  enctype="multipart/form-data"  method="post" style="margin-bottom:0px; width: 100%;" class="form-horizontal" role="form" id="frmAS" >          
<div class="row" style="margin-left: 10px; margin-right: 10px;">

	<div class="col-xs-12 col-md-12" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Question : </div>
	<div class="col-xs-12 col-md-12" style="padding-right: 0px;padding-left: 0px;">
	<textarea class="form-control col-xs-12 col-md-12" id="nqst" name="nqst" rows="6" style="color:#000;" required placeholder="Input Enumeration Question Here"><?=$qst;?></textarea>
    </div> 
<div class="clearfix"></div>

	<div class="col-xs-12 col-md-2" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Answer Key: </div>
	<div class="col-xs-12 col-md-10" style="padding-right: 0px; padding-top: 15px; padding-left: 0px;">
	<textarea required class="form-control col-xs-12 col-md-9" style="width:100%; float:right; color: #000;" id="nqky" name="nqky" rows="10"><?=$qky;?></textarea>
	</div>
<div class="clearfix"></div>
</div>                                                
</form>
 </div>
     </div>  
	<div class="clearfix">  </div>                           
</div>