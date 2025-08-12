<?php  include "includes/DB.php"; $metas = $db->getPageMetas(1); ?>
<!doctype html>
<html class="no-js" lang="">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Promostrends - 404</title>
    <meta name="description" content="" >
    <meta name="keywords" content="" >
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo DOMAIN;?>/assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->

   <?php include("includes/styles.php");?>

    <script src="<?php echo DOMAIN;?>/assets/js/modernizr.js"></script>
 </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php include("includes/header.php");?>
    <section class="four-zero d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 col-sm-6 ">
                    <img src="<?php echo DOMAIN;?>/assets/images/404-fun.png" alt="">
                </div>
                <div class="col-12 col-sm-6">
                    <div class="four-0-inner">
                        <h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> OOPS!</h3>
                        <h6>You landed on the right page but used a wrong link.</h6>
                        <p>The page you are looking for doesn’t exist. It may have been removed or the link is incorrect.</p>
                        <a class="btn btn-warning font-weight-bold mt-3" href="<?php echo DOMAIN;?>/">
                            <i class="fa fa-home" aria-hidden="true"></i> Go to Home Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("includes/footer.php");?>
<?php include("includes/jscript.php");?>
 
  </body>
</html>