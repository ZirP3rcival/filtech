<?php 
include ('connection.php');

session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0;

$id=$_REQUEST['id'];
$sqlay="SELECT * FROM `ft2_module_records` WHERE id='$id'"; 
$sqler = $con->query($sqlay);	
while($r = mysqli_fetch_assoc($sqler)) {
	$title = $r['title'];
	$flink = $r['flink'];
} 

?>     
<form action="lessonscontroller.php?prc=U&id=<?=$id?>" method="post" class="form-horizontal" id="frmuml" name="frmuml" style="margin:0px; padding:0px 12px;" role="form">
                      <div class="form-group">
                        <label for="username">Lesson Title :</label>
                        <input name="title" type="text" class="form-control" id="title" maxlength="100" required value="<?=$title?>">
                      </div>
                      <div class="form-group">
                        <label for="username">Lesson Link :</label>
                        <textarea name="flink" type="text" class="form-control" id="flink" rows="5"  required><?=$flink?></textarea>
                      </div>                      
</form>
