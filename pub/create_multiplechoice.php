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


?>

<div class="card-block box" style="padding: 0px;">
	<div style="background: #FFF;"> 
 <div class="col-12 col-md-12" style="border-right:1px solid #828080; border-bottom:0px solid #828080; padding:0px;">
<form action="assessmentcontroller.php?prc=D&fgrd=<?=$fgrd?>&fscd=<?=$fscd?>&fsbj=<?=$fsbj?>&fcat=<?=$fcat?>"  enctype="multipart/form-data"  method="post" style="margin-bottom:0px; width: 100%;" class="form-horizontal" role="form" id="frmAS" >          
<div class="row" style="margin-left: 10px; margin-right: 10px;">

	<div class="col-xs-12 col-md-12" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Question : </div>
	<div class="col-xs-12 col-md-12" style="padding-right: 0px;padding-left: 0px;">
	<textarea class="form-control col-xs-12 col-md-12" id="nqst" name="nqst" rows="3" maxlength="500" style="color:#000;" required placeholder="Input Quiz Question Here"><?=$r['qst'];?></textarea>
    </div> 
<div class="clearfix"></div>

	<div class="col-xs-12 col-md-2" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Answer [A] : </div>
	<div class="col-xs-12 col-md-10" style="padding-right: 0px; padding-top: 15px; padding-left: 0px;">
	<input type="text" required class="form-control col-xs-12 col-md-9" style="width:100%; float:right; color: #000;" id="nqa1" name="nqa1" maxlength="100" value="<?=$r['qa1'];?>"/>
	</div>
<div class="clearfix"></div>

	<div class="col-xs-12 col-md-2" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Answer [B] : </div>
	<div class="col-xs-12 col-md-10" style="padding-right: 0px; padding-top: 15px; padding-left: 0px;">
	<input type="text" required class="form-control col-xs-12 col-md-9" style="width:100%; float:right; color: #000;" id="nqa2" name="nqa2" maxlength="100" value="<?=$r['qa2'];?>"/>
	</div>
<div class="clearfix"></div>

	<div class="col-xs-12 col-md-2" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Answer [C] : </div>
	<div class="col-xs-12 col-md-10" style="padding-right: 0px; padding-top: 15px; padding-left: 0px;">
	<input type="text" required class="form-control col-xs-12 col-md-9" style="width:100%; float:right; color: #000;" id="nqa3" name="nqa3" maxlength="100" value="<?=$r['qa3'];?>"/>
	</div>
<div class="clearfix"></div>

	<div class="col-xs-12 col-md-2" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Answer [D] : </div>
	<div class="col-xs-12 col-md-10" style="padding-right: 0px; padding-top: 15px; padding-left: 0px;">
	<input type="text" required class="form-control col-xs-12 col-md-9" style="width:100%; float:right; color: #000;" id="nqa4" name="nqa4" maxlength="100" value="<?=$r['qa4'];?>"/>
	</div>
<div class="clearfix"></div>

	<div class="col-xs-12 col-md-2" style="padding-left: 0px; padding-top: 15px; float: left; color:#000; font-size: 14px;"> Answer: </div>
	<div class="col-xs-12 col-md-10" style="padding-right: 0px; padding-top: 15px; padding-left: 0px;">
	<input type="text" required class="form-control col-xs-12 col-md-9" style="width:100%; float:right; color: #000;" id="nqky" name="nqky" maxlength="1" value="<?=$r['qky'];?>"/>
	</div>
<div class="clearfix"></div>
</div>                                                
</form>
 </div>
     </div>  
	<div class="clearfix">  </div>                           
</div>