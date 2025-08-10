<?php 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["sid"])) {
	$sid=trim($_GET["sid"]);
 }
 
  $sql_getlogo = "select ms_img from main_slider WHERE sid='$sid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($silde_img) = $db->FetchAsArray($rs_getlogo);								  
       	    $logo = MAIN_SLIDER_UPLOADER.$silde_img;
	
	  unlink($logo);
	   
      $sql_logo = "UPDATE main_slider SET ms_img = '' WHERE sid='$sid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);	

$db->closeConnection(); ?>


