<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
@$a = $xyz / 0; // no error 
$prc=$_REQUEST['prc'];

if ($prc=='A') {		
$T0 = $_REQUEST['id'];	
$T1 = $_REQUEST['set'];	
	
$sql="UPDATE ft2_users_account SET actv='$T1' WHERE id='$T0'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Setting User Account Status!!!'; 
    header("location:admin?page=user_account");
    exit;
  }
 else  
   { $_SESSION['errmsg']='User Account Status Set Successfully!!!'; 
     header("location:admin?page=user_account");
     exit;
  }  
}

if ($prc=='D') {		
$T0 = $_REQUEST['id'];	
	
$sql="DELETE FROM ft2_users_account WHERE id='$T0'";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Deleting User Account !!!'; 
    header("location:admin?page=user_account");
    exit;
  }
 else  
   { $_SESSION['errmsg']='User Account Deleted Successfully!!!'; 
     header("location:admin?page=user_account");
     exit;
  }  
}

if ($prc=='S') {		
$T4 = mysqli_real_escape_string($con,$_POST['aeadd']);
$T6 = mysqli_real_escape_string($con,$_POST['ausr']);
$T7 = mysqli_real_escape_string($con,$_POST['apwd']);
$T8 = mysqli_real_escape_string($con,$_POST['atyp']);	
  
$sql="INSERT INTO ft2_users_account(eadd,usr,pwd,actv,typ) VALUES ('$T4','$T6',MD5('$T7'),'Y','$T8')";  
 if (!mysqli_query($con,$sql))
  { $_SESSION['errmsg']='Error Saving New User Account!<br>Please Re-type All Entries Properly....'; 
    header("location:admin?page=user_account");
    exit;
  }
 else  
   { $_SESSION['errmsg']='New User Account Submitted Successfully!<br>Please advise user to login and finish profiling'; 
     header("location:admin?page=user_account");
     exit;
  }  
}

?>