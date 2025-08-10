<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['vl_title']) && $_POST['vl_title'] != ''){ 

if(isset($_REQUEST['vl_title'])){$vl_title = $_REQUEST['vl_title'];}
if(isset($_REQUEST['vl_alt'])){$vl_alt = $_REQUEST['vl_alt'];}
 if(isset($_REQUEST['vl_link']))  {$vl_link = $_REQUEST['vl_link'];}
    if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
if($_FILES["vl_img"]["name"] != '')
		  {
			$tmp_thumb1 = str_replace(" ","-",$_FILES["vl_img"]["name"]);
			$uploaddir1 = VAULT_IMG_UPLOADER;
			$uploadfile1 = $uploaddir1.$tmp_thumb1;
			move_uploaded_file($_FILES['vl_img']['tmp_name'], $uploadfile1);				        
			//$imagePath = $uploaddir.$tmp_thumb;   $destPath  = $uploaddir.$tmp_thumb;					
		//    $db->resizeImage($imagePath,$destPath,STHUMB_WIDTH,STHUMB_HEIGHT,100); 
		       // resizeImage(imgPath,destPath,width,height,qualitiy)			
			}
					

if($vl_title != ''){
	
  $insert2 = "INSERT INTO vault_list (vl_title, vl_alt, vl_link, vl_img, status, added_date) VALUES ('$vl_title', '$vl_alt', '$vl_link', '$tmp_thumb1', '$status', now())";	
$rs_insert = $db->ExecuteQuery($insert2); 

}
 header("location: ../vault-list.php?a=1"); exit;	  					
}
	  header("location: ../vault-list.php?a=2"); exit;
?>
