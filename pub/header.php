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

$sqlay="SELECT * FROM tblsyr_data WHERE stat='Y'"; 
$sqler = $con->query($sqlay);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['year']=$r['syr'];
}

$sqlaf="SELECT COUNT(id) AS fctr, typ, actv FROM `tblsinfo_data` WHERE typ='FACULTY'"; 
$sqler = $con->query($sqlaf);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['fctr']=$r['fctr'];
	$uctr=$r['fctr'];
}

$sqlfc="SELECT COUNT(id) AS fctr, typ, actv FROM `tblsinfo_data` WHERE typ='FACULTY' AND actv='Y'"; 
$sqler = $con->query($sqlfc);	
while($r = mysqli_fetch_assoc($sqler)) {
	$fctr=$r['fctr'];
	$_SESSION['factv']=($fctr/$uctr)*100;
}

$sqlas="SELECT COUNT(id) AS sctr, typ, actv FROM `tblsinfo_data` WHERE typ='STUDENT'"; 
$sqler = $con->query($sqlas);	
while($r = mysqli_fetch_assoc($sqler)) {
	$_SESSION['sctr']=$r['sctr'];
	$uctr=$r['sctr'];
}

$sqlsc="SELECT COUNT(id) AS sctr, typ, actv FROM `tblsinfo_data` WHERE typ='STUDENT' AND actv='Y'"; 
$sqler = $con->query($sqlsc);	
while($r = mysqli_fetch_assoc($sqler)) {
	$sctr=$r['sctr'];
	$_SESSION['sactv']=($sctr/$uctr)*100;
}
?>
