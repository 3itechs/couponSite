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
                        <h3 class="mb-40 t-uppercase text-center" style="font-weight:700; letter-spacing:1px;">View Deals by Categories</h3>
                        <div class="row">
                        <?php $c1 = '0';
                            $sqla = "select category_id, category ,category_url from categories where 1  and parent_id='0' order by category  ";
                            $resa = $db->ExecuteQuery($sqla);
                            while(list($category_id, $category ,$cat_url) = $db->FetchAsArray($resa)) { $c1++; ?>                            
                            <div class="col-sm-4 mb-4">
                                <div class="stores-cat panel mb-40 category-card shadow-sm" style="border-radius:16px; transition:transform 0.2s, box-shadow 0.2s;">
                                    <h3 class="stores-cat-header text-center" style="background:linear-gradient(90deg,#1e3c72,#2a5298);color:#ffd700;padding:18px 0;border-radius:16px 16px 0 0; font-size:1.3rem;">
                                        <a href="<?=DOMAINVAR?>/categories/<?=$cat_url?>" style="color:#ffd700; text-decoration:none; transition:color 0.2s;">
                                            <strong><?php echo $category;?></strong>
                                        </a>
                                    </h3>
                                    <ul class="stores-cat-body" style="padding:18px;">
                                        <li>
                                            <ul>
                                            <?php
                                                $sqlb = "select category_id, category ,category_url from categories where 1  and parent_id='$category_id' ";
                                                $resb = $db->ExecuteQuery($sqlb);
                                                while(list($category_id2, $category2 ,$cat_url2) = $db->FetchAsArray($resb)) {  ?>
                                                    <li style="margin-bottom:10px;">
                                                        <a href="<?=DOMAINVAR?>/categories/<?=$cat_url2?>" class="subcategory-link" style="color:#2a5298; font-weight:500; font-size:1.05rem; text-decoration:none; padding:6px 12px; border-radius:6px; transition:background 0.2s, color 0.2s;">
                                                            <?php echo $category2;?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
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
<style>
.category-card {
    background: #fff;
    box-shadow: 0 2px 16px rgba(30,60,114,0.08);
    border: none;
    position: relative;
    overflow: hidden;
}
.category-card:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 8px 32px rgba(30,60,114,0.18);
}
.stores-cat-header a:hover {
    color: #fff !important;
}
.subcategory-link:hover {
    background: linear-gradient(90deg,#1e3c72,#2a5298);
    color: #ffd700 !important;
    text-decoration: none;
}
@media (max-width: 767.98px) {
    .category-card {
        margin-bottom: 24px;
    }
    .stores-cat-header {
        font-size: 1.1rem;
        padding: 12px 0;
    }
}
</style>
<script>
document.querySelectorAll('.category-card').forEach(function(card){
    card.addEventListener('mouseenter',function(){
        card.style.boxShadow = '0 8px 32px rgba(30,60,114,0.18)';
    });
    card.addEventListener('mouseleave',function(){
        card.style.boxShadow = '0 2px 16px rgba(30,60,114,0.08)';
    });
});
</script>