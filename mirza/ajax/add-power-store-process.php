<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();

$site_name = SITE_NAME;  
$site_name_str = SITE_NAME_STR; 

function extract_numbers($string)
			{
			   preg_match_all('/([\d]+)/', $string, $match);			
			   $myar =  $match[0];
				return $myar[0];
			}
							
$cdesc1 = array("Shop from the [store_name] and get attractive discounts! ",
"Enjoy great savings at [store_name] for today only when you apply [store_name] Coupons ",
"Store-wide sale at [store_name] for a limited time. Savings you can see ",
"Great deal, excellent savings at [store_name] ",
"Use [store_name] Coupons, save huge on your order. Please Check-Out ",
"Check out Promos &amp; Deals at [store_name] today! ",
"Shop at [store_name] and enjoy big savings with [Thumbnail_Offer] ",
"It's time to shop at [store_name]! Seasonal sale for an extended time only. ",
"Check out new markdowns and save big today with [store_name] Coupons. ",
"Apply [store_name] Coupons to get [Thumbnail_Offer] instantly. ",
"Choose your favorite items and apply [store_name] Coupons! ",
"Click through to enjoy amazing savings with [store_name] Coupons. ",
"Use [store_name] Coupons before it expires, so act as soon as possible ",
"Apply [store_name] Coupons to get discount on your favorite products. ",
"Grab this awesome deal while ordering from [store_name]. ",
"Choose your favorite items from [store_name] with this great [Thumbnail_Offer] ",
"Save big by using [store_name] Coupons. Get yours now! ",
"Grab up your favorite items at [store_name] before this great sale ends. ",
"Shop at [store_name] and enjoy big savings! ",
"Get great deals with the special offers of [store_name]. ", 
"Click and get this deal from [store_name]. ",
"Save money with [Thumbnail_Offer] at [store_name]! Make them yours now! ",
"Treat yourself to huge savings with [store_name] Coupons! ",
"Looking for the hottest deals going on right now at [store_name]. ", 
"Buy through [store_name] and grab this great deal! ",
"Check out Promos &amp; Deals at [store_name] today! ",
"Click and get this deal from [store_name]. ", 
"Don't miss this great deal from [store_name]. ", 
"Want to save more? Use our [store_name] Coupons. ", 
"Shop Now! Find amazing discounts at [store_name]. ",
"You immediately need to use [store_name] Coupons right now to enjoy great savings. ", 
"Spend less on select items when you use [store_name] Coupons. It is a great time to buy. ",
"Enjoy incredible discounts from [store_name] on all your favorite items. ",
"Check out this amazing deal and save huge on your purchase with [store_name] Coupons today. ",
"Act quickly before the deal is gone at [store_name]! This price is at its lowest ever. ",
"Shop and save money with this awesome deal from [store_name]. ",
"Choose your favorite items and apply [store_name] Coupons! ",
"Use [store_name] Coupons and save money at [store_name]. ",
"Spend much less on products your are craving for, when you shop at [store_name]. For a limited time only. ",
"Great bargains at [store_name], come check it out! Groundbreaking bargain for only a limited period. " );
$cdesc2 = array(
"Bargains at these amazingly low prices won't last long!",
"If you've been eyeing it for a while, now is the time to buy.",
"Apply [store_name] Coupons. Thank you for always choosing [store_name]",
"Amazing deals like this don't appear everyday.",
"These deals won't last, so make the purchase today.",
"At [store_name], it is currently at its best price ever.",
"Big savings while they last!",
"Order yours now and take advantage of this deal!",
"Check out now before this deal expires!",
"Shopping for all seasons and all the different reasons.",
"Once you miss it, you will always regret it.",
"Trust us when we say right now is the best time to buy.",
"Exclusions may apply.",
"A great place to be if you want a bargain.",
"Created with your shopping experience in mind.",
"Check-out to close your deal at [store_name].",
"Prices vary daily, so take action now.",
"This sale is hard to come by and will end soon.",
"Don't wait to snatch up your savings.",
"Best sellers will be the first to go.",
"Stack coupons for maximum savings.",
"Exclusive offers only for you.",
"Click through to shop.",
"Guaranteed to make your heart beat with these deals.",
"What are you waiting for?",
"Created with your shopping experience in mind.",
"Take action and make an excellent deal now.",
"Remember to check out.",
"Shopping rediscovered when you shop with [site_name_str]",
"Sensational deals that you can only find [site_name]",
"Your saving partner, [site_name]");
$offers = array("5%", "10%", "15%", "16%", "17%", "18%", "20%", "25%", "30%", "35%", "40%", "$5", "$7", "$8", "$10", "$12", "$13", "$15", "$16", "$17", "$18", "$20", "$22", "$23", "$25", "$27", "$30", "$32", "$33", "$35", "$39", "$40", "$42", "$45", "$47", "$50", "$55");		
$dealncode = array("Deal","Deal","Deal","Code");
$starter = array("Save", "Get", "Receive", "Save upto", "Upto", "Get an extra", "Enjoy", "Avail", "Savings", "Save Big", "Money Saving offer", "Save an extra", "Take", "Take an extra");
function random_codes( $length = 6 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $codes = substr( str_shuffle( $chars ), 0, $length );
	$dig = rand(1,19)*5;
    return $codes.$dig;
}

