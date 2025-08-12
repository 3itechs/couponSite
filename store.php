<?php  include "includes/DB.php";  $metas = $db->getPageMetas(1); 
 $pieces = explode("?", $_SERVER['REQUEST_URI']);
 
 if ( ! isset($pieces[1])) {
      $pieces[1] = null;
    }else{
		  $mycid = explode("=", $pieces[1]);
		  $mypopid = $mycid[1];	
	}
 

/*header('Content-type: text/html; charset=utf-8');ob_start("ob_gzhandler");$offset=60 * 60 * 24 * 1;header("Expires: ".gmdate("D, d M Y H:i:s", time() + $offset)." GMT");header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); header("Pragma: public");header("Cache-Control: max-age=86400"); $host=DOMAIN;$host_var=DOMAINVAR;ob_start();$spage='1';*/
 $surl=$_GET['surl'];			
  $sql_main="select store_id, storename, store_desc, more_about_desc, store_url, store_products, web_address, tracking_link, imp_code, store_thumbnail, store_thumbnail_alt, small_thumb, store_logo, status, country ,store_heading, meta_title, meta_desc, meta_keywords, address, phone, email, shipping_policy, wikipedia, bbb, store_blog, facebook, twitter, youtube, instagram, redirect, primary_category, total_votes, total_values, average_savings, currency, store_video1, store_video2, store_video3, store_video4, edited_date from stores where store_url='".$surl."' ";  
	$rs_store = $db->ExecuteQuery($sql_main); 
	$nofstores = $db->GetSelectedRows($rs_store);
	list($store_id,$storename, $storedesc, $more_about_desc, $store_url, $store_products, $web_address, $store_html, $store_imp_code, $store_thumbnail, $store_thumbnail_alt, $small_thumb, $store_logo, $store_status, $country, $store_heading, $meta_title, $meta_desc, $meta_keywords, $address, $phone, $email, $shipping_policy, $wikipedia, $bbb, $store_blog, $facebook, $twitter, $youtube, $instagram, $redirect, $primary_category,$total_votes,$total_values, $average_savings, $store_currency, $store_video1, $store_video2, $store_video3, $store_video4, $edited_date) = $db->FetchAsArray($rs_store); 
	
$edited_date = $edited_date; $limitdate = date('Y-m-d', strtotime("-7 days"));
if($limitdate <= $edited_date)
  {
    echo "";
   }else{	
	    $edited_date = 	date('Y-m-d', strtotime("-".rand(1,5). 'days'));
	    $sql_date = "UPDATE stores SET edited_date = '$edited_date' where store_id = '$store_id'"; 
		$newdate = $db->ExecuteQuery($sql_date); 
	  }
	  
	$storeid=$store_id; $vstore_id=$store_id; $sname=$storename; $lsname=strtolower($storename); $sourl=str_replace("www.","",str_replace("https://","",str_replace("http://","",$web_address))); $sthumb=$small_thumb;$surl_str=$store_url;
	
	$sql_net = "select network_id from store_networks where store_id='$store_id'";
	$rs_net = $db->ExecuteQuery($sql_net);
	list($store_network) = $db->FetchAsArray($rs_net);
	
	$storeid=$store_id; $vstore_id=$store_id; $sname=$storename;$lsname=strtolower($storename); $sourl=str_replace("www.","",$web_address); $sthumb=$small_thumb;if($country=='5033'){$couponvar='voucher'; $couponsvar='vouchers';}elseif($country=='5021'){$couponvar='gutschein'; $couponsvar='gutscheine';}else{$couponvar='coupon'; $couponsvar='coupons';}
	
	if($nofstores < 1 ){$sql_hist_url="select s.store_id, s.store_url from store_url_history sh, stores s where sh.store_id=s.store_id and sh.store_url='".$surl."' ";	
	$rs_hist_url = $db->ExecuteQuery($sql_hist_url); 
	list($his_store_id, $his_store_url) = $db->FetchAsArray($rs_hist_url); 
	
	if($db->GetSelectedRows($rs_hist_url) > '0'){
		$sql_hist_url2="select store_id, store_url, country from stores where store_id='".$his_store_id."' "; 
		$rs_hist_url2=$db->ExecuteQuery($sql_hist_url2); 
		list($his_store_id2, $his_store_url2, $country2)=$db->FetchAsArray($rs_hist_url2);		
		header( "HTTP/1.1 301 Moved Permanently" );header("location: $host_var/$his_store_url2");exit();}else{header( "HTTP/1.1 301 Moved Permanently" );header("location: $host_var/404.html");exit();}}
		
		
		
		if($store_status == 'DEL'){if($redirect !=''){header( "HTTP/1.1 301 Moved Permanently"); header("location: $redirect");exit();}else{
			
	   $sql_cat = "select category_url from categories where category_id='".$primary_category."' ";
	   $rs_cat = $db->ExecuteQuery($sql_cat);
	   list($url) = $db->FetchAsArray($rs_cat); 
	   
	   header( "HTTP/1.1 301 Moved Permanently"); header("location: $host_var/categories/$url");exit();}}


 
 $today=date("Y-m-d");
 
 

