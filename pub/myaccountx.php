<?php
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 

ob_start();
include ('connection.php');

$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$pgn = $parts[count($parts) - 1];

$prc=$_REQUEST['prc']; 
if($prc=='') { $prc='dash'; }

$mde=$_REQUEST['mde']; 

$fle=$_REQUEST['fle'];
 # My time zone
$timezone = "Asia/Manila";
# PHP 5
date_default_timezone_set($timezone);
$rdate = date("m-d-Y");  //mysql_real_escape_string($month." ". $day . ", ". $year); 
?>

<?php 
if($mde=='RPwd') { ?>
<script language="javascript">
$(document).ready(function() { 
    $("#RPwd").modal();
});</script>
<?php } ?>  
<?php 
if($mde=='RegA') { ?>
<script language="javascript">
$(document).ready(function() { 
    $("#RegA").modal();
});</script>
<?php } ?>  
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
				</div>
				<!-- logo -->
				<div class="navbar-brand">
					<a href="index"><img src="../assets/img/logo.png" alt="DiffDash Logo" class="img-responsive logo"></a>
				</div>
				<!-- end logo -->
				<div class="navbar-right">
					<!-- navbar menu -->
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
						<?php if($mde!='UPD') { ?>
							<li><a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="index" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-default" id="btnout"/>Logout</button></a></li>
						<?php } else { ?>
						    <li><a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="aindex" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-default" id="btnout"/>Cancel</button></a></li>
						<?php } ?>	
						</ul>
					</div>
					<!-- end navbar menu -->
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
<?php
$sql=mysqli_query($con,"SELECT * FROM ft2_active_year WHERE stat='Y'");
while($rs = mysqli_fetch_assoc($sql))
 {	$syr=$rs['syr']; }
?>	
		<!-- MAIN CONTENT -->
			<div class="container-fluid" style="margin-top:65px; ">
				<h1 class="sr-only">Dashboard</h1>
				<!-- WEBSITE ANALYTICS -->
				<div class="dashboard-section" style="margin-bottom: -30px;">
					<div class="section-heading clearfix bdrme">
						<h2 class="section-title"><i class="fa fa-user-circle"></i> Welcome Students S.Y. <?=$syr;?></h2>
						<a href="#" class="right" style="color: #fff;">Kagamitang Panturo para sa mga Mag-aaral ng Lungsod ng Pasig</a>
					</div>
					<div class="panel-content">
<?php
$sid=$_SESSION['uid'];
$ppwd = $_SESSION['pwd'];	
 $msql = mysqli_query($con,"SELECT * from ft2_users_account where id = '$sid'");

  while($rs = mysqli_fetch_assoc($msql))
   {  $sno=$rs['sno'];
	  $lnme=$rs['lnme'];
	  $fnme=$rs['fnme'];
	  $mnme=$rs['mnme'];
	$eadd=$rs['eadd'];
	$mno=$rs['cno'];
	
	$cno = substr($mno,0,4)."-".substr($mno,4,3)."-".substr($mno,7,4);

	$grd=$rs['grde'];
	$sec=$rs['sec'];
	$sqt=$rs['sqt'];
	$sqa=$rs['sqa'];
	
	$usr=$rs['usr'];
	//$pwd=$rs['pwd'];
	
	  $alyas=$rs['alyas'];
	  $actv=$rs['actv'];
      $ploc=$rs['ploc']; 
   
	$ftnme=$rs['ftnme'];
	$foccu=$rs['foccu'];
    $fcno=$rs['fcno'];
	$mtnme=$rs['mtnme'];
	$moccu=$rs['moccu'];
    $mcno=$rs['mcno'];
   }
?>					
<div class="row">
                    <!-- Column -->
<form action="updadmin?pgn=<?=$pgn;?>&did=<?=$sid;?>" method="post" style="width: 100%; margin-bottom:0px;" class="form-horizontal" enctype="multipart/form-data" role="form" id="frmUP"> 
 <!-- ============================================================== --> <!-- ============================================================== -->
 <div class="col-xs-12 col-md-4" style="float: left;">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-block card-top">
                                <h4 class="text-white card-title">User Login Information</h4>
                                <h6 class="card-subtitle text-white m-b-0 op-5">Please Accomplish the following</h6>
                            </div>
                            <div class="card-block">
                                <div class="message-box contact-box">

 <div class="row">          
