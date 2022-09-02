<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fgrd=$_POST['fgrd'];
$fsec=$_POST['fsec'];
$fsbj=$_POST['fsbj'];
$fscd=$_POST['fscd'];

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
if($fsec=='') { $fsec=$_REQUEST['fsec']; }
if($fsbj=='') { $fsbj=$_REQUEST['fsbj']; }
if($fscd=='') { $fscd=$_REQUEST['fscd']; }
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
			 <span class="fa fa-list-alt" style="margin-right: 15px; font-size: 2em;"></span>Grading Record</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng Grado</h6>
		  </div>	  
<div class="card-block box" style="padding: 10px 15px;">
	<div style="background: #FFF;"> 
 <form method="post" action="?page=grading_sheet" id="frmleks" name="frmleks"> </form> 
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">	
<select name="fgrd" required class="form-control" id="fgrd" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php
$dsql = mysqli_query($con,"SELECT DISTINCT(ft2_faculty_schedule.grde),ft2_faculty_schedule.fid, ft2_grade_data.* FROM ft2_faculty_schedule 
INNER JOIN ft2_grade_data ON ft2_faculty_schedule.grde = ft2_grade_data.id
WHERE ft2_faculty_schedule.fid = '$fid' AND ft2_faculty_schedule.syr = '$syr' ORDER BY ft2_grade_data.grd ASC");
	
  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['id'];?>" <?=($fgrd == $rg['id'] ? 'selected' : '');?>><?=$rg['grd'];?></option> 
<?php } ?>  
        </select></div>
	<div class="clearfix"></div>
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Section : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">	
<select name="fsec" required class="form-control" id="fsec" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php
$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_section_data.id, ft2_section_data.sect, ft2_section_data.grd FROM ft2_faculty_schedule INNER JOIN ft2_section_data ON ft2_section_data.id=ft2_faculty_schedule.sec WHERE ft2_faculty_schedule.fid ='$fid' AND ft2_faculty_schedule.grde = '$fgrd' AND ft2_faculty_schedule.syr = '$syr'");
	
  while($rs = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rs['id'];?>"  <?=($fsec== $rs['id'] ? 'selected' : '');?>><?=$rs['sect'];?></option> 
<?php } ?>  
        </select></div>
	<div class="clearfix"></div>
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Subject : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:10px; float: right; padding: 0px;">

<select name="fsbj" required class="form-control" id="fsbj" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php	
$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj FROM ft2_faculty_schedule 
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_faculty_schedule.sjid
WHERE ft2_faculty_schedule.fid = '$fid' AND ft2_faculty_schedule.grde='$fgrd' AND ft2_faculty_schedule.syr = '$syr' GROUP BY ft2_module_subjects.subj
ORDER BY ft2_faculty_schedule.sjid ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['sjid'];?>" <?=($fsbj == $rg['sjid'] ? 'selected' : '');?>><?=$rg['subj'];?></option> 
<?php  } ?>  
        </select>      
        </div>
	<div class="clearfix"></div>   
  </div>
    </div>  
	<div class="clearfix">  </div>   
                          
</div>
	</div>
</div>  
<div class="col-lg-9 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-pencil-square-o" style="margin-right: 15px; font-size: 2em;"></span>Subject Class Record	 
			 <button class="btn btn-info btn-sm fa fa-print" id="brpt" name="brpt" style="font-size: 16px; padding: 6px; margin-left: 15px; float: right;" data-fid="<?=$fid?>" data-fsbj="<?=$fsbj?>" data-fgrd="<?=$fgrd?>" data-fsec="<?=$fsec?>"></button>	
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan Grado ng Estudyante</h6>
		  </div>