?>
<!doctype html>
<html class="no-js" lang="">
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php if($meta_title != ''){echo $db->replace_const($meta_title);}?></title>
    <meta name="description" content="<?php if($meta_desc != ''){echo $db->replace_const($meta_desc);}?>" >
	<meta name="keywords" content="<?php if($meta_keywords != ''){echo $db->replace_const($meta_keywords);}?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php include("includes/styles.php");?>
    <?php include("includes/analytics.php");?>
 </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
   <?php include("includes/header.php");?>
	<div class="page-container ptb-30">
                <div class="container">
                    <div class="row row-rl-10 row-tb-20">
                        <div class="page-sidebar col-sm-4 col-md-3">
                            <aside class="store-header-area panel text-center">
                                <div class="row">
                                    <div class="col-sm-12 ptb-15">
                                        <img src="<?php echo DOMAIN;?>/assets/images/stores/<?php echo $store_logo;?>" alt="<?php echo $storename;?>" class="img_round">
                                    </div>
                                    <div class="col-sm-12  ptb-15">
                                        <div class="store-about ptb-10 prl-10">
                                            <h3 class="mb-10"><?php echo $storename;?></h3>
                                            <div class="rating mb-10">
                                                <span class="rating-stars rate-allow" data-rating="3">
			                                        <i class="fa fa-star-o"></i>
			                                        <i class="fa fa-star-o"></i>
			                                        <i class="fa fa-star-o star-active"></i>
			                                        <i class="fa fa-star-o"></i>
			                                        <i class="fa fa-star-o"></i>
			                                    </span>
                                                <span class="rating-reviews">
                                        ( <span class="rating-count">205</span> rates )
                                                </span>
                                            </div>
                                            <p class="mb-15"><?php echo stripslashes(html_entity_decode ($storedesc)); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="store-splitter-left">
                                            <header class="left-splitter-header prl-10 ptb-20 bg-lighter">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h2><?php echo $db->getCouponDealCount($store_id);?></h2>
                                                        <p>Deals</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h2><?php echo $db->getCouponCodeCount($store_id);?></h2>
                                                        <p>Coupons</p>
                                                    </div>
                                                </div>
                                            </header>
                                            <footer class="left-splitter-social prl-20 ptb-20">
                                                <ul class="list-inline social-icons social-icons--colored t-center">
                                                    <li class="social-icons__item">
                                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li class="social-icons__item">
                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li class="social-icons__item">
                                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                                    </li>
                                                    <li class="social-icons__item">
                                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                </ul>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="page-content col-sm-8 col-md-9">

                            <!-- Store Tabs Area -->
                            <div class="section store-tabs-area">
                                <div class="tabs tabs-v1">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs panel">
                                        <li id="showall" class="btn active">
                                            Show All 
                                        </li>
                                        <li id="deal" class="btn">
                                            Deals 
                                        </li>
                                        <li id="code" class="btn">
                                            Codes
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">                                        
                                        <div  class="tab-pane ptb-20 active">
                                        	<section class="coupon-area">
										        <div class="container-fluid custom-width">
										            <div class="row">
										                <div class="col-lg-12 container">
                                                        <?php $sql="select s.store_id, s.storename, s.store_url, s.small_thumb, c.tracking_link,c.imp_code, date_format(c.exp_date,'%M %d, %Y') as exp_date ,date_format(c.start_date,'%b %d, %Y') as start_date, c.coupon_code, c.coupon_desc, c.show_desc, c.couponname, c.discount_type, c.discount_value, c.currency, c.coupon_url, c.coupon_id,c.coupon_type,c.coupon_kwd,s.country, c.user_submitted,c.product_image,s.status,date_format(c.added_date,'%b %d, %Y') as added_date ,c.insert_type,c.username,c.exclusive, c.votey, c.voten, c.used_total from stores s, coupons c where s.store_id=c.store_id and s.store_id='$vstore_id'  and (c.exp_date >=CURDATE() or c.exp_date=000-00-00) and (c.status='1' OR c.status='ENA' ) order by  c.rank ASC "; 
