<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$id=$_REQUEST['id'];

$dsql = mysqli_query($con,"SELECT * from ft2_module_subjects where id='$id'"); 	

	  while($r = mysqli_fetch_assoc($dsql))
	   {  $subj=$r['subj'];  }
?>

<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
		<div class="list-group" style="margin-bottom: 5px;">
<div class="col-xs-12 col-md-12" style="padding-bottom: 0px;">
	<h5 style="color: #04065F; font-weight: 600;"><span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Subject: </span> <?=$subj?></h5>
</div>		
<div class="dvfac" style="padding: 5px 0px; margin: 0px; font-weight: 600;">
<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Grade Level</span>
 </div>
<div class="col-xs-6 col-md-4" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Section</span>
 </div> 
<div class="col-xs-6 col-md-5" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Teacher</span>
 </div> 

 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>
</div>		
<?php 
$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_module_subjects.*, ft2_grade_data.id, ft2_grade_data.grd AS grade, 
ft2_section_data.*, ft2_users_account.id AS fid, ft2_users_account.alyas
FROM ft2_faculty_schedule 
INNER JOIN ft2_users_account ON ft2_users_account.id=ft2_faculty_schedule.fid
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id=ft2_faculty_schedule.sjid
INNER JOIN ft2_grade_data ON ft2_grade_data.id=ft2_faculty_schedule.grde
INNER JOIN ft2_section_data ON ft2_section_data.id=ft2_faculty_schedule.sec
WHERE ft2_faculty_schedule.sjid = '$id'");
			
  while($r = mysqli_fetch_assoc($dsql))
   {  
    ?>                                   
<!-- Message -->
<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?php echo $r['grade'];?></span>
 </div>
<div class="col-xs-6 col-md-4" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?php echo $r['sect'];?></span>
 </div> 
<div class="col-xs-6 col-md-5" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?php echo $r['alyas'];?></span>
 </div> 
 <div class="clearfix" style="border-bottom:1px #EFEFEF solid; margin-top: 15px;"></div>
</div>

 <?php } ?></div>
     </div>  
	<div class="clearfix">  </div>                           
</div>