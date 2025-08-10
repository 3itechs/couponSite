<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$fname = 'updatestore';
$ddate = date("Y-m-d");
$er = '';
$errStr="";

if(isset($_POST['storename']))
    {    
	    $storeid = addslashes(trim($_POST['storeid']));
        $storename = addslashes(trim(remove_special($_POST['storename'])));
		$store_url =  trim($_POST['store_url']); 
		//$store_url =  trim(preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '-', $storename)), '-'); 
        $store_heading = addslashes(remove_special($_POST['store_heading']));
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
		$other_categories = $_POST['other_categories'];
		$store_video1 = $_POST['store_video1'];
		$store_video2 = $_POST['store_video2'];
		$store_video3 = $_POST['store_video3'];
		$store_video4 = $_POST['store_video4'];	
				
		if(isset($_POST['top']) && $top != ''){$top = $_POST['top'];}else{$top = '0';}	
		if(isset($_POST['feature']) && $feature != ''){$feature = $_POST['feature'];}else{$feature = '0';}						
			
		if($_FILES["store_logo"]["name"] != '')
		  {
			$tmp_img = str_replace(" ","-",$_FILES["store_logo"]["name"]);
			$uploaddir = IMGPATH.'/stores/';
			$uploadfile = $uploaddir.$tmp_img;
			move_uploaded_file($_FILES['store_logo']['tmp_name'], $uploadfile);
		
		 $sql_logo = "UPDATE stores SET store_logo = '$tmp_img' WHERE store_id = '$storeid'";	// die;
           $rs_logo = $db->ExecuteQuery($sql_logo);
					
			//$imagePath = $uploaddir.$tmp_img;   $destPath  = $uploaddir.$tmp_img;	
					
		   // $db->resizeImage($imagePath,$destPath,SLOGO_WIDTH,SLOGO_HEIGHT,100);  // resizeImage(imgPath,destPath,width,height,qualitiy)
			} 
			
			
			
	    if($_FILES["store_thumbnail"]["name"] != '')
		  {
			$tmp_thumb = str_replace(" ","-",$_FILES["store_thumbnail"]["name"]);
			$uploaddir = IMGPATH.'/thumbs/';
			$uploadfile = $uploaddir.$tmp_thumb;
			move_uploaded_file($_FILES['store_thumbnail']['tmp_name'], $uploadfile);
			
		    $sql_thumb = "UPDATE stores SET store_thumbnail = '$tmp_thumb' WHERE store_id='$storeid'";	
            $rs_thumb = $db->ExecuteQuery($sql_thumb);
			
		//	$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		  //  $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100);  // resizeImage(imgPath,destPath,width,height,qualitiy)
			
			}  
			
	 $sqlUpdate = "UPDATE stores SET storename='$storename' ,store_heading='$store_heading', store_url='$store_url', network_id='$network_id', store_products='$store_products', web_address='$web_address', primary_category = '$primary_category', child_category = '$child_category', country='$country_id', tracking_link = '$tracking_slink', imp_code = '$imp_code', store_desc='$store_desc', trademark_keywords='$trademark_keywords', more_about_desc = '$more_about_desc', edited_date= now(), network_store_name='$network_store_name', "; 		 	
$sqlUpdate.=" status='$status', top='$top', feature='$feature', meta_title='$meta_title', meta_keywords='$meta_keywords', meta_desc='$meta_desc', meta_desc='$meta_desc', ";
$sqlUpdate.=" address='$address', phone='$phone', email='$email', shipping_policy='$shipping_policy', wikipedia='$wikipedia', bbb='$bbb', store_blog='$store_blog', facebook='$facebook', twitter='$twitter', youtube='$youtube', instagram='$instagram', ";

$sqlUpdate.=" store_video1='$store_video1', store_video2='$store_video2', store_video3='$store_video3', store_video4='$store_video4',";

$sqlUpdate.="edited_by = '".$_COOKIE['admin_username']."'   WHERE store_id='$storeid'";

//echo $sqlUpdate; die;			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 
 $db->userLog($_COOKIE['admin_username'],$storeid,'store','update',"Updated the store $storename having ID '$storeid' "); // User Logs		

 	 
   if(isset($_POST['other_categories'])){
     $sql_del = "delete from store_keywords where store_id = $storeid ";	 					 
	  $rs_del = $db->ExecuteQuery($sql_del);	
      $kwds = $_POST['other_categories'];  
	     foreach ($kwds as $key => $value)
	             {   
		         $kwdid = trim($value); 
						 $insert2 = "INSERT INTO store_keywords (keyword_id,store_id,date_added) VALUES ('$kwdid', '$storeid', '$date_added')";						 
				         $rs_insert = $db->ExecuteQuery($insert2);						
		         }
						
	      }
		  
		  
		$ucop_id_ar         = $_POST['ucop_id'];
		$ucouponname_ar     = $_POST['ucouponname'];
		$ucoupon_code_ar    = $_POST['ucoupon_code'];
		$utracking_link_ar  = $_POST['utracking_link']; 
		$ucoupon_desc_ar    = $_POST['ucoupon_desc'];
		$uexpsdate_ar       = $_POST['uexp-sdate'];		
		$uexpedate_ar       = $_POST['uexp-edate'];		
		$uctype_ar          = $_POST['uctype'];		
		$upercent_off_ar    = $_POST['upercent_off'];
		$udollar_off_ar     = $_POST['udollar_off'];
		$ucoupon_type_ar    = $_POST['ucoupon_type'];	
		    
		foreach( $ucouponname_ar as $key => $cn ) {  
			 $ucop_id = $ucop_id_ar[$key]; 			
			 $ucouponname = addslashes(trim($ucouponname_ar[$key])); 
			 $ucoupon_code = addslashes(trim($ucoupon_code_ar[$key])); 
			 $utracking_link = addslashes(trim($utracking_link_ar[$key])); 
			 $ucoupon_desc = addslashes(trim($ucoupon_desc_ar[$key]));	
			 $ustdate1 = $uexpsdate_ar[$key];
			 $uexdate1 = $uexpedate_ar[$key];
			 $uctype = $uctype_ar[$key];
			 
					
				if($uctype == 1){ $upercent_off = $upercent_off_ar[$key];}else{$upercent_off = '';}
				  if($uctype == 2){ $udollar_off = $udollar_off_ar[$key];}else{$udollar_off = '';}
				    if($uctype == 3){ $ucoupon_type = $ucoupon_type_ar[$key];}else{$ucoupon_type = '';}					 
					 $uvotey = rand(10,16); 	$uvoten = rand(4,9);
					 
		       if( $ustdate1 != '' ) {                                            
									  $ustdate1_ar = explode("/",$ustdate1);
									  $ustdate =  $ustdate1_ar[2]."-".$ustdate1_ar[1]."-".$ustdate1_ar[0];										                                     }
									  
			   if( $uexdate1 != '' ) {                                            
									  $uexdate1_ar = explode("/",$uexdate1);
									  $uexdate =  $uexdate1_ar[2]."-".$uexdate1_ar[1]."-".$uexdate1_ar[0];										                                     }else{										  
										  $uexdate = '0000-00-00';
										   }
			
$sql1 = "UPDATE coupons SET couponname = '$ucouponname', coupon_code = '$ucoupon_code', tracking_link = '$utracking_link', coupon_desc = '$ucoupon_desc', start_date = '$ustdate', exp_date = '$uexdate', edited_date = now(),  ctype = '$uctype', dollar_off = '$udollar_off', percent_off = '$upercent_off', coupon_type = '$ucoupon_type' where coupon_id = '$ucop_id'";		
	//echo $sql1; 
	$rowsCoupons1 = $db->ExecuteQuery($sql1);
		}
		 
		////   New Coupons Starts ////
	
	   	$couponname_ar       = $_POST['couponname'];
		$coupon_code_ar      = $_POST['coupon_code'];
		$tracking_link_ar       = $_POST['tracking_link']; 
		$coupon_desc_ar  = $_POST['coupon_desc'];
		$expsdate_ar           = $_POST['exp-sdate'];		
		$expedate_ar       = $_POST['exp-edate'];		
		$ctype_ar         = $_POST['ctype'];		
		$percent_off_ar         = $_POST['percent_off'];
		$dollar_off_ar         = $_POST['dollar_off'];
		$coupon_type_ar         = $_POST['coupon_type'];
		
		foreach( $couponname_ar as $key => $cn ) {  
						
			 $couponname = addslashes(trim($couponname_ar[$key])); 
			 $coupon_code = addslashes(trim($coupon_code_ar[$key])); 
			 $tracking_link = addslashes(trim($tracking_link_ar[$key])); 
			 $coupon_desc = addslashes(trim($coupon_desc_ar[$key]));	
			 $stdate1 = $expsdate_ar[$key];
			 $exdate1 = $expedate_ar[$key];
			 $ctype = $ctype_ar[$key];
					
				if($ctype == 1){ $percent_off = $percent_off_ar[$key];}else{$percent_off = '';}
				  if($ctype == 2){ $dollar_off = $dollar_off_ar[$key];}else{$dollar_off = '';}
				    if($ctype == 3){ $coupon_type = $coupon_type_ar[$key];}else{$coupon_type = '';}					 
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
(couponname,  coupon_desc, tracking_link, imp_code, coupon_code, insert_type, ctype, coupon_type, percent_off, dollar_off, store_id, status, primary_category, added_date, start_date, exp_date, exclusive, sitewide, feature, top, brand, votey, voten )Values 
('$couponname', '$coupon_desc', '$tracking_link', '$imp_code', '$coupon_code', 'manual', '$ctype','$coupon_type','$percent_off','$dollar_off', '$storeid', 'ENA', '$primary_category', now(), '$stdate', '$exdate', '$exclusive', '$sitewide', '$feature' , '$top', '$brand', '$votey', '$voten')"; 
  //echo $sql;
	$rowsCoupons = $db->ExecuteQuery($sql);
	$new_cid = mysql_insert_id();

if($new_cid > 0){ $db->userLog($_COOKIE['adminname'],$storeid,'coupon','add',"Add a Coupon of ".$storeid." having ID '$new_cid' "); 	   }
		}

							
		header("location: ../update-store.php?u=1&sid=$storeid");
		exit;
}	 
?>
