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
    <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:5px; float: right; padding: 0px;">	
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

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Subject : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:5px; float: right; padding: 0px;">

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

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Assessment Type : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:5px; float: right; padding: 0px;">

<select name="fscd" required class="form-control" id="fscd" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();">
          <option value="" >- Select -</option>      
<?php 
  $lsql = mysqli_query($con,"SELECT ft2_faculty_assessment.* FROM ft2_faculty_assessment 
WHERE ft2_faculty_assessment.fid = '$fid' AND ft2_faculty_assessment.grde='$fgrd' AND ft2_faculty_assessment.asid = '$fsbj ' GROUp BY ft2_faculty_assessment.ascode
ORDER BY ft2_faculty_assessment.ascode ASC");

  while($rg = mysqli_fetch_assoc($lsql))
   { ?>  
    <option value="<?=$rg['ascode'];?>" <?=($fscd == $rg['ascode'] ? 'selected' : '');?>><?=$rg['scdsc'];?></option> 
<?php } ?>                
</select>      
        </div>
	<div class="clearfix"></div>   
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; margin-top: 10px; padding: 0px;">

 <div class="col-xs-12 col-md-12" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px;">Category : </span></div>
<div class="col-xs-12 col-md-12" style="margin-top:5px; float: right; padding: 0px;">

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

     <button class="btn btn-block btn-success" id="cass" name="cass" data-fgrd="<=$fgrd?>" data-fsbj="<=$fsbj?>" data-fscd="<=$fscd?>" style="color: #fff;" title="Magdagdag">Create Assessment Content</button>
                          
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

<div class="box-body">
<?php
if($fcat!='') {		
?>
<ul class="todo-list" style="padding-left: 0px;">
<?php 
$rowsPerPageQM = 10;
// Get the search variable from URL
$currentPageQM = ((isset($_GET['pPageQM']) && $_GET['pPageQM'] > 0) ? (int)$_GET['pPageQM'] : 1);
$offsetQM = ($currentPageQM-1)*$rowsPerPageQM;
$cp=$currentPageQM;

if($fcat=='1') {	
$csql = mysqli_query($con,"SELECT * FROM ft2_asmt_enumeration WHERE ascode = '$fscd' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT $offsetQM, $rowsPerPageQM"); 
}
else if($fcat=='2') {	
$csql = mysqli_query($con,"SELECT * FROM ft2_asmt_essay WHERE ascode = '$fscd' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT $offsetQM, $rowsPerPageQM"); 
}
else if($fcat=='3') {	
$csql = mysqli_query($con,"SELECT * FROM ft2_asmt_identification WHERE ascode = '$fscd' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT $offsetQM, $rowsPerPageQM"); 
}	
else if($fcat=='4') {	
$csql = mysqli_query($con,"SELECT * FROM ft2_asmt_multiplechoice WHERE ascode = '$fscd' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT $offsetQM, $rowsPerPageQM"); 
}	
$z=1;	
  while($rs = mysqli_fetch_assoc($csql))
   { $i=($offsetQM+($z++));
 ?>
 <li class="list-group-item clearfix" style="padding:8px 10px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"> 
 <div class="col-xs-12 col-md-10" style="float:left;"><i class="glyphicon glyphicon-link"></i>&nbsp;<?=$i?>.&nbsp;&nbsp;<?=$rs['qst'];?></div>

<div class="col-xs-12 col-md-2 tools">
 
 <button class="btn btn-danger btn-sm glyphicon glyphicon-trash cdel" id="cdel" data-id="<?=$rs['id'];?>" title="Delete this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
  
 <button class="btn btn-warning btn-sm glyphicon glyphicon-edit cedit" id="cedit" data-id="<?=$rs['id'];?>" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;" title="Update this Record"></button>
</div>
</li>
<?php } ?>
</ul>

</div>

<div style="float: left; width: 100%; margin-bottom: 10px; border-top:solid 1px #666;">
	        <div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px;" href="?page=assessment_records&fgrd=<?=$fgrd;?>&fscd=<?=$fscd;?>&fsbj=<?=$fsbj;?>&fcat=<?=$fcat;?>&pPageQM=<?=($currentPageQM-1)?>"> prev </a></div>
	        <div style="width:50%; float:left; font-size:11px;">
<?php
$csql = mysqli_query($con,"SELECT COUNT(id) AS crt FROM ft2_asmt_multiplechoice WHERE ascode = '$fscd' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT $rowsPerPageQM"); 

  
$row = mysqli_fetch_assoc($csql);
$totalPagesQM = ceil($row['crt'] / $rowsPerPageQM);

//echo $rowsPerPageLM.' '.$totalPagesIM.' '.$currentPageLM;
if($currentPageQM > 1) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=assessment_records&fgrd='.$fgrd.'&fscd='.$fscd.'&fsbj='.$fsbj.'&fcat='.$fcat.'&pPageQM='.($currentPageQM-1).'"></a>'; }

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
     echo '<a class="btn btn-default btn-sm" style="margin-left:2px; color:#478BFF; font-size:11px;" href="?page=assessment_records&fgrd='.$fgrd.'&fscd='.$fscd.'&fsbj='.$fsbj.'&fcat='.$fcat.'&pPageQM='.$x.'"><strong>'.$x.'</strong></a>';    }
}
 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesQM .'</strong> pages</span>'; 
 
