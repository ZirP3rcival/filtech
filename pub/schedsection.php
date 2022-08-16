<?php
include "connection.php";
$departid = $_POST['depart'];  
$sql = "SELECT grd,sect FROM ft2_section_data WHERE stat='N' and grd=".$departid;
$result = mysqli_query($con,$sql);
$users_arr = array();
while( $row = mysqli_fetch_array($result) ){
    $name = $row['sect'];
    $users_arr[] = array("sect" => $name);
}

echo json_encode($users_arr);