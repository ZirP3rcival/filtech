<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$grd=$_REQUEST['grd'];
?>

<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
		<div class="list-group" style="margin-bottom: 5px;">
<?php 
$dsql = mysqli_query($con,"SELECT tblsection_data.*, tblgrade_data.* FROM tblsection_data
INNER JOIN tblgrade_data ON tblsection_data.grd = tblgrade_data.id WHERE tblsection_data.grd = '$grd'");
	
  while($r = mysqli_fetch_assoc($dsql))
   {  
	   $sfid = $r['fid'];
	   
	   $xsql = mysqli_query($con,"SELECT id, alyas FROM tblsinfo_data WHERE id = '$sfid'");
	   while($rx = mysqli_fetch_assoc($xsql))
        { $xalyas=$rx['alyas']; }
    ?>                                   
<!-- Message -->

<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">

<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #0E4A17; padding: 4px 10px 4px 0px; font-size: 16px;"><?php echo $r['grd'];?></span>
 </div>
<div class="col-xs-6 col-md-3" style="padding-bottom: 0px;">
 <span style="color: #0E4A17; padding: 4px 10px 4px 0px; font-size: 16px;"><?php echo $r['sect'];?></span>
 </div> 
 
 <div class="col-xs-12 col-md-6" style="padding-bottom: 0px;">
 <span style="color: #0E4A17; padding: 4px 10px 4px 0px; font-size: 16px;"><?php echo $xalyas;?></span>
 </div> 
 
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

</div>

 <?php } ?></div>
     </div>  
	<div class="clearfix">  </div>                           
</div>