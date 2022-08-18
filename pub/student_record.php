<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fgrd=$_POST['fgrd'];
$fsec=$_POST['fsec'];

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
if($fsec=='') { $fsec=$_REQUEST['fsec']; }
?>
<style>
.form-control  {
    color: #0B0237;
	font-weight: 600;
	font-size: 12px;
}	
</style>
<div class="content-inner-all">
    <!-- user account info start -->
    <div class="income-order-visit-user-area m-bottom ">
        <div class="container-fluid">           
            <div class="row rowflx" style="margin-bottom: 50px;">
<div class="col-lg-4 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Grade / Section Selection</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Pagpipilian ng Grado at Seksyon</h6>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
 <form method="post" action="?page=student_record" id="frmslst" name="frmslst"> </form>	
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-4" style="margin-top:0px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right;">	
<select name="fgrd" required class="form-control" id="fgrd" style="display: inline-block; position:inherit; width:100%;" form="frmslst" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php	
$dsql = mysqli_query($con,"SELECT DISTINCT(grde), ft2_grade_data.* FROM ft2_faculty_schedule 
INNER JOIN ft2_grade_data ON ft2_faculty_schedule.grde = ft2_grade_data.id
WHERE ft2_faculty_schedule.fid = '$fid' AND ft2_faculty_schedule.syr = '$syr' ORDER BY ft2_grade_data.grd ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['id'];?>" <?=($fgrd == $rg['id'] ? 'selected' : '');?>><?=$rg['grd'];?></option> 
<?php  } ?>  
        </select></div>
	<div class="clearfix"></div>
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-4" style="margin-top:0px;"><span class="mf" style="float:left; margin-right:10px;">Section : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right;">

<select name="fsec" required class="form-control" id="fsec" style="display: inline-block; position:inherit; width:100%;" onChange="this.form.submit();" form="frmslst" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>      
<?php 
  $ssql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_section_data.id, ft2_section_data.sect, ft2_section_data.grd FROM ft2_faculty_schedule INNER JOIN ft2_section_data ON ft2_section_data.id=ft2_faculty_schedule.sec WHERE ft2_faculty_schedule.fid ='$fid' AND ft2_faculty_schedule.grde = '$fgrd' AND ft2_faculty_schedule.syr = '$syr'");
	
  while($rs = mysqli_fetch_assoc($ssql))
   { ?>   
    <option value="<?=$rs['id'];?>"  <?=($fsec== $rs['id'] ? 'selected' : '');?>><?=$rs['sect'];?></option> 
<?php } ?>                
        </select>        
        </div>
	<div class="clearfix"></div>   

  </div>
 </div>  
<div class="clearfix">  </div>                           
</div>
	</div>
</div>  

<div class="col-lg-8 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-users" style="margin-right: 15px; font-size: 2em;"></span>Student Master List			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Listahan ng mga Mag Aaral</h6>
		  </div>
  
<div class="card-block">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;"><div class="row">
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;">Photo</div>
<div class="col-xs-10 col-md-4" style="padding-bottom: 0px; padding-right: 0px;">Name of Students</div>
<div class="col-xs-2 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">Email Address</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Contact No.</div>
<div class="clearfix"></div>
</div.
></li>
<?php 
if(($fgrd!='') && ($fsec!=''))	{
$dsql = mysqli_query($con,"SELECT * from ft2_users_account WHERE grde = '$fgrd' AND sec = '$fsec' AND actv='Y' ORDER BY alyas ASC");
  while($rx = mysqli_fetch_assoc($dsql))
   { $sphoto='data:image/png;base64,'.''.$rx['ploc'];
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;"><div class="row">
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;"><img src="<?=$sphoto?>" class="img-responsive logo" style="padding: 0px; width: 50%;" onerror="this.src='../img/missing.png'"></div>
<div class="col-xs-10 col-md-4" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['alyas'];?></div>
<div class="col-xs-12 col-md-3" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['eadd'];?></div>
<div class="col-xs-8 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['cno'];?></div>
 <a href="studentrecordcontroller?sid=<?=$rx['id'];?>&prc=D" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><button class="btn btn-danger glyphicon glyphicon-trash" title="Delete this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
 
 <button class="btn btn-primary glyphicon glyphicon-search" id="viewgs" data-id="<?=$rx['id'];?>" title="View this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
 <div class="clearfix"></div></div></li>

 <?php }} ?></div>   
</div> 
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

$(document).on("click","#viewgs",function() {
	var id=$(this).data('id');
	$('#content').empty();
	$("#content").load('viewstudentrecord.php?id='+id);
	$('.modwidth').css('width','45%');
	$('.modcap').empty();
	$(".modcap").append('Student Record Details');
	$('#POPMODAL').modal('show');
});	
	
});
</script>	