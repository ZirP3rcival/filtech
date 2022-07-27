<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
######################################
// username and password sent from form 
$username=$_POST['username'];
$password=$_POST['password'];

// encrypt password 
$epassword=MD5($password);
// AND mac='$wmac'
$result=mysqli_query($con,"SELECT * FROM tblsinfo_data WHERE usr ='$username' AND pwd='$epassword'");
$count=mysqli_num_rows($result);

if($count==0)
{
	$_SESSION['count'] +=1;  
	$_SESSION['errmsg'] ='Username or Password Verification Error!!! <br> No. of Attempts: '.$_SESSION['count'];
	
	if($_SESSION['count']>=5)
		{ 
		$_SESSION['errmsg'] ='Too many number of Login Attempts!!!<br><br> No. of Attempts: '.$_SESSION['count'];
		//$sql = mysqli_query($con,"UPDATE useraccount SET status='N' where username='$username'");	
		unset($_SESSION['count']);	
		header("location:index");	
		exit;
	}
	
	header("location:index");
	exit();
}
while($rs = mysqli_fetch_assoc($result))
{
if(($rs['usr']==$username) && ($rs['pwd']==$epassword)) 
{ $acct=$rs['typ'];     
	if($acct!='')
	{ 
		
	$id=$_SESSION['id'];	
	$_SESSION['usr']=$username;
	$_SESSION['pwd']=$password;
	$_SESSION['fname']=$rs['alyas']; 
	$_SESSION['id']=$rs['id'];  
	$_SESSION['errmsg'] = 'Account Login Successfully...';
		
		if($acct=='ADMIN'){
	$_SESSION['account'] = $acct;	
			header("location:admin"); }
		else if($acct=='FACULTY'){
			$_SESSION['account'] = $acct;	
			header("location:faculty"); }
		else if($acct=='STUDENT'){
			$_SESSION['account'] = $acct;	
			header("location:student"); }
		exit;
	} 

} 
	else
	{  $_SESSION['countx'] +=1;  
		$_SESSION['errmsg'] ='Access Account Not Valid...<br>Please Try Again!!! <br><br> No. of Attempts: '.$_SESSION['countx'];
		if($_SESSION['countx']>=5)
	{  
		$_SESSION['errmsg'] ='Access Account Not Valid...<br>Please Try Again!!! <br><br> No. of Attempts: '.$_SESSION['countx'];
		header("location:index");
		exit;
	} 
	header("location:index");
    exit;
	}
}
	
ob_flush();?>