<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$id=$_REQUEST['id'];
?>

<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
		<div class="list-group" style="margin-bottom: 5px;">
<div class="dvfac" style="padding: 5px 0px; margin: 0px; font-weight: 600;">
<div class="col-xs-6 col-md-4" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Grade Level</span>
 </div>
<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Section</span>
 </div> 
 <div class="col-xs-12 col-md-5" style="padding-bottom: 0px;">
 <span style="color: #2425AB; padding: 4px 10px 4px 0px; font-size: 13px;">Teacher</span>
 </div> 
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>
</div>		
<?php 
$dsql = mysqli_query($con,"SELECT tblfaculty_sched.*, tblgrade_data.* FROM tblfaculty_sched INNER JOIN tblgrade_data ON tblgrade_data.id=tblfaculty_sched.grde WHERE tblfaculty_sched.fid = '$id'");

  while($r = mysqli_fetch_assoc($dsql))
   {  
	   $sfid = $r['fid'];
	   
	   $xsql = mysqli_query($con,"SELECT id, alyas FROM tblsinfo_data WHERE id = '$sfid'");
	   while($rx = mysqli_fetch_assoc($xsql))
        { $xalyas=$rx['alyas']; }
    ?>                                   
<!-- Message -->
<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
<div class="col-xs-6 col-md-4" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?php echo $r['grd'];?></span>
 </div>
<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?php echo $r['sec'];?></span>
 </div> 
 <div class="col-xs-12 col-md-5" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px;"><?php echo $xalyas;?></span>
	<a href="facultyschedulercontroller.php?prc=D&id=<?=$r['id'];?>" onclick="return confirm('Delete this Record?')">
	<button class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete this Record" style="float: right;font-size: 18px; padding: 0px 6px;"></button></a>
 </div> 
 <div class="clearfix" style="border-bottom:1px #EFEFEF solid; margin-top: 15px;"></div>
</div>

 <?php } ?></div>
     </div>  
	<div class="clearfix">  </div>                           
</div>