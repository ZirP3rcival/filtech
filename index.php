<?php
ob_start();
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
    header( "Location:./pub/index");
?>