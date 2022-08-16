<div class="content-inner-all">
    <!-- income order visit user Start -->
    <div class="income-order-visit-user-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Faculty</h2>
                                <div class="main-income-phara">
<!--                                    <p>Monthly</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span></span><span class="counter"><?=$_SESSION['fctr']?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline1"></span>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Active Accounts</p>
                                <span class="income-percentange"><?=$_SESSION['factv']?>% <i class="fa fa-users"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Students</h2>
                                <div class="main-income-phara order-cl">
<!--                                    <p>Annual</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?=$_SESSION['sctr']?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline6"></span>
                                </div>
                            </div>
                            <div class="income-range order-cl">
                                <p>Active Accounts</p>
                                <span class="income-percentange"><?=$_SESSION['sactv']?>% <i class="fa fa-users"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Lessons</h2>
                                <div class="main-income-phara visitor-cl">
<!--                                    <p>Today</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?=$_SESSION['lctr']?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline2"></span>
                                </div>
                            </div>
                            <div class="income-range visitor-cl">
                                <p>Active Lessons</p>
                                <span class="income-percentange"><?=$_SESSION['alctr']?>% <i class="fa fa-book"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total user-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Active User</h2>
                                <div class="main-income-phara low-value-cl">
<!--                                    <p>Low Value</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?=$_SESSION['uctr']?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline5"></span>
                                </div>
                            </div>
                            <div class="income-range low-value-cl">
                                <p>Logged Account</p>
                                <span class="income-percentange"><?=$_SESSION['auctr']?>% <i class="fa fa-key"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- income order visit user End -->
    <div class="feed-mesage-project-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sparkline11-list shadow-reset mg-tb-30">
                        <div class="sparkline11-hd" style="background: #fdf0bf;">
                            <div class="main-sparkline11-hd">
                                <h1>Annnouncements</h1>
                            </div>
                        </div>
                           
<div class="card-block box" style="padding: 10px; background: #fff;">
	<div style="background: #FFF;"> 
		<div class="list-group" style="margin-bottom: 5px;">
<?php 
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
	$id = $_REQUEST['id'];
	$rowsPerPageRV = 2;

	$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
	$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
	$cp=$currentPageRV;

	$dsql = mysqli_query($con,"SELECT * from ft2_announcements_data ORDER BY dtme DESC LIMIT $offsetRV, $rowsPerPageRV");
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
 <span style="color: #362E53; padding: 4px 10px 4px 0px; font-size: 12px;"><?=echoln($r['info'],100)?></span>
  <button class="btn btn-primary btn-sm glyphicon glyphicon-search" id="btnvw" data-id="<?=$r['id'];?>" title="Read More" style="float: right; margin-right: 5px; font-size: 10px; padding: 0px 6px;"></button>
</div>
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px; padding-bottom: 10px;"></div>

</div>

 <?php } ?></div>
			<div style="float: left; width: 100%; margin-bottom: 10px;">
	        <div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="admin?page=dashboard&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
	        <div style="width:60%; float:left; font-size:11px;">
	          <?php
				$sql = mysqli_query($con,"SELECT COUNT(*) AS crt FROM ft2_announcements_data ORDER BY dtme DESC LIMIT $rowsPerPageRV");  

				$row = mysqli_fetch_assoc($sql);
				$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

				//echo $rowsPerPageRV.' '.$totalPagesRV.' '.$currentPageRV;
				if($currentPageRV > 1) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="admin?page=dashboard&ppageRV='.($currentPageRV-1).'"></a>'; }

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
					 echo '<a class="btn btn-default btn-sm" style="background:#FF976A; margin-left:2px; color:#fff; font-size:11px;" href="admin?page=dashboard&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
				}
				 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 

				if($currentPageRV < $totalPagesRV) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="admin?page=dashboard&ppageRV='.($currentPageRV+1).'"></a>'; }
				?>
            </div>
	        <div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="admin?page=dashboard&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
			<div class="clearfix"></div>	        
          </div>
                            </div>  
	<div class="clearfix">  </div>                           
</div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sparkline9-list shadow-reset mg-tb-30">
                        <div class="sparkline9-graph dashone-comment">
							<?php include_once('slider.php');?> 
                         <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	
$(document).on("click","#btnvw",function() {
	var id=$(this).data('id');
	$('#content').empty();
	$("#content").load('viewannouncement.php?id='+id);
	$('.modwidth').css('width','45%');
	$('.modcap').empty();
	$(".modcap").append('Announcement Details');
	$('#POPMODAL').modal('show');
});		
	
});
</script>	

