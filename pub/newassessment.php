<?php
$fgrd=$_POST['tfgrd'];
$ascd=$_POST['tascd'];	
$noi=$_POST['noi'];		

if($fgrd=='') { $fgrd=$_REQUEST['fgrd']; }
if($fsec=='') { $fsec=$_REQUEST['fsec']; }
if($ascd=='') { $ascd=$_REQUEST['ascd']; }
			
//echo $fgrd.'/'.$sid.'/'.$tsrch.'/'.$noi;		
?>  
 <div class="row">
<form method="post" action="<?php echo $pgn;?>?prc=assset&mde=ASST" id="frmasst" name="frmasst"> 
<div class="col-xs-12 col-md-12" style="margin-bottom: 10px;">
 <div class="col-xs-12 col-md-4" style="margin-top:0px;"><span class="mf" style="float:left; margin-right:10px;">Select Type : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right;">
<select name="tascd" required class="form-control" id="tascd" style="display: inline-block; position:inherit; width:100%;" onChange="this.form.submit();" form="frmasst">
          <option value="" >- Select -</option>      
<?php 
  $lsql = mysqli_query($con,"SELECT id, ascode,scdsc FROM tblassess_set WHERE ascode NOT IN (SELECT ascode FROM tblfaculty_asses WHERE fid = '$sid') ORDER BY id ASC");
	
  while($rl = mysqli_fetch_assoc($lsql))
   { if($ascd==$rl['ascode']) { $scdsc = $rl['scdsc']; ?>   
    <option value="<?php echo $rl['ascode'];?>" selected><?php echo $rl['scdsc'];?></option> 
<?php } else { ?>  
    <option value="<?php echo $rl['ascode'];?>" ><?php echo $rl['scdsc'];?></option>  
<?php } 
   }
?>                
</select>        
        </div><div class="clearfix"></div>   
  </div>
  
 <div class="col-xs-12 col-md-12" style="margin-bottom: 10px;">
 <div class="col-xs-12 col-md-4" style="margin-top:0px;"><span class="mf" style="float:left; margin-right:10px;">Bilang / Dami : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px; float: right;">
 <input name="noi" type="text" class="form-control" id="noi" placeholder="00" maxlength="2" onkeypress="return maskKeyPress(event)" value="<?php echo $noi;?>" required>
	</div><div class="clearfix"></div>  
</div>

<div class="col-xs-12 col-md-12" style="margin-bottom: 10px;">
    <div class="col-xs-12 col-md-4" style="margin-top:0px;"><span class="mf" style="float:left; margin-right:10px;">Pumili ng Antas : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px;float: right;">	
<select name="tfgrd" required class="form-control" id="tfgrd" style="display: inline-block; position:inherit; width:100%;" form="frmasst" onChange="this.form.submit();">
          <option value="" >- Pumili -</option>
<?php
$dsql = mysqli_query($con,"SELECT DISTINCT(grde), tblgrade_data.* FROM tblfaculty_sched 
INNER JOIN tblgrade_data ON tblfaculty_sched.grde = tblgrade_data.id
WHERE tblfaculty_sched.fid = '$sid' AND tblfaculty_sched.syr = '$syr' ORDER BY tblgrade_data.grd ASC");
	
  while($rg = mysqli_fetch_assoc($dsql))
   { if($fgrd==$rg['id']) {  ?>   
    <option value="<?php echo $rg['id'];?>" selected><?php echo $rg['grd'];?></option> 
<?php } else { ?>  
    <option value="<?php echo $rg['id'];?>" ><?php echo $rg['grd'];?></option>
<?php } 
   } ?>  
        </select></div>
	<div class="clearfix"></div>
  </div>  		
  		 		 		
</form> 	
		
<form id="frmAType" name="frmAType" action="multi-proc?mprc=assset&pgn=<?php echo $pgn;?>&fid=<?php echo $sid;?>&fgrd=<?php echo $fgrd;?>&noi=<?php echo $noi;?>&ascd=<?php echo $ascd;?>" method="post" class="form-horizontal" role="form">  
<div class="col-xs-12 col-md-12" style="margin-bottom: 10px;">
<div class="col-xs-12 col-md-4" style="margin-top:0px;"><span class="mf" style="float:left; margin-right:10px;">Seksyon : </span></div>
<div class="col-xs-12 col-md-8" style="margin-top:0px;float: right;">	
	<input type="text" required maxlength="500" class="form-control" style="width:100%; float:left;" id="tsearch" name="tsearch" placeholder="Type Section Name" value="<?php echo $tsrch;?>">
    </div> 
<input type="hidden" required maxlength="500" class="form-control" style="width:100%; float:left;" id="scdsc" name="scdsc" value="<?php echo $scdsc;?>">    
<div class="clearfix"></div>  
 </div>                   

</form>            
                                      
</div>