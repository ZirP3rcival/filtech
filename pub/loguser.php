<?php
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
?>
<div class="sidebar-header">
    <a href="#"><img src="<?=$photo?>" alt="" onerror="this.src='../img/missing.png'" />
    </a>
    <h3><?=$_SESSION['fname']?></h3>
    <p><?=$_SESSION['account']?></p>
    <strong><img src="<?=$photo?>" style="display: block; margin: 0px; width: 100%;" onerror="this.src='../img/missing.png'"></strong>
</div>
