<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['fb_title']) && $_POST['fb_title'] != ''){ 

if(isset($_REQUEST['fb_title'])){$fb_title = addslashes($_REQUEST['fb_title']);}
if(isset($_REQUEST['fb_alt'])){$fb_alt = addslashes($_REQUEST['fb_alt']);}
 if(isset($_REQUEST['fb_link']))  {$fb_link = $_REQUEST['fb_link'];}
    if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
if($_FILES["fb_img"]["name"] != '')
		  {
			$tmp_thumb1 = str_replace(" ","-",$_FILES["fb_img"]["name"]);
			$uploaddir1 = FEATURED_BRANDS_UPLOADER;
			$uploadfile1 = $uploaddir1.$tmp_thumb1;
			move_uploaded_file($_FILES['fb_img']['tmp_name'], $uploadfile1);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
					

if($fb_title != ''){
	
  $insert2 = "INSERT INTO featured_brands (fb_title, fb_alt, fb_link, fb_img, status, added_date) VALUES ('$fb_title', '$fb_alt', '$fb_link', '$tmp_thumb1', '$status', now())";	
$rs_insert = $db->ExecuteQuery($insert2); 

}
 header("location: ../featured-brands.php?a=1"); exit;	  					
}
	  header("location: ../featured-brands.php?a=2"); exit;
?>
