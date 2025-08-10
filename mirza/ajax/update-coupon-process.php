<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$fname = 'updatecoupon';
$ddate = date("Y-m-d");
$er = '';
$errStr="";

 $store_id = $db->getStoreIDFromStoreName($_POST['storename']);

if(isset($_POST['couponname']))  
    {    
	    $couponid = addslashes(trim($_POST['couponid']));
		$couponname = addslashes(trim($_POST['couponname']));
		$discount_title = addslashes(trim($_POST['discount_title']));
        $coupon_desc = addslashes($_POST['coupon_desc']);
		$tracking_link = addslashes($_POST['tracking_link']);		  
		$imp_code = addslashes($_POST['imp_code']);
		$coupon_code = $_POST['coupon_code'];
		$coupon_type = $_POST['coupon_type'];
		$status = addslashes($_POST['status']);
		if($_POST['primary_category'] != ''){
            $primary_category = $_POST['primary_category'];
        }else{$primary_category = '0';}
    
		if($_POST['ctype'] == 1){$ctype = $_POST['ctype'];}else{$ctype = '0';}
		$insert_type = 'manual';
		
		
		if(!empty($_POST["exp-sdate"]) || !empty($_POST["exp-sdate"]) ) {                                            
											$stdate = $_POST['exp-sdate'];											
											$stdate_ar = explode("/",$stdate);
											$start_date =  $stdate_ar[2]."-".$stdate_ar[1]."-".$stdate_ar[0];                                            
										 }										 
		if($_POST["never_exp"] == 1){
		     $ad_edate = '0000-00-00';
		}else{		
	 	     if(!empty($_POST["exp-edate"]) || !empty($_POST["exp-edate"]) ) {                                            
											$expdate = $_POST['exp-edate'];											
											$expdate_ar = explode("/",$expdate);
											$exp_date =  $expdate_ar[2]."-".$expdate_ar[1]."-".$expdate_ar[0];                                            
										 }								 
										 
		}								 
				
		if($_POST['exclusive'] == 1){$exclusive = $_POST['exclusive'];}else{$exclusive = '0';}	
		 if($_POST['sitewide'] == 1){$sitewide = $_POST['sitewide'];}else{$sitewide = '0';}
		  if($_POST['feature'] == 1){$feature = $_POST['feature'];}else{$feature = '0';}
		    if($_POST['top'] == 1){$top = $_POST['top'];}else{$top = '0';}
			 if($_POST['brand'] == 1){$brand = $_POST['brand'];}else{$brand = '0';}						
								
	    if($_FILES["discount_image"]["name"] != '')
		  {
		   $tmp_discount_img = str_replace(" ","-",$_FILES["discount_image"]["name"]);
		    $uploaddir = IMGPATH.'/coupons/';
			 $uploadfile = $uploaddir.$tmp_discount_img;
		 	  move_uploaded_file($_FILES['discount_image']['tmp_name'], $uploadfile);
			
		   $sql_thumb = "UPDATE coupons SET discount_image = '$tmp_discount_img' WHERE coupon_id='$couponid'";
            $rs_thumb = $db->ExecuteQuery($sql_thumb);
			 			 
			$imagePath =  $uploaddir.$tmp_discount_img;   $destPath  =  $uploaddir.$tmp_discount_img;					
		    $db->resizeImage($imagePath,$destPath,COUPON_DISCOUNT_WIDTH,COUPON_DISCOUNT_HEIGHT,100); 
			 // resizeImage(imgPath,destPath,width,height,qualitiy)
			
			}
			
	    if($_FILES["product_image"]["name"] != '')
		  {
		   $tmp_coupon_img = str_replace(" ","-",$_FILES["product_image"]["name"]);
		    $uploaddir = IMGPATH.'/brands/';
			 $uploadfile = $uploaddir.$tmp_coupon_img;
		 	  move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadfile);
			
		   $sql_thumb = "UPDATE coupons SET product_image = '$tmp_coupon_img' WHERE coupon_id='$couponid'";
            $rs_thumb = $db->ExecuteQuery($sql_thumb);
			 			 
			$imagePath =  $uploaddir.$tmp_coupon_img;   $destPath  =  $uploaddir.$tmp_coupon_img;					
		    $db->resizeImage($imagePath,$destPath,COUPON_BGIMG_WIDTH,COUPON_BGIMG_HEIGHT,100); 
			 // resizeImage(imgPath,destPath,width,height,qualitiy)
			
			}  
 if($_REQUEST['discount_type'] != ''){ $discount_type = $_REQUEST['discount_type'];}else{ $discount_type = '';}
  if($_REQUEST['discount_value'] != ''){ $discount_value = $_REQUEST['discount_value'];}else{ $discount_value = '';}  
   if($_REQUEST['coupon_type'] != ''){ $coupon_type = $_REQUEST['coupon_type'];}else{ $coupon_type = '';}
   			
 $sqlUpdate = "UPDATE coupons SET couponname = '$couponname',  discount_title = '$discount_title', coupon_desc='$coupon_desc', tracking_link='$tracking_link', imp_code='$imp_code', coupon_code='$coupon_code', coupon_type='$coupon_type', discount_type='$discount_type', discount_value='$discount_value', store_id = '$store_id', status = '$status', primary_category='$primary_category', start_date='$start_date', exp_date='$exp_date', "; 		 	
   $sqlUpdate.=" exclusive='$exclusive', sitewide='$sitewide', feature='$feature', top='$top' , brand='$brand', insert_type = '$insert_type'  WHERE coupon_id='$couponid'";	  // die($sqlUpdate);
    $rs_Update=$db->ExecuteQuery($sqlUpdate);
	
	$sql_sname = "select storename from stores where store_id = 'store_id' ";
	    $rs_sname = $db->ExecuteQuery($sql_sname);
       list($storename) = $db->FetchAsArray($rs_sname);	
	$db->userLog($_COOKIE['admin_username'],$store_id,'coupon','update',"Updated a Coupon of '$storename' having ID '$couponid' "); // User Logs
		 
 	 
   if(isset($_POST['other_categories'])){
     $sql_del = "delete from coupon_keywords where coupon_id = $couponid ";	 					 
	  $rs_del = $db->ExecuteQuery($sql_del);	
      $kwds = $_POST['other_categories'];  
	     foreach ($kwds as $key => $value)
	             {   
		          $kwdid = trim($value); 
				   $insert2 = "INSERT INTO coupon_keywords (keyword_id,coupon_id,date_added) VALUES ('$kwdid', '$couponid', '$date_added')";						 
				    $rs_insert = $db->ExecuteQuery($insert2);						
		         }
	      }
							
		header("location: ../update-coupon.php?cid=$couponid&u=1");
		exit;
} ?>
