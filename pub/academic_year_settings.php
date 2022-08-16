<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

 $sitm = $_POST['sitem'];
 if($sitm=='') {  $sitm = $_REQUESTST['sitem']; }	
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
<div class="col-lg-6 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-calendar" style="margin-right: 15px; font-size: 2em;"></span>Academic Year Record</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng Taong Pampaaralan</h6>
		  </div>	  
		<div class="card-block box" style="padding: 10px 15px;">
	<div style="background: #FFF;"> 
<div class="list-group" style="margin-bottom: 5px;">
<?php 
$nid = $_REQUEST['nid'];
	
$rowsPerPageRV = 5;
// Get the search variable from URL
$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
$cp=$currentPageRV;

$dsql = mysqli_query($con,"SELECT * from ft2_active_year ORDER BY syr DESC LIMIT $offsetRV, $rowsPerPageRV");
	
  while($r = mysqli_fetch_assoc($dsql))
   {
    ?>                                   
<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">

<div class="col-xs-12 col-md-7" style="padding-bottom: 0px;">
 <span style="color: #0E4A17; padding: 4px 10px 4px 0px; font-size: 16px; font-weight: 700;"><?=$r['syr'];?></span>
 </div>
<div class="col-xs-12 col-md-5 user-img" style="font-size: 11px; color: #042601; float: right; margin-bottom:10px;">
<a href="academicyearcontroller?prc=D&id=<?=$r['id'];?>" onclick="return confirm('Delete this Record?')">
<button class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete Forum Record" style="float: right;font-size: 18px; padding: 0px 6px;"></button></a>

<?php if($r['stat']=='N')  { ?>
<a href="academicyearcontroller?prc=A&id=<?=$r['id'];?>&set=Y" onclick="return confirm('Activate Academic Year?')">
<button class="btn btn-info btn-sm glyphicon glyphicon-ok" title="Activate Academic Year" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
<?php } ?>
<?php if($r['stat']=='Y')  { ?>
<a href="academicyearcontroller?prc=A&id=<?=$r['id'];?>&set=N" onclick="return confirm('De-Activate Academic Year?')">
<button class="btn btn-success btn-sm glyphicon glyphicon-remove" title="De-Activate Academic Year" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
<?php } ?>
</div>
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

</div>

 <?php } ?></div>
<div style="float: left; width: 100%; margin-bottom: 10px;">
	        <div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=academic_year_settings&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
	        <div style="width:60%; float:left; font-size:11px;">
	          <?php
$sql = mysqli_query($con,"SELECT COUNT(*) AS crt FROM ft2_active_year ORDER BY syr DESC LIMIT $rowsPerPageRV");  
  
$row = mysqli_fetch_assoc($sql);
$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

if($currentPageRV > 1) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=academic_year_settings&ppageRV='.($currentPageRV-1).'"></a>'; }

if($totalPagesRV < $rowsPerPageRV) { $d=$totalPagesRV; }
else { $d=$currentPageRV + $rowsPerPageRV; }

if($d > $totalPagesRV) { $d=$totalPagesRV; }
else { $d=$totalPagesRV; }

//echo $d.' '.$totalPagesRV;
for ($x=1;$x<=$d;$x++)
{  if ($cp==$x) 
   { 
     echo '<a class="btn btn-default btn-sm" style="background:#FF6AC4; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
   }
  else
   { 
     echo '<a class="btn btn-default btn-sm" style="background:#FF976A; margin-left:2px; color:#fff; font-size:11px;" href="?page=academic_year_settings&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
}
 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 
 
if($currentPageRV < $totalPagesRV) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=academic_year_settings&ppageRV='.($currentPageRV+1).'"></a>'; }
?>
            </div>
	        <div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=academic_year_settings&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
<div class="clearfix"></div>	        
          </div>
                            </div>  
	<div class="clearfix">  </div>                           
</div>
	</div>
</div>  
<div class="col-lg-6 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-save" style="margin-right: 15px; font-size: 2em;"></span>Create Academic Year Record</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Gumawa ng Bagong Taong Pampaaralan</h6>
		  </div>
		<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
<form action="academicyearcontroller?prc=S" method="post" class="form-horizontal" id="frmcsyr" name="frmcsyr" style="margin:0px; padding:0px 12px;" role="form">
                      <div class="form-group" style="padding: 0px 15px;">
                        <label for="username">New Academic Year :</label>
                        <input name="nsyr" type="text" class="form-control" id="nsyr" maxlength="11" placeholder="Enter School Year"  required>
                      </div>
</form>
<script type="text/javascript">
 
// function that allows enter numbers only, each key in keyboard has special key code. We can restrict input using these key codes:
$(function () {
 
// "textNo" is the ID of input box
$('#nsyr').keydown(function (e) {
 
// Shift, control and alternate keys do not effect input
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
 
// except 0-9, other characters do not effect input box || (key == 109) || (key == 189) 32 = spacebar 109 = '-'
if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)|| (key >= 96 && key <= 105) || (key == 109))) {
e.preventDefault();
}
}
});
});
</script>
<div class="modal-footer" >
<button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px;" form="frmcsyr"/>Submit</button>
</div>
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
