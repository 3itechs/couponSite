<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["sid"])) { $sid=trim($_GET["sid"]); }	      
	  
	$sql_all_coupons = "Select coupon_id From coupons where store_id = '$sid' " ;
		$rs_all = $db->ExecuteQuery($sql_all_coupons);					
			 $storename = $db->getStoreNameFromSID($sid);
			   
			   while(list($coupon_id)= $db->FetchAsArray($rs_all) )
				{	
		        $sql_coupon = "DELETE FROM coupons  WHERE coupon_id = '$coupon_id'";	
                $rs_store = $db->ExecuteQuery($sql_coupon);
	$db->userLog($_COOKIE['admin_username'],$sid,'coupon','delete', "Deleted a Coupon of $storename having ID '".$coupon_id."' ");
															    
				} 	  
	  
	  
	   $sql_store = "DELETE FROM stores  WHERE store_id = '$sid'";	
        $rs_store = $db->ExecuteQuery($sql_store);
		
	$db->userLog($_COOKIE['admin_username'],$sid,'store','delete', "Deleted a store $storename having ID '".$sid."' ");
	
$db->closeConnection(); ?>
