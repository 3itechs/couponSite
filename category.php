<?php  include "includes/DB.php"; 

if($_REQUEST['curl'] != ''){
        $curl = $_REQUEST['curl'];
  }else{
        include_once "404.php"; die;
  }

  $sqlb = "select category_id, category, category_url, parent_id from categories where status='ENA' and category_url='$curl' ";
  $resb = $db->ExecuteQuery($sqlb);
  list($kwd_id, $category_title ,$cat_url,$parent_id) = $db->FetchAsArray($resb);
     
	 if($parent_id != '0'){ 
		   $sql_parent = "select category ,category_url from categories where category_id = '$parent_id' ";
		   $resp = $db->ExecuteQuery($sql_parent);
		    list( $pcat_title ,$pkwd_url) = $db->FetchAsArray($resp);
       }else{ $maincatid = $kwd_id; }
?>
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
    <?php include("includes/styles.php");
          include("includes/analytics.php");?>
    <script src="<?php echo DOMAIN;?>/assets/js/modernizr.js"></script>
	
 </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
     <?php include("includes/header.php");?>
      <section class="terms-area panel">
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
                    <div class="ptb-30 prl-30">
                        <h3 class="t-uppercase h-title mb-40"><?=$category_title?></h3>
                    </div>
        </div>
      </section>
    <!-- =========================
        Coupon section
    ============================== -->
    
    <section class="coupon-area">
       <div class="container-fluid custom-width">
         <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <?php $cur_date=date('Y-m-d');			    
  $sql_feature = "select s.store_id, s.storename,s.country,s.store_url, s.web_address,s.store_logo, s.store_thumbnail, s.small_thumb, c.tracking_link,c.imp_code, date_format(c.exp_date,'%b %d, %Y') as exp_date , date_format(c.start_date,'%b %d, %Y') as start_date , c.coupon_code, c.coupon_desc, c.couponname, c.coupon_url,c.coupon_id,c.coupon_type,c.product_image,c.currency,date_format(c.added_date,'%b %d, %Y') as added_date, c.exclusive  ,c.user_submitted,c.username from coupons c, stores s where (c.status = 'ENA' || c.status = '1') and s.store_id = c.store_id  and c.primary_category = '$kwd_id' limit 25 ";
				$res = $db->ExecuteQuery($sql_feature);
				$feature = $db->GetSelectedRows($res);

while(list($sstore_id, $storename, $country, $store_url, $web_address, $store_logo,$store_thumbnail, $small_thumb,$tracking_link, $imp_code, $exp_date, $start_date, $coupon_code, $desc, $couponname, $coupon_url,$coupon_id,$coupon_type,$product_image,$currency, $added_date, $exclusive  ,$user_submitted,$username) = $db->FetchAsArray($res))
					{
			$sourl=str_replace("www.","",str_replace("https://","",str_replace("http://","",$web_address)));						
				//	$storeurl = DOMAINVAR."/coupons/".$store_url;			
					if($product_image!=''  &&  file_exists(IMGPATH.'/products/'.$product_image)){$file_thumb =MEDIA.'/products/'.$product_image;
					  }elseif($small_thumb!=''  &&  file_exists(IMGPATH.'/small_thumb/'.$small_thumb)){$file_thumb =MEDIA.'/small_thumb/'.$small_thumb;}else{$file_thumb = MEDIA."/small_thumb.jpg";}
					
					if ($exp_date=='0000-00-00 12:00:00' || $exp_date=='00-00-00' || $exp_date=='' )
					   {
					    $expdate = "Limited Time";
						}else{
		                 	 include('includes/expiry_age.php');
							 } ?>
                    
                    <?php include("includes/coupon.php");?>
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
                                    <img src="<?php echo DOMAIN;?>/assets/images/product-<?php echo DOMAIN;?>/assets/images/Coupon-adv.jpg" alt="">
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