<div class="card-block">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;"><div class="row">
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;">Photo</div>
<div class="col-xs-10 col-md-5" style="padding-bottom: 0px; padding-right: 0px;">Name of Students</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">1st Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">2nd Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">3rd Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">4th Grading</div>
<div class="col-xs-2 col-md-1"></div>
<div class="clearfix"></div>
</div.
></li>
<?php 
if(($fgrd!='') && ($fsec!='') && ($fsbj!=''))	{
$sql0 = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_grade_record.*
FROM ft2_faculty_schedule
INNER JOIN ft2_grade_record ON ft2_grade_record.sjid = ft2_faculty_schedule.sjid
WHERE ft2_faculty_schedule.grde = '$fgrd' AND ft2_faculty_schedule.sec = '$fsec' AND ft2_faculty_schedule.sjid='$fsbj' 
AND ft2_faculty_schedule.fid='$fid' AND ft2_faculty_schedule.syr='$syr'");
$ctr=mysqli_num_rows($sql0); 
	 if($ctr<=0){
		$sql1 = mysqli_query($con,"SELECT ft2_users_account.* FROM ft2_users_account WHERE ft2_users_account.grde='$fgrd' AND ft2_users_account.sec='$fsec'");  
		while($r1 = mysqli_fetch_assoc($sql1))	{  
			$sid=$r1['id'];
			 $sqli1 = mysqli_query($con, "INSERT INTO ft2_grade_record(fid, syr, sid, grde, sec, sjid) VALUES('$fid', '$syr', '$sid', '$fgrd', '$fsec', '$fsbj')");
		 }
	 }	
	else {
		$sql2 = mysqli_query($con,"SELECT ft2_grade_record.*, ft2_users_account.* FROM ft2_grade_record
		INNER JOIN ft2_users_account ON ft2_users_account.id = ft2_grade_record.sid
		WHERE ft2_grade_record.grde = '$fgrd' AND ft2_grade_record.sec = '$fsec' AND ft2_grade_record.sjid='$fsbj' 
		AND ft2_grade_record.fid='$fid' AND ft2_grade_record.syr='$syr'");  
		while($r2 = mysqli_fetch_assoc($sql2))	{  
			$sphoto='data:image/png;base64,'.''.$r2['ploc']; 
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;">
<div class="row">
	<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;"><img src="<?=$sphoto?>" class="img-responsive logo" style="padding: 0px; width: 50%;" onerror="this.src='../img/missing.png'"></div>
	<div class="col-xs-10 col-md-5" style="padding: 5px;"><?=$r2['alyas'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd1'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd2'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd3'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd4'];?></div>
	<div class="col-xs-2 col-md-1">
		<button class="btn btn-success btn-sm fa fa-edit egbtn"  style="font-size: 16px; padding: 6px; margin-left: 5px;"></button>		
	</div>
	 <div class="clearfix"></div>
 </div>
 </li>

 <?php } } } ?></div>   
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
var fgrd= document.getElementById("fgrd").value;
var fsbj= document.getElementById("fsbj").value;	
var fsec= document.getElementById("fsec").value;	
var fscd= document.getElementById("fscd").value;
var ftxt= $("#fscd option:selected").text();			
	
$(document).on("click",".egbtn",function() {	
	var rid=$(this).data('rid');
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fsyr=$(this).data('fsyr');
	var fcod=$(this).data('fscd');
	var val=$(this).data('val');
	$('#content').empty();
	$("#content").load('assessment_multiplechoice.php?rid='+rid+'&fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fsyr='+fsyr+'&fcod='+fcod+'&val='+val+'&mde=C');
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Multiple Choice Assessment Content');
	$('#POPMODAL').modal('show');  	
});		
				
$(document).on("click","#brpt",function() {	
	var fid=$(this).data('fid');
	var fsbj=$(this).data('fsbj');
	var fgrd=$(this).data('fgrd');
	var fscd=$(this).data('fscd');	
var url = 'assessment_report.php?fid='+fid+'&fsbj='+fsbj+'&fgrd='+fgrd+'&fscd='+fscd+'&fsec='+fsec;
	window.open(url, 'blank');
});
	
});
</script>	