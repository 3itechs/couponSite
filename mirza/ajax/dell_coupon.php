<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["cid"])) { $cid=trim($_GET["cid"]); }
      
	 $sql_sid = $db->ExecuteQuery("select store_id from coupons WHERE coupon_id = '$cid' ") ;  
	 list($store_id) = mysqli_fetch_array($sql_sid);
	 
      $storename = $db->getStoreNameFromCID($cid);
	  	   
      $sql_coupon = "DELETE FROM coupons  WHERE coupon_id = '$cid'";	
        $rs_coupon = $db->ExecuteQuery($sql_coupon);
				
		$db->userLog($_COOKIE['admin_username'],$store_id,'coupon','delete', "Deleted a Coupon of $storename having ID '".$cid."' ");
			
$db->closeConnection(); ?>
