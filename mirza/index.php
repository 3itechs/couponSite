<?php session_start();
include "includes/DB.php";
$db= new DB(); 
if(!isset($_COOKIE['admin_username'])){ header("location: login.php"); exit;}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
<meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Control Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=DOMAINVAR?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=DOMAINVAR?>/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=DOMAINVAR?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?=DOMAINVAR?>/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?=DOMAINVAR?>/css/style.css" rel="stylesheet">
    <link href="<?=DOMAINVAR?>/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="index.php" class="logo">Promostrends<span>Panel</span></a>
            <!--logo end-->
            <?php // include "includes/notificationpanel.php"; ?>
           <?php include "includes/userpanel.php"; ?>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <?php include "includes/mainleft.php"; ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  <?php $sql_subs = "select id from subscribers where 1 ";
		                               $res_subs = $db->ExecuteQuery($sql_subs);		 
		                                echo number_format($db->GetSelectedRows($res_subs)); ?>
                              </h1>
                              <p>Subscribers</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                 <?php $sql_coupon = "select coupon_id from coupons where 1 ";
		                               $res_coupon = $db->ExecuteQuery($sql_coupon);		 
		                                echo number_format($db->GetSelectedRows($res_subs)); ?>
                              </h1>
                              <p>Total Coupons</p>
                          </div>
                      </section>
                  </div>
                    <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                                  <?php $sql_stores = "select store_id from stores where 1 ";
		                               $res_store = $db->ExecuteQuery($sql_stores);		 
		                                echo number_format($db->GetSelectedRows($res_store)); ?>
                              </h1>
                              <p>Total Stores</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-8">
                      <!--custom chart start-->
                      <div class="border-head">
                          <h3>Traffic Graph</h3>
                      </div>
                      <?php  $year = date('Y'); $month = date('m');
					      $sql_total_click = "select coupon_id from couponsclick where 1 ";
		                               $res_total_click = $db->ExecuteQuery($sql_total_click);		 
		                               $total_click = $db->GetSelectedRows($sql_total_click); 
									   ?>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span><?php echo $total_click;?></span></li>
                              <li><span><?php echo $total_click* 0.80 ;?></span></li>
                              <li><span><?php echo $total_click* 0.60 ;?></span></li>
                              <li><span><?php echo $total_click* 0.40 ;?></span></li>
                              <li><span><?php echo $total_click* 0.20 ;?></span></li>
                              <li><span>0</span></li>
                              
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <?php  $janbar = $db->getmonthTraffic('01'); ?>
                              <div class="value tooltips" data-original-title="<?=round($janbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$janbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <?php  $febbar = $db->getmonthTraffic('02'); ?>
                              <div class="value tooltips" data-original-title="<?=round($febbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$febbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <?php  $marbar = $db->getmonthTraffic('03'); ?>
                              <div class="value tooltips" data-original-title="<?=round($marbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$marbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <?php  $aprbar = $db->getmonthTraffic('04'); ?>
                              <div class="value tooltips" data-original-title="<?=round($aprbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$aprbar?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <?php  $maybar = $db->getmonthTraffic('05'); ?>
                              <div class="value tooltips" data-original-title="<?=round($maybar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$maybar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                               <?php  $junbar = $db->getmonthTraffic('06'); ?>
                              <div class="value tooltips" data-original-title="<?=round($junbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$junbar?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                               <?php  $julbar = $db->getmonthTraffic('07'); ?>
                              <div class="value tooltips" data-original-title="<?=round($julbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$julbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">AUG</div>
                              <?php  $augbar = $db->getmonthTraffic('08'); ?>
                              <div class="value tooltips" data-original-title="<?=round($augbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$augbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">SEP</div>
                             <?php  $sepbar = $db->getmonthTraffic('09'); ?>
                              <div class="value tooltips" data-original-title="<?=round($sepbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$sepbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">OCT</div>
                                <?php  $octbar = $db->getmonthTraffic('10'); ?>
                              <div class="value tooltips" data-original-title="<?=round($octbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$octbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">NOV</div>
                               <?php  $novbar = $db->getmonthTraffic('11'); ?>
                              <div class="value tooltips" data-original-title="<?=round($novbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$novbar?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">DEC</div>
                              <?php $decbar = $db->getmonthTraffic('12'); ?>
                              <div class="value tooltips" data-original-title="<?=round($decbar,1)?>%" data-toggle="tooltip" data-placement="top"><?=$decbar?>%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
                  </div>
                  <div class="col-lg-4">
                      <!--new earning start-->
                      <div class="panel terques-chart"> </div>
                      <!--new earning end-->

                      <!--total earning start-->                      <!--total earning end-->
                  </div>
              </div>


          </section>
      </section>
      <!--main content end-->
       <?php include "includes/footer.php"; ?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
<script src="<?=DOMAINVAR?>/js/jquery-1.8.3.min.js"></script>
<script src="<?=DOMAINVAR?>/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?=DOMAINVAR?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=DOMAINVAR?>/js/jquery.scrollTo.min.js"></script>
<script src="<?=DOMAINVAR?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=DOMAINVAR?>/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=DOMAINVAR?>/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?=DOMAINVAR?>/js/respond.min.js" ></script>
<!--common script for all pages-->
<script src="<?=DOMAINVAR?>/js/common-scripts.js"></script>
  <!--script for this page only-->
  <script src="<?=DOMAINVAR?>/js/editable-table.js"></script>
  <!-- END JAVASCRIPTS -->
  <script type="text/javascript">
	  jQuery(document).ready(function() {
		  EditableTable.init();
	  });
  </script>


  </body>
</html>
