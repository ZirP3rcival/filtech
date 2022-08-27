<?php
session_start(); 
error_reporting (E_ALL ^ E_NOTICE); 
$title=str_replace('_',' ',$page);
?>
<!-- Header top area start-->
<div class="content-inner-all">
    <!-- Header top area start-->
    <div class="header-top-area">
        <div class="fixed-header-top login-fm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1 col-md-6 col-sm-6 col-xs-8 mob-left">
<!--
                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                            <i class="fa fa-bars"></i>
                        </button>
-->
                        <div class="admin-logo logo-wrap-pro">
                            <a href="#"><img src="../img/logo/banner_ft.png" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1">
                        <div class="header-top-menu tabl-d-n">
                        <a href="#"><img src="../img/logo/banner_ft_large.png" style="margin-left: -50px;"></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-3 pdrt" style="float: right;">
                        <div class="header-right-info">
                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                <li class="nav-item">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                        <span class="fa fa-user header-riht-inf"></span>
                                        <span class="admin-name"><?=$_SESSION['fname']?></span>
                                        <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span> <!--adminpro-icon adminpro-down-arrow-->
                                    </a>
                                    <div class="dropdown-header-top author-log dropdown-menu animated flipInX login-fm">
                                    <ul role="menu" >
                                        <li><a href="?page=my_account"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>My Account</a>
                                        </li>
                                        <li><a href="logout"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                                        </li>
                                    </ul>
                                   </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top area end-->
    <!-- Breadcome start-->
    <div class="breadcome-area mg-b-30 small-dn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="breadcome-heading">
                                <h2 class="form-control login-fm"><i class="fa fa-slideshare"></i> Welcome Students A.Y. <strong><?=$_SESSION['year']?></strong></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="breadcome-menu">
                                    <li><a href="?page=dashboard">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod"><?=ucwords($title)?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcome End-->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area mobile-btn login-fm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <?php include('menulist_a.php');?> 
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
</div>
<!-- Header top area end-->