$rs_store_coupons = $db->ExecuteQuery($sql); $total_active = $db->GetSelectedRows($rs_store_coupons); $c='0';
while(list($store_id, $storename, $store_url, $small_thumb, $html_code, $imp_code, $exp_date, $start_date, $coupon_code, $desc, $show_desc, $couponname, $discount_type, $discount_value, $currency, $coupon_url, $coupon_id, $coupon_type, $coupon_kwd, $country, $user_submitted, $product_image, $store_status, $added_date ,$insert_type, $username, $exclusive, $votey, $voten, $used_total)=$db->FetchAsArray($rs_store_coupons)){
$store_url=DOMAINVAR."/coupons/".$store_url; if($product_image!='' && file_exists(IMGPATH.'/products/'.$product_image)){$file_thumb=MEDIA.'/products/'.$product_image;}elseif($small_thumb!='' && file_exists(IMGPATH.'/small_thumb/'.$small_thumb)){$file_thumb=MEDIA.'/small_thumb/'.$small_thumb;}else{$file_thumb=MEDIA."/small_thumb.jpg";}if ($exp_date=='0000-00-00 12:00:00' || $exp_date=='0000-00-00' || $exp_date=='' ){$expdate='Never Expires';}else{$expdate=$exp_date;} include('includes/store-coupon.php');}?> 
                                                            
										                    
                                                            
										                </div>
										            </div>
										        </div>
										    </section>
                                        </div>
                                   
                                   
                                    </div>
                                </div>
                            </div>
                            <!-- End Store Tabs Area -->

                        </div>
                    </div>
                </div>
            </div>





	
<?php include("includes/jscript.php"); ?>
<script type="text/javascript">         
        
        $("#showall").click(function(){  
           $(".deal").show();
           $(".code").show();
           $(".freeship").show();
           $(".special").show();
            
           $("#showall").addClass('active');
           $("#deal").removeClass('active');
           $("#code").removeClass('active');
           $("#freeship").removeClass('active');
           $("#special").removeClass('active');
        });

        $("#code").click(function(){  
           $(".deal").hide();           
           $(".freeship").hide();
           $(".special").hide();
           $(".code").show();
            
           $("#showall").removeClass('active');
           $("#deal").removeClass('active');
           $("#code").addClass('active');
           $("#freeship").removeClass('active');
           $("#special").removeClass('active');
        });

        $("#deal").click(function(){            
           $(".code").hide();
           $(".freeship").hide();
           $(".special").hide();
           $(".deal").show();
           
           $("#showall").removeClass('active');
           $("#deal").addClass('active');
           $("#code").removeClass('active');
           $("#freeship").removeClass('active');
           $("#special").removeClass('active');
        });
     
     $("#freeship").click(function(){  
           $(".deal").hide();
           $(".code").hide();           
           $(".special").hide();
           $(".freeship").show();
        
           $("#showall").removeClass('borderClass');
           $("#deal").removeClass('borderClass');
           $("#code").removeClass('borderClass');
           $("#freeship").addClass('borderClass');
           $("#special").removeClass('borderClass');
        });
     
     $("#special").click(function(){  
           $(".deal").hide();
           $(".code").hide();
           $(".freeship").hide();
           $(".special").show();
         
           $("#showall").removeClass('borderClass');
           $("#deal").removeClass('borderClass');
           $("#code").removeClass('borderClass');
           $("#freeship").removeClass('borderClass');
           $("#special").addClass('borderClass');
        });
      
  </script>
<!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="coupon-modal modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p id="copname"></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="coupon-modal-body">
               <p class="deal-activity">DEAL ACTIVATED, NO COUPON CODE REQUIRED!</p> 
               
                <div class="coupon-feedback">
                      <a href="#" class="mod-store-btn">Go to Store</a>
                </div>
               <div class="coupon-show">
                  <p id="ccode"></p>
               </div>
              
               <div class="coupon-accordion">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="coupon-card-btn" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Coupon details</button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body coupon-card-body">
                                    <h6>Copon Details :</h6>
                                    <p id="copdesc"></p>
                                    <!--<span>Expired  Date :  01 / 02 / 2018</span>
                                    <span>Submitted :  A week ago</span>-->
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
          <div class="modal-footer">
            <div class="mf-left"> <i class="fa fa-signal" aria-hidden="true"></i>17548 People View This</div>
            <div class="mf-right">
                <ul class="coupon-soc">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    
                </ul>
            </div>
          </div>
        </div>
      </div>
</div>
    </div>
  <?php include("includes/footer.php");?>