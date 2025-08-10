<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['cs_title']) && $_POST['cs_title'] != ''){
   
   if(isset($_REQUEST['sid'])){$sid = $_REQUEST['sid'];}
    if(isset($_REQUEST['cs_title'])){$cs_title = $_REQUEST['cs_title'];}
     if(isset($_REQUEST['cs_alt'])){$cs_alt = $_REQUEST['cs_alt'];}
       if(isset($_REQUEST['cs_link']))  {$cs_link = $_REQUEST['cs_link'];}
	      if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
    if($_FILES["cs_img"]["name"] != '')
		  {
			$tmp_img1 = str_replace(" ","-",$_FILES["cs_img"]["name"]);
			 $uploaddir1 = COUPON_SLIDER_UPLOADER;
			  $uploadfile1 = $uploaddir1.$tmp_img1;
			   move_uploaded_file($_FILES['cs_img']['tmp_name'], $uploadfile1);		
		      $sql_1 = "UPDATE coupon_slider SET cs_img = '$tmp_img1' WHERE sid = '$sid'";	 
             $rs_1 = $db->ExecuteQuery($sql_1);			
			}
			
			
$sqlUpdate = "UPDATE coupon_slider SET cs_title = '$cs_title', 
              cs_alt = '$cs_alt', cs_link = '$cs_link', status = '$status' WHERE sid='$sid'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../coupon-slider.php?u=1");
 exit;
}	 
?>
