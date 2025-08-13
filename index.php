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
  <!-- Stylized Main Slider Section -->
<section class="main_sliderSec" style="background: linear-gradient(90deg, #f8fafc 60%, #e9f0fa 100%); padding: 32px 0 18px 0;">
    <div class="container">
        <div class="row">
            <div class="mainslider owl-carousel owl-theme">
                <?php
                $sql_Insert = "select ms_title, ms_link, ms_img, ms_alt, status, added_date from main_slider WHERE 1 ";				
                $rs_slider = $db->ExecuteQuery($sql_Insert);
                while(list($ms_title, $ms_link, $ms_img, $ms_alt, $status, $added_date) = $db->FetchAsArray($rs_slider)) { ?>	
                    <div class="item slider-modern-card" style="border-radius:18px; overflow:hidden; box-shadow:0 2px 16px rgba(30,60,114,0.10); background:#fff; transition:box-shadow 0.2s, transform 0.2s;">
                        <img onclick="window.open('<?php echo $ms_link;?>'); return false;" src="./assets/images/main_slider/<?php echo $ms_img;?>" alt="<?php echo $ms_alt;?>" style="width:100%; height:260px; object-fit:cover; border-radius:18px 18px 0 0;">
                        <div class="slider_col p-3">
                            <div class="slide_heading">
                                <h4 style="font-weight:700; color:#1e3c72; margin-bottom:0;"><?php echo htmlspecialchars($ms_title);?></h4>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>          
        </div>
    </div>
</section>
<style>
.slider-modern-card:hover {
    box-shadow: 0 8px 32px rgba(30,60,114,0.18);
    transform: translateY(-6px) scale(1.03);
}
.mainslider .owl-dots {
    text-align: center;
    margin-top: 12px;
}
.mainslider .owl-dot span {
    width: 12px;
    height: 12px;
    background: #ffd700;
    display: inline-block;
    border-radius: 50%;
    margin: 0 4px;
    transition: background 0.2s;
}
.mainslider .owl-dot.active span {
    background: #1e3c72;
}
</style>
    <!-- Latest Coupons Section -->
    <section class="latest-coupon-area">
        <div class="container-fluid custom-width">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="section-title" style="font-weight:700; letter-spacing:1px; color:#1e3c72; margin-bottom:2.2rem;">
                            Latest Coupons
                        </h2>
                        <div class="row" id="latest-coupons-list">
                        <?php
                        $sql_latest = "SELECT s.store_id, s.storename, s.store_url, s.store_logo, c.tracking_link, 
                            DATE_FORMAT(c.exp_date,'%M %d, %Y') as exp_date,
                            DATE_FORMAT(c.start_date,'%b %d, %Y') as start_date,
                            c.coupon_code, c.coupon_desc, c.couponname, c.discount_type, c.discount_value, c.currency, 
                            c.coupon_id, c.coupon_type, c.product_image, s.status, 
                            DATE_FORMAT(c.added_date,'%b %d, %Y') as added_date,
                            c.insert_type, c.username, c.exclusive, c.votey, c.voten, c.used_total
                            FROM stores s, coupons c
                            WHERE s.store_id = c.store_id
                            AND c.status = 1
                            AND (c.exp_date >= CURDATE() OR c.exp_date = '0000-00-00')
                            ORDER BY c.added_date DESC
                            LIMIT 9";
                        $rs_latest = $db->ExecuteQuery($sql_latest);
                        while(list($store_id, $storename, $store_url, $store_logo, $html_code, $exp_date, $start_date, $coupon_code, $desc, $couponname, $discount_type, $discount_value, $currency, $coupon_id, $coupon_type, $product_image, $store_status, $added_date, $insert_type, $username, $exclusive, $votey, $voten, $used_total) = $db->FetchAsArray($rs_latest)) { ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="coupon-card shadow-sm h-100 d-flex flex-column justify-content-between" style="border-radius:18px; background:#fff; transition:box-shadow 0.2s, transform 0.2s;">
                                <?php include("includes/coupon.php");?>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.latest-coupon-area {
    background: linear-gradient(90deg, #f8fafc 60%, #e9f0fa 100%);
    padding: 60px 0 40px 0;
}
.coupon-card {
    border: none;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 2px 16px rgba(30,60,114,0.08);
    padding: 28px 22px 18px 22px;
    margin-bottom: 0;
    transition: box-shadow 0.2s, transform 0.2s;
    position: relative;
    overflow: hidden;
}
.coupon-card:hover {
    box-shadow: 0 8px 32px rgba(30,60,114,0.18);
    transform: translateY(-6px) scale(1.03);
}
.coupon-card .btn, .coupon-card a.btn {
    border-radius: 22px;
    font-weight: 600;
    font-size: 1rem;
    padding: 8px 24px;
    background: linear-gradient(90deg,#1e3c72,#2a5298);
    color: #ffd700;
    border: none;
    transition: background 0.2s, color 0.2s;
}
.coupon-card .btn:hover, .coupon-card a.btn:hover {
    background: #ffd700;
    color: #1e3c72;
}
.coupon-card .coupon-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #1e3c72;
    margin-bottom: 0.5rem;
}
.coupon-card .coupon-desc {
    color: #444;
    font-size: 0.98rem;
    margin-bottom: 1.1rem;
}
.coupon-card .coupon-meta {
    font-size: 0.92rem;
    color: #888;
    margin-bottom: 0.7rem;
}
@media (max-width: 991.98px) {
    .latest-coupon-area { padding: 32px 0 20px 0; }
    .coupon-card { padding: 18px 10px 12px 10px; }
}
</style>
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
