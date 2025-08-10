<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["cid"])) { $cid=trim($_GET["cid"]); }
      
	 $sql_sid=$db->ExecuteQuery("select post_id from post_comments WHERE cmnt_id = '$cid' ") ;  
	 list($post_id)=mysqli_fetch_array($sql_sid);
	 
      $storename = $db->getStoreNameFromCID($cid);
	  	   
      $sql_coupon = "DELETE FROM post_comments  WHERE cmnt_id = '$cid'";	
        $rs_coupon = $db->ExecuteQuery($sql_coupon);
				
		//$db->userLog($_COOKIE['admin_username'],$post_id,'coupon','delete', "Deleted a Coupon of $storename having ID '".$cid."' ");
			
$db->closeConnection(); ?>
