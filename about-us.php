<?php  include "includes/DB.php"; $metas = $db->getPageMetas(4); ?>
<!doctype html>
<html class="no-js" lang="">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About PromosTrends</title>
    <meta name="description" content="PromosTrends is the best Promos providing company that brings exclusive and latest Coupon codes from different brands, Learn more about us and Our Partners">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo DOMAIN;?>/assets/images/favicon.png">
    <link rel="stylesheet" href="<?php echo DOMAIN;?>/assets/css/about.css">
    <?php include("includes/styles.php");
          include("includes/analytics.php");?>
    <script src="<?php echo DOMAIN;?>/assets/js/modernizr.js"></script>
 </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php include("includes/header.php");?>
      <?php include("about/about.php");?>
	




	<?php include("includes/footer.php");?>
    <?php include("includes/jscript.php");?>
 
  </body>
</html>