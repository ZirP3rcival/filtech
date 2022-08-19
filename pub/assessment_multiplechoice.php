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
$fsql = mysqli_query($con,"SELECT * FROM ft2_asmt_multiplechoice WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' LIMIT 10"); 
  while($res = mysqli_fetch_assoc($fsql))
   { 
?>
<form action="multi-proc?pgn=<?php echo $pgn;?>&prc=asses&mprc=saveans&xgo=OK&did=<?php echo $rtf;?>&pPagePM=<?php echo ($currentPagePM+1)?>&ascd=<?php echo $ascd?>" method="post">
<div class="col-xs-12 col-md-12" style="float: left; margin: 20px 5px 10px 5px; text-align: justify; font-size: 13px; color: #203702; line-height: 25px;"><em><strong><?php echo ($currentPagePM);?>. <?php echo $res['qst'];?></strong></em></div><br /><br />
 <div class="col-xs-12 col-md-12" style="margin-left: 25px;">
  <input type="radio" name="pcat" value="A" onclick="modify_value('A')" required/>&nbsp;&nbsp;<span style="font-size: 11px; color: #203702; margin-top: 6px;"><strong>A. </strong><?php echo $res['qa1'];?></span><br /><br />
  <input type="radio" name="pcat" value="B" onclick="modify_value('B')"/>&nbsp;&nbsp;<span style="font-size: 11px; color: #203702; margin-top: 6px;"><strong>B. </strong><?php echo $res['qa2'];?></span><br /><br />
  <input type="radio" name="pcat" value="C" onclick="modify_value('C')"/>&nbsp;&nbsp;<span style="font-size: 11px; color: #203702; margin-top: 6px;"><strong>C. </strong><?php echo $res['qa3'];?></span><br /><br />
  <input type="radio" name="pcat" value="D" onclick="modify_value('D')"/>&nbsp;&nbsp;<span style="font-size: 11px; color: #203702; margin-top: 6px;"><strong>D. </strong><?php echo $res['qa4'];?></span><br /><br />
	</div>
 <input type="hidden" id="ans" name="ans" value="" required> 
</form>
<?php  }?>
</div>
   
 <input class="btn btn-info" type="submit" value="submit" style="float:right;margin-bottom: 15px;"/>
    </div>  
<div class="clearfix">  </div>                           
</div>