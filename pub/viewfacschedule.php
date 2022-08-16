<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$id=$_REQUEST['id'];
$xsql = mysqli_query($con,"SELECT id, alyas FROM ft2_users_account WHERE id = '$id'");
	   while($rx = mysqli_fetch_assoc($xsql))
        { $xalyas=$rx['alyas']; }
?>

<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
		<div class="list-group" style="margin-bottom: 5px;">
<div class="dvfac" style="padding: 5px 0px; margin: 0px; font-weight: 600;">
<div class="col-xs-12 col-md-12" style="padding-bottom: 0px;">
	<h5 style="color: #04065F; font-weight: 600;"><span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Teacher: </span> <?=$xalyas?></h5>
</div>
<div class="col-xs-6 col-md-4" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Grade Level</span>
 </div>
<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Section</span>
 </div> 
 <div class="col-xs-12 col-md-5" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Subject </span>
 </div> 
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>
</div>		
<?php 
$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_assigned_subjects.*,ft2_module_subjects.*, ft2_grade_data.id, ft2_grade_data.grd as grade, ft2_section_data.*
FROM ft2_faculty_schedule 
INNER JOIN ft2_assigned_subjects ON ft2_assigned_subjects.id=ft2_faculty_schedule.asid
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id=ft2_assigned_subjects.sjid
INNER JOIN ft2_grade_data ON ft2_grade_data.id=ft2_assigned_subjects.grde
INNER JOIN ft2_section_data ON ft2_section_data.id=ft2_assigned_subjects.sec
WHERE ft2_faculty_schedule.fid = '$id'");

  while($r = mysqli_fetch_assoc($dsql))
   {  
    ?>                                   
<!-- Message -->
<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
<div class="col-xs-6 col-md-4" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?=$r['grade'];?></span>
 </div>
<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?=$r['sect'];?></span>
 </div> 
 <div class="col-xs-12 col-md-5" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?=$r['subj'];?></span>
	<a href="facultyschedulercontroller.php?prc=D&id=<?=$r['id'];?>" onclick="return confirm('Delete this Record?')">
	<button class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete this Record" style="float: right;font-size: 18px; padding: 0px 6px;"></button></a>
 </div> 
 <div class="clearfix" style="border-bottom:1px #EFEFEF solid; margin-top: 15px;"></div>
</div>

 <?php } ?></div>
     </div>  
	<div class="clearfix">  </div>                           
</div>