<div class="col-xs-12 col-md-12" style="margin-top: 15px;">

<!--div class="col-xs-12 col-md-5"><span class="mf" style="float:left; margin-right:10px;">Student No. : </span></div>
<div class="col-xs-12 col-md-7" style="float: right;">
<input name="psno" type="text" class="form-control" id="psno" placeholder="Input Student Number" readonly required style="width:100%; float:left;" maxlength="30" onKeyPress="return maskKeyPress(event)" value="<=$sno;?>"></div-->
   <div class="clearfix"></div>
<script type="text/javascript">
function checkPEmail(str)
{
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(str))
    {
  var bb = bootbox.alert({ message: "Invalid Email Address Format<br>Please Enter A Valid Email Address!!!",title: "<span style='color:#fff;'>Notification :</span>",
       size: 'small'});
     bb.find('.modal-dialog').css({'border': '#E8E8E8 5px solid','border-radius':'4px'});
     bb.find('.modal-header').css({'background-color': '#822106','padding': '5px 10px','color': '#FFF','font-size': '20px'});
     bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'4px'});
     bb.find('.modal-footer').css({'background-color': '#822106','padding': '5px 10px'});
     bb.find(".btn-success").addClass("btnpri");
         
         document.getElementById("psuba").disabled = true;
       
     setTimeout(function() {
    // that's enough of that
       bootbox.hideAll();
       }, 5000);
            return false; 
    }
}
</script>

<div class="col-xs-12 col-md-12"><span class="mf" style="float:left; margin-right:10px;">Email Address : </span></div>
<div class="col-xs-12 col-md-12"><input type="text" maxlength="100" class="form-control" style="width:100%; float:left;" id="peadd" name="peadd" required placeholder="Input Email Address" value="<?=$eadd;?>" onblur="checkPEmail(this.value)"></div>
     <div class="clearfix"></div>
     
<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Security Question : </span></div>
<div class="col-xs-12 col-md-12">
<select name="pusqs" required class="form-control" id="pusqs" style="display: inline-block; position:inherit; width:100%;">
          <option value="What is the first name of your favorite uncle?" >What is the first name of your favorite uncle?</option>
          <option value="Where did you meet your spouse?" >Where did you meet your spouse?</option>
          <option value="What is your oldest cousin&#39;s name?" >What is your oldest cousin&#39;s name?</option>
          <option value="What is your youngest child&#39;s nickname?" >What is your youngest child&#39;s nickname?</option>
          <option value="What is your oldest child&#39;s nickname?" >What is your oldest child&#39;s nickname?</option>
          <option value="What is the first name of your oldest niece?" >What is the first name of your oldest niece?</option>
          <option value="What is the first name of your oldest nephew?" >What is the first name of your oldest nephew?</option>
          <option value="What is the first name of your favorite aunt?" >What is the first name of your favorite aunt?</option>
        </select>
</div>
	<div class="clearfix"></div>
<div class="col-xs-12 col-md-5" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Answer : </span></div>
<div class="col-xs-12 col-md-7" style="margin-top:10px; float: right;">
<input name="pusqa" type="text" required class="form-control" id="pusqa" placeholder="Question Answer" value="<?=$sqa;?>"/></div>
    <div class="clearfix"></div>
<!-- ################################################################################################-->
<script type="text/javascript">
$(document).ready(function() {
    var paswrd1       = $('#D_Password'); //id of first password field
    //var password2       = $('#password2'); //id of second password field
    var paswrdsInfo   = $('#Ppass-info'); //id of indicator element
	
    paswordStrngthChck(paswrd1, paswrdsInfo); //,password2,paswrdsInfo); //call password check function
    
});

