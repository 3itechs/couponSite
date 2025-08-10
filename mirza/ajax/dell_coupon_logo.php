<?php session_start();  
$sesid = session_id(); 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["sid"])) {
	$sid=trim($_GET["sid"]);
 }
 
  $sql_getlogo = "select coupon_logo from coupons WHERE coupon_id='$sid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($slogo) = $db->FetchAsArray($rs_getlogo);								  
       $logo = IMGPATH."/logos/".$slogo;
	
	  unlink($logo);
	   
      $sql_logo = "UPDATE coupons SET coupon_logo = '' WHERE coupon_id='$sid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);	

mysql_close();
?>
