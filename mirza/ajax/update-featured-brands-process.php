<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['fb_title']) && $_POST['fb_title'] != ''){
   
   if(isset($_REQUEST['sid'])){$sid = $_REQUEST['sid'];}
    if(isset($_REQUEST['fb_title'])){$fb_title = addslashes($_REQUEST['fb_title']);}
     if(isset($_REQUEST['fb_alt'])){$fb_alt = addslashes($_REQUEST['fb_alt']);}
       if(isset($_REQUEST['fb_link']))  {$fb_link = $_REQUEST['fb_link'];}
	      if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
    if($_FILES["fb_img"]["name"] != '')
		  {
			$tmp_img1 = str_replace(" ","-",$_FILES["fb_img"]["name"]);
			 $uploaddir1 = FEATURED_BRANDS_UPLOADER;
			  $uploadfile1 = $uploaddir1.$tmp_img1;
			   move_uploaded_file($_FILES['fb_img']['tmp_name'], $uploadfile1);		
		      $sql_1 = "UPDATE featured_brands SET fb_img = '$tmp_img1' WHERE sid = '$sid'";	 
             $rs_1 = $db->ExecuteQuery($sql_1);			
			}
			
			
$sqlUpdate = "UPDATE featured_brands SET fb_title = '$fb_title', 
              fb_alt = '$fb_alt', fb_link = '$fb_link', status = '$status' WHERE sid='$sid'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../featured-brands.php?u=1");
 exit;
}	 
?>
