<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$uid=$_SESSION['id'];

 $sitm = $_POST['sitem'];
 if($sitm=='') {  $sitm = $_REQUESTST['sitem']; }	
?>
<style>
.form-control  {
    color: #0B0237;
	font-weight: 600;
	}
.chat-icon-link {  
	font-size: 17px; 
	float: left; 
	padding: 5px 7px; 
	background: #FF69C7; 
	margin-top: 1px; 
	margin-right: 8px; 
	border-color: #FF69C7;
	}		
</style>
<div class="content-inner-all">
    <!-- user account info start -->
    <div class="income-order-visit-user-area m-bottom ">
        <div class="container-fluid">           
            <div class="row rowflx" style="margin-bottom: 50px;">
<div class="col-lg-6 col-xs-12 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-users" style="margin-right: 15px; font-size: 2em;"></span>User Account Record</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Talaan ng mga Gumagamit</h6>
		  </div>	  
			<div class="card-block box" style="padding: 10px;">                           
				<div style="background: #FFF;"> 
				<div class="col-xs-12 col-md-12" style="margin-top: 10px;">
				<form id="msearch" action="?page=user_account&prc=fsch" method="post" class="form-horizontal" style="margin-bottom: 15px;">
				   <div class="input-group">
					 <input name="sitem" type="text" class="form-control isearch" placeholder="Search Name Here" value="<?=$sitm;?>">
					  <span class="input-group-btn">
						   <button class="btn btn-default" type="submit" style="background: #0A65D1; color:#fff;padding-left: 10px;padding-right: 10px;">
								<i class="fa fa-search" style="font-size:14px;"></i>
						   </button>
					  </span>
				  </div>
				</form>
				</div>
				<div class="clearfix">  </div>
				<div class="list-group" style="margin-bottom: 5px;">
				<?php 
				$nid = $_REQUEST['nid'];

				$rowsPerPageRV = 5;
				// Get the search variable from URL
				$currentPageRV = ((isset($_GET['ppageRV']) && $_GET['ppageRV'] > 0) ? (int)$_GET['ppageRV'] : 1);
				$offsetRV = ($currentPageRV-1)*$rowsPerPageRV;
				$cp=$currentPageRV;

				if($sitm!='') {	
				$dsql = mysqli_query($con,"SELECT * from tblsinfo_data where typ='FACULTY' and alyas LIKE '%$sitm%' ORDER BY alyas ASC LIMIT $offsetRV, $rowsPerPageRV"); }
				else  {	
				$dsql = mysqli_query($con,"SELECT * from tblsinfo_data where typ='FACULTY' ORDER BY alyas ASC LIMIT $offsetRV, $rowsPerPageRV"); }	

				  while($r = mysqli_fetch_assoc($dsql))
				   { $usrpic='data:image/png;base64,'.''.$r['ploc'];
					 if($r['actv']=='Y') { $actv='Active Account'; $clr='#0A65D1'; $stat='N'; }
					 else { $actv='Inactive Account'; $clr='#D9534F'; $stat='Y'; }
					
					if($r['alyas']!='') {
					?>            		                       
				<div class="dvhvr" style="padding: 5px 0px; margin: 0px;">
				<div class="col-xs-3 col-md-2" style="padding-bottom: 0px;">
				 <img src="<?=$usrpic?>" style="width: 60%;" onerror="this.src='../img/missing.png'">
				 </div>
				<div class="col-xs-9 col-md-7" style="padding-bottom: 0px;">
				 <span style="color: #021926; padding: 4px 10px 4px 0px; font-size: 12px; font-weight: 700;"><?=strtoupper($r['alyas'])?></span><br>
				 <span style="color: #021926; padding: 4px 10px 4px 0px; font-size: 11px; "><?=$r['typ'];?></span> | 
				 <span style="color: <?=$clr;?>; padding: 4px 10px 4px 0px; font-size: 11px; "><?=$actv;?></span>
				 </div>
				<div class="col-xs-12 col-md-3 user-img" style="font-size: 11px; color: #042601; float: right; margin-bottom:10px; padding: 5px;">
                  <a href="#" id="cbox" data-toggle="collapse" data-target="#chat" data-uid="<?=$uid?>" data-cnm="<?=$r['alyas']?>">
                   <button class="btn btn-info fa big-icon fa-comments chat-icon-link"></button></a>
				<?php if($r['actv']=='N') { ?>
					<a href="useraccountcontroller.php?prc=D&id=<?=$r['id']?>">
						<button class="btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete this Account" style="float: right; font-size: 18px; padding: 0px 6px;"></button>
					</a>
				<?php } ?>
				<?php if($r['actv']=='N')  { ?>
					<a href="useraccountcontroller.php?prc=A&id=<?=$r['id'];?>&set=<?=$stat?>" onclick="return confirm('Activate  User Account?')">
						<button class="btn btn-info btn-sm glyphicon glyphicon-ok" title="Activate User Account" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
				<?php } else if($r['actv']=='Y')  { ?>
					<a href="useraccountcontroller.php?prc=A&id=<?=$r['id'];?>&set=<?=$stat?>" onclick="return confirm('De-Activate  User Account?')">
						<button class="btn btn-success btn-sm glyphicon glyphicon-remove" title="De-Activate  User Account" style="float: left; margin-right: 5px; font-size: 18px; padding: 0px 6px;"></button></a>
				<?php } ?>
				</div>
				 <div class="clearfix" style="border-bottom:1px #3E3A3A solid; margin-top: 15px;"></div>

				</div>

				 <?php } } ?></div>
				<div style="float: left; width: 100%; margin-bottom: 10px;">
							<div style="float: left; margin-right: 10px;"><a class="btn btn-default btn-sm" style="margin-left:2px; font-weight:bold; color:#000; font-size:11px; background:#EFEFEF;" href="?page=user_account&prc=<?=$prc;?>&ppageRV=<?=($currentPageRV-1)?>"> prev </a></div>
							<div style="width:60%; float:left; font-size:11px;">
							  <?php
				$sql = mysqli_query($con,"SELECT COUNT(*) AS crt from tblsinfo_data where typ='FACULTY' LIMIT $rowsPerPageRV");  

				$row = mysqli_fetch_assoc($sql);
				$totalPagesRV = ceil($row['crt'] / $rowsPerPageRV);

				if($currentPageRV > 1) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=user_account&ppageRV='.($currentPageRV-1).'"></a>'; }

				if($totalPagesRV < $rowsPerPageRV) { $d=$totalPagesRV; }
				else { $d=$currentPageRV + $rowsPerPageRV; }

				if($d > $totalPagesRV) { $d=$totalPagesRV; }
				else { $d=$totalPagesRV; }

				//echo $d.' '.$totalPagesRV;
				for ($x=1;$x<=$d;$x++)
				{  if ($cp==$x) 
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#FF6AC4; margin-left:2px; font-size:11px; color:#FFF;"><strong>'.$x.'</strong></a>'; 
				   }
				  else
				   { 
					 echo '<a class="btn btn-default btn-sm" style="background:#162831; margin-left:2px; color:#fff; font-size:11px;" href="?page=user_account&ppageRV='.$x.'"><strong>'.$x.'</strong></a>';    }
				}
				 echo '<span style="margin-left:2px; color:#666; font-size:12px;"> .... <strong>'. $totalPagesRV .'</strong> pages</span>'; 

				if($currentPageRV < $totalPagesRV) 
				{ echo '<a style="margin-left:2px; font-size:11px;" href="?page=user_account&ppageRV='.($currentPageRV+1).'"></a>'; }
				?>
							</div>
							<div style="float: right; margin-right: 5px;"><a class="btn btn-default btn-sm" style="font-size:11px; margin-left:2px; font-weight:bold; color:#000; background:#EFEFEF;" href="?page=user_account&ppageRV=<?=($currentPageRV+1);?>"> next </a></div>
				<div class="clearfix"></div>	        
						  </div>
				</div>  
			<div class="clearfix">  </div>                           
			</div>
	</div>
