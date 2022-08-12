<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fgrd=$_POST['fgrd'];

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
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
<div class="col-lg-4 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-list" style="margin-right: 15px; font-size: 2em;"></span>Lesson Creation Module</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Modyul sa Paggawa ng Aralin</h6>
		  </div>	  
<div class="card-block box" style="padding: 10px;">
<div style="background: #FFF;"> 
 <form method="post" action="?page=lessons_module" id="frmslst" name="frmslst"> </form>	
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
    <div class="col-xs-12 col-md-4" style="margin-top:0px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right;">	
<select name="fgrd" required class="form-control" id="fgrd" style="display: inline-block; position:inherit; width:100%;" form="frmslst" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
          <option value="" >- Select -</option>
<?php	
$dsql = mysqli_query($con,"SELECT DISTINCT(grde), tblgrade_data.* FROM tblfaculty_sched 
INNER JOIN tblgrade_data ON tblfaculty_sched.grde = tblgrade_data.id
WHERE tblfaculty_sched.fid = '$fid' AND tblfaculty_sched.syr = '$syr' ORDER BY tblgrade_data.grd ASC");

  while($rg = mysqli_fetch_assoc($dsql))
   {  ?>   
    <option value="<?=$rg['id'];?>" <?=($fgrd == $rg['id'] ? 'selected' : '');?>><?=$rg['grd'];?></option> 
<?php  } ?>  
        </select></div>
	<div class="clearfix"></div>
  </div>
  <div class="col-xs-12 col-md-12" style="margin-bottom: 10px; padding: 0px;">
  <button class="btn btn-info btn-block" data-toggle="modal" data-target="#CLM" > Create New Lesson </button>
  </div>
 </div>  
<div class="clearfix">  </div>                           
</div>
	</div>
</div>  

<div class="col-lg-8 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-book" style="margin-right: 15px; font-size: 2em;"></span>Lessons Record List			 
			 </h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Listahan ng mga Aralin</h6>
		  </div>
  
<div class="card-block">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;"><div class="row">
<div class="col-xs-2 col-md-12" style="padding-bottom: 0px; padding-right: 0px;">Title</div>
<div class="clearfix"></div>
</div.
></li>
<?php 
if($fgrd!='')	{
$dsql = mysqli_query($con,"SELECT * from tblmodule_data WHERE grde = '$fgrd' AND syr = '$syr' AND fid='$fid' ORDER BY title ASC");
  while($rx = mysqli_fetch_assoc($dsql))
   { $sphoto='data:image/png;base64,'.''.$rx['ploc'];
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;"><div class="row">
<div class="col-xs-10 col-md-9" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['title'];?></div>
 <a href="lessoncontroller?id=<?=$rx['id'];?>&prc=D" class="trash" style="margin-right:10px;" title="Delete this Record" onclick="return confirm('Delete this Record?')"><button class="btn btn-danger glyphicon glyphicon-trash" title="Delete this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
  
 <button class="btn btn-warning glyphicon glyphicon-edit" id="editls" data-id="<?=$rx['id'];?>" title="Update this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
 
 <button class="btn btn-primary glyphicon glyphicon-search" id="viewls" data-id="<?=$rx['id'];?>" title="View this Record" style="float: right; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button>
 <div class="clearfix"></div></div></li>

 <?php }} ?></div>   
</div> 
</div> 
	</div>
</div>    
            </div>           
        </div>
    </div>
    <!-- user account info end -->
</div>
<!-- ######################################## CREATE GRADE LEVEL RECORD ################################### -->
<div class="modal fade" id="CLM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header login-fm" style="color:#fff;">
       <h4 class="modal-title" id="myModalLabel" style="color: #FFFFFF; width: 100%; padding: 0px; font-weight: 700;">Create Lesson Record
       </h4>
      </div>   
     <div class="modal-body">       
<form action="gradesectioncontroller.php?prc=G" method="post" class="form-horizontal" id="frmcgrd" name="frmcgrd" style="margin:0px; padding:0px 12px;" role="form">
                      <div class="form-group">
                        <label for="username">Lesson Title :</label>
                        <input name="title" type="text" class="form-control" id="title" maxlength="100" required>
                      </div>
                      <div class="form-group">
                        <label for="username">Lesson Link :</label>
                        <textarea name="flink" type="text" class="form-control" id="flink" rows="5"  required></textarea>
                      </div>                      
</form>
</div>
<div class="modal-footer col-xs-12 col-md-12 login-fm" style="margin-top:0px;  color:#fff;font-size: 12px; padding: 10px 15px;">
 <button type="button" class="btn btn-info" id="editor" name="editor" style="font-size: 12px;" form="frmcgrd"/>Create Lesson</button>
 <button type="submit" class="btn btn-success" id="submit" name="submit" style="font-size: 12px;" form="frmcgrd"/>Submit</button>
 <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px;">Close</button>
</div>
    </div>
  </div>
</div>
<!-- ############################################################################################ -->
<!-- ############################################################################################ -->
<script>
$(document).ready(function(){

$(document).on("click","#viewls",function() {
	var id=$(this).data('id');
	$('#content').empty();
	$("#content").load('viewlesson.php?id='+id);
	$('.modwidth').css('width','54%');
	$('.modcap').empty();
	$(".modcap").append('Lesson Preview');
	$('#POPMODAL').modal('show');
});	
	
$(document).on("click","#editor",function() {
	 window.open('https://docs.google.com/presentation/u/0/','_blank');
});		
	
});
</script>	