function paswordStrngthChck(paswrd1, paswrdsInfo) //, password2, paswrdsInfo)
{
    //Must contain 8 characters or more
    var WeakPass = /(?=.{8,}).*/; 
    //Must contain lower case letters and at least one digit.
    var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/; 
    //Must contain at least one upper case letter, one lower case letter and one digit.
    var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/; 
    //Must contain at least one upper case letter, one lower case letter and one digit.
    var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/; 
    
    $(paswrd1).on('keyup', function(e) {
        if(VryStrongPass.test(paswrd1.val()))
        {
            paswrdsInfo.removeClass().addClass('vrystrongpass').html("<span style='color:#03017E;'>Very Strong! (Don't forget your password!)</span>");
			document.getElementById("psuba").disabled = false; 
        }   
        else if(StrongPass.test(paswrd1.val()))
        {
            paswrdsInfo.removeClass().addClass('strongpass').html("<span style='color:#1165BF; font-weight:bold;'>Strong! (Make it even more stronger</span>");
			document.getElementById("psuba").disabled = false; 
        }   
        else if(MediumPass.test(paswrd1.val()))
        {
            paswrdsInfo.removeClass().addClass('goodpass').html("<span style='color:#5E95FF; font-weight:bold;'>Good! (Use uppercase letter to make stronger)</span>");
			document.getElementById("psuba").disabled = false; 
        }
        else if(WeakPass.test(paswrd1.val()))
        {
            paswrdsInfo.removeClass().addClass('stillweakpass').html("<span style='color:#701A3F; font-weight:bold;'>Still Weak! (Enter digits to make good password)</span>");
			document.getElementById("psuba").disabled = false; 
        }
        else
        {
            paswrdsInfo.removeClass().addClass('weakpass').html("<span style='color:#D63939; font-weight:bold;'>Very Weak! (Must be 8 or more characters)</span>");
			document.getElementById("psuba").disabled = true;
        }
    });
}
</script>

<?php if($uid=='') { ?> 
<script type="text/javascript">
function chcknme()
{
 var name=document.getElementById( "Nw_Usrname" ).value;
 if(name)
 {
  $.ajax({
  type: 'post',
  url: 'checkme.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $('#nme_status').html(response);
   
    if (response==0)
        {
              document.getElementById("D_Password").disabled = false;		
	}
	if (response==1)
	{
              document.getElementById("D_Password").disabled = true;	
   	}
  
  }
  });
 }
 else
 {
  $('#nme_status').html("");
  return false;
 }
}
</script><?php } ?>
<div class="col-xs-12 col-md-5" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Username : </span></div>
<div class="col-xs-12 col-md-7" style="margin-top:10px; float: right;"><input type="text" required maxlength="25" class="form-control" style="width:100%; float:left;" id="Nw_Usrname" name="pusr" placeholder="Username" onkeyup="chcknme();return false;" onBlur="chcknme();return false;" value="<?=$usr;?>"/>
<div class="col-xs-12 col-md-12" id="nme_status" style="font-size:11px; word-wrap:normal; font-weight:bold; color:#0E04F7;"></div>

<input type="hidden" name="nme_status" id="nme_status_hidden" />
<script type="text/javascript">
setInterval(function () {
  document.getElementById("nme_status_hidden").value = document.getElementById("nme_status").innerHTML;
}, 5);
</script>

</div>

<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Password :<em style="font-size:9px;">&nbsp;(min. 8 characters)</em></span></div>
<div class="col-xs-12 col-md-12">
<input type="password" required maxlength="25" class="form-control" style="width:100%; float:left;" id="D_Password" name="ppwd" placeholder="Password" value="<?=$ppwd;?>"/>
	</div><div class="clearfix"></div><div class="col-xs-12 col-md-12" id="Ppass-info" style="padding-left: 20px; font-size:11px; word-wrap:normal;"></div>

<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Confirm Password :<em style="font-size:9px;">&nbsp;(min. 8 characters)</em></span></div>
<div class="col-xs-12 col-md-12">
<input type="password" required maxlength="25" class="form-control" style="width:100%; float:left;" id="Cn_Paswrd" name="ppwd" placeholder="Confirm Password" value="<?=$ppwd;?>"/>
</div>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("D_Password").value;
        var confirmPassword = document.getElementById("Cn_Paswrd").value;
        if (password != confirmPassword) {
       var bb = bootbox.alert({ message: "<?=$errmsg ?>",title: "<span style='color:#fff;'>Notification :</span>",
       size: 'small'});
	   bb.find('.modal-dialog').css({'border': '#E8E8E8 5px solid','border-radius':'4px'});
	   bb.find('.modal-header').css({'background-color': '#014A05','padding': '5px 10px','color': '#FFF','font-size': '20px'});
	   bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'4px'});
	   bb.find('.modal-footer').css({'background-color': '#014A05','padding': '5px 10px'}); 
	   bb.find(".btn-success").addClass("btnpri");
	   	   
		  document.getElementById("psuba").disabled = true;

	   setTimeout(function() {
    // that's enough of that
       bootbox.hideAll();
       }, 5000);
            return false;
        }
        return true;
    }
