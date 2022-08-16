<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$zgrd=$_POST['zgrd'];
//if($zgrd!='') { $_SESSION['zgrd']=$zgrd; }
if($zgrd=='') { $zgrd=$_REQUEST['zgrd']; }

$zsec=$_POST['zsec'];
//if($zsec!='') { $_SESSION['zsec']=$zsec; }
if($zsec=='') { $zsec=$_REQUEST['zsec']; }

$zsbj=$_POST['zsbj'];
//f($zsbj!='') { $_SESSION['zsbj']=$zsbj; }
if($zsbj=='') { $zsbj=$_REQUEST['zsbj']; }

$zfac=$_POST['zfac'];
//if($zfac!='') { $_SESSION['zfac']=$zfac; }
if($zfac=='') { $zfac=$_REQUEST['zfac']; }

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
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Academic Subject Record
				 <a class="waves-effect waves-dark" data-toggle="modal" data-target="#CSJ" aria-expanded="false" style="float: right; font-size: 14px;">
					<button class="btn btn-primary btn-sm" style="color: #fff; margin-top:-5px;">Create</button>
				 </a>			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng Asignatura </h6>
		  </div>	  
			<div class="card-block box" style="padding: 10px;">
		<div style="background: #FFF;"> 
<div class="list-group" style="margin-bottom: 5px;">
<?php 
$nid = $_REQUEST['nid'];
	
$rowsPerPageRV = 5;
// Get the search variable from URL
$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
$cp=$currentPageRV;

$dsql = mysqli_query($con,"SELECT * from ft2_module_subjects ORDER BY subj ASC LIMIT $offsetRV, $rowsPerPageRV");
	
  while($r = mysqli_fetch_assoc($dsql))
   {
    ?>                                   
<!-- Message -->

<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">

<div class="col-xs-12 col-md-7" style="padding-bottom: 0px;">
 <span style="color: #000; padding: 4px 10px 4px 0px; font-size: 13px; font-weight: 700;"><?=$r['subj'];?></span>
 </div>
<div class="col-xs-12 col-md-5 user-img" style="font-size: 11px; color: #042601; float: right; margin-bottom:10px;">
<a href="subjectcontroller.php?prc=D&id=<?=$r['id'];?>" onclick="return confirm('Delete Subject Record?')">
<button class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete Subject Record" style="float: right;font-size: 18px; padding: 0px 6px;"></button></a>

<a href="#" id="viewgs" data-id="<?=$r['id'];?>" onclick="return confirm('View Subject Record')">
<button class="btn btn-default btn-sm glyphicon glyphicon-search" title="View Subject Record" style="border: 1px solid #848484; background: #848484; color: #fff; float: right; margin-right: 5px;  font-size: 18px; padding: 0px 6px;"></button>
</a>

</div>
 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

</div>

 <?php } ?></div>
<div style="float: left; width: 100%; margin-bottom: 10px;">
	        <div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=subject_records&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
	        <div style="width:60%; float:left; font-size:11px;">
	          <?php
$sql = mysqli_query($con,"SELECT COUNT(*) AS crt FROM ft2_module_subjects ORDER BY subj ASC LIMIT $rowsPerPageRV");  
  
$row = mysqli_fetch_assoc($sql);
$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

//echo $rowsPerPageRV.' '.$totalPagesRV.' '.$currentPageRV;
if($currentPageRV > 1) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=subject_records&ppageRV='.($currentPageRV-1).'"></a>'; }

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
     echo '<a class="btn btn-default btn-sm" style="background:#FF976A; margin-left:2px; color:#fff; font-size:11px;" href="?page=subject_records&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
}
 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 
 
