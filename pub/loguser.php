<?php
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
?>
<div class="sidebar-header">
    <a href="#"><img src="../img/message/1.jpg" alt="" />
    </a>
    <h3><?=$_SESSION['fname']?></h3>
    <p><?=$_SESSION['account']?></p>
    <strong><img src="../img/message/1.jpg" style="display: block; margin: 0px; width: 100%;"></strong>
</div>