</script>
</div>
</div>                                 
<div class="card-block card-bottom" style="margin:0px; margin-top:15px; margin-bottom: 35px;">&nbsp;</div>                                                                      
                                    </div>
                                </div>
                            </div>
 </div>
 <!-- ============================================================== --> <!-- ============================================================== -->
<div class="col-xs-12 col-md-4" style="float: left;">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-block card-top">
                                <h4 class="text-white card-title">Personal Information Form</h4>
                                <h6 class="card-subtitle text-white m-b-0 op-5">Please Accomplish the following</h6>
                            </div>
                            <div class="card-block">
                                <div class="message-box contact-box">
<div class="row">

<div class="col-xs-12 col-md-12" style="margin-top: 15px;">

<div class="col-xs-12 col-md-12"><span class="mf" style="float:left; margin-right:10px;">Lastname : </span></div>
<div class="col-xs-12 col-md-12" style="float: right;">
<input name="pulnme" type="text" class="form-control" id="pulnme" placeholder="Input Lastname" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?=$lnme;?>"></div>
	<div class="clearfix"></div>
	
<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Firstname : </span></div>
<div class="col-xs-12 col-md-12" style="float: right;">
<input name="pufnme" type="text" class="form-control" id="pufnme" placeholder="Input Firstname" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?=$fnme;?>"></div>
	<div class="clearfix"></div>
	
<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Middlename : </span></div>
<div class="col-xs-12 col-md-12" style="float: right;">
<input name="pumnme" type="text" class="form-control" id="pumnme" placeholder="Input Middlename" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?=$mnme;?>"></div>
	<div class="clearfix"></div>
<script type="text/javascript">
 
// function that allows enter numbers only, each key in keyboard has special key code. We can restrict input using these key codes:
$(function () {
 
// "textNo" is the ID of input box
$('#pucno').keydown(function (e) {
 
// Shift, control and alternate keys do not effect input
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
 
// except 0-9, other characters do not effect input box || (key == 109) || (key == 189)
if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)|| (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});
});
	
$(function () {
 
// "textNo" is the ID of input box
$('#fcno').keydown(function (e) {
 
// Shift, control and alternate keys do not effect input
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
 
// except 0-9, other characters do not effect input box || (key == 109) || (key == 189)
if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)|| (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});
});	
	
$(function () {
 
// "textNo" is the ID of input box
$('#mcno').keydown(function (e) {
 
// Shift, control and alternate keys do not effect input
if (e.shiftKey || e.ctrlKey || e.altKey) {
e.preventDefault();
} else {
var key = e.keyCode;
 
// except 0-9, other characters do not effect input box || (key == 109) || (key == 189)
if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)|| (key >= 96 && key <= 105))) {
e.preventDefault();
}
}
});
});
	
function masking(input,textbox,e) {
 
// adds hyphen after 3 and then after 6 characters
if (input.length == 4 || input.length == 8) {
if(e.keyCode != 8){
input = input + '-';
}
textbox.value = input;
}
}	
</script>
<script type="text/javascript">
function cnolength(input,textbox,e) {
if (input.length < 13) {
	var bb = bootbox.alert({ message: "Contact Number Length Invalid!!!",title: "<span style='color:#fff;'>Notification :</span>",
       size: 'small'});
	   bb.find('.modal-title').css({'float': 'left','margin-top':'10px'});
	   bb.find('.close').css({'display': 'none'});
	   //bb.find('.modal-dialog').css({'border': '#E8E8E8 5px solid','border-radius':'4px'});
	   bb.find('.modal-header').css({'background-color': '#3C763D','padding': '5px 10px','color': '#FFF','font-size': '20px','height':'60px'});
	   bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'4px'});
	   bb.find('.modal-footer').css({'background-color': '#3C763D','padding': '10px'}); 
	   bb.find(".btn-success").addClass("btnpri"); 
	
     setTimeout(function() {
    // that's enough of that
       bootbox.hideAll();
       }, 5000);
            
	textbox.value = '';
	 return false;
}	
}
</script>
<div class="col-xs-12 col-md-5" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Contact No. : </span></div>
<div class="col-xs-12 col-md-7" style="float: right;margin-top:10px;">
<input name="pucno" type="text" class="form-control" id="pucno" placeholder="0000-000-0000" required style="width:100%; float:left;" maxlength="13" onBlur="return cnolength(this.value,this,event)" onKeyPress="return masking(this.value,this,event);" value="<?=$cno;?>"></div>
	<div class="clearfix"></div>

