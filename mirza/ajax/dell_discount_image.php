<?php session_start();  
$sesid = session_id(); 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["sid"])) {
	$sid=trim($_GET["sid"]);
 }
 
 echo $sql_getlogo = "select discount_image from coupons WHERE coupon_id='$sid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($slogo) = $db->FetchAsArray($rs_getlogo);								  
       $logo = IMGPATH."/coupons/".$slogo;	   
	
	  unlink($logo);
	   
   echo   $sql_logo = "UPDATE coupons SET discount_image = '' WHERE coupon_id='$sid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);

mysql_close();
?>
