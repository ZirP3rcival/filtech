<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$page = $_REQUEST['page'];
if($page=='') { $page='login'; }
$wp = $page.'.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include_once('landingheader.php');?>  
<body>	
<div class="bodybg">
    <!-- Header top area start-->
	<div class="content-inner-all">
		<div class="header-top-area">
			<div class="fixed-header-top">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 login-fm">
							<div class="admin-logo">
								<a href="#"><img src="../img/logo/banner_ft_large.png" alt="" />
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>     
		</div>    
	</div>       
    <div class="wrapper-pro contentbg">
        <!-- Header top area start-->
        <div class="content-inner-all">
            <!-- login Start-->
            <div class="login-form-area mg-t-40 mg-b-40">
                <div class="container-fluid" id="dv-1" style="display: flex; align-items: stretch; justify-content: center;">
                        <div class="col-lg-7 col-xs-12 div1 sparkline9-graph mg-t-60" style="height: 460px;">
							<?php include_once('dashboardx.php');?> 	  	
                        </div>
                        <div class="col-lg-4 col-xs-12 div2">
							<?php include_once($wp);?> 
                        </div>
                </div>
            </div>
            <!-- login End-->    
        </div>
    </div>
</div>    
<?php include_once('landingfooter.php');?>  
</body>
</html>
<!-- ################################################################################# --> 
<?php
  $errmsg = $_SESSION['errmsg'];
    if($errmsg!=""){ ?>
  <script type="text/javascript">
    var bb = bootbox.alert({ message: "<?php echo $errmsg ?>",title: "<span style='color:#FF878B;'>Notification :</span>",
        size: 'medium'});
      bb.find('.modal-dialog').css({'width': '35%'});
	  bb.find('.modal-title').css({'float': 'left','margin-top':'10px'});
      bb.find('.close').css({'display': 'none'});
      bb.find('.modal-header').css({'background-color': '#fff','padding': '5px 10px','color': '#FFF','font-size': '20px','height':'60px'});
      bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'15px'});
      bb.find('.modal-footer').css({'background-color': '#fff','padding': '10px'}); 
      bb.find(".btn-success").addClass("btnpri");
          
      <?php unset($_SESSION['errmsg']); ?>	   
      setTimeout(function() {
        bootbox.hideAll();
        }, 50000);
  </script>
  <?php } 

  if(isset($_SESSION['errmsg'])){
      unset($_SESSION['errmsg']);
} ?>
<?php ob_flush(); ?>