if($currentPageRV < $totalPagesRV) 
{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=subject_records&ppageRV='.($currentPageRV+1).'"></a>'; }
?>
            </div>
	        <div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=subject_records&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
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
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Subject Assignment Record
<!--
				<a class="waves-effect waves-dark" data-toggle="modal" data-target="#CSC" aria-expanded="false" style="float: right; font-size: 14px;">
                    <button class="btn btn-primary btn-sm" style="color: #fff; margin-top:-5px;">Create</button>
				</a>			 
-->
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Magtakda ng Asignatura</h6>
		  </div>
		<div class="card-block box" style="padding: 15px 20px;">
		<div style="background: #FFF;"> 
<form action="?page=subject_records&zgrd=<?=$zgrd?>&zsec=<?=$zsec?>&zfac=<?=$zfac?>&zsbj=<?=$zsbj?>" method="post" class="form-horizontal" id="fcsec" name="fcsec" style="margin:0px; padding:0px 12px;" role="form">

<div class="form-group">
   <div class="col-xs-12 col-md-5">Select Grade Level :</div>
   <div class="col-xs-12 col-md-7">
   <select class="form-control" name="zgrd" id="zgrd" onChange="this.form.submit();">
 <option value="">-- Select Grade Level --</option>
<?php 
$gsql = mysqli_query($con,"SELECT * FROM `ft2_grade_data` order by grd ASC");
  while($rg = mysqli_fetch_assoc($gsql))
   {   ?>        
      <option value="<?=$rg['id'];?>" <?=($zgrd == $rg['id'] ? 'selected' : '');?>><?=$rg['grd'];?></option> 
<?php } ?>      
  </select>
  </div>
</div>                                          
                     
<div class="form-group">
   <div class="col-xs-12 col-md-5">Select Section Name :</div>
   <div class="col-xs-12 col-md-7">
   <select class="form-control" name="zsec" id="zsec" onChange="this.form.submit();">
 <option value="">-- Select Section Name --</option>
<?php 
$ssql = mysqli_query($con,"SELECT * FROM `ft2_section_data` WHERE grd='$zgrd' order by sect ASC");
  while($rs = mysqli_fetch_assoc($ssql))
   {   ?>        
      <option value="<?=$rs['id'];?>" <?=($zsec == $rs['id'] ? 'selected' : '');?>><?=$rs['sect'];?></option> 
<?php } ?>      
  </select>
  </div>
</div>                                          
                     
<div class="form-group">
   <div class="col-xs-12 col-md-5">Select Subject Name :</div>
   <div class="col-xs-12 col-md-7">
   <select class="form-control" name="zsbj" id="zsbj" onChange="this.form.submit();">
 <option value="">-- Select Subject Name --</option>
<?php 
$jsql = mysqli_query($con,"SELECT * FROM `ft2_module_subjects` order by subj ASC");
  while($rj = mysqli_fetch_assoc($jsql))
   {   ?>        
      <option value="<?=$rj['id'];?>" <?=($zsbj == $rj['id'] ? 'selected' : '');?>><?=$rj['subj'];?></option> 
<?php } ?>      
  </select>
  </div>
</div>
                     
<div class="form-group">
   <div class="col-xs-12 col-md-12">Select Teacher Name :</div>
   <div class="col-xs-12 col-md-12">
   <select class="form-control" name="zfac" id="zfac" onChange="this.form.submit();">
 <option value="">-- Select Teacher Name --</option>
<?php 
$fsql = mysqli_query($con,"SELECT id, alyas FROM `ft2_users_account` WHERE typ='FACULTY' AND alyas IS NOT NULL order by alyas ASC");
  while($rf = mysqli_fetch_assoc($fsql))
   {   ?>        
      <option value="<?=$rf['id'];?>" <?=($zfac == $rf['id'] ? 'selected' : '');?>><?=$rf['alyas'];?></option> 
<?php } ?>      
  </select>
  </div>
</div>
</form>
         </div>  
 <button type="button" class="btn btn-success" id="sverec" name="sverec" style="font-size: 12px; float: right;" form="fcsec"/>Submit</button>         
		<div class="clearfix">  </div>                           
</div>
	</div>
</div>    
            </div>           
        </div>
    </div>
    <!-- user account info end -->
</div>
<!-- ######################################################################################## -->
<!-- ######################################## CREATE GRADE LEVEL RECORD ################################### -->
<div class="modal fade" id="CSJ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-header login-fm" style="color:#fff;">
       <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF; width: 100%; padding: 15px 10px; font-weight: 700;">Create Subject Record
       </h4>
      </div>   
     <div class="modal-body">       
<form action="subjectcontroller.php?prc=S" method="post" class="form-horizontal" id="frmcgrd" name="frmcgrd" style="margin:0px; padding:0px 12px;" role="form">
                      <div class="form-group">
                        <label for="username">New Subject Name :</label>
                        <input name="nsubj" type="text" class="form-control" id="nsubjd" maxlength="100" placeholder="Enter Subject Name" style="text-transform: uppercase;" required>
                      </div>
</form>
</div>
<div class="modal-footer col-xs-12 col-md-12 login-fm" style="margin-top:0px;  color:#fff;font-size: 12px;">
 <button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px;" form="frmcgrd"/>Submit</button>
  <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px;">Close</button>
</div>
    </div>
  </div>
</div>
<!-- ############################################################################################ -->

<script>
$(document).ready(function(){
var zgrd= document.getElementById("zgrd").value;
var zsec= document.getElementById("zsec").value;
var zsbj= document.getElementById("zsbj").value;
var zfac= document.getElementById("zfac").value;	
	
if((zgrd=='')||(zsec=='')||(zsbj=='')||(zfac=='')) { $('#sverec').prop('disabled',true); }	
else { $('#sverec').prop('disabled',false); }	
		
$(document).on("click","#viewgs",function() {
	var id=$(this).data('id');
	$('#content').empty();
	$("#content").load('viewgradesection.php?id='+id);
	$('.modwidth').css('width','35%');
	$('.modcap').empty();
	$(".modcap").append('Grade Level and Section Record');
	$('#POPMODAL').modal('show');
});	
	
$("#sverec").unbind().click(function() {
var values = $("#fcsec").serializeArray();

	$.ajax({
       data: values,
       type: "post",
       url: "subjectcontroller.php?prc=A",
	   cache: false,	
       success: function(data){
	       $('#zgrd').val('');
		   $('#zsec').val('');
		   $('#zfac').val('');
		   $('#zsbj').val('');
		   location.reload();
		   window.location.href = "?page=subject_records";
         	}
		});				
});			
	
});
</script>	