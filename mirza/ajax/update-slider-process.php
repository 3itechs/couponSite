<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['slider_title']) && $_POST['slider_title'] != ''){

   
   if(isset($_REQUEST['sid'])){$sid = $_REQUEST['sid'];}
   if(isset($_REQUEST['slider_title'])){$slider_title = $_REQUEST['slider_title'];}

if(isset($_REQUEST['p1_title'])){$p1_title = $_REQUEST['p1_title'];}
 if(isset($_REQUEST['p1_tag']))  {$p1_tag = $_REQUEST['p1_tag'];}
  if(isset($_REQUEST['p1_price'])){$p1_price = $_REQUEST['p1_price'];}
   if(isset($_REQUEST['p1_link'])) {$p1_link = $_REQUEST['p1_link'];}

    if($_FILES["p1_img"]["name"] != '')
		  {
			$tmp_img1 = str_replace(" ","-",$_FILES["p1_img"]["name"]);
			 $uploaddir1 = SLIDERS_UPLOADER;
			  $uploadfile1 = $uploaddir1.$tmp_img1;
			   move_uploaded_file($_FILES['p1_img']['tmp_name'], $uploadfile1);		
		   $sql_1 = "UPDATE home_sliders SET p1_img = '$tmp_img1' WHERE sid = '$sid'";	 
             $rs_1 = $db->ExecuteQuery($sql_1);			
			}
			
if(isset($_REQUEST['p2_title'])){$p2_title = $_REQUEST['p2_title'];}
 if(isset($_REQUEST['p2_tag'])){$p2_tag = $_REQUEST['p2_tag'];}
  if(isset($_REQUEST['p2_price'])){$p2_price = $_REQUEST['p2_price'];}
   if(isset($_REQUEST['p2_link'])){$p2_link = $_REQUEST['p2_link'];}

if($_FILES["p2_img"]["name"] != '')
		  {
			$tmp_img2 = str_replace(" ","-",$_FILES["p2_img"]["name"]);
			 $uploaddir2 = SLIDERS_UPLOADER;
			  $uploadfile2 = $uploaddir2.$tmp_img2;
			   move_uploaded_file($_FILES['p2_img']['tmp_name'], $uploadfile2);		
		   $sql_2 = "UPDATE home_sliders SET p2_img = '$tmp_img2' WHERE sid = '$sid'";	 
             $rs_2 = $db->ExecuteQuery($sql_2);			
			}
	
	if(isset($_REQUEST['p3_title'])){$p3_title = $_REQUEST['p3_title'];}
     if(isset($_REQUEST['p3_tag'])){$p3_tag = $_REQUEST['p3_tag'];}
      if(isset($_REQUEST['p3_price'])){$p3_price = $_REQUEST['p3_price'];}
       if(isset($_REQUEST['p3_link'])){$p3_link = $_REQUEST['p3_link'];}

if($_FILES["p3_img"]["name"] != '')
		  {
			$tmp_img3 = str_replace(" ","-",$_FILES["p3_img"]["name"]);
			 $uploaddir3 = SLIDERS_UPLOADER;
			  $uploadfile3 = $uploaddir3.$tmp_img3;
			   move_uploaded_file($_FILES['p3_img']['tmp_name'], $uploadfile3);		
		   $sql_3 = "UPDATE home_sliders SET p3_img = '$tmp_img3' WHERE sid = '$sid'";	 
             $rs_3 = $db->ExecuteQuery($sql_3);			
			}
	
	if(isset($_REQUEST['p4_title'])){$p4_title = $_REQUEST['p4_title'];}
     if(isset($_REQUEST['p4_tag'])){$p4_tag = $_REQUEST['p4_tag'];}
      if(isset($_REQUEST['p4_price'])){$p4_price = $_REQUEST['p4_price'];}
       if(isset($_REQUEST['p4_link'])){$p4_link = $_REQUEST['p4_link'];}

   if($_FILES["p4_img"]["name"] != '')
		  {
			$tmp_img4 = str_replace(" ","-",$_FILES["p4_img"]["name"]);
			 $uploaddir4 = SLIDERS_UPLOADER;
			  $uploadfile4 = $uploaddir4.$tmp_img4;
			   move_uploaded_file($_FILES['p4_img']['tmp_name'], $uploadfile4);		
		   $sql_4 = "UPDATE home_sliders SET p4_img = '$tmp_img4' WHERE sid = '$sid'";	 
             $rs_4 = $db->ExecuteQuery($sql_4);			
			}
	
	if(isset($_REQUEST['p5_title'])){$p5_title = $_REQUEST['p5_title'];}
	 if(isset($_REQUEST['p5_tag']))  {$p5_tag = $_REQUEST['p5_tag'];}
	  if(isset($_REQUEST['p5_price'])){$p5_price = $_REQUEST['p5_price'];}
	   if(isset($_REQUEST['p5_link'])) {$p5_link = $_REQUEST['p5_link'];}

    if($_FILES["p5_img"]["name"] != '')
		  {
			$tmp_img5 = str_replace(" ","-",$_FILES["p5_img"]["name"]);
			 $uploaddir5 = SLIDERS_UPLOADER;
			  $uploadfile5 = $uploaddir5.$tmp_img5;
			   move_uploaded_file($_FILES['p5_img']['tmp_name'], $uploadfile5);		
		   $sql_5 = "UPDATE home_sliders SET p5_img = '$tmp_img5' WHERE sid = '$sid'";	 
             $rs_5 = $db->ExecuteQuery($sql_5);			
			}
			
	  if(isset($_REQUEST['p6_title'])) {$p6_title = $_REQUEST['p6_title'];}
	   if(isset($_REQUEST['p6_tag']))   {$p6_tag = $_REQUEST['p6_tag'];}
	    if(isset($_REQUEST['p6_price'])) {$p6_price = $_REQUEST['p6_price'];}
	     if(isset($_REQUEST['p6_link']))  {$p6_link = $_REQUEST['p6_link'];}
	
if($_FILES["p6_img"]["name"] != '')
		  {
			$tmp_img6 = str_replace(" ","-",$_FILES["p6_img"]["name"]);
			 $uploaddir6 = SLIDERS_UPLOADER;
			  $uploadfile6 = $uploaddir6.$tmp_img6;
			   move_uploaded_file($_FILES['p6_img']['tmp_name'], $uploadfile6);		
		   $sql_6 = "UPDATE home_sliders SET p6_img = '$tmp_img6' WHERE sid = '$sid'";	 
             $rs_6 = $db->ExecuteQuery($sql_6);			
			}
   
   
$sqlUpdate = "UPDATE home_sliders SET slider_title = '$slider_title', 

p1_title = '$p1_title', p1_tag = '$p1_tag', p1_price = '$p1_price', p1_link = '$p1_link',
p2_title = '$p2_title', p2_tag = '$p2_tag', p2_price = '$p2_price', p2_link = '$p2_link',
p3_title = '$p3_title', p3_tag = '$p3_tag', p3_price = '$p3_price', p3_link = '$p3_link',
p4_title = '$p4_title', p4_tag = '$p4_tag', p4_price = '$p4_price', p4_link = '$p4_link',
p5_title = '$p5_title', p5_tag = '$p5_tag', p5_price = '$p5_price', p5_link = '$p5_link', 
p6_title = '$p6_title', p6_tag = '$p6_tag', p6_price = '$p6_price', p6_link = '$p6_link' ";
		 	
$sqlUpdate.="  WHERE sid='$sid'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../sliders.php?u=1");
 exit;
}	 
?>