<!--div class="col-xs-12 col-md-5" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Grade : </span></div>
<div class="col-xs-12 col-md-7" style="margin-top:10px; float: right;">	
<select name="pugrd" required class="form-control" id="pugrd" style="display: inline-block; position:inherit; width:100%;">
          <option value="" >- Pumili ng Antas -</option>
<php
$dsql = mysqli_query($con,"SELECT * from ft2_grade_data ORDER BY grd ASC");
	
  while($rg = mysqli_fetch_assoc($dsql))
   { if($grd==$rg['id']) {	?>    
    <option value="<=$rg['id'];?>" selected><=$rg['grd'];?></option> 
<php } else { ?>          
    <option value="<=$rg['id'];?>" ><=$rg['grd'];?></option>
<php } } ?>  
        </select></div>
	<div class="clearfix"></div>
	
<div class="col-xs-12 col-md-5" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Section : </span></div>
<div class="col-xs-12 col-md-7" style="margin-top:10px; float: right;">
<select name="pusec" required class="form-control" id="pusec" style="display: inline-block; position:inherit; width:100%;">
          <option value="" >- Pumili ng Seksyon-</option>
<php if($sec!='') { ?> 
          <option value="<=$sec;?>" selected ><=$sec;?></option> 
<php } ?>          
        </select></div>
	<div class="clearfix"></div-->
	

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("D_Password").value;
        var confirmPassword = document.getElementById("C_Password").value;
        if (password != confirmPassword) {
	   
		var bb = bootbox.alert({ message: "<?=$errmsg ?>",title: "<span style='color:#fff;'>Notification :</span>",
       size: 'small'});
	   bb.find('.modal-title').css({'float': 'left','margin-top':'10px'});
	   bb.find('.close').css({'display': 'none'});
	   //bb.find('.modal-dialog').css({'border': '#E8E8E8 5px solid','border-radius':'4px'});
	   bb.find('.modal-header').css({'background-color': '#3C763D','padding': '5px 10px','color': '#FFF','font-size': '20px','height':'60px'});
	   bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'4px'});
	   bb.find('.modal-footer').css({'background-color': '#3C763D','padding': '10px'}); 
	   bb.find(".btn-success").addClass("btnpri"); 	
			
		  document.getElementById("psuba").disabled = true;

	   setTimeout(function() {
    // that's enough of that
       bootbox.hideAll();
       }, 5000);
            return false;
        }
        return true;
    }
</script>
</div>
</div>
<div class="card-block card-bottom" style="margin:0px; margin-top:15px;">&nbsp;</div>                                   
                                    </div>
                                </div>
                            </div>
 </div>
 <!-- ============================================================== --> <!-- ============================================================== -->                   
<div class="col-xs-12 col-md-4" style="float: right; margin-bottom: 35px;">
                        <!-- Column -->
                        <div class="card">
                            <div class="card-block card-top">
                                <h4 class="text-white card-title">Profile Picture Uploader</h4>
                                <h6 class="card-subtitle text-white m-b-0 op-5">Please Accomplish the following</h6>
                            </div>
                            <div class="card-block">
                                <div class="message-box contact-box"><h5>Current Profle Picture : </h5>
<div class="row">
<div class="col-xs-12 col-md-12" style="display:table-cell; vertical-align:middle; text-align:center">
<img src="../assets/img/<?=$ploc;?>" style="width:40%; border-left:1px solid #fff; border-top:1px solid #fff; border-right:2px solid #000; border-bottom:2px solid #000;"  />
</div>

