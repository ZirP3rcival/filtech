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
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Faculty Assignment			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Faculty List </h6>
		  </div>	  
<div class="card-block box" style="padding: 10px;">                          
	<div style="background: #FFF;"> 
	<div class="col-xs-12 col-md-12" style="margin-top: 10px;">
				<form id="msearch" action="?page=faculty_scheduler&prc=fsch" method="post" class="form-horizontal" style="margin-bottom: 15px;">
				   <div class="input-group">
					 <input name="sitem" type="text" class="form-control isearch" placeholder="Search Name Here" value="<?=$sitm;?>">
					  <span class="input-group-btn">
						   <button class="btn btn-default" type="submit" style="background: #0A65D1; color:#fff;padding-left: 10px;padding-right: 10px;">
								<i class="fa fa-search" style="font-size:14px;"></i>
						   </button>
					  </span>
				  </div>
				</form>	
	</div>
	<div class="clearfix">  </div>
	<div class="list-group" style="margin-bottom: 5px;">
	<?php 
	$nid = $_REQUEST['nid'];

	$rowsPerPageRV = 5;
	// Get the search variable from URL
	$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
	$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
	$cp=$currentPageRV;

	if($sitm!='') {	
	$dsql = mysqli_query($con,"SELECT * from tblsinfo_data where typ='FACULTY' and actv='Y' and alyas LIKE '%$sitm%' ORDER BY alyas ASC LIMIT $offsetRV, $rowsPerPageRV"); }
	else  {	
	$dsql = mysqli_query($con,"SELECT * from tblsinfo_data where typ='FACULTY' and actv='Y' and alyas IS NOT NULL ORDER BY alyas ASC LIMIT $offsetRV, $rowsPerPageRV"); }	

	  while($r = mysqli_fetch_assoc($dsql))
	   {  $usrpic='data:image/png;base64,'.''.$r['ploc'];
		?>                                   
	<!-- Message -->

	<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">

	<div class="col-xs-3 col-md-2" style="padding-bottom: 0px;">
	 <img src="<?=$usrpic?>" style="width: 60%;">
	 </div>
	<div class="col-xs-9 col-md-6" style="padding-bottom: 0px;">
	 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px; font-weight: 700;"><?=$r['alyas'];?></span>
	 </div>
	<div class="col-xs-12 col-md-4 user-img" style="font-size: 11px; color: #000; float: right; margin-bottom:10px;">
	<a href="#" id="cfschd" data-id="<?=$r['id']?>" data-nm="<?=$r['alyas'];?>" onclick="return confirm('Create Faculty Schedule?')">
	<i class="btn btn-success btn-sm glyphicon glyphicon-edit" title="Create Faculty Schedule" style="float: right;font-size: 18px; padding: 0px 6px;"></i></a>

	<a href="#" id="viewfs" data-id="<?=$r['id'];?>" onclick="return confirm('View Faculty Schedule')">
	<i class="btn btn-default btn-sm glyphicon glyphicon-search" title="View Faculty Schedule" style="border: 1px solid #848484; background: #848484; color: #fff; float: right; margin-right: 5px;  font-size: 18px; padding: 0px 6px;"></i>
	</a>

	</div>
	 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

	</div>

	 <?php } ?></div>
	<div style="float: left; width: 100%; margin-bottom: 10px;">
				<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=faculty_scheduler&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
				<div style="width:60%; float:left; font-size:11px;">
				  <?php
	$sql = mysqli_query($con,"SELECT COUNT(*) AS crt from tblsinfo_data where typ='FACULTY' and actv='Y' LIMIT $rowsPerPageRV");  

	$row = mysqli_fetch_assoc($sql);
	$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

	//echo $rowsPerPageRV.' '.$totalPagesRV.' '.$currentPageRV;
	if($currentPageRV > 1) 
	{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=faculty_scheduler&ppageRV='.($currentPageRV-1).'"></a>'; }

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
	{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=faculty_scheduler&ppageRV='.($currentPageRV+1).'"></a>'; }
	?>
				</div>
				<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=faculty_scheduler&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
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
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Faculty Scheduling Form			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Grade / Section Assign Form</h6>
		  </div>
<div class="card-block box" style="padding: 10px 10px 20px 10px;">
<form action="facultyschedulercontroller.php?prc=S"  enctype="multipart/form-data"  method="post" style="margin-bottom:0px; width: 100%;" class="form-horizontal" role="form" id="frmFNS" >
                             
<div style="background: #FFF;"> 
<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Faculty Name: </span></div>
<div class="col-xs-12 col-md-12">
<input name="fid" id="fid" type="hidden" value="">
<input name="sfnme" type="text" class="form-control" id="sfnme" placeholder="" required style="width:100%; float:left; color: #000; font-weight: 700;" readonly value="<?=$sfnme;?>"></div>
	<div class="clearfix"></div>

<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:10px; float: right;">	
<select name="sfgrd" required class="form-control" id="sfgrd" style="display: inline-block; position:inherit; width:100%;">
          <option value="" >- Select Grade -</option>
<?php
$dsql = mysqli_query($con,"SELECT * from tblgrade_data ORDER BY grd ASC");
	
  while($rg = mysqli_fetch_assoc($dsql))
   { if($grd==$rg['id']) {	?>    
    <option value="<?=$rg['id'];?>" selected><?=$rg['grd'];?></option> 
<?php } else { ?>          
    <option value="<?=$rg['id'];?>" ><?=$rg['grd'];?></option>
<?php } } ?>  
        </select></div>
	<div class="clearfix"></div>
	
<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Section : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:10px; float: right;">
<select name="sfsec" required class="form-control" id="sfsec" style="display: inline-block; position:inherit; width:100%;">
          <option value="" >- Select Section -</option>
<?php if($sec!='') { ?> 
          <option value="<?=$sec;?>" selected ><?=$sec;?></option> 
<?php } ?>          
        </select></div>
	<div class="clearfix"></div>
</div>  
<div class="clearfix">  </div>  
</form>                                                    
</div>
<div class="card-block card-bottom" style="text-align: center">
  <button type="submit" id="sveschd" class="btn btn-success" style="font-size: 14px;" form="frmFNS">Save</button>  
  <div class="clearfix">  </div> 
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