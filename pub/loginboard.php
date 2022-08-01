<style>
.income-dashone-pro {
    padding: 10px;
}	
</style>	
<div class="content-inner-all">
    <!-- income order visit user Start -->
    <div class="col-lg-3 col-xs-12 income-order-visit-user-area" style="padding: 0px;">
        <div class="container-fluid">
            <div class="row" style="display: flex; flex-direction: column; flex-wrap: nowrap; align-items: flex-start;">
                <div class="col-lg-12 col-xs-12" style="padding: 0px;">
                    <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Faculty</h2>
                                <div class="main-income-phara">
<!--                                    <p>Monthly</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span></span><span class="counter"><?=$_SESSION['fctr']?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline1"></span>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Active Accounts</p>
                                <span class="income-percentange"><?=$_SESSION['factv']?>% <i class="fa fa-users"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12" style="padding: 0px;">
                    <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Students</h2>
                                <div class="main-income-phara order-cl">
<!--                                    <p>Annual</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?=$_SESSION['sctr']?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline6"></span>
                                </div>
                            </div>
                            <div class="income-range order-cl">
                                <p>Active Accounts</p>
                                <span class="income-percentange"><?=$_SESSION['sactv']?>% <i class="fa fa-users"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xs-12" style="padding: 0px;">
                    <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2>Lessons</h2>
                                <div class="main-income-phara visitor-cl">
<!--                                    <p>Today</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?=$_SESSION['lctr']?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline2"></span>
                                </div>
                            </div>
                            <div class="income-range visitor-cl">
                                <p>Active Lessons</p>
                                <span class="income-percentange"><?=$_SESSION['alctr']?>% <i class="fa fa-book"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- income order visit user End -->   
    <div class="col-lg-9 col-xs-12 feed-mesage-project-area mg-t-41" style="padding-right: 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xs-12" style="padding: 0px;">
							<?php include_once('slider.php');?> 
                         <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
