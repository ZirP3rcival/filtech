<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$id=$_REQUEST['id'];
$sqlay="SELECT id, eadd, lnme, mnme, fnme, cno, ploc FROM ft2_users_account WHERE id='$id'"; 
$sqler = $con->query($sqlay);	
while($r = mysqli_fetch_assoc($sqler)) {
	$photo='data:image/png;base64,'.''.$r['ploc'];
	$ploc = $r['ploc'];
	$eadd = $r['eadd'];
	$lnme = $r['lnme'];
	$mnme = $r['mnme'];
	$fnme = $r['fnme'];
	$cno= $r['cno'];
} ?>
<style>
	.mf { font-size: 12px;}	
</style>	
<div class="card-block box" style="padding: 0px;">
<div style="background: #FFF;"> 
<div class="col-lg-3 col-xs-12 my-acct-box mg-tb-31" style="margin: 10px 0px; float: left;">
<div class="row" style="margin: 15px 0px 20px;">
<div class="col-xs-12 col-md-12" style="display:table-cell; vertical-align:middle; text-align:center">
<img id="img" src="<?=$photo?>" style="width:100%; border-left:1px solid #fff; border-top:1px solid #fff; border-right:2px solid #000; border-bottom:2px solid #000;"  onerror="this.src='../img/missing.png'"  />
</div>
</div>
</div>
<div class="col-lg-9 col-xs-12 my-acct-box mg-tb-31" style="margin: 10px 0px; float: right">
	<div class="col-xs-12 col-md-12" style="padding: 0px;">
		<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Lastname : </span></div>
		<div class="col-xs-12 col-md-8" style="float: right; margin-top:10px;">
		<input name="pulnme" type="text" class="form-control" id="pulnme" placeholder="Input Lastname" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?=$lnme?>"></div>
			<div class="clearfix"></div>

		<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Firstname : </span></div>
		<div class="col-xs-12 col-md-8" style="float: right; margin-top:10px;">
		<input name="pufnme" type="text" class="form-control" id="pufnme" placeholder="Input Firstname" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?=$fnme?>"></div>
			<div class="clearfix"></div>

		<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Middlename : </span></div>
		<div class="col-xs-12 col-md-8" style="float: right; margin-top:10px;">
		<input name="pumnme" type="text" class="form-control" id="pumnme" placeholder="Input Middlename" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?=$mnme?>"></div>
			<div class="clearfix"></div>
			
 		<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Contact No. : </span></div>
		<div class="col-xs-12 col-md-8" style="float: right; margin-top:10px;">
		<input name="pucno" type="text" class="form-control" id="pucno" placeholder="0000-000-0000" required style="width:100%; float:left;" maxlength="13" onBlur="return cnolength(this.value,this,event)" onKeyPress="return masking(this.value,this,event);" value="<?=$cno?>"></div>
			<div class="clearfix"></div>	
		<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Email Address : </span></div>
		<div class="col-xs-12 col-md-8" style="float: right; margin-top:10px;">
		<input type="email" maxlength="60" class="form-control" style="width:100%; float:left;" id="peadd" name="peadd" required placeholder="Input Email Address" value="<?=$eadd?>" onblur="checkPEmail(this.value)"></div>
			<div class="clearfix"></div>			
	</div>
</div>     
<div class="clearfix">  </div>                           
</div>
<script>
$(document).ready(function(){	
	
$(':input').prop('disabled', true);
$(':button').prop('disabled', false);
	
});	
</script>	