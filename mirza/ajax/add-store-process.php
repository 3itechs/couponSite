<?php session_start();
//include("../resize-class.php");
include "../includes/DB.php";
$db= new DB(); 

if(isset($_POST['storename']))
    {   
	   // print_r($_REQUEST);  
        $storename = addslashes(trim($_POST['storename']));
        $store_heading = addslashes(trim($_POST['store_heading']));		
		$store_url =  trim(preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', $storename)), '-'); 
		$store_products = addslashes(trim($_POST['store_products']));
		$network_id = $_POST['network_id'];		  
		$web_address = addslashes($_POST['web_address']);
		$primary_category = $_POST['primary_category'];
		$child_category = $_POST['child_category'];
		$country_id = $_POST['country_id'];
		$tracking_slink = addslashes($_POST['tracking_slink']);
		$imp_code = addslashes($_POST['imp_code']); 
		$store_desc = addslashes(remove_special($_POST['store_desc']));
		$more_about_desc = addslashes(remove_special($_POST['more_about_desc']));			
		$trademark_keywords = addslashes($_POST['trademark_keywords']);
		$network_store_id = $_POST['network_store_id'];
		$network_store_name = addslashes($_POST['network_store_name']);
		$status = $_POST['status'];
		$top = $_POST['top'];
		$feature = $_POST['feature'];		
		$meta_title = addslashes(remove_special($_POST['meta_title']));         
		$meta_keywords = addslashes(remove_special($_POST['meta_keywords']));
		$meta_desc = addslashes(remove_special($_POST['meta_desc']));
		$address = addslashes(remove_special($_POST['address']));
		$phone = addslashes(remove_special($_POST['phone']));
		$email = addslashes(remove_special($_POST['email']));
		$shipping_policy = addslashes(remove_special($_POST['shipping_policy']));
		$wikipedia = addslashes(remove_special($_POST['wikipedia']));
		$bbb = addslashes(remove_special($_POST['bbb']));
		$store_blog = addslashes(remove_special($_POST['store_blog']));
		$facebook = addslashes(remove_special($_POST['facebook']));
		$twitter = addslashes(remove_special($_POST['twitter']));
		$youtube = addslashes(remove_special($_POST['youtube']));
		$instagram = addslashes(remove_special($_POST['instagram']));				
		$store_logo = $_POST['store_logo'];
		$store_thumbnail = $_POST['store_thumbnail'];
		$store_thumbnail_alt = addslashes($_POST['store_thumbnail_alt']);			
		$other_categories = $_POST['other_categories'];
		
		$store_video1 = $_POST['store_video1'];
		$store_video2 = $_POST['store_video2'];
		$store_video3 = $_POST['store_video3'];
		$store_video4 = $_POST['store_video4'];		
		
		
		 $rating_number = rand(15,30);   
		 $total_points = rand(35,75); 
	   	
		if(isset($_POST['top']) && $top != ''){$top = $_POST['top'];}else{$top = '0';}	
		if(isset($_POST['feature']) && $feature != ''){$feature = $_POST['feature'];}else{$feature = '0';}						
			
		if($_FILES["store_logo"]["name"] != '')
		  {
			$tmp_img = str_replace(" ","-",$_FILES["store_logo"]["name"]);
			$uploaddir = SLOGO_UPLOADER;
			$uploadfile = $uploaddir.$tmp_img;
			move_uploaded_file($_FILES['store_logo']['tmp_name'], $uploadfile);		
		
		//	$imagePath = $uploaddir.$tmp_img;   $destPath  = $uploaddir.$tmp_img;					
		  //  $db->resizeImage($imagePath,$destPath,SLOGO_WIDTH,SLOGO_HEIGHT,100); 
			 // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
			
						
	    if($_FILES["store_thumbnail"]["name"] != '')
		  {
			$tmp_thumb = str_replace(" ","-",$_FILES["store_thumbnail"]["name"]);
			$uploaddir = THUMB_UPLOADER;
			$uploadfile = $uploaddir.$tmp_thumb;
			move_uploaded_file($_FILES['store_thumbnail']['tmp_name'], $uploadfile);
				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		  //  $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100);  // resizeImage(imgPath,destPath,width,height,qualitiy)
			
			}
			 
$offers1 = array("5%", "10%", "15%", "16%", "17%", "18%", "20%", "25%", "30%", "35%", "40%", "$5", "$7", "$8", "$10", "$12", "$13", "$15", "$16", "$17", "$18", "$20", "$22", "$23", "$25", "$27", "$30", "$32", "$33", "$35", "$39", "$40", "$42", "$45", "$47", "$50", "$55");

$offers2 = array("5%", "10%", "15%", "16%", "17%", "18%", "20%", "25%", "30%", "35%", "40%", "£5", "£7", "£8", "£10", "£12", "£13", "£15", "£16", "£17", "£18", "£20", "£22", "£23", "£25", "£27", "£30", "£32", "£33", "£35", "£39", "£40", "£42", "£45", "£47", "£50", "£55");

$offers3 = array("5%", "10%", "15%", "16%", "17%", "18%", "20%", "25%", "30%", "35%", "40%", "€5", "€7", "€8", "€10", "€12", "€13", "€15", "€16", "€17", "€18", "€20", "€22", "€23", "€25", "€27", "€30", "€32", "€33", "€35", "€39", "€40", "€42", "€45", "€47", "€50", "€55");

if($country_id == '19'){ $scurrency = '£';  $store_offer = $offers2[array_rand($offers2)];
		                     }elseif($country_id == '20'){$scurrency = '$';  $store_offer = $offers1[array_rand($offers1)];
							 }else{ $scurrency = '€'; $store_offer = $offers3[array_rand($offers3)]; }
							 
$av_saving = rand(3,15);	
		  
$store_desc2 = $storename." has currently ".$number_of_coupons." deals & coupons on ".SITE_NAME." that will help you to get discounts you wouldn’t have imagined. ".$storename.". offers the best prices on ".remove_special($store_products).". ".$storename." Coupon will help you save an average of ".$scurrency.$av_saving.". For more savings and discounts, please visit the official online store of ".$storename ;   
  
  $meta_title2 = $store_offer." Off ".$storename." Coupons & Promo Codes | [fmonth], [year]";   
  
  $meta_desc2 = "Save ".$store_offer." on average when using updated ".$storename." coupons & promo codes for [fmonth], [year]: The promo codes for ".$storename." are verified daily. Don't forget to check all the coupons and discount deals";   
  
  $meta_kwd2 = $storename." coupon codes, code, discounts, coupons, promotional, promo, promotion, deal";	
   
  if($store_desc != ''){$store_desc = $store_desc;}else{$store_desc = addslashes(remove_special($store_desc2)) ;}
   if($meta_title != ''){$meta_title = $meta_title;}else{$meta_title = addslashes(remove_special($meta_title2)) ;}
      if($meta_desc != ''){$meta_desc = $meta_desc;}else{$meta_desc = addslashes(remove_special($meta_desc2)) ;}
	     if($meta_keywords != ''){$meta_keywords = $meta_keywords;}else{$meta_keywords = addslashes(remove_special($meta_kwd2)) ;}
  
 	
$sql = "Insert into stores 
(storename, store_products, store_logo, store_thumbnail, store_thumbnail_alt, store_heading, store_url, network_id, web_address, primary_category, child_category, country, tracking_link, imp_code, store_desc, more_about_desc, trademark_keywords, network_store_id, network_store_name, status, top, feature,meta_title, meta_keywords, meta_desc, address, phone, email, shipping_policy, wikipedia, bbb, facebook, twitter, youtube, instagram, rating_number, total_points, store_video1, store_video2, store_video3, store_video4, added_date, edited_date, added_by )Values 
('$storename', '$store_products', '$tmp_img', '$tmp_thumb', '$store_thumbnail_alt', '$store_heading', '$store_url', '$network_id', '$web_address', '$primary_category', '$child_category', '$country_id', '$tracking_slink','$imp_code','$store_desc', '$more_about_desc', '$trademark_keywords','$network_store_id', '$network_store_name','$status','$top','$feature','$meta_title','$meta_keywords','$meta_desc', '$address' , '$phone', '$email', '$shipping_policy', '$wikipedia', '$bbb', '$facebook', '$twitter', '$youtube', '$instagram', '$rating_number', '$total_points', '$store_video1', '$store_video2', '$store_video3', '$store_video4', now(), now(),'".$_COOKIE['admin_name']."')";	 
	 	$rs_store=$db->ExecuteQuery($sql);   //die($sql);	 	
		$new_sid = $db->getLastInsertId();

 if($new_sid > 0){  $db->userLog($_COOKIE['adminname'],$new_sid,'store','add',"Added a new store $storename having ID '$new_sid' "); }
  
   if(isset($_POST['other_categories'])){
     $sql_del = "delete from store_keywords where store_id = $new_sid ";	 					 
	  $rs_del = $db->ExecuteQuery($sql_del);	
      $kwds = $_POST['other_categories'];  
	     foreach ($kwds as $key => $value)
	             {   
		         $kwdid = trim($value); 
						 $insert2 = "INSERT INTO store_keywords (keyword_id,store_id,date_added) VALUES ('$kwdid', '$new_sid', '$date_added')";						 
				         $rs_insert = $db->ExecuteQuery($insert2);						
		         }					
	      }	
		 
	
	    /*$couponname_ar       = $_POST['couponname'];
		$coupon_code_ar      = $_POST['coupon_code'];
		$tracking_link_ar       = $_POST['tracking_link']; 
		$coupon_desc_ar  = $_POST['coupon_desc'];
		$expsdate_ar           = $_POST['exp-sdate'];		
		$expedate_ar       = $_POST['exp-edate'];
		
		$discount_type_ar         = $_POST['discount_type'];		
		$discount_value_ar         = $_POST['discount_value'];
		$coupon_type_ar         = $_POST['coupon_type'];
		
		foreach( $couponname_ar as $key => $cn ) {  
						
			 $couponname = addslashes(trim($couponname_ar[$key])); 
			 $coupon_code = addslashes(trim($coupon_code_ar[$key])); 
			 $tracking_link = addslashes(trim($tracking_link_ar[$key])); 
			 $coupon_desc = addslashes(trim($coupon_desc_ar[$key]));	
			 $stdate1 = $expsdate_ar[$key];
			 $exdate1 = $expedate_ar[$key];
			 $ctype = $ctype_ar[$key];
					
			 $discount_type = $discount_type_ar[$key];
			 $discount_value = $discount_value_ar[$key];
			 $coupon_type = $coupon_type_ar[$key]; 
									 
					 $votey = rand(10,16); 	$voten = rand(4,9);
					 
		       if( $stdate1 != '' ) {                                            
									  $stdate1_ar = explode("/",$stdate1);
									  $stdate =  $stdate1_ar[2]."-".$stdate1_ar[1]."-".$stdate1_ar[0];										                                     }
									  
			   if( $exdate1 != '' ) {                                            
									  $exdate1_ar = explode("/",$exdate1);
									  $exdate =  $exdate1_ar[2]."-".$exdate1_ar[1]."-".$exdate1_ar[0];										                                     }else{										  
										  $exdate = '0000-00-00';
										  }
										 
		
			
$sql = "Insert into coupons 
(couponname,  coupon_desc, tracking_link, imp_code, coupon_code, insert_type, coupon_type, discount_type, discount_value, store_id, status, primary_category, added_date, start_date, exp_date, exclusive, sitewide, feature, top, brand, votey, voten )Values 
('$couponname', '$coupon_desc', '$tracking_link', '$imp_code', '$coupon_code', 'manual', '$coupon_type','$discount_type','$discount_value', '$new_sid', 'ENA', '$primary_category', now(), '$stdate', '$exdate', '$exclusive', '$sitewide', '$feature' , '$top', '$brand', '$votey', '$voten')"; 
  //echo $sql;
	$rowsCoupons = $db->ExecuteQuery($sql);
	$new_cid = $db->getLastInsertId();

if($new_cid > 0){ $db->userLog($_COOKIE['adminname'],$new_sid,'coupon','add',"Add a Coupon of ".$new_sid." having ID '$new_cid' "); 	   }
		}*/	  
		  		  						
		header("location: ../stores.php?a=1"); 	exit;
	} header("location: ../stores.php?a=2"); 	exit;	 
?>
