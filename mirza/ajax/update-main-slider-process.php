<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['ms_title']) && $_POST['ms_title'] != ''){
   
   if(isset($_REQUEST['sid'])){$sid = $_REQUEST['sid'];}
    if(isset($_REQUEST['ms_title'])){$ms_title = $_REQUEST['ms_title'];}
     if(isset($_REQUEST['ms_alt'])){$ms_alt = $_REQUEST['ms_alt'];}
       if(isset($_REQUEST['ms_link']))  {$ms_link = $_REQUEST['ms_link'];}
	      if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
    if($_FILES["ms_img"]["name"] != '')
		  {
			$tmp_img1 = str_replace(" ","-",$_FILES["ms_img"]["name"]);
			 $uploaddir1 = MAIN_SLIDER_UPLOADER;
			  $uploadfile1 = $uploaddir1.$tmp_img1;
			   move_uploaded_file($_FILES['ms_img']['tmp_name'], $uploadfile1);		
		      $sql_1 = "UPDATE main_slider SET ms_img = '$tmp_img1' WHERE sid = '$sid'";	 
             $rs_1 = $db->ExecuteQuery($sql_1);			
			}
			
			
$sqlUpdate = "UPDATE main_slider SET ms_title = '$ms_title', 
              ms_alt = '$ms_alt', ms_link = '$ms_link', status = '$status' WHERE sid='$sid'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../main-slider.php?u=1");
 exit;
}	 
?>
