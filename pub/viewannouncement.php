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
<?php	
	$dsql = mysqli_query($con,"SELECT * from tblnews_data WHERE id='$id'");
	  while($r = mysqli_fetch_assoc($dsql))
	   { $usrpic='data:image/png;base64,'.''.$r['ploc'];
?>                                   

<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
<div class="col-xs-12 col-md-12" style="padding-bottom: 0px;">
 <span style="color: #033462; padding: 4px 10px 4px 0px; font-size: 14px; font-weight: 700;"><?=$r['title'];?></span>
 </div>
 <div class="col-xs-5 col-md-5 user-img" style="font-size: 10px; color: #042601; float: left; margin-bottom:10px;">
<em><?=$r['dtme'];?></em>
 </div>
	<div class="clearfix"></div>
<div class="col-xs-12 col-md-4" style="padding-bottom: 0px; float: left">
<img src="<?=$usrpic?>" style="width: 100%;" onerror="this.src='../img/missing.png'">
</div>
<div class="col-xs-12 col-md-8" style="padding-bottom: 0px; float: right">
 <span style="color: #362E53; padding: 4px 10px 4px 0px; font-size: 12px;"><?=$r['info']?></span>
</div>

</div>

 <?php } ?>	
	
</div>
     </div>  
	<div class="clearfix">  </div>                           
</div>