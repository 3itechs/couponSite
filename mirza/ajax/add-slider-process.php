<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['slider_title']) && $_POST['slider_title'] != ''){ 

if(isset($_REQUEST['slider_title'])){$slider_title = $_REQUEST['slider_title'];}

if(isset($_REQUEST['p1_title'])){$p1_title = $_REQUEST['p1_title'];}
 if(isset($_REQUEST['p1_tag']))  {$p1_tag = $_REQUEST['p1_tag'];}
  if(isset($_REQUEST['p1_price'])){$p1_price = $_REQUEST['p1_price'];}
   if(isset($_REQUEST['p1_link'])) {$p1_link = $_REQUEST['p1_link'];}

if($_FILES["p1_img"]["name"] != '')
		  {
			$tmp_thumb1 = str_replace(" ","-",$_FILES["p1_img"]["name"]);
			$uploaddir1 = SLIDERS_UPLOADER;
			$uploadfile1 = $uploaddir1.$tmp_thumb1;
			move_uploaded_file($_FILES['p1_img']['tmp_name'], $uploadfile1);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
			
if(isset($_REQUEST['p2_title'])){$p2_title = $_REQUEST['p2_title'];}
 if(isset($_REQUEST['p2_tag'])){$p2_tag = $_REQUEST['p2_tag'];}
  if(isset($_REQUEST['p2_price'])){$p2_price = $_REQUEST['p2_price'];}
   if(isset($_REQUEST['p2_link'])){$p2_link = $_REQUEST['p2_link'];}

if($_FILES["p2_img"]["name"] != '')
		  {
			$tmp_thumb2 = str_replace(" ","-",$_FILES["p2_img"]["name"]);
			$uploaddir2 = SLIDERS_UPLOADER;
			$uploadfile2 = $uploaddir2.$tmp_thumb2;
			move_uploaded_file($_FILES['p3_img']['tmp_name'], $uploadfile2);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
		  }
	
	if(isset($_REQUEST['p3_title'])){$p3_title = $_REQUEST['p3_title'];}
     if(isset($_REQUEST['p3_tag'])){$p3_tag = $_REQUEST['p3_tag'];}
      if(isset($_REQUEST['p3_price'])){$p3_price = $_REQUEST['p3_price'];}
       if(isset($_REQUEST['p3_link'])){$p3_link = $_REQUEST['p3_link'];}

if($_FILES["p3_img"]["name"] != '')
		  {
			$tmp_thumb3 = str_replace(" ","-",$_FILES["p3_img"]["name"]);
			$uploaddir3 = SLIDERS_UPLOADER;
			$uploadfile3 = $uploaddir3.$tmp_thumb3;
			move_uploaded_file($_FILES['p3_img']['tmp_name'], $uploadfile3);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
	
	if(isset($_REQUEST['p4_title'])){$p4_title = $_REQUEST['p4_title'];}
     if(isset($_REQUEST['p4_tag'])){$p4_tag = $_REQUEST['p4_tag'];}
      if(isset($_REQUEST['p4_price'])){$p4_price = $_REQUEST['p4_price'];}
       if(isset($_REQUEST['p4_link'])){$p4_link = $_REQUEST['p4_link'];}

if($_FILES["p4_img"]["name"] != '')
		  {
			$tmp_thumb4 = str_replace(" ","-",$_FILES["p4_img"]["name"]);
			$uploaddir4 = SLIDERS_UPLOADER;
			$uploadfile4 = $uploaddir4.$tmp_thumb4;
			move_uploaded_file($_FILES['p4_img']['tmp_name'], $uploadfile4);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
	
	if(isset($_REQUEST['p5_title'])){$p5_title = $_REQUEST['p5_title'];}
	 if(isset($_REQUEST['p5_tag']))  {$p5_tag = $_REQUEST['p5_tag'];}
	  if(isset($_REQUEST['p5_price'])){$p5_price = $_REQUEST['p5_price'];}
	   if(isset($_REQUEST['p5_link'])) {$p5_link = $_REQUEST['p5_link'];}

if($_FILES["p5_img"]["name"] != '')
		  {
			$tmp_thumb5 = str_replace(" ","-",$_FILES["p5_img"]["name"]);
			$uploaddir5 = SLIDERS_UPLOADER;
			$uploadfile5 = $uploaddir5.$tmp_thumb5;
			move_uploaded_file($_FILES['p5_img']['tmp_name'], $uploadfile5);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
			
	  if(isset($_REQUEST['p6_title'])) {$p6_title = $_REQUEST['p6_title'];}
	   if(isset($_REQUEST['p6_tag']))   {$p6_tag = $_REQUEST['p6_tag'];}
	    if(isset($_REQUEST['p6_price'])) {$p6_price = $_REQUEST['p6_price'];}
	     if(isset($_REQUEST['p6_link']))  {$p6_link = $_REQUEST['p6_link'];}
	
if($_FILES["p6_img"]["name"] != '')
		  {
			$tmp_thumb6 = str_replace(" ","-",$_FILES["p6_img"]["name"]);
			$uploaddir6 = SLIDERS_UPLOADER;
			$uploadfile6 = $uploaddir6.$tmp_thumb6;
			move_uploaded_file($_FILES['p6_img']['tmp_name'], $uploadfile6);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
			
			
			

if($slider_title != ''){
	
  $insert2 = "INSERT INTO home_sliders (slider_title, p1_title, p1_tag, p1_price, p1_link, p1_img, p2_title, p2_tag, p2_price, p2_link, p2_img, p3_title, p3_tag, p3_price, p3_link, p3_img, p4_title, p4_tag, p4_price, p4_link, p4_img, p5_title, p5_tag, p5_price, p5_link, p5_img, p6_title, p6_tag, p6_price, p6_link, p6_img, status, added_date) VALUES ('$slider_title', '$p1_title', '$p1_tag', '$p1_price', '$p1_link', '$tmp_thumb1', '$p2_title', '$p2_tag', '$p2_price', '$p2_link', '$tmp_thumb2', '$p3_title', '$p3_tag', '$p3_price', '$p3_link', '$tmp_thumb3', '$p4_title', '$p4_tag', '$p4_price', '$p4_link', '$tmp_thumb4', '$p5_title', '$p5_tag', '$p5_price', '$p5_link', '$tmp_thumb5', '$p6_title', '$p6_tag', '$p6_price', '$p6_link', '$tmp_thumb6', '$status', now())";	
$rs_insert = $db->ExecuteQuery($insert2); 

}
 header("location: ../sliders.php?a=1"); exit;	  					
}
	  header("location: ../sliders.php?a=2"); exit;
?>
