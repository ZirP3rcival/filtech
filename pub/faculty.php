<?php
ob_start();
include ('connection.php');
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 

$id=$_SESSION['id'];
if ($id=='')
{
 $_SESSION['errmsg'] ="Please Login to Gain Access!!!!";
 header("location:index.php");
}

$page = $_REQUEST['page'];
if($page=='') { $page='dashboard'; }
$wp = $page.'.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include_once('header.php');?>  
<body class="materialdesign">
    <div class="wrapper-pro">
    <!-- partial:partials/_navbar.html -->
        <?php include_once('sidebar_a.php');?>  
        <?php include_once('topbar.php');?> 
        <?php include_once($wp);?> 
    <!-- partial -->
    </div>
    <!-- Footer Start-->
<?php include_once('footer.php');?>  
    <!-- Footer End-->
    <!-- Chat Box Start-->
<?php include_once('chatbox.php');?> 
    <!-- Chat Box End-->
</body>
</html>
<!-- ############################################################################################ -->
<!-- for modal display -->
<div id="POPMODAL" class="modal fade">
  <div class="modal-dialog modwidth">
    <div class="modal-content">
      <div class="modal-header login-fm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modcap" style="color: #fff;"></h4>
      </div>
      <div class="modal-body" id="content" style="padding-top: 0px;">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ############################################################################################ -->
<!-- ################################################################################# --> 
<?php
  $errmsg = $_SESSION['errmsg'];
    if($errmsg!=""){ ?>
  <script type="text/javascript">
    var bb = bootbox.alert({ message: "<?=$errmsg ?>",title: "<span style='color:#FF878B;'>Notification :</span>",
        size: 'medium'});
      //bb.find('.modal-dialog').css({'width': '35%'});
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