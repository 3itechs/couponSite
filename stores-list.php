<?php  include "includes/DB.php"; $metas = $db->getPageMetas(2); 

if(isset($_REQUEST['ab']) && $_REQUEST['ab'] != '' ){ $ab = $_REQUEST['ab'];}

$az_ar = array("0-9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo $metas['meta_title'];?></title>
    <meta name="description" content="<?php echo $metas['meta_desc'];?>">
    <meta name="keywords" content="<?php echo $metas['meta_keywords'];?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo DOMAIN;?>/assets/images/favicon.png">
    <?php include("includes/styles.php"); include("includes/analytics.php");?>
    <script src="<?php echo DOMAIN;?>/assets/js/modernizr.js"></script>
    <style>
        .letters-toolbar {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 16px rgba(30,60,114,0.08);
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-bottom: 2.5rem;
        }
        .letters-toolbar span {
            margin: 4px 2px;
        }
        .letters-toolbar a {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 8px;
            background: linear-gradient(90deg,#1e3c72,#2a5298);
            color: #ffd700;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, transform 0.18s;
            box-shadow: 0 1px 4px rgba(30,60,114,0.06);
        }
        .letters-toolbar a:hover, .letters-toolbar .active {
            background: #ffd700;
            color: #1e3c72 !important;
            transform: translateY(-2px) scale(1.08);
        }
        .stores-cat {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(30,60,114,0.08);
            padding: 24px 18px 10px 18px;
            margin-bottom: 2.5rem;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .stores-cat:hover {
            box-shadow: 0 8px 32px rgba(30,60,114,0.18);
            transform: translateY(-4px) scale(1.01);
        }
        .stores-cat-header {
            background: linear-gradient(90deg,#1e3c72,#2a5298);
            color: #ffd700;
            padding: 14px 0 10px 0;
            border-radius: 12px 12px 0 0;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .stores-cat-body {
            padding: 0 0 10px 0;
            margin-bottom: 0;
        }
        .stores-cat-body ul {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
        .stores-cat-body li {
            margin-bottom: 8px;
        }
        .stores-cat-body a {
            color: #2a5298;
            font-weight: 500;
            font-size: 1.05rem;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
            display: inline-block;
        }
        .stores-cat-body a:hover {
            background: linear-gradient(90deg,#1e3c72,#2a5298);
            color: #ffd700 !important;
            text-decoration: none;
        }
        .mb-40 { margin-bottom: 2.5rem !important; }
        .ptb-60 { padding: 60px 0; }
        @media (max-width: 767.98px) {
            .stores-cat { padding: 16px 8px 8px 8px; }
            .stores-cat-header { font-size: 1rem; padding: 10px 0 7px 0; }
            .ptb-60 { padding: 32px 0; }
        }
    </style>
</head>
<body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php include("includes/header.php");?>

    <div class="page-container ptb-60">
        <div class="container">
            <section class="stores-area stores-area-v2">
                <h3 class="mb-40 t-uppercase text-center" style="font-weight:700; letter-spacing:1px;">View Deals by Stores</h3>
                <div class="letters-toolbar p-10 panel mb-40">
                    <span class="all-stores"><a href="#" class="active">All stores</a></span>
                    <?php foreach($az_ar as $letter): ?>
                        <span>
                            <a href="<?php echo DOMAIN;?>/stores.html#<?php echo $letter; ?>"><?php echo strtoupper($letter); ?></a>
                        </span>
                    <?php endforeach; ?>
                </div>
                <div class="stores-cat panel mb-40">
                    <?php if($ab != ''){
                        $upp_val = strtoupper($ab);
                        $low_val = strtolower($ab);
                        if($val == '0-9'){ 
                            $str = "storename REGEXP  '^([0-9.])'";
                        }else{ 
                            $str = "storename REGEXP  '^($upp_val|$low_val|The $upp_val|The $low_val)'";
                        }
                        $sql = "select store_id, storename, store_url from stores  where $str and ( status = '1' || status = '0' ) ";
                        $res = $db->ExecuteQuery($sql);
                    ?>
                    <a name="<?=$low_val?>"></a>
                    <h3 class="stores-cat-header"><?=$upp_val?></h3>
                    <ul class="row stores-cat-body coupons-cat">                               
                        <li class="col-sm-12">
                            <ul>
                                <?php while(list($sstore_id,$storename,$store_url) = $db->FetchAsArray($res)) { 
                                    $store_url = DOMAINVAR."/coupons/".$store_url;
                                    $var_storename=str_replace(' & ',' and ',$storename);?>                   	
                                    <li>
                                        <a target="_blank" href="<?php echo $store_url;?>">
                                            <?php echo $var_storename;?> (<?php echo $db->CountCouponsBySID($sstore_id);?>)
                                        </a>
                                    </li>
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
                            <ul>
                                <?php while(list($sstore_id,$storename,$store_url) = $db->FetchAsArray($res)) { 
                                    $store_url = DOMAINVAR."/coupons/".$store_url;
                                    $var_storename=str_replace(' & ',' and ',$storename);?>                   	
                                    <li>
                                        <a target="_blank" href="<?php echo $store_url;?>">
                                            <?php echo $var_storename;?> (<?php echo $db->CountCouponsBySID($sstore_id);?>)
                                        </a>
                                    </li>
                                <?php }?> 
                            </ul>
                        </li>
                    </ul>
                    <?php }}?>
                </div>
            </section>
        </div>
    </div>

    <script>
    // Simple animation for store cards on hover
    document.querySelectorAll('.stores-cat').forEach(function(card){
        card.addEventListener('mouseenter',function(){
            card.style.boxShadow = '0 8px 32px rgba(30,60,114,0.18)';
            card.style.transform = 'translateY(-4px) scale(1.01)';
        });
        card.addEventListener('mouseleave',function(){
            card.style.boxShadow = '0 2px 16px rgba(30,60,114,0.08)';
            card.style.transform = 'none';
        });
    });
    </script>

    <?php include("includes/footer.php");?>