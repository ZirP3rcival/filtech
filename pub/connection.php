<?php
$mysqlserver = "localhost";
$mysqlusername = "root";
$mysqlpassword = "";
$mysqldatabasename = "ftwadb";

$con = mysqli_connect($mysqlserver,$mysqlusername,$mysqlpassword) or die("Error Connecting to Database");
mysqli_select_db($con,$mysqldatabasename) or die("Cannot Connect to Database");
?>  

