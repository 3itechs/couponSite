<?php  include "includes/DB.php";  $metas = $db->getPageMetas(1);

 if( $_GET['q']!='' ){
     $vSearch=$_GET['q'];
     $vSearch = preg_replace("/[^A-Za-z0-9&.'-](\s+)/",'',$vSearch);
	  header("location: search.html?q=".$vSearch);
                    }
					$vSearch=$_REQUEST['q'];
				
?>
<!doctype html>
<html class="no-js" lang="">
  
<head>
    <meta name="verify-admitad" content="47a0a365a4" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $metas['meta_title'];?></title>
    <meta name="description" content="<?php echo $metas['meta_desc'];?>">
    <meta name="keywords" content="<?php echo $metas['meta_keywords'];?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="https://localhost/kscoupon//assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <?php include("includes/styles.php");
          include("includes/analytics.php");?>
    <script src="https://localhost/kscoupon/assets/js/modernizr.js"></script>
	
 </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <?php include("includes/header.php");?>
   
    <section class="coupon-area">                        
        <div class="container-fluid custom-width">            
         <div class="container">
             <h3 class="mb-40 t-uppercase">Search Results for <?php echo $vSearch; ?></h3>
            <div class="row">
                <div class="col-lg-9">
                    <?php  $sql_trending = "select distinct(s.store_id), s.storename,s.country,s.store_url, s.web_address,s.store_logo, s.store_thumbnail, s.small_thumb, c.tracking_link,c.imp_code, date_format(c.exp_date,'%b %d, %Y') as exp_date , date_format(c.start_date,'%b %d, %Y') as start_date , c.coupon_code, c.coupon_desc, c.show_desc, c.couponname, c.coupon_url,c.coupon_id,c.coupon_type,c.product_image,date_format(c.added_date,'%b %d, %Y') as added_date, c.exclusive   from stores s, coupons c where s.store_id=c.store_id  and MATCH (c.couponname) AGAINST ('$vSearch' ) order by c.exp_date ASC limit 55"; 
$rs_trending = $db->ExecuteQuery($sql_trending);  

while(list($sstore_id, $storename, $country, $store_url, $store_orig_url,$store_logo,$store_thumbnail, $small_thumb,$html_code, $imp_code, $exp_date, $start_date, $coupon_code, $desc, $show_desc,$couponname, $coupon_url,$coupon_id,$coupon_type,$product_image, $added_date, $exclusive) = $db->FetchAsArray($rs_trending)){  ?>
                    
                    <?php include("includes/store-coupon.php");?>
                    <?php }?>
                    
                    
                </div>
                <div class="col-lg-3">
                    <div class="coupon-sidebar">
                       <!--Single coupon sidebar-->
                        <div class="coupon-sin-sidebar">
                            <h2>Propular Categories</h2>
                            <div class="csb-inner">
                               <ul>
                              <?php $sql_cat = "select category_id, category, category_url from categories ";
								$sql_cat .= " where (status='1' OR status='ENA' )  LIMIT 12 "; 
								 $rs_cat = $db->ExecuteQuery($sql_cat); 
								  $count_top = $db->GetSelectedRows($rs_cat); 
									while(list($category_id, $category, $category_url) = $db->FetchAsArray($rs_cat)){ 
						              $caturl = DOMAIN.'/categories/'.$category_url; ?>
                                    <li><span class="pc"><a href="<?php echo $caturl;?>"><?php echo $category;?></a></span> <span class="pcn">{<?php echo $db->CountStoresByCID($category_id);?>}</span></li>     
								   
								   <?php }?>
                                   
                                </ul>
                            </div>
                        </div>
                        <!--Single coupon sidebar-->
                        <div class="coupon-sin-sidebar">
                            <h2>Newsletter</h2>
                            <div class="csb-inner">
                               <p>Don't miss to get discount</p>
                                <form action="" method="get">
                                    <input type="text" placeholder="Enter Your Email...">
                                    <input type="submit" value="subscribe">
                                </form>
                            </div>
                        </div>
                        <!--Single coupon sidebar-->
                        <div class="coupon-sin-sidebar">
                            <h2>Propular Store</h2>
                            <div class="csb-inner">
                               <ul>
                               <?php $sql_top = "select store_id, storename, store_url, store_logo from stores ";
								$sql_top .= " where (status='1' OR status='ENA' )  LIMIT 12 "; 
								 $rs_top = $db->ExecuteQuery($sql_top); 
								  $count_top = $db->GetSelectedRows($rs_top); 
									while(list($store_id, $storename, $store_url, $store_logo) = $db->FetchAsArray($rs_top)){ 
						              $storeurl = DOMAIN.'/coupons/'.$store_url; ?>
                                      <li><span class="pc"><a href="<?php echo $storeurl;?>"><?php echo $storename;?></a></span> <span class="pcn">{<?php echo $db->CountCouponsBySID($store_id);?>}</span></li>                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                        
                        <!--Single coupon sidebar-->
                        <div class="coupon-sin-sidebar">
                            <h2>Advertisement</h2>
                            <div class="csb-inner">
                                <a href="#">
                                    <img src="https://localhost/kscoupon/assets/images/product-<?php echo DOMAIN;?>/assets/images/Coupon-adv.jpg" alt="">
                                </a>
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