$num0 = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20" );
$num1 = array( "50", "80", "25", "30", "45", "40", "60", "55", "35");
$num2 = array("25", "35", "50", "60", "55", "40", "30", "28", "22", "32", "36" );
$num3 = array("100", "110", "115", "120", "125", "130", "135", "140", "150", "160", "165", "170", "175", "180", "185", "195", "200", "220", "225", "230", "235", "245", "250", "265", "300", "315", "320", "325", "340", "350", "360", "400", "450", "500" ); 
$coupons = array("[currency][num] discount on [product]", "[currency][num] discount on Clearance items", "[currency][num] discount on sale items", "[currency][num] discount on selected items", "[currency][num] off", "[currency][num] off [currency][num1]", "[currency][num] off [currency][num1] at [store_name]", "[currency][num] off on [product]", "[currency][num] off on all orders", "[currency][num] off sitewide", "[currency][num2] off [currency][num3]", "[currency][num2] off [currency][num3] at [store_name]", "[num]% discount on [product]", "[num]% discount on Clearance items", "[num]% discount on sale items", "[num]% discount on selected items", "[num]% off", "[num]% off [currency][num3]", "[num]% off [currency][num3] at [store_name]", "[num]% off on [product]", "[num]% off on all orders", "[num]% off sitewide", "[starter] [currency][num] discount on [product]", "[starter] [currency][num] discount on Clearance items", "[starter] [currency][num] discount on Sale items", "[starter] [currency][num] discount on selected items", "[starter] [currency][num] off", "[starter] [currency][num] off [currency][num1] at [store_name]", "[starter] [currency][num] off on [product]", "[starter] [currency][num] off on all orders", "[starter] [currency][num] off sitewide", "[starter] [currency][num2] off [currency][num3] at [store_name]", "[starter] [num]% discount on [product]", "[starter] [num]% discount on Clearance items", "[starter] [num]% discount on sale items", "[starter] [num]% discount on selected items", "[starter] [num]% off", "[starter] [num]% off [currency][num3] at [store_name]", "[starter] [num]% off discount", "[starter] [num]% off on [product]", "[starter] [num]% off on all orders", "[starter] [num]% off sitewide", "Buy 2 get one", "Buy 2 get one on all oders", "Buy one get one", "Buy one get one on [product]", "Buy one get one on all orders", "Flat rate shipping [currency][num]", "Free delivery offer", "Free delivery on [product]", "Free delivery on all orders", "Free delivery on selected items", "Free shipping offer", "Free shipping on [product]", "Free shipping on all orders", "Free shipping on selected items", "Free shipping Site wide", "Take [currency][num] Off on [product] w/ Discount Code", "Take [currency][num] Off w/ Discount Code", "Take [num]% Off on [product] w/ Discount Code", "Take [num]% Off w/ Discount Code"); 

