<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fgrd=$_POST['fgrd'];
$fsbj=$_POST['fsbj'];
$fscd=$_POST['fscd'];
$fcat=$_POST['fcat'];

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
if($fsbj=='') { $fsbj=$_REQUEST['fsbj']; }
if($fscd=='') { $fscd=$_REQUEST['fscd']; }
if($fcat=='') { $fcat=$_REQUEST['fcat']; }
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
			 <span class="fa fa-list-alt" style="margin-right: 15px; font-size: 2em;"></span>Assessment Results</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Resulta ng Pagtatasa</h6>
		  </div>	  
<div class="card-block box" style="padding: 10px 15px;">
	<div style="background: #FFF;"> 
 <form method="post" action="?page=assessment_records" id="frmleks" name="frmleks"> </form> 
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-4" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right; padding: 0px;">	
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

 <div class="col-xs-12 col-md-4" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Subject : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right; padding: 0px;">

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
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-4" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Assessment Type : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right; padding: 0px;">

<select name="fscd" required class="form-control" id="fscd" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();">
          <option value="" >- Select -</option>      
<?php 
  $lsql = mysqli_query($con,"SELECT * FROM ft2_faculty_assessment WHERE fid = '$fid' AND grde='$fgrd' AND asid = '$fsbj ' ORDER BY ascode ASC");
	
  while($rg = mysqli_fetch_assoc($lsql))
   { ?>  
    <option value="<?=$rg['ascode'];?>" <?=($fscd == $rg['ascode'] ? 'selected' : '');?>><?=$rg['scdsc'];?></option> 
<?php } ?>                
</select>      
        </div>
	<div class="clearfix"></div>   
  </div>
    </div>  
	<div class="clearfix">  </div>   

     <button class="btn btn-block btn-success" id="nass" name="nass" data-fgrd="<?=$fgrd?>" data-fsbj="<?=$fsbj?>" data-fscd="<?=$fscd?>" style="color: #fff;" title="Magdagdag">Save Assessment Record</button>
                          
</div>
	</div>
</div>  
<div class="col-lg-8 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-pencil-square-o" style="margin-right: 15px; font-size: 2em;"></span>Student Assessment Grade	 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Grado ng Estudyante sa Pagtatasa</h6>
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
<div class="col-xs-9 col-md-2" style="padding-bottom: 0px; padding-right: 0px;">Status</div>
<div class="col-xs-12 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">Mode</div>
<div class="clearfix"></div>
</div.
></li>
<?php 
$dsql = mysqli_query($con,"SELECT * FROM ft2_faculty_assessment WHERE fid='$fid' AND grde='$fgrd' AND asid='$fsbj' ORDER BY id ASC");
$rctr = 0;	
  while($r = mysqli_fetch_assoc($dsql))
   { if($r['used']=='Y') { $astat = 'Activated'; }
	 else { $astat = 'De-Activated'; }
    ?>                                   
<li class="list-group-item"><div class="row">
<div class="col-xs-2 col-md-1" style="padding-bottom: 0px; padding-right: 0px;"><?=$r['ascode'];?></div>
<div class="col-xs-10 col-md-4" style="padding-bottom: 0px; padding-right: 0px;"><?=$r['scdsc'];?></div>
<div class="col-xs-9 col-md-2" style="padding-bottom: 0px; padding-right: 0px;"><?=$astat;?></div>
<div class="col-xs-12 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">

<?php if($r['used']=='N') { ?>
 <a href="lessonscontroller.php?prc=C&id=<?=$r['id'];?>&set=Y" class="trash" style="margin-right:10px;" title="Activate Assessment" onclick="return confirm('Activate Assessment?')"><i class="btn btn-info btn-sm glyphicon glyphicon-ok-circle" title="Activate Assessment" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>
<?php } else { ?>
 <a href="lessonscontroller.php?prc=C&id=<?=$r['id'];?>&set=N" class="trash" style="margin-right:10px;" title="De-Activate Assessment" onclick="return confirm('De-Activate Assessment?')"><i class="btn btn-success btn-sm glyphicon glyphicon-remove-circle" title="De-Activate Assessment" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>
 <?php } ?>   
    
 <button class="btn btn-warning btn-sm glyphicon glyphicon-edit aedit" data-id="<?=$r['id'];?>" data-fscd="<?=$r['ascode'];?>" data-fdsc="<?=$r['scdsc'];?>" style="margin-right:10px; float: left; font-size: 18px; padding: 0px 6px;" title="Update this Record" onclick="return confirm('Update this Record?')"></button>
 
 <a href="lessonscontroller.php?prc=X&id=<?=$r['id'];?>" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><i class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete this Record" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>

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
var fscd= document.getElementById("fscd").value;
var ftxt= $("#fscd option:selected").text();		
if((fgrd=='')||(fsbj=='')||(fscd=='')) { $('#nass').prop('disabled',true); }	
else { $('#nass').prop('disabled',false);  }			
	
$(document).on("click","#nass",function() {
	var fid='<?=$fid?>';
	var fgrd=$(this).data('fgrd');
	var fsbj=$(this).data('fsbj');
    var bcap=$('#nass').text();

	if(bcap=='Save Assessment Record')	{ 
		$.ajax({
		   data: { fscd:fscd, ftxt:ftxt, fid:fid, fgrd:fgrd, fsbj:fsbj },
		   type: "post",
		   url: "lessonscontroller.php?prc=T",
		   cache: false,	
		   success: function(data){
			   location.reload();
			   window.location.href = "?page=assessment_settings";
				}
			});	
	}	
	else if(bcap=='Update Assessment Record')	{ 
		var id = sessionStorage.aid; 
		var fscd= document.getElementById("fscd").value;
		var ftxt= $("#fscd option:selected").text();

		$.ajax({
		   data: { id:id, fscd:fscd, ftxt:ftxt, fid:fid,  },
		   type: "post",
		   url: "lessonscontroller.php?prc=M",
		   cache: false,	
		   success: function(data){
			   location.reload();
			   window.location.href = "?page=assessment_settings";
				}
			});	
	}	
});		
	
$(document).on("click",".aedit",function() {
	var aid=$(this).data('id');
	sessionStorage.setItem('aid',aid); 
	var fscd=$(this).data('fscd');
	var fdsc=$(this).data('fdsc');
	
	$('#fscd option:selected').remove();
	$('#fscd').append('<option value="'+fscd+'" selected>'+fdsc+'</option>'); 
	$('#nass').text('Update Assessment Record');
	$('#nass').prop('disabled',false);
});	
	
});
</script>	