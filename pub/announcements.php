<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

 $sitm = $_POST['sitem'];
 if($sitm=='') {  $sitm = $_REQUESTST['sitem']; }	

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
			 <span class="fa fa-newspaper-o" style="margin-right: 15px; font-size: 2em;"></span>Announcement Record	
				<a class="waves-effect waves-dark" href="#" aria-expanded="false" style="float: right; font-size: 14px;" title="Gumawa">
				   <button class="btn btn-success btn-sm" style="color: #fff; margin-top:-5px;">Create</button>
				</a>			 		 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Announcement List </h6>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
		<div class="list-group" style="margin-bottom: 5px;">
<?php 
	$nid = $_REQUEST['nid'];
	$rowsPerPageRV = 10;

	$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
	$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
	$cp=$currentPageRV;

	$dsql = mysqli_query($con,"SELECT * from tblnews_data where actv='Y' ORDER BY dte DESC LIMIT $offsetRV, $rowsPerPageRV");
	  while($r = mysqli_fetch_assoc($dsql))
	   {
?>                                   

<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
<div class="col-xs-12 col-md-12" style="padding-bottom: 0px;">
 <span style="color: #0E4A17; padding: 4px 10px 4px 0px; font-size: 14px; font-weight: 700;"><?=$r['title'];?></span>
 </div>

<div class="col-xs-12 col-md-5 user-img" style="font-size: 10px; color: #042601; float: left; margin-bottom:10px;">
<em><?=$r['dte'];?> / <?=$r['tme'];?></em>
 </div>

	<div class="clearfix"></div>

<div class="col-xs-12 col-md-5" style="padding-bottom: 0px;">
 <span style="color: #057508; padding: 4px 10px 4px 0px; font-size: 12px;"><?=echoln($r['info'],50);?></span>
 </div>

<div class="col-xs-12 col-md-7 user-img" style="font-size: 11px; color: #042601; float: right; margin-bottom:10px;">
<a href="multi-proc?prc=events&did=<?=$r['id'];?>&mprc=delevnt&pgn=<?=$pgn;?>" onclick="return confirm('Delete this Record?')">
<i class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete Events Record" style="float: right;font-size: 18px; padding: 0px 6px;"></i></a>

<a href="<?=$pgn;?>?prc=events&mde=UNEW&nid=<?=$r['id'];?>" onclick="return confirm('Update this Record?')">
<i class="btn btn-warning btn-sm glyphicon glyphicon-edit" title="Update Events Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></i></a>

<a href="<?=$pgn;?>?prc=events&nid=<?=$r['id'];?>">
<i class="btn btn-default btn-sm glyphicon glyphicon-search" title="Read Events Topic" style="border: 1px solid #848484; background: #848484; color: #fff; float: right; margin-right: 5px;  font-size: 18px; padding: 0px 6px;"></i>
</a>

</div>
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

</div>

 <?php } ?></div>
			<div style="float: left; width: 100%; margin-bottom: 10px;">
	        <div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="<?php $pgn;?>?prc=<?=$prc;?>&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
	        <div style="width:60%; float:left; font-size:11px;">
	          <?php
				$sql = mysqli_query($con,"SELECT COUNT(*) AS crt FROM tblnews_data where actv='Y'  ORDER BY dte DESC LIMIT $rowsPerPageRV");  

				$row = mysqli_fetch_assoc($sql);
				$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

				//echo $rowsPerPageRV.' '.$totalPagesRV.' '.$currentPageRV;
				if($currentPageRV > 1) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="'.$pgn.'?prc='.$prc.'&ppageRV='.($currentPageRV-1).'"></a>'; }

				if($totalPagesRV < $rowsPerPageRV) { $d=$totalPagesRV; }
				else { $d=$currentPageRV + $rowsPerPageRV; }

				if($d > $totalPagesRV) { $d=$totalPagesRV; }
				else { $d=$totalPagesRV; }

				//echo $d.' '.$totalPagesRV;
				for ($x=1;$x<=$d;$x++)
				{  if ($cp==$x) 
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#FF976A; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
				   }
				  else
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#FF976A; margin-left:2px; color:#fff; font-size:11px;" href="'.$pgn.'?prc='.$prc.'&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
				}
				 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 

				if($currentPageRV < $totalPagesRV) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="'.$pgn.'?prc='.$prc.'&ppageRV='.($currentPageRV+1).'"></a>'; }
				?>
            </div>
	        <div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="<?php $pgn;?>?prc=<?=$prc;?>&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
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
			 <span class="fa fa-info-circle" style="margin-right: 15px; font-size: 2em;"></span>Announcement Details			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Announcement Content</h6>
		  </div>
<div class="card-block">
	<div class="content"> 
		<?php 
		if($nid =='') 
		{	$dsql = mysqli_query($con,"SELECT * from tblnews_data where actv='Y' ORDER BY dte DESC LIMIT 1"); }
		else
		{	$dsql = mysqli_query($con,"SELECT * from tblnews_data where actv='Y' and id='$nid'"); }

		 while($r = mysqli_fetch_assoc($dsql))
		   {
			?>                                   
		<!-- Message -->
			<div class="chart-legend">
			<a href="<?php echo $pgn;?>?prc=VNews&sid=<?php echo $r['id'];?>&nenfo=RVents">
			<div class="col-xs-12 col-md-4 user-img"> <img src="../assets/img/<?php echo $r['ploc'];?>" alt="user" class="img-rounded" style="width:100%; float:left;"></div>
			<div class="col-xs-12 col-md-8 mail-contnet" style="float:right;">
			 <h4 style="color: #0E4A17; margin: 0px; margin-top: 10px; font-weight: 700;"><?php echo $r['title'];?></h4>
			 <span class="mail-desc" style="color: #000; font-size: 10px"><em><?php echo $r['dte'];?> / <?php echo $r['tme'];?></em></span><br>
			 <span class="mail-desc" style="color: #000;"><?php echo $r['info'];?></span></div>
			 <div class="clearfix"></div>
			</a>
			</div>
		 <?php } ?>
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
$('#sveschd, #sfgrd, #sfsec').prop('disabled', true);
	
$(document).on("click","#cfschd",function() {
	var id=$(this).data('id');
	var nm=$(this).data('nm');
	$('#sveschd, #sfgrd, #sfsec').prop('disabled', false);
	$('#fid').val(id);
	$('#sfnme').val(nm);
});	

$("#sfgrd").change(function(){
   var deptid = $(this).val();
	$.ajax({
        url: 'schedsection.php',
        type: 'post',
        data: {depart:deptid},
        dataType: 'json',
        success:function(response){
              var len = response.length;
              $("#sfsec").empty();
                for( var i = 0; i<len; i++){
                    var name = response[i]['sect'];
						$("#sfsec").append("<option value='"+name+"'>"+name+"</option>");
                        }
                    }
            });
});
	
$(document).on("click","#viewfs",function() {
	var id=$(this).data('id');
	$('#content').empty();
	$("#content").load('viewfacschedule.php?id='+id);
	$('.modwidth').css('width','45%');
	$('.modcap').empty();
	$(".modcap").append('Faculty Assignment Schedule');
	$('#POPMODAL').modal('show');
});		

});
</script>