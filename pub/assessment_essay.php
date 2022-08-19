<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$syr=$_SESSION['year'];
$fid=$_SESSION['id'];

$fid=$_REQUEST['fid'];
$fsbj=$_REQUEST['fsbj'];
$fgrd=$_REQUEST['fgrd'];
$fsyr=$_REQUEST['fsyr'];
$fcod=$_REQUEST['fcod'];
?>

<div class="card-block box" style="padding: 10px;">
	<div style="background: #FFF;"> 
<div class="col-md-12 col-xs-12" style="padding:0px 15px; border-right : 1px solid #ddd; box-shadow : 5px 0px 5px 1px #eaeaea;">
<?php
$fsql = mysqli_query($con,"SELECT * FROM ft2_asmt_essay WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT 10"); 
  while($res = mysqli_fetch_assoc($fsql))
   { 
?>
<form action="multi-proc?pgn=<?php echo $pgn;?>&prc=asses&mprc=saveans&xgo=OK&did=<?php echo $rtf;?>&pPagePM=<?php echo ($currentPagePM+1)?>&ascd=<?php echo $ascd?>" method="post">
<div class="col-xs-12 col-md-12" style="float: left; margin: 20px 5px 10px 5px; text-align: justify; font-size: 13px; color: #203702; line-height: 25px;"><em><strong><?php echo ($currentPagePM);?>. <?php echo $res['qst'];?></strong></em></div><br /><br />
 <div class="col-xs-12 col-md-12" style="margin-left: 25px;">
  <textarea name="pcat" value="" rows="10" style="width: 100%" /></textarea>
 </div>
 <input type="hidden" id="ans" name="ans" value="" required> 
</form>
<?php  }?>
</div>
   
 <input class="btn btn-info" type="submit" value="submit" style="float:right;margin-bottom: 15px;"/>
    </div>  
<div class="clearfix">  </div>                           
</div>