<?php  include "includes/DB.php"; $metas = $db->getPageMetas(3); ?>
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

	<div class="page-container ptb-60">
                <div class="container">
                    <section class="stores-area stores-area-v2">
                        <h3 class="mb-40 t-uppercase">View Deals by Categories</h3>
                        <div class="row">
                       <?php $c1 = '0';
					  $sqla = "select category_id, category ,category_url from categories where 1  and parent_id='0' order by category  ";
						$resa = $db->ExecuteQuery($sqla);
						  while(list($category_id, $category ,$cat_url) = $db->FetchAsArray($resa))
							 { $c1++; ?>                            
                            <div class="col-sm-4">
	                        	<div class="stores-cat panel mb-40">
	                            	<h3 class="stores-cat-header"><a href="<?=DOMAINVAR?>/categories/<?=$cat_url?>"><strong><?php echo $category;?></strong></a></h3>
		                            <ul class="stores-cat-body">
		                                <li>
		                                    <ul>
                                             <?php
		   $sqlb = "select category_id, category ,category_url from categories where 1  and parent_id='$category_id' ";
				$resb = $db->ExecuteQuery($sqlb);
				 while(list($category_id2, $category2 ,$cat_url2) = $db->FetchAsArray($resb))
				   {  ?>
		                                        <li><a href="<?=DOMAINVAR?>/categories/<?=$cat_url2?>"><?php echo $category2;?></a></li><?php }?>		                                           </ul>
		                                </li>
		                            </ul>
		                        </div>
	                        </div>
	                        <?php }?>                           
	                        
                        </div>
                    </section>
                </div>
    </div>

	<?php include("includes/footer.php");?>
    <?php include("includes/jscript.php");?>
 
  </body>
</html>