<div class="form-group" style="padding:35px 10px 10px 10px; margin: 0px;">
<input type="text" class="form-control" id="picr" name="picr" value="<?=$ploc;?>">
<label class="col-xs-12 col-md-12" style="padding-left: 0px; float: left; color:#000;">Browse New User Photo : </label> 
	<div class="clearfix"></div>
<div style="float: left;" class="col-xs-12 col-md-12">
    <!--img id="img" src="#" alt="your image" /-->
    <label for="files" class="btn btn-info mdi mdi-camera" style="font-size: 16px;"> <span style="font-size: 14px;">&nbsp;&nbsp;Browse Photo</span></label>
    <input style="visibility: hidden; position: absolute;" id="files" class="form-control" type="file" name="files"  accept="image/*" capture="camera">
</div>
<!--?php if($did=='') { ?-->
<div class="clearfix"></div>
<div class="col-xs-12 col-md-12" style="display:table-cell; vertical-align:middle; text-align:center">   
    <img id="img" src="#" alt="your image"/> 
</div>
<!--?php } elseif($did!='') { ?>
<div style="float: right; margin-left: 0px;" class="col-xs-12 col-md-8">   
    <img id="vimg" src="../../img/<=$ploc;?>" alt="your image" style="Width:180px;"/> 
</div>
<php } ?-->
</div>
<script type="text/javascript">
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
			$('#mbg').show();
			$('#lbl').show();
            $('#img').show().attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#files").change(function(){
    readURL(this);
});
</script>


</div>
   
<div class="card-block card-bottom" style="margin:0px; margin-top:-10px;">
	<button type="submit" class="btn btn-success" id="unwsuba" form="frmUP" onclick="return Validate()" style="float: right;"/>Update</button>
									<div class="clearfix"></div>
</div>                                                                  
                                    </div>
                                </div>
                            </div>
 </div>                                   
  <!-- ============================================================== --> <!-- ============================================================== --> 
</form>                                                           
                    
                    </div>
										
				</div>
				<!-- END WEBSITE ANALYTICS -->
			</div>
				<!-- END WEBSITE ANALYTICS -->
			</div>
		
		<!-- END MAIN CONTENT -->
		<div class="clearfix"></div>
		<footer>
			<p class="copyright">&copy; <script>document.write(new Date().getFullYear())</script>&nbsp;&nbsp;<a href="#" target="_self">FILTECH WEB APPS</a>&nbsp;&nbsp;All Rights Reserved.&nbsp;&nbsp;</p>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../assets/vendor/jquery/bootbox.min.js"></script>
	<script src="../assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js"></script>
	<script src="../assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
	<script src="../assets/vendor/toastr/toastr.js"></script>
	<script src="../assets/scripts/common.js"></script>
	
<?php if($prc=='dash') { ?>	
	<script>		// notification popup
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr.options.showDuration = 1000;
		toastr['info']('Welcome to FILTECH Web Apps.'); //success; info; warning; error
	</script>
<?php } ?>	
<?php
$errmsg = $_REQUEST['errmsg'];
//if(isset($_SESSION['errors']['error5301']) && $_SESSION['errors']['error5301'] == 1){ 
  if($errmsg!=""){ ?>
<script type="text/javascript">
   var bb = bootbox.alert({ message: "<?=$errmsg ?>",title: "<span style='color:#fff;'>Notification :</span>",
       size: 'small'});
	   bb.find('.modal-title').css({'float': 'left','margin-top':'10px'});
	   bb.find('.close').css({'display': 'none'});
	   //bb.find('.modal-dialog').css({'border': '#E8E8E8 5px solid','border-radius':'4px'});
	   bb.find('.modal-header').css({'background-color': '#3C763D','padding': '5px 10px','color': '#FFF','font-size': '20px','height':'60px'});
	   bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'4px'});
	   bb.find('.modal-footer').css({'background-color': '#3C763D','padding': '10px'}); 
	   bb.find(".btn-success").addClass("btnpri");
	   	   
		   
	   setTimeout(function() {
    // that's enough of that
       bootbox.hideAll();
       }, 50000);
</script>
<?php } 

if(isset($_SESSION['errors'])){
    unset($_SESSION['errors']);
} ?>
<?php ob_flush(); ?>