if(isset($_POST['storename']))
    {   
	 
        $storename = addslashes(trim($_POST['storename']));
        $store_title = addslashes(trim($_POST['store_title']));		
		$store_url = str_replace(" ","-",strtolower($_POST['storename']));
		$store_products = addslashes(trim($_POST['store_products']));		
		
		$network_id = $_POST['network_id'];		  
		$web_address = addslashes($_POST['web_address']);
		$primary_category = $_POST['primary_category'];
		$child_category = $_POST['child_category'];
		$country_id = $_POST['country_id'];
		$tracking_link = addslashes($_POST['web_address']);
		$imp_code = addslashes($_POST['imp_code']); 
		//$store_desc = addslashes($_POST['store_desc']);
		$more_about_desc = addslashes($_POST['more_about_desc']);			
		$trademark_keywords = addslashes($_POST['trademark_keywords']);
		$network_store_id = $_POST['network_store_id'];
		$network_store_name = addslashes($_POST['network_store_name']);
		$status = $_POST['status'];
		$top = $_POST['top'];
		$feature = $_POST['feature'];		
		$store_logo = $_POST['store_logo'];
		$store_thumbnail = $_POST['store_thumbnail'];	
		$coupons_limit = $_POST['coupons_limit'];
		$rating_number = rand(15,30);   
		$total_points = rand(35,75);
				
		if(isset($_POST['top']) && $top != ''){$top = $_POST['top'];}else{$top = '0';}	
		if(isset($_POST['feature']) && $feature != ''){$feature = $_POST['feature'];}else{$feature = '0';}						
			
		if($_FILES["store_logo"]["name"] != '')
		  {
			$tmp_img = str_replace(" ","-",$_FILES["store_logo"]["name"]);
			$uploaddir = IMGPATH.'/stores/';
			$uploadfile = $uploaddir.$tmp_img;
			move_uploaded_file($_FILES['store_logo']['tmp_name'], $uploadfile);		
		
			//$imagePath = $uploaddir.$tmp_img;   $destPath  = $uploaddir.$tmp_img;					
		    //$db->resizeImage($imagePath,$destPath,SLOGO_WIDTH,SLOGO_HEIGHT,100); 
			 // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
			
						
	    if($_FILES["store_thumbnail"]["name"] != '')
		  {
			$tmp_thumb = str_replace(" ","-",$_FILES["store_thumbnail"]["name"]);
			$uploaddir = IMGPATH.'/thumbs/';
			$uploadfile = $uploaddir.$tmp_thumb;
			move_uploaded_file($_FILES['store_thumbnail']['tmp_name'], $uploadfile);
				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		   // $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100);  // resizeImage(imgPath,destPath,width,height,qualitiy)
			
			}
	
	$product_arr = explode(",",$store_products);

		 if( count($product_arr) > 0){		   
		        $sproducts = $store_products." & more"; 
		    }else{
			    $store_products = ''; 
				$sproducts = "its products";
				}		

$average_savings = rand(3,15);	

if($country_id == '19'){ $scurrency = '£';}elseif($country_id == '20'){$scurrency = '$';}else{ $scurrency = '€';}	
		  
$storedesc = $storename." has currently ".$coupons_limit." deals &amp; coupons on ". $site_name." that will help you to get discounts you wouldn’t have imagined. ".$storename.". offers the best prices on ".remove_special($sproducts).". ".$storename." Coupon will help you save an average of ".$scurrency.$average_savings.". For more savings and discounts, please visit the official online store of ".$storename ; 
 $store_desc2  = addslashes($storedesc);
 
  $store_offer = $offers[array_rand($offers)];   
  
  $meta_title2 = $store_offer." Off ".$storename." Coupons &amp; Promo Codes | [fmonth], [year]";
  $meta_title = addslashes($meta_title2);
  $meta_desc2 = "Save ".$store_offer." on average when using updated ".$storename." coupons &amp; promo codes for [fmonth], [year]: The promo codes for ".$storename." are verified daily. Don't forget to check all the coupons and discount deals";
  $meta_desc = addslashes($meta_desc2);
  
  $meta_kwd2 = $storename." coupon codes, code, discounts, coupons, promotional, promo, promotion, deal";	
  $meta_keywords = addslashes($meta_kwd2);  	


$sql = "Insert into stores 
(storename, store_logo, store_products, average_savings, currency, store_thumbnail, store_title, store_url, network_id, web_address, primary_category, child_category, country, tracking_link, imp_code, store_desc, more_about_desc, trademark_keywords, network_store_id, network_store_name, status, top, feature,meta_title, meta_keywords, meta_desc, rating_number, total_points, added_date, edited_date,added_by )Values 
('$storename', '$tmp_img', '$store_products', '$average_savings', '$scurrency', '$tmp_thumb','$store_title', '$store_url', '$network_id', '$web_address', '$primary_category', '$child_category', '$country_id', '$tracking_link','$imp_code','$store_desc2', '$more_about_desc', '$trademark_keywords','$network_store_id', '$network_store_name','1','$top','$feature','$meta_title','$meta_keywords','$meta_desc', '$rating_number', '$total_points', now(), now(),'".$_COOKIE['admin_username']."')";	  
$rs_store = $db->ExecuteQuery($sql);	 	
$new_sid = $db->getLastInsertId();
 	 
   
 for ($x = 1; $x <= $coupons_limit; $x++) { 
		   
		              $deal_code = $dealncode[array_rand($dealncode)];
		             
					  if($deal_code == "Deal"){ $coupon_type = 'Deal'; $code = '';					  
					                          } else{
												     $coupon_type = 'Code'; 
													// $code = $codes[array_rand($codes)];
													   $code = strtoupper(random_codes(8));
													 }
						
//if($country == '3'){ $scurrency = '£'; }elseif($scurrency == '2'){$scurrency = '€';}else{$scurrency = '$';}							 
  if( count($product_arr) > 0){
		   $product = ucfirst(strtolower($product_arr[array_rand($product_arr)]));
	 }else{
		   $product ="on selected products";
		 }
			
			   $newcoupon =  str_replace("[product]",$product, str_replace("[store_name]",$storename, str_replace("[currency]",$scurrency,str_replace("[starter]",$starter[array_rand($starter)],str_replace("[num]",$num0[array_rand($num0)],str_replace("[num1]",$num1[array_rand($num1)],str_replace("[num2]",$num2[array_rand($num2)],str_replace("[num3]",$num3[array_rand($num3)],$coupons[$x]))))))));

$currency = '';   $dollar_off = '';   $percent_off = '';

 $coupon_num = extract_numbers($newcoupon);
 $dollar = "$".$coupon_num;
 $pound = "£".$coupon_num;
 $euro = "€".$coupon_num;  
 $percent = $coupon_num."%";
 
 
if (strpos($newcoupon, $dollar) !== false) {	
          $currency = '$';
		  $discount_type = 2;
		  $ctype = '2';
		  $dollar_off = $coupon_num; 
		  $discount_value = $coupon_num;	
    }elseif(strpos($newcoupon, $pound) !== false){	
		     $currency = '£';
			 $discount_type = 4;
			 $ctype = '2';
			 $dollar_off = $coupon_num;
			 $discount_value = $coupon_num;
	     }elseif(strpos($newcoupon, $euro) !== false){	
		       $currency = '€';
			   $discount_type = 3;
			   $ctype = '2';
			   $dollar_off = $coupon_num;
			   $discount_value = $coupon_num;	
		    }elseif(strpos($newcoupon, $percent) !== false){			
		        $currency = ' ';
				$discount_type = 1;
				$ctype = '1';
				$percent_off = $coupon_num;
				$discount_value = $coupon_num;
			}
						
if($dollar_off != ''){ $thumb_offer = $currency.$dollar_off. " Off"; }elseif($percent_off != ''){$thumb_offer = $percent_off. "% Off";}else{$thumb_offer = "big deal";}			
			
$coupon_desc2 = ucfirst(strtolower($cdesc1[array_rand($cdesc1)])).ucfirst(strtolower($cdesc2[array_rand($cdesc2)]));
$coupon_desc =  addslashes(str_replace("[thumbnail_offer]",$thumb_offer, str_replace("[store_name]",$storename, str_replace("[site_name]",$site_name, str_replace("[site_name_str]",$site_name_str, $coupon_desc2) ))));

$votey = rand(10,16); 	$voten = rand(4,9);			

	if($newcoupon != ''){					
		$insert_coupon = "INSERT INTO coupons (couponname, coupon_desc, discount_type, discount_value, percent_off, dollar_off, ctype, currency, store_id, tracking_link, coupon_type, coupon_code, votey, voten, status, start_date, added_date) VALUES ('$newcoupon', '$coupon_desc', '$discount_type', '$discount_value', '$percent_off', '$dollar_off', '$ctype', '$currency', '$new_sid', '$tracking_link', '$coupon_type', '$code', '$votey', '$voten', '1', now(), now())";  // die($insert_coupon); 
	$rs_insert = $db->ExecuteQuery($insert_coupon);
	 }		
}

	header("location: ../stores.php?a=1"); 	exit;
	} header("location: ../stores.php?a=2"); 	exit;	 
?>
