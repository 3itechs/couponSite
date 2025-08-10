<?php session_start();
include "../includes/DB.php";
$db= new DB(); 

  $store_id = $db->getStoreIDFromStoreName($_POST['storename']);

   if(isset($_POST['couponname']))
       {
        $couponname = addslashes(trim($_POST['couponname']));
		$discount_title = addslashes(trim($_POST['discount_title']));
        $coupon_desc = addslashes($_POST['coupon_desc']);
		$tracking_link = addslashes($_POST['tracking_link']);		  
		$imp_code = addslashes($_POST['imp_code']);
		$coupon_code = $_POST['coupon_code'];
		$coupon_type = $_POST['coupon_type'];
		$status = addslashes($_POST['status']);
		if($_POST['primary_category'] != ''){$primary_category = $_POST['primary_category'];}else{$primary_category = '0';}
		if($_POST['ctype'] == 1){$ctype = $_POST['ctype'];}else{$ctype = '0';}
		$insert_type = 'manual';
		$votey = rand(10,16); 	$voten = rand(4,9); 	
	
		
		if(!empty($_POST["exp-sdate"]) || !empty($_POST["exp-sdate"]) ) {                                            
											$adsdate = $_POST['exp-sdate'];											
											$adsdate_ar = explode("/",$adsdate);
											$start_date =  $adsdate_ar[2]."-".$adsdate_ar[1]."-".$adsdate_ar[0];                                            
										 }
										 
		if($_POST["never_exp"] == 1){
		   $ad_edate = '0000-00-00';
		}else{
		
		if(!empty($_POST["exp-edate"]) || !empty($_POST["exp-edate"]) ) {                                            
											$adedate = $_POST['exp-edate'];											
											$adedate_ar = explode("/",$adedate);
											$exp_date =  $adedate_ar[2]."-".$adedate_ar[1]."-".$adedate_ar[0];                                            
										 }
										 
										 
		}
										 
										 
				
		if($_POST['exclusive'] == 1){$exclusive = $_POST['exclusive'];}else{$exclusive = '0';}	
		 if($_POST['sitewide'] == 1){$sitewide = $_POST['sitewide'];}else{$sitewide = '0';}
		   if($_POST['feature'] == 1){$feature = $_POST['feature'];}else{$feature = '0';}
		     if($_POST['top'] == 1){$top = $_POST['top'];}else{$top = '0';}
			   if($_POST['brand'] == 1){$brand = $_POST['brand'];}else{$brand = '0';}						
		
		 if($_FILES["product_image"]["name"] != '')
		  {
			$tmp_coupon_img = str_replace(" ","-",$_FILES["product_image"]["name"]);
			$uploaddir = IMGPATH.'/brands/';
			$uploadfile = $uploaddir.$tmp_coupon_img;
			move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadfile);
			
			//$imagePath = $uploaddir.$tmp_coupon_img;   $destPath  = $uploaddir.$tmp_coupon_img;					
		    //$db->resizeImage($imagePath,$destPath,COUPON_BGIMG_WIDTH,COUPON_BGIMG_HEIGHT,100);  
			// resizeImage(imgPath,destPath,width,height,qualitiy)
		     
			} 	
					
	    if($_FILES["discount_image"]["name"] != '')
		  {
			$tmp_discount_img = str_replace(" ","-",$_FILES["discount_image"]["name"]);
			$uploaddir = IMGPATH.'/coupons/';
			$uploadfile = $uploaddir.$tmp_discount_img;
			move_uploaded_file($_FILES['discount_image']['tmp_name'], $uploadfile);
			
			//$imagePath = $uploaddir.$tmp_discount_img;   $destPath  = $uploaddir.$tmp_discount_img;					
		   // $db->resizeImage($imagePath,$destPath,COUPON_DISCOUNT_WIDTH,COUPON_DISCOUNT_HEIGHT,100);  
			// resizeImage(imgPath,destPath,width,height,qualitiy)
		     
			} 
	
		
if($_REQUEST['discount_type'] != ''){ $discount_type = $_REQUEST['discount_type'];}else{ $discount_type = '';}
  if($_REQUEST['discount_value'] != ''){ $discount_value = $_REQUEST['discount_value'];}else{ $discount_value = '';}  
   if($_REQUEST['coupon_type'] != ''){ $coupon_type = $_REQUEST['coupon_type'];}else{ $coupon_type = '';}

 $sql = "Insert into coupons 
(couponname, discount_title, coupon_image, discount_image, coupon_desc, tracking_link, imp_code, coupon_code, insert_type, ctype, coupon_type, discount_type, discount_value, store_id, status, primary_category, added_date, start_date, exp_date, exclusive, sitewide, feature, top, brand, votey, voten )Values 
('$couponname', '$discount_title', '$tmp_coupon_img', '$tmp_discount_img', '$coupon_desc', '$tracking_link', '$imp_code', '$coupon_code', '$insert_type', '$ctype', '$coupon_type', '$discount_type', '$discount_value', '$store_id', '$status', '$primary_category', now(), '$start_date', '$exp_date', '$exclusive', '$sitewide', '$feature' , '$top', '$brand', '$votey', '$voten')"; 
	
$rs_coupon=$db->ExecuteQuery($sql);	 	
$new_id = $db->getLastInsertId();

if($new_id > 0){ $db->userLog($_COOKIE['admin_username'], $store_id,'coupon','add',"Add a Coupon of ".$store_id." having ID '$new_id' "); 	   } 
 	 
   if(isset($_POST['other_categories'])){
     $sql_del = "delete from coupon_keywords where coupon_id = $new_id ";	 					 
	  $rs_del = $db->ExecuteQuery($sql_del);	
      $kwds = $_POST['other_categories'];  
	     foreach ($kwds as $key => $value)
	             {   
		         $kwdid = trim($value); 
						 $insert2 = "INSERT INTO coupon_keywords (keyword_id,coupon_id,date_added) VALUES ('$kwdid', '$new_id', '$date_added')";						 
				         $rs_insert = $db->ExecuteQuery($insert2);						
		         }					
	      }	
		  // die;						
	  header("location: ../coupons.php?a=1"); 	exit;
	} header("location: ../coupons.php?a=2"); 	exit;	 
?>
