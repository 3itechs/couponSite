<?php  include "includes/DB.php"; $metas = $db->getPageMetas(2); 

if(isset($_REQUEST['ab']) && $_REQUEST['ab'] != '' ){ $ab = $_REQUEST['ab'];}

$az_ar = array("0-9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");

?>

<!DOCTYPE html>

<html lang="en">

   

<head>

   <meta charset="utf-8" />

   <?php $ab =''; if($ab == ''){ $page_title = 'All Stores for Coupon Codes at KSCoupon.com'; $lnk = "#"; }else{



 if($_REQUEST['page']!=''){$page_no = " : Page ".$_REQUEST['page'];}



$page_title = "All Stores for Coupon Codes : Letter ".strtoupper($ab)."".$page_no." at KSCoupon.com";

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

    <?php include("includes/styles.php");

          include("includes/analytics.php");?>

    <script src="<?php echo DOMAIN;?>/assets/js/modernizr.js"></script>

 </head>

  <body>

    <!--[if lt IE 8]>

      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

    <![endif]-->



    <?php include("includes/header.php");?>

	<div class="page-container ptb-60">

                <div class="container">

                    <section class="stores-area stores-area-v2">

                        <h3 class="mb-40 t-uppercase">View Deals by stores</h3>

                        <div class="letters-toolbar p-10 panel mb-40">

                            <span class="all-stores"><a href="#">All stores</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#0-9">0-9</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#a">A</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#b">B</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#c">C</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#d">D</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#e">E</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#f">F</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#g">G</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#h">H</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#i">I</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#j">J</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#k">K</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#l">L</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#m">M</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#n">N</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#o">O</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#p">P</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#q">Q</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#r">R</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#s">S</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#t">T</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#u">U</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#v">V</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#w">W</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#x">X</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#y">Y</a></span>

                            <span><a href="<?php echo DOMAIN;?>/stores.html#z">Z</a></span>

                        </div>

                        <div class="stores-cat panel mb-40  ">

                          <?php if($ab != ''){

							$upp_val = strtoupper($ab);

							$low_val = strtolower($ab);

						  if($val == '0-9'){ 

								$str = "storename REGEXP  '^([0-9.])'";

								}else{ 

									$str = "storename REGEXP  '^($upp_val|$low_val|The $upp_val|The $low_val)'";

								}

							  $sql = "select store_id, storename, store_url from stores  where $str and ( status = '1' || status = '0' ) "; $res = $db->ExecuteQuery($sql);

							 ?>

                          <a name="<?=$low_val?>"></a>

                           <h3 class="stores-cat-header"><?=$upp_val?></h3>

                            <ul class="row stores-cat-body coupons-cat">                               

                                

                                <li class="col-sm-12">

                                    <ul><?php

                                        while(list($sstore_id,$storename,$store_url) = $db->FetchAsArray($res))   

											  {										    

											  $store_url = DOMAINVAR."/coupons/".$store_url;

											  $var_storename=str_replace(' & ',' and ',$storename);?>                   	

											 <li><a target="_blank" href="<?php echo $store_url;?>"> <?php echo $var_storename;?> (<?php echo $db->CountCouponsBySID($sstore_id);?>)</a> </li>

										<?php }?>                                        

                                    </ul>

                                </li>

                               

                            </ul>

                             <?php }else{

								foreach($az_ar as $val){

								$upp_val = strtoupper($val);

								$low_val = strtolower($val);

				

									  if($val == '0-9'){   

												$str = "storename REGEXP  '^[0-9.]'";

											}else{      

												$str = "(storename like '$upp_val%' or storename like '$low_val%' or storename like 'The $upp_val%' or storename like 'The $low_val%')";

											}

				

								$sql = "select store_id, storename, store_url from stores  where $str and ( status = '1' || status = '0' )limit 0,50";

								$res = $db->ExecuteQuery($sql);

								?>

                                <a name="<?=$low_val?>"></a>

                               <h3 class="stores-cat-header"><?=$upp_val?></h3>

                                <ul class="row stores-cat-body coupons-cat">                               

                                    

                                    <li class="col-sm-12">

                                        <ul><?php

                                             while(list($sstore_id,$storename,$store_url) = $db->FetchAsArray($res))   

											  {										    

											  $store_url = DOMAINVAR."/coupons/".$store_url;

											  $var_storename=str_replace(' & ',' and ',$storename);?>                   	

											 <li><a target="_blank" href="<?php echo $store_url;?>"> <?php echo $var_storename;?> (<?php echo $db->CountCouponsBySID($sstore_id);?>)</a> </li>

										<?php }?> 

                                        </ul>

                                    </li>

                                   

                                </ul>

                            <?php }}?>

                            

                        </div>

                    </section>

                </div>

            </div>



           <?php include("includes/footer.php");?>

           <?php include("includes/jscript.php");?>

 

  </body>

</html>