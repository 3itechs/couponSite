<?php 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["id"])) {
	$id=trim($_GET["id"]);
 }
 
  $sql_getimg = "select p1_img from home_sliders WHERE sid='$id'";	
    $rs_getimg = $db->ExecuteQuery($sql_getimg);
 	  list($product_img) = $db->FetchAsArray($rs_getimg);								  
       	    $pimg = SLIDERS_UPLOADER.$product_img;
	
	  unlink($pimg);
	   
      $sql_img = "UPDATE home_sliders SET p1_img = '' WHERE sid='$id'";	
            $rs_logo = $db->ExecuteQuery($sql_img);	

$db->closeConnection(); ?>