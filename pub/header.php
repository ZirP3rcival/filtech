<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FILTECH | Kagamitang Panturo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo/favicon.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="../css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="../css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="../css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/newstyles.css">
    <link rel="stylesheet" href="../css/slidercarousel.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- jquery
		============================================ -->
        <script src="../js/vendor/jquery-1.11.3.min.js"></script>    
    <!-- modernizr JS
		============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
<style>
	.usrinfo { color: #000; }
</style>
</head>
<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$id=$_SESSION['id'];
//Select Active School Year
$sqlay="SELECT * FROM ft2_active_year WHERE stat='Y'"; 
$sqler = $con->query($sqlay);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['year']=$r['syr']; $syr=$r['syr'];
}
//Select and count Faculty Account
$sqlaf="SELECT COUNT(id) AS fctr, typ, actv FROM `ft2_users_account` WHERE typ='FACULTY'"; 
$sqler = $con->query($sqlaf);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['fctr']=$r['fctr'];
	$uctr=$r['fctr'];
}
//Count Active Faculty Account
$sqlfc="SELECT COUNT(id) AS fctr, typ, actv FROM `ft2_users_account` WHERE typ='FACULTY' AND actv='Y'"; 
$sqler = $con->query($sqlfc);	
while($r = mysqli_fetch_assoc($sqler)) {
	$fctr=$r['fctr'];
	$_SESSION['factv']=number_format(($fctr/$uctr)*100,2);
}
//Select and count Student Account
$sqlas="SELECT COUNT(id) AS sctr, typ, actv FROM `ft2_users_account` WHERE typ='STUDENT'"; 
$sqler = $con->query($sqlas);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['sctr']=$r['sctr'];
	$uctr=$r['sctr'];
}
//Select and count Active Student Account
$sqlsc="SELECT COUNT(id) AS sctr, typ, actv FROM `ft2_users_account` WHERE typ='STUDENT' AND actv='Y'"; 
$sqler = $con->query($sqlsc);	
while($r = mysqli_fetch_assoc($sqler)) {
	$sctr=$r['sctr'];
	$_SESSION['sactv']=number_format(($sctr/$uctr)*100,2);
}
//Select and Count  Uploaded Lessons
$sqlmd="SELECT COUNT(id) AS lctr FROM ft2_module_records"; 
$sqler = $con->query($sqlmd);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['lctr']=$r['lctr'];
	$lctr=$r['lctr'];
}
//Select and Count  Uploaded Lessons
$sqlmd="SELECT COUNT(id) AS alctr, syr FROM `ft2_module_records` WHERE syr='$syr'"; 
$sqler = $con->query($sqlmd);	
while($r = mysqli_fetch_assoc($sqler)) {
	$alctr=$r['alctr'];
	$_SESSION['alctr']=number_format(($lctr/$alctr)*100,2);
}
//Select and Count All Account
$sqlmd="SELECT COUNT(id) AS uctr, actv FROM ft2_users_account WHERE actv='Y'"; 
$sqler = $con->query($sqlmd);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['uctr']=$r['uctr'];
	$lctr=$r['uctr'];
}
//Select and Count Account Reset Request
$sqlmd="SELECT COUNT(id) AS auctr, actv, login FROM ft2_users_account WHERE actv='Y' and login='Y'"; 
$sqler = $con->query($sqlmd);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['auctr']=$r['auctr'];
}

$sqlay="SELECT id, eadd, sqt, sqa, usr, lnme, mnme, fnme, cno, ploc, grde, sec FROM ft2_users_account WHERE id='$id'"; 
$sqler = $con->query($sqlay);	
while($r = mysqli_fetch_assoc($sqler)) {
	$photo='data:image/png;base64,'.''.$r['ploc'];
	$ploc = $r['ploc'];
	$eadd = $r['eadd'];
	$sqt = $r['sqt'];
	$sqa = $r['sqa'];
	$usr = $r['usr'];
	$pwd = $_SESSION['pwd'];
	$lnme = $r['lnme'];
	$mnme = $r['mnme'];
	$fnme = $r['fnme'];
	$cno= $r['cno'];
	
	$grde = $r['grde'];
	$sec= $r['sec'];
}
?>
<script>
$(document).ready(function(){	
     var autoLogoutTimer;
        resetTimer();
        $(document).on('mouseover mousedown touchstart click keydown mousewheel DDMouseScroll wheel scroll',document,function(e){
            // console.log(e.type); // Uncomment this line to check which event is occured
            resetTimer();
        });
        // resetTimer is used to reset logout (redirect to logout) time 
        function resetTimer(){ 
            clearTimeout(autoLogoutTimer)
            autoLogoutTimer = setTimeout(idleLogout,(20*60000)); // 1000 = 1 second
        } 
        // idleLogout is used to Actual navigate to logout
        function idleLogout(){
            window.location.href = 'logout.php'; // Here goes to your logout url 
        }	
});		
</script>	