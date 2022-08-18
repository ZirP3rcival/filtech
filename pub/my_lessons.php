<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$fgrd=$_POST['fgrd'];

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];
$grd=$_SESSION['grde'];  	
$sec=$_SESSION['sec'];  

$fsbj=$_POST['fsbj'];
if($fsbj=='') { $fsbj=$_REQUEST['fsbj']; }
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
<div class="col-lg-12 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
<div class="col-xs-12 col-md-6" style="padding: 0px; float: left;">		  
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-book" style="margin-right: 15px; font-size: 2em;"></span>Lessons Record List			 			 
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Listahan ng mga Aralin</h6>
</div>			 
<div class="col-xs-12 col-md-6" style="padding: 0px; float: right;">
<form method="post" action="?page=my_lessons" id="frmleks" name="frmleks"> </form> 
 <div class="col-xs-12 col-md-3" style="margin-top:0px; padding: 0px;"><span class="mf" style="float:left; margin-right:10px; font-size: 14px;">Select Subject : </span></div>
		<div class="col-xs-12 col-md-9" style="margin-top:0px; float: right; padding: 0px;">
			<select name="fsbj" required class="form-control" id="fsbj" style="display: inline-block; position:inherit; width:100%;" form="frmleks" onChange="this.form.submit();" title="Pumili ng isa sa talaan">
					  <option value="" >- Select -</option>
			<?php	
			$dsql = mysqli_query($con,"SELECT ft2_faculty_schedule.*, ft2_module_subjects.id AS sjid, ft2_module_subjects.subj FROM ft2_faculty_schedule 
			INNER JOIN ft2_module_subjects ON ft2_module_subjects.id = ft2_faculty_schedule.sjid
			WHERE ft2_faculty_schedule.grde='$grd' AND ft2_faculty_schedule.sec='$sec' AND ft2_faculty_schedule.syr='$syr' GROUP BY ft2_module_subjects.subj
			ORDER BY ft2_faculty_schedule.sjid ASC");
			  while($rg = mysqli_fetch_assoc($dsql))
			   {  ?>   
				<option value="<?=$rg['sjid'];?>" <?=($fsbj == $rg['sjid'] ? 'selected' : '');?>><?=$rg['subj'];?></option> 
			<?php  } ?>  
			</select>      
        </div>        
</div>	
	  <div class="clearfix"></div>   		 
		  </div>
  
<div class="card-block">
<div class="list-group" style="margin-bottom: 5px;">
<li class="list-group-item" style="font-weight: 600; font-size: 12px;"><div class="row">
<div class="col-xs-2 col-md-3" style="padding-bottom: 0px; padding-right: 0px;">Teacher</div>
<div class="col-xs-2 col-md-9" style="padding-bottom: 0px; padding-right: 0px;">Title</div>
<div class="clearfix"></div>
</div></li>
<?php 
if($grd!='')	{
$dsql = mysqli_query($con,"SELECT ft2_module_records.*, ft2_users_account.id, ft2_users_account.alyas FROM ft2_module_records 
INNER JOIN ft2_users_account ON ft2_users_account.id=ft2_module_records.fid
WHERE ft2_module_records.grde='$grd' AND ft2_module_records.syr='$syr' AND ft2_module_records.asid='$fsbj' ORDER BY ft2_module_records.title ASC");

  while($rx = mysqli_fetch_assoc($dsql))
   { 
    ?>                                   
<li class="list-group-item" style="padding: 2px 15px; font-size: 12px;"><div class="row">
<div class="col-xs-10 col-md-3" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['alyas'];?></div>
<div class="col-xs-10 col-md-6" style="padding-bottom: 0px; padding-right: 0px;"><?=$rx['title'];?></div>
  
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
	$('.modwidth').css('width','80%');
	$('.modcap').empty();
	$(".modcap").append('Lesson Preview');
	$('#POPMODAL').modal('show');
});	
	
$(document).on("click","#editor",function() {
	 window.open('https://docs.google.com/presentation/u/0/','_blank');
});		
	
});
</script>	