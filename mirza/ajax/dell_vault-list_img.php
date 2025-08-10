<?php 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["sid"])) {
	$sid=trim($_GET["sid"]);
 }
 
  $sql_getlogo = "select vl_img from vault_list WHERE sid='$sid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($silde_img) = $db->FetchAsArray($rs_getlogo);								  
       	    $logo = VAULT_IMG_UPLOADER.$silde_img;
	
	  unlink($logo);
	   
      $sql_logo = "UPDATE vault_list SET vl_img = '' WHERE sid='$sid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);	

$db->closeConnection(); ?>
 

