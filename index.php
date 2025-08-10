<?php  include "includes/DB.php";  $metas = $db->getPageMetas(1); ?>
<!doctype html>
<html class="no-js" lang="">
  
<head>
   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	 <title><?php echo $metas['meta_title'];?></title>
    <meta name="description" content="<?php echo $metas['meta_desc'];?>">
    <meta name="keywords" content="<?php echo $metas['meta_keywords'];?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo DOMAIN;?>/assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <?php include("includes/styles.php");?>
    <link rel="stylesheet" href="<?php echo DOMAINVAR;?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo DOMAINVAR;?>/assets/css/owl.theme.default.min.css">
 </head>
  <body>    
  <?php include("includes/header.php");?>
  <section class="main_sliderSec">
		<div class="container">
			<div class="row">
		        <div class="mainslider owl-carousel owl-theme">
			<?php
			 $sql_Insert = "select ms_title, ms_link, ms_img, ms_alt, status, added_date from main_slider WHERE 1 ";				
             $rs_slider = $db->ExecuteQuery($sql_Insert);
              while(list( $ms_title, $ms_link, $ms_img, $ms_alt, $status, $added_date ) = $db->FetchAsArray($rs_slider)) { ?>	
					<div class="item">
						<img onclick="javascripts: window.open('<?php echo $ms_link;?>'); return false;" src="./assets/images/main_slider/<?php echo $ms_img;?>">
		                <div class="slider_col"> 
		                  	<div class="slide_heading">
		                  	
		                  	</div>                  	
						</div>
					</div>
            <?php }?>
					
		      	</div>          
			</div>
		</div>
	</section>
   <div data-vi-partner-id=P00067301 data-vi-widget-ref=W-1560a189-ce4a-46ab-b220-8e02bcce429a ></div>
<script async src="https://www.viator.com/orion/partner/widget.js"></script>
    
    <section class="coupon-area">
        <div class="container-fluid custom-width">
         <div class="container">                
            <div class="row">

                <div class="col-lg-12">
                    
                    <?php $sql_trending = "select s.store_id, s.storename, s.store_url, s.store_logo, c.tracking_link, date_format(c.exp_date,'%M %d, %Y') as exp_date ,date_format(c.start_date,'%b %d, %Y') as start_date, c.coupon_code, c.coupon_desc, c.couponname, c.discount_type, c.discount_value, c.currency, c.coupon_id,c.coupon_type, c.product_image, s.status,date_format(c.added_date,'%b %d, %Y') as added_date ,c.insert_type,c.username,c.exclusive, c.votey, c.voten, c.used_total from stores s, coupons c where s.store_id = c.store_id and c.feature = 1 and (c.exp_date >= CURDATE() or c.exp_date = 000-00-00) ORDER BY c.added_date DESC LIMIT 9"; 
                    $rs_trending = $db->ExecuteQuery($sql_trending); 
                    while(list($store_id, $storename, $store_url, $store_logo, $html_code, $exp_date, $start_date, $coupon_code, $desc, $couponname, $discount_type, $discount_value, $currency, $coupon_id, $coupon_type, $product_image, $store_status, $added_date ,$insert_type, $username, $exclusive, $votey, $voten, $used_total) = $db->FetchAsArray($rs_trending)){  ?>
                    
                    <?php include("includes/coupon.php");?>
                    <?php }?>
                    
                    
                </div>
                
            </div>
         </div>
      </div>
  </section>
<?php include("includes/footer.php");?>
<?php include("includes/jscript.php");?>
<script src="<?php echo DOMAINVAR;?>/assets/js/owl.carousel.js"></script>
	<script type="text/javascript">
    $('.mainslider').owlCarousel({
		items:1,
	    nav:false,
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:6000,
	    autoplayHoverPause:true
	});
    $('.loop').owlCarousel({
    center: true,
    items:2,
    nav:true,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:7,
        }
    }
});
  </script>
  <script>
  	var btn = $('#button');

	$(window).scroll(function() {
	  if ($(window).scrollTop() > 300) {
	    btn.addClass('show');
	  } else {
	    btn.removeClass('show');
	  }
	});

	btn.on('click', function(e) {
	  e.preventDefault();
	  $('html, body').animate({scrollTop:0}, '300');
	}); 
    </script>
  </body>
</html>
