<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];
$grd=$_SESSION['grde'];  	
$sec=$_SESSION['sec'];

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
<div class="col-lg-12 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-pencil-square-o" style="margin-right: 15px; font-size: 2em;"></span>Student Subject Grade	 
			 <button class="btn btn-info btn-sm fa fa-print" id="brpt" name="brpt" style="font-size: 16px; padding: 6px; margin-left: 15px; float: right;" data-fsbj="<?=$fsbj?>"></button>	
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Grado ng Estudyante sa Asignatura</h6>
		  </div>
<div class="card-block">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;"><div class="row">
<div class="col-xs-10 col-md-5" style="padding-bottom: 0px; padding-right: 0px;">Subject</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">1st Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">2nd Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">3rd Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">4th Grading</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">Average Grade</div>
<div class="col-xs-2 col-md-1" style="padding: 0px; text-align: center;">Remarks</div>
<div class="clearfix"></div>
</div>
</li>
<?php 
$dsql = mysqli_query($con,"SELECT ft2_asmt_data_result.sid, ft2_asmt_data_result.grde, ft2_asmt_data_result.sec, ft2_asmt_data_result.syr, ft2_asmt_data_result.asid, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj 
FROM ft2_asmt_data_result
INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_asmt_data_result.asid
WHERE ft2_asmt_data_result.sid='$sid' AND ft2_asmt_data_result.grde='$grd' AND ft2_asmt_data_result.sec='$sec' AND ft2_asmt_data_result.syr = '$syr'
GROUP BY ft2_module_subjects.subj ORDER BY ft2_module_subjects.subj ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  $fsbj=$rg['sjid'];
	   $sql2 = mysqli_query($con,"SELECT ft2_grade_record.*, ft2_users_account.* FROM ft2_grade_record
		INNER JOIN ft2_users_account ON ft2_users_account.id = ft2_grade_record.sid
		WHERE ft2_grade_record.grde = '$grd' AND ft2_grade_record.sec = '$sec' AND ft2_grade_record.sjid='$fsbj' 
		AND ft2_grade_record.sid='$sid' AND ft2_grade_record.syr='$syr'"); 				 
		while($r2 = mysqli_fetch_assoc($sql2))	{  
			$sid=$r2['id'];
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;">
<div class="row">
	<div class="col-xs-10 col-md-5" style="padding: 5px 20px;"><?=$rg['subj'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd1'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd2'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd3'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['grd4'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['ave'];?></div>
	<div class="col-xs-2 col-md-1" style="padding: 5px; text-align: center;"><?=$r2['rem'];?></div>
	 <div class="clearfix"></div>
 </div>
 </li>

 <?php } } ?></div>    
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
$(document).on("click","#brpt",function() {	
var url = 'student_grade_report.php';
	window.open(url, 'blank');
});
	
});
</script>	