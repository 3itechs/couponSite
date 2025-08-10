<?php 
session_start();
error_reporting(0);
include "includes/DB.php";
$db= new DB();
if(isset($_COOKIE['admin_username'])) { header("location: index.php"); exit(); }
$adate = date("Y-m-d H:i:s", time()) ;
$userip =  $_SERVER['REMOTE_ADDR'];

if(!isset($_SESSION['referrer'])){
  if ($_SERVER['HTTP_REFERER']){
        $referrer = $_SERVER['HTTP_REFERER'];
		}else{
			 $referrer = "";
		}
//save it in a session
  $_SESSION['referrer'] = $referrer; // store session data
} ?>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="login_verification.php" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <?php /*?><label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label><?php */?>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            <?php /*?><p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.php" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="index.php" class="twitter">
                    <i class="icon-twitter"></i>
                    Twitter
                </a>
            </div>
          <?php */?>            
              <?php /*?> <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div><?php */?>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
