<?php 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["sid"])) {
	$sid=trim($_GET["sid"]);
 }
 
  $sql_getlogo = "select fb_img from featured_brands WHERE sid='$sid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($silde_img) = $db->FetchAsArray($rs_getlogo);								  
       	    $logo = FEATURED_BRANDS_UPLOADER.$silde_img;
	
	  unlink($logo);
	   
      $sql_logo = "UPDATE featured_brands SET fb_img = '' WHERE sid='$sid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);	

$db->closeConnection(); ?>
 

