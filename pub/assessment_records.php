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
			 <span class="fa fa-folder" style="margin-right: 15px; font-size: 2em;"></span>Assessment Records</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng Pagtatasa</h6>
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
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-4" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Category : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right; padding: 0px;">

<select name="fcat" required class="form-control" id="fcat" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();">
    <option value="" >- Select -</option>      
    <option value="1" <?=($fcat == '1' ? 'selected' : '');?>>Enumeration</option> 
    <option value="2" <?=($fcat == '2' ? 'selected' : '');?>>Essay</option> 
    <option value="3" <?=($fcat == '3' ? 'selected' : '');?>>Identification</option> 
    <option value="4" <?=($fcat == '4' ? 'selected' : '');?>>Multiple Choice</option>               
</select>      
        </div>
	<div class="clearfix"></div>   
  </div>
    </div>  
	<div class="clearfix">  </div>   

<!--     <button class="btn btn-block btn-success" id="nass" name="nass" data-fgrd="<=$fgrd?>" data-fsbj="<=$fsbj?>" data-fscd="<=$fscd?>" style="color: #fff;" title="Magdagdag">Save Assessment Record</button>-->
                          
</div>
	</div>
</div>  
<div class="col-lg-8 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-folder-open" style="margin-right: 15px; font-size: 2em;"></span>Assessment Record Content		 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Nilalaman ng Pagtatasa</h6>
		  </div>
		<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
<?php if($fcat=='4') { ?>
<div class="box-body">
<ul class="todo-list" style="padding-left: 0px;">
<?php 
$rowsPerPageQM = 20;
// Get the search variable from URL
$currentPageQM = ((isset($_GET['pPageQM']) && $_GET['pPageQM'] > 0) ? (int)$_GET['pPageQM'] : 1);
$offsetQM = ($currentPageQM-1)*$rowsPerPageQM;
$cp=$currentPageQM;

$csql = mysqli_query($con,"SELECT * FROM ft2_asmt_multiplechoice WHERE ascode = '$fscd' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT $offsetQM, $rowsPerPageQM"); 

  while($rs = mysqli_fetch_assoc($csql))
   {
 ?>
 <li class="list-group-item clearfix" style="padding:8px 10px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"> 
 <div style="float:left;"><i class="glyphicon glyphicon-link"></i>&nbsp;&nbsp;<?=$rs['qst'];?></div>

<div class="tools">
 <a href="<?=$pgn;?>?prc=assess&mde=VAC&fgrd=<?=$fgrd;?>&fsec=<?=$fsec;?>&ascd=<?=$ascd;?>&qid=<?=$rs['id'];?>" class="trash" style="margin-right:10px;" title="View Module Topic" onclick="return confirm('View Assessment Record?')"><i class="btn btn-default btn-sm glyphicon glyphicon-search" title="View Module Topic" style="border: 1px solid #848484; background: #848484; color: #fff; float: right; font-size: 18px; padding: 0px 6px;"></i></a>
  
 <a href="multi-proc?mprc=delass&prc=assess&fgrd=<?=$fgrd;?>&fsec=<?=$fsec;?>&ascd=<?=$ascd;?>&qid=<?=$rs['id'];?>&pgn=<?=$pgn;?>" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><i class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>
  
 <a href="<?=$pgn;?>?prc=assess&mde=UAC&fgrd=<?=$fgrd;?>&fsec=<?=$fsec;?>&ascd=<?=$ascd;?>&qid=<?=$rs['id'];?>" class="trash" style="margin-right:10px;" title="Update this Record" onclick="return confirm('Update this Record?')"><i class="btn btn-warning btn-sm glyphicon glyphicon-edit" title="Update this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>
</div>
</li>
<?php } ?>
</ul>
</div>


<div style="float: left; width: 100%; margin-bottom: 10px; border-top:solid 1px #666;">
	        <div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px;" href="<?=$pgn;?>?prc=<?=$prc;?>&fgrd=<?=$fgrd;?>&fsec=<?=$fsec;?>&ascd=<?=$ascd;?>&pPageQM=<?=($currentPageQM-1)?>"> prev </a></div>
	        <div style="width:50%; float:left; font-size:11px;">
<?php
$csql = mysqli_query($con,"SELECT COUNT(id) AS crt ft2_asmt_multiplechoice WHERE ascode = '$fscd' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT $rowsPerPageQM"); 

  
$row = mysqli_fetch_assoc($csql);
$totalPagesQM = ceil($row['crt'] / $rowsPerPageQM);

//echo $rowsPerPageLM.' '.$totalPagesIM.' '.$currentPageLM;
if($currentPageQM > 1) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="'.$pgn.'?prc='.$prc.'&fgrd='.$fgrd.'&fsec='.$fsec.'&ascd='.$ascd.'&pPageQM='.($currentPageQM-1).'"></a>'; }

if($totalPagesQM < $rowsPerPageQM) { $d=$totalPagesQM; }
else { $d=$currentPageQM + $rowsPerPageQM; }

if($d > $totalPagesQM) { $d=$totalPagesQM; }
else { $d=$totalPagesQM; }

//echo $d.' '.$totalPagesIM;
for ($x=1;$x<=$d;$x++)
{  if ($cp==$x) 
   { 
     echo '<a class="btn btn-default btn-sm" style="background:#478BFF; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
   }
  else
   { 
     echo '<a class="btn btn-default btn-sm" style="margin-left:2px; color:#478BFF; font-size:11px;" href="'.$pgn.'?prc='.$prc.'&fgrd='.$fgrd.'&fsec='.$fsec.'&ascd='.$ascd.'&pPageQM='.$x.'"><strong>'.$x.'</strong></a>';    }
}
 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesQM .'</strong> pages</span>'; 
 
if($currentPageQM < $totalPagesQM) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="'.$pgn.'?prc='.$prc.'&fgrd='.$fgrd.'&fsec='.$fsec.'&ascd='.$ascd.'&pPageQM='.($currentPageQM+1).'"></a>'; }
?>
            </div>
	        <div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000;" href="<?=$pgn;?>?pPageQM=<?=($currentPageQM+1);?>&fgrd=<?=$fgrd;?>&fsec=<?=$fsec;?>&ascd=<?=$ascd;?>&prc=<?=$prc;?>"> next </a></div>
</div>
<?php } ?>
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
if((fgrd=='')||(fsbj=='')||(fscd=='')||(fnoi=='')) { $('#nass').prop('disabled',true); }	
else { $('#nass').prop('disabled',false);  }	
	
$(document).on("keyup","#fnoi",function() {
var fscd= document.getElementById("fscd").value;	
	if((fgrd=='')||(fsbj=='')||(fscd=='')||(fnoi=='')) { $('#nass').prop('disabled',true); }	
	else { $('#nass').prop('disabled',false);  }
});		
	
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
	$('#fnoi').val(fnoi);
	var fscd=$(this).data('fscd');
	var fdsc=$(this).data('fdsc');
	
	$('#fscd option:selected').remove();
	$('#fscd').append('<option value="'+fscd+'" selected>'+fdsc+'</option>'); 
	$('#nass').text('Update Assessment Record');
	$('#nass').prop('disabled',false);
});	
	
});
</script>	