</div>  
<div class="col-lg-6 col-xs-12 my-acct-box mg-tb-31" style="padding-bottom: 15px;">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-save" style="margin-right: 15px; font-size: 2em;"></span>Create User Account</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Gumawa ng Bagong Akawnt</h6>
		  </div>
<div class="card-block box" style="padding: 10px 10px 20px 10px;">
	<form action="useraccountcontroller.php?prc=S" method="post" style="margin-bottom:0px;" class="form-horizontal" role="form" id="frmUACT" >
	<div class="row">

	<div class="col-xs-12 col-md-12">
	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Email Address : </span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><input type="text" maxlength="100" class="form-control" style="width:100%; float:left;" id="aeadd" name="aeadd" required placeholder="Input Email Address" value="" onblur="checkEmail(this.value)"></div>
	<!-- ################################################################################################-->
	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Username : </span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><input type="text" required maxlength="25" class="form-control" style="width:100%; float:left;" id="ausr" name="ausr" placeholder="Username" />
	</div><div class="clearfix"></div>

	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Password :<em style="font-size:9px;">&nbsp;(min. 8 characters)</em></span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;">
	<input type="password" required maxlength="25" class="form-control" style="width:100%; float:left;" id="apwd" name="apwd" placeholder="Password"/>
		</div><div class="clearfix"></div>

	<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Account Type :</span></div>
	<div class="col-xs-12 col-md-12" style="margin-top:10px;">
	<select name="atyp" required class="form-control" id="atyp">
			  <option value="ADMIN" >ADMIN</option>
			  <option value="FACULTY" >FACULTY</option>
	</select>
		</div><div class="clearfix"></div>

	</div>
	</div>
	 </form>                                                   
</div>
<div class="card-block card-bottom" style="text-align: center;">
  <button type="submit" class="btn btn-success" style="font-size: 14px; margin: auto;" form="frmUACT"> Submit </button>  
  <div class="clearfix">  </div> 
</div>
	</div>
</div>  
            </div>           
        </div>
    </div>
    <!-- user account info end -->
</div>
