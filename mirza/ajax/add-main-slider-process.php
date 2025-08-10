<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['ms_title']) && $_POST['ms_title'] != ''){ 

if(isset($_REQUEST['ms_title'])){$ms_title = $_REQUEST['ms_title'];}
if(isset($_REQUEST['ms_alt'])){$ms_alt = $_REQUEST['ms_alt'];}
 if(isset($_REQUEST['ms_link']))  {$ms_link = $_REQUEST['ms_link'];}
    if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
if($_FILES["ms_img"]["name"] != '')
		  {
			$tmp_thumb1 = str_replace(" ","-",$_FILES["ms_img"]["name"]);
			$uploaddir1 = MAIN_SLIDER_UPLOADER;
			$uploadfile1 = $uploaddir1.$tmp_thumb1;
			move_uploaded_file($_FILES['ms_img']['tmp_name'], $uploadfile1);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
					

if($ms_title != ''){
	
  $insert2 = "INSERT INTO main_slider (ms_title, ms_alt, ms_link, ms_img, status, added_date) VALUES ('$ms_title', '$ms_alt', '$ms_link', '$tmp_thumb1', '$status', now())";	
$rs_insert = $db->ExecuteQuery($insert2); 

}
 header("location: ../main-slider.php?a=1"); exit;	  					
}
	  header("location: ../main-slider.php?a=2"); exit;
?>
