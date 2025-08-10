<?php  include "includes/DB.php"; $metas = $db->getPageMetas(5); 
if(isset($_POST['Btn_Submit']) && $_POST['Btn_Submit'] == 'submit'){  
	
	$name = $_POST['yourname'];
	$email = $_POST['youremail'];	
	$subject = $name.' has sent a message';
	$message = $_POST['message'];
	
	$to = 'info@kscoupon.com';
	$body = "

	<table width='716' height='129' border='0' align='center' cellpadding='3' cellspacing='5' bordercolor='#FFFFFF' bgcolor='#FFFFFF'>

     <tr>

       <td height='5' align='center' bgcolor='#E8E9EA'></td>

     </tr>

     <tr>

       <td height='36' align='left' bgcolor='#E8E9EA'>$message</td>   

     </tr>

   </table>";

   
  $mail = mail($to, $subject, $body,

			 "From: ".$name." <".$email.">\r\n"

			."Reply-To: ".$email."\r\n"

			."Content-type: text/html;" . "\r\n"

			."X-Mailer: PHP/" . phpversion());
			
		
				if(!$mail) {  
								   $msg = "Your message couldn't send, please try again.";
				
						} else {  
				
								   $msg = "Your message has send successfully. ";
				
							   }
		

}?>
<!doctype html>
<html class="no-js" lang="">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $metas['meta_title'];?></title>
    <meta name="description" content="<?php echo $metas['meta_desc'];?>">
    <meta name="keywords" content="<?php echo $metas['meta_keywords'];?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo DOMAIN;?>/assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <?php include("includes/styles.php");
          include("includes/analytics.php");?>
    <script src="<?php echo DOMAIN;?>/assets/js/modernizr.js"></script>
 </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php include("includes/header.php");?>

	<section id="contact-us">
	    <div class="container">
	    	<div class="row">
				<div class="col-12 p0">
					<div class="page-location">
						<ul>
							<li><a href="#">
								Home<span class="divider">/</span>
							</a></li>
							<li><a class="page-location-active" href="#">
								Contact Us
								<span class="divider">/</span>
							</a></li>
						</ul>
					</div>
				</div>
	    	</div>
	    	<div class="contact-us-content">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-9 col-xl-9">
						<div class="contact-from">
							<div class="contact-description">
								<h4 class="contact-description-title">Tell us about yourself</h4>
								<p class="contact-description-content">Your email address will not be published. Required fields are marked *</p>
							</div>
							<form>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="inputEmail1" class="col-form-label">Name</label>
										<input name="yourname" type="text" class="form-control" id="inputEmail1" placeholder="Name">
									</div>
									<div class="form-group col-md-6">
										<label for="inputEmail4" class="col-form-label">Email</label>
										<input name="youremail" type="email" class="form-control" id="inputEmail4" placeholder="Email">
									</div>
									<div class="form-group col-md-12">
										<label for="exampleFormControlTextarea1" class="col-form-label">Your Message</label>
										<textarea name="message" class="form-control" id="exampleFormControlTextarea1"></textarea>
									</div>
								</div>
								<button type="submit" class="btn btn-primary wd-contact-btn">Submit</button>
							</form>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-3 col-xl-3">
						<div class="contact-address-area">
							<h4 class="contact-address-title">Address</h4>
							<p class="contact-address-content">Your email address will not be published.
							Required fields are marked *</p>
							<div class="contact-address">
								<div class="media radius-icon-area">
									<div class="radius-icon">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
									</div>
									<div class="media-body radius-content">
										93 Worth St, New York, NY
										New york, saskaton
									</div>
								</div>
								<div class="media radius-icon-area">
									<div class="radius-icon">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</div>
									<div class="media-body radius-content">
										<p><a href="tel:+321123456">+321 123 456</a></p>
										<p><a href="tel:+321123456">+321 123 456</a></p>
									</div>
								</div>
								<div class="media radius-icon-area">
									<div class="radius-icon">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
									<div class="media-body radius-content">
										<p><a href="mailto:info@info.com">info@themeim.com</a></p>
										<p><a href="mailto:badhon@gmail.com">support@themeim.com</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>

     <?php include("includes/footer.php");?>
    <?php include("includes/jscript.php");?>
 </body>
</html>