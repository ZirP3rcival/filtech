<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$syr=$_SESSION['year'];
$sid=$_SESSION['id'];

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
$lsql = mysqli_query($con,"SELECT * FROM ft2_faculty_assessment WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND asid='$fsbj'"); 
while($rf = mysqli_fetch_assoc($lsql)) { $lmit = $rf['itm']; }
	
$ssql = mysqli_query($con,"SELECT * FROM ft2_asmt_data_mc WHERE sid='$sid' AND ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND asid='$fsbj'"); 
  while($rz = mysqli_fetch_assoc($ssql))
   { $aok = $rz['itm']; }	

if($aok<=0) {
	$fsql = mysqli_query($con,"SELECT * FROM ft2_asmt_multiplechoice WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' ORDER BY RAND() LIMIT $lmit"); 
	  while($r = mysqli_fetch_assoc($fsql))
	   { 
		   $aky=$r['qky'];
		   $qno=$r['id'];
		   
	       $sqlx = mysqli_query($con, "INSERT INTO ft2_asmt_data_mc(sid, qno, ans, aky, rslt, ascode, syr, fid, grde, asid) VALUES('$sid', '$qno', '', '$aky', '0', '$fcod', '$syr', '$fid', '$fgrd', '$fsbj)");
	   }
}
	//think of solution to display assessment	
	$i=0;
	$fsql = mysqli_query($con,"SELECT * FROM ft2_asmt_multiplechoice WHERE ascode = '$fcod' AND fid='$fid' AND grde='$fgrd' AND syr='$syr' AND asid='$fsbj' ORDER BY RAND() LIMIT $lmit"); 

  while($res = mysqli_fetch_assoc($fsql))
   { $i++;
?>
<div class="col-xs-12 col-md-12" style="float: left; margin: 20px 5px 10px 5px; text-align: justify; font-size: 13px; color: #010C3E; line-height: 25px;"><em><strong><?=$i?>. <?=$res['qst'];?></strong></em></div><br /><br />
 <div class="col-xs-12 col-md-12" style="margin-left: 25px;">
	  <input type="radio" class="pcat" value="A">&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>A. </strong><?=$res['qa1'];?></span><br/>
	  <input type="radio" class="pcat" value="B">&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>B. </strong><?=$res['qa2'];?></span><br/>
	  <input type="radio" class="pcat" value="C">&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>C. </strong><?=$res['qa3'];?></span><br/>
	  <input type="radio" class="pcat" value="D">&nbsp;&nbsp;
		<span style="font-size: 12px; color: #000; margin-top: 6px;"><strong>D. </strong><?=$res['qa4'];?></span><br/>
 </div>
 <input type="hidden" id="ans" name="ans" value="" required> 
<?php  }?>
</div>
   
 <input class="btn btn-info" type="submit" value="Submit Answers" style="float:right;margin-bottom: 15px;"/>
    </div>  
<div class="clearfix">  </div>                           
</div>