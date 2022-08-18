<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fgrd=$_POST['fgrd'];
$fsec=$_POST['fsec'];
$fsbj=$_POST['fsbj'];

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
if($fsec=='') { $fsec=$_REQUEST['fsec']; }
if($fsbj=='') { $fsbj=$_REQUEST['fsbj']; }
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
<div class="col-lg-4 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-cogs" style="margin-right: 15px; font-size: 2em;"></span>Assessment Settings</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Pagtatakda ng Pagtatasa</h6>
		  </div>	  
<div class="card-block box" style="padding: 10px 15px;">
	<div style="background: #FFF;"> 
 <form method="post" action="?page=assessment_settings" id="frmleks" name="frmleks"> </form> 
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:0px; float: right; padding: 0px;">	
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
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Section : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:0px; float: right; padding: 0px;">

<select name="fsec" required class="form-control" id="fsec" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php	
$dsql = mysqli_query($con,"SELECT id, sect, grd FROM ft2_section_data
WHERE grd = '$fgrd' ORDER BY sect ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['id'];?>" <?=($fsec == $rg['id'] ? 'selected' : '');?>><?=$rg['sect'];?></option> 
<?php  } ?>  
        </select>      
        </div>
	<div class="clearfix"></div>   

  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Subject : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:0px; float: right; padding: 0px;">

<select name="fsbj" required class="form-control" id="fsbj" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php	
$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj FROM ft2_faculty_schedule 
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_faculty_schedule.sjid
WHERE ft2_faculty_schedule.fid = '$fid' AND ft2_faculty_schedule.grde='$fgrd' AND ft2_faculty_schedule.sec='$fsec' AND ft2_faculty_schedule.syr = '$syr' GROUP BY ft2_module_subjects.subj
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

     <button class="btn btn-block btn-success" id="nass" name="nass" style="color: #fff;" title="Magdagdag">Create</button>
                          
</div>
	</div>
</div>  
<div class="col-lg-8 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-save" style="margin-right: 15px; font-size: 2em;"></span>Assessment List Record			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng Pagtatasa</h6>
		  </div>
		<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
   <div class="card-block card-top">
   <div class="card-block">
<div class="message-box contact-box">
    <div class="message-widget contact-widget box">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 800;"><div class="row">
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;">Code</div>
<div class="col-xs-10 col-md-4" style="padding-bottom: 0px; padding-right: 0px;">Assessment Type</div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">No. of Items</div>
<div class="col-xs-9 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Status</div>
<div class="col-xs-12 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">Mode</div>
<div class="clearfix"></div>
</div.
></li>
<?php 
$dsql = mysqli_query($con,"SELECT * FROM ft2_faculty_assessment WHERE fid='$fid' AND grde='$fgrd' AND sec='$fsec' AND asid='$fsbj' ORDER BY id ASC");
$rctr = 0;	
  while($r = mysqli_fetch_assoc($dsql))
   { if($r['stat']=='none') { $astat = 'Activate Assessment'; }
	 elseif($r['stat']=='block') { $astat = 'De-Activate Assessment'; }
    ?>                                   
<!-- Message -->
<li class="list-group-item"><div class="row">
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;"><?=$r['ascode'];?></div>
<div class="col-xs-10 col-md-4" style="padding-bottom: 0px; padding-right: 0px;"><?=$r['scdsc'];?></div>
<div class="col-xs-2 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><?=$r['itm'];?></div>
<div class="col-xs-9 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><?=$astat;?></div>
<div class="col-xs-12 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">

<?php if($astat == 'Activate Assessment') { ?>
 <a href="multi-proc?mprc=assact&prc=assset&pgn=<?=$pgn;?>&fsec=<?=$fsec?>&aid=<?=$r['id'];?>&fgrd=<?=$fgrd;?>&ascd=<?=$r['ascode'];?>" class="trash" style="margin-right:10px;" title="Activate Assessment" onclick="return confirm('Activate Assessment?')"><i class="btn btn-info btn-sm glyphicon glyphicon-ok-circle" title="Activate Assessment" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>
<?php } else if($astat == 'De-Activate Assessment') { ?>
 <a href="multi-proc?mprc=assdac&prc=assset&pgn=<?=$pgn;?>&fsec=<?=$fsec?>&aid=<?=$r['id'];?>&fgrd=<?=$fgrd;?>&ascd=<?=$r['ascode'];?>" class="trash" style="margin-right:10px;" title="De-Activate Assessment" onclick="return confirm('De-Activate Assessment?')"><i class="btn btn-success btn-sm glyphicon glyphicon-remove-circle" title="De-Activate Assessment" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>
 <?php } ?>   
    
 <a href="<?=$pgn;?>?prc=assset&mde=USST&fid=<?=$sid?>&fsec=<?=$fsec?>&fsc=<?=$fsc?>&aid=<?=$r['id'];?>&itm=<?=$r['itm'];?>&fgrd=<?=$fgrd;?>&ufgrd=<?=$ufgrd;?>&ascd=<?=$r['ascode'];?>&scdsc=<?=$r['scdsc'];?>" class="trash" style="margin-right:10px;" title="Update this Record" onclick="return confirm('Update this Record?')"><i class="btn btn-warning btn-sm glyphicon glyphicon-edit" title="Update this Record" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>
 
 <a href="multi-proc?mprc=assdel&prc=assset&pgn=<?=$pgn;?>&fsec=<?=$fsec?>&aid=<?=$r['id'];?>&fgrd=<?=$fgrd;?>&ascd=<?=$r['ascode'];?>" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><i class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete this Record" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>

</div>
 <div class="clearfix"></div></div></li>

 <?php } ?></div>                                  
     </div>   
 </div>                                
   </div>
   <div class="card-block card-bottom">&nbsp;</div>
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
var fgrd= document.getElementById("fgrd").value;
var fsbj= document.getElementById("fsbj").value;	
	
if((fgrd=='')||(fsbj=='')) { $('#nass').prop('disabled',true); }	
else { $('#nass').prop('disabled',false); }	
	
$(document).on("click","#nass",function() {
	var id=$(this).data('id');
	$('#content').empty();
	$("#content").load('newassessment.php?id='+id);
	$('.modwidth').css('width','45%');
	$('.modcap').empty();
	$(".modcap").append('New Assessment Record');
	$('#POPMODAL').modal('show');
});		
	
});
</script>	