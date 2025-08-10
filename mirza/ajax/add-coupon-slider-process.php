<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['cs_title']) && $_POST['cs_title'] != ''){ 

if(isset($_REQUEST['cs_title'])){$cs_title = $_REQUEST['cs_title'];}
if(isset($_REQUEST['cs_alt'])){$cs_alt = $_REQUEST['cs_alt'];}
 if(isset($_REQUEST['cs_link']))  {$cs_link = $_REQUEST['cs_link'];}
    if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
if($_FILES["cs_img"]["name"] != '')
		  {
			$tmp_thumb1 = str_replace(" ","-",$_FILES["cs_img"]["name"]);
			$uploaddir1 = COUPON_SLIDER_UPLOADER;
			$uploadfile1 = $uploaddir1.$tmp_thumb1;
			move_uploaded_file($_FILES['cs_img']['tmp_name'], $uploadfile1);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
					

if($cs_title != ''){
	
  $insert2 = "INSERT INTO coupon_slider (cs_title, cs_alt, cs_link, cs_img, status, added_date) VALUES ('$cs_title', '$cs_alt', '$cs_link', '$tmp_thumb1', '$status', now())";	
$rs_insert = $db->ExecuteQuery($insert2); 

}
 header("location: ../coupon-slider.php?a=1"); exit;	  					
}
	  header("location: ../coupon-slider.php?a=2"); exit;
?>