if($currentPageQM < $totalPagesQM) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=assessment_records&fgrd='.$fgrd.'&fscd='.$fscd.'&fsbj='.$fsbj.'&fcat='.$fcat.'&pPageQM='.($currentPageQM+1).'"></a>'; }
?>
            </div>
	        <div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000;" href="?page=assessment_records&pPageQM=<?=($currentPageQM+1);?>&fgrd=<?=$fgrd;?>&fscd=<?=$fscd;?>&fsbj=<?=$fsbj;?>&fcat=<?=$fcat;?>"> next </a></div>
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
<!-- for modal display -->
<div id="ASMNTMODAL" class="modal fade">
  <div class="modal-dialog modwidth">
    <div class="modal-content">
      <div class="modal-header login-fm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modcap" style="color: #fff;"></h4>
      </div>
      <div class="modal-body" id="content" style="padding-top: 0px;">

      </div>
	<div class="modal-footer col-xs-12 col-md-12 login-fm" style="margin-top:0px; color:#fff;">
	  <button type="submit" class="btn btn-success" style="font-size: 12px;" form="frmAS">Save</button>
	  <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px;" form="frmAS">Close</button>
	</div>      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ############################################################################################ -->
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
var fgrd= document.getElementById("fgrd").value;
var fsbj= document.getElementById("fsbj").value;	
var fscd= document.getElementById("fscd").value;
var ftxt= $("#fscd option:selected").text();		
var fcat= document.getElementById("fcat").value;
var fcxt= $("#fcat option:selected").text();
	
if((fgrd=='')||(fsbj=='')||(fscd=='')||(fcat=='')) { $('#cass').prop('disabled',true); }	
else { $('#cass').prop('disabled',false);  }	
	
$(document).on("keyup","#fnoi",function() {
var fscd= document.getElementById("fscd").value;	
	if((fgrd=='')||(fsbj=='')||(fscd=='')||(fcat=='')) { $('#cass').prop('disabled',true); }	
	else { $('#cass').prop('disabled',false);  }
});		
	
$(document).on("click","#cass",function() {
	var cform='';
	if(fcat=='1') { cform='create_enumeration.php?mde=N1'; }
	else if(fcat=='2') { cform='create_essay.php?mde=N2'; }
	else if(fcat=='3') { cform='create_identification.php?mde=N3'; }
	else if(fcat=='4') { cform='create_multiplechoice.php?mde=N4'; }
	
	$('#content').empty();
	$("#content").load(cform+'&fgrd='+fgrd+'&fsbj='+fsbj+'&fscd='+fscd+'&fcat='+fcat);
	$('.modwidth').css('width','45%');
	$('.modcap').empty();
	$(".modcap").append('New '+fcxt+' Contents');
	$('#ASMNTMODAL').modal('show');
});		
	
$(document).on("click",".cedit",function() {
var id=$(this).data('id');
bootbox.confirm("Update Assessment Contents?", function(result) {	
  if (result) {	 	
	var cform='';
	if(fcat=='1') { cform='create_enumeration.php?mde=U1'; }
	else if(fcat=='2') { cform='create_essay.php?mde=U2'; }
	else if(fcat=='3') { cform='create_identification.php?mde=U3'; }
	else if(fcat=='4') { cform='create_multiplechoice.php?mde=U4'; }

	$('#content').empty();
	$("#content").load(cform+'&id='+id+'&fgrd='+fgrd+'&fsbj='+fsbj+'&fscd='+fscd+'&fcat='+fcat);
	$('.modwidth').css('width','45%');
	$('.modcap').empty();
	$(".modcap").append('Update '+fcxt+' Contents');
	$('#ASMNTMODAL').modal('show');
  }
 });	  
});		
	
$(document).on("click",".cdel",function() {
var id=$(this).data('id');
bootbox.confirm("Remove Assessment Contents?", function(result) {	
  if (result) {	 	
	if(fcat=='1') { window.location.href = 'assessmentcontroller.php?prc=D1&id='+id+'&fgrd='+fgrd+'&fsbj='+fsbj+'&fscd='+fscd+'&fcat='+fcat; }
	else if(fcat=='2') { window.location.href = 'assessmentcontroller.php?prc=D2&id='+id+'&fgrd='+fgrd+'&fsbj='+fsbj+'&fscd='+fscd+'&fcat='+fcat; }
	else if(fcat=='3') { window.location.href = 'assessmentcontroller.php?prc=D3&id='+id+'&fgrd='+fgrd+'&fsbj='+fsbj+'&fscd='+fscd+'&fcat='+fcat; }
	else if(fcat=='4') { window.location.href = 'assessmentcontroller.php?prc=D4&id='+id+'&fgrd='+fgrd+'&fsbj='+fsbj+'&fscd='+fscd+'&fcat='+fcat; }
  }
 });	  
});	
	
});
</script>	