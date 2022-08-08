<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

 $sitm = $_POST['sitem'];
 if($sitm=='') {  $sitm = $_REQUESTST['sitem']; }	

 $mde=$_REQUEST['mde'];
if($mde=='') { $mde='S'; }

function echoln($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
?>
<style>
.form-control  {
    color: #0B0237;
	font-weight: 600;
	font-size: 12px;
}	
</style>
<div class="content-inner-all">
    <!-- user account info start -->
    <div class="income-order-visit-user-area m-bottom ">
        <div class="container-fluid">           
            <div class="row rowflx" style="margin-bottom: 50px;">
<div class="col-lg-5 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-newspaper-o" style="margin-right: 15px; font-size: 2em;"></span>Announcement Record</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng Anunsyo </h6>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
		<div class="list-group" style="margin-bottom: 5px;">
<?php 
	$id = $_REQUEST['id'];
	$rowsPerPageRV = 2;

	$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
	$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
	$cp=$currentPageRV;

	$dsql = mysqli_query($con,"SELECT * from tblnews_data ORDER BY dtme DESC LIMIT $offsetRV, $rowsPerPageRV");
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
 <div class="col-xs-7 col-md-7 user-img" style="font-size: 11px; color: #042601; float: right; margin-bottom:10px;">
<a href="announcementscontroller.php?id=<?=$r['id'];?>&prc=D" onclick="return confirm('Delete this Record?')">
<i class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete this Record" style="float: right;font-size: 18px; padding: 0px 6px;"></i></a>

<a href="?page=announcements&id=<?=$r['id'];?>&mde=U&ppageRV=<?=$currentPageRV?>" onclick="return confirm('Update this Record?')">
<i class="btn btn-warning btn-sm glyphicon glyphicon-edit" title="Update this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>

</div>
	<div class="clearfix"></div>
<div class="col-xs-12 col-md-2" style="padding-bottom: 0px; float: left">
<img src="<?=$usrpic?>" style="width: 100%;" onerror="this.src='../img/missing.png'">
</div>
<div class="col-xs-12 col-md-10" style="padding-bottom: 0px; float: right">
 <span style="color: #362E53; padding: 4px 10px 4px 0px; font-size: 12px;"><?=echoln($r['info'],100)?></span>
</div>
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px; padding-bottom: 10px;"></div>

</div>

 <?php } ?></div>
			<div style="float: left; width: 100%; margin-bottom: 10px;">
	        <div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="admin?page=announcements&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
	        <div style="width:60%; float:left; font-size:11px;">
	          <?php
				$sql = mysqli_query($con,"SELECT COUNT(*) AS crt FROM tblnews_data ORDER BY dtme DESC LIMIT $rowsPerPageRV");  

				$row = mysqli_fetch_assoc($sql);
				$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

				//echo $rowsPerPageRV.' '.$totalPagesRV.' '.$currentPageRV;
				if($currentPageRV > 1) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="admin?page=announcements&ppageRV='.($currentPageRV-1).'"></a>'; }

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
					 echo '<a class="btn btn-default btn-sm" style="background:#FF976A; margin-left:2px; color:#fff; font-size:11px;" href="admin?page=announcements&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
				}
				 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 

				if($currentPageRV < $totalPagesRV) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="admin?page=announcements&ppageRV='.($currentPageRV+1).'"></a>'; }
				?>
            </div>
	        <div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="admin?page=announcements&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
			<div class="clearfix"></div>	        
          </div>
                            </div>  
	<div class="clearfix">  </div>                           
</div>
	</div>
</div>  

<div class="col-lg-7 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-info-circle" style="margin-right: 15px; font-size: 2em;"></span>Create New Announcement			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Gumawa ng Bagong Anunsyo</h6>
		  </div>
<?php		  
$dsql = mysqli_query($con,"SELECT * from tblnews_data where id='$id'");
	  while($r = mysqli_fetch_assoc($dsql))
	   { $epic='data:image/png;base64,'.''.$r['ploc'];
		 $opic=$r['ploc'];
		 $utitle=$r['title'];
		 $uinfo=$r['info']; }
?>		  
<div class="card-block">
<div class="content" style="margin: 15px;"> 
 <form action="announcementscontroller.php?prc=<?=$mde?>&id=<?=$id?>"  enctype="multipart/form-data"  method="post" style="margin-bottom:0px; width: 100%;" class="form-horizontal" role="form" id="frmNE" >  
<div class="col-xs-12 col-md-8" style="float: left">                                  
<div class="form-group" style="padding: 10px; margin-bottom: 0px;">
	<label class="col-xs-12 col-md-12" style="padding-left: 0px; float: left; color:#000; font-size: 12px;">Paksa ng Anunsyo : </label>
	<textarea class="form-control col-xs-12 col-md-12" id="title" name="title" rows="2" maxlength="200" placeholder="Input News and Events Title Here" ><?=$utitle;?></textarea>
</div>

<div class="form-group" style="padding:0px 10px 10px 10px; margin-bottom: 0px;">
	<label class="col-xs-12 col-md-12" style="padding-left: 0px; float: left; color:#000; font-size: 12px;">Nilalaman ng Anunsyo : </label>
	<textarea class="form-control col-xs-12 col-md-12" id="info" name="info" rows="6" style="height: 160px;" placeholder="Input News and Events Contents Here" ><?=$uinfo;?></textarea>
</div>
</div>
<div class="col-xs-12 col-md-4" style="float:right"> 
<div class="form-group" style="padding:0px; margin: 0px;">
<div style="float: left; padding: 0px;" class="col-xs-12 col-md-12">
    <label for="files" class="btn btn-info" style="padding: 2px 12px;"> <span style="font-size: 12px;">Browse Photo</span></label>
    <input style="visibility: hidden; position: absolute;" id="files" class="form-control" type="file" name="files"  accept="image/*" capture="camera">
    <input type="hidden" class="form-control" id="picr" name="picr" value="<?=$opic?>">
</div>
<div style="margin-top: 15px;" class="col-xs-12 col-md-12">   
    <img id="img" src="<?=$epic?>" alt="" style="width: 100%" onerror="this.src='../img/missing.png'"> 
</div>
</div>
</div>
<script type="text/javascript">
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#mbg').show();
			$('#lbl').show();
            $('#img').show().attr('src', e.target.result);
			var strToReplace=e.target.result;
			var strImage = strToReplace.replace(/^data:image\/[a-z]+;base64,/, "");
			$('#picr').val(strImage);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#files").change(function(){
    readURL(this);
});
</script>
<div class="card-block card-bottom col-md-12 col-xs-12" style="padding: 10px; text-align: center;">
<a href="admin?page=announcements" aria-expanded="false">
<button type="button" class="btn btn-default btn-sm"  form="frmNE" style="margin-right: 15px;">Cancel</button>	
</a>	
<button type="submit" class="btn btn-success btn-sm" id="nwsuba" form="frmNE" style="color: #fff;">Submit</button>		
	<div class="clearfix"></div>
</div> 
</form>
</div>
</div> 
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
<div id="POPMODAL" class="modal fade">
  <div class="modal-dialog modwidth">
    <div class="modal-content">
      <div class="modal-header login-fm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modcap" style="color: #fff;"></h4>
      </div>
      <div class="modal-body" id="content" style="padding-top: 0px;">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){
	
	
	
});
</script>