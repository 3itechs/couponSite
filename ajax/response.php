<?php include "../includes/DB.php";

$added_date = date("Y-m-d H:i:s", time()) ;
$start_date = date("Y-m-d");

////////  Share a Coupon
if($_REQUEST['task'] == 'sharecoupon'){

if (isset($_REQUEST["sid"])) { $sid=$_REQUEST["sid"]; }
  if (isset($_REQUEST["code"])) { $coupon_code=$_REQUEST["code"];}
   if (isset($_REQUEST["coupon"])) { $coupon=$_REQUEST["coupon"]; }
    if (isset($_REQUEST["email"])) { $email=$_REQUEST["email"]; }
     if (isset($_REQUEST["security"])) { $security=$_REQUEST["security"]; }
      if (isset($_REQUEST["cexp"])) { $cexp=$_REQUEST["cexp"];}
	 
       if($_SESSION['captcha'] != $security){echo "1"; die;}
	  
$curl = str_replace("\'","", $coupon);
 $curl=strtolower($curl);	
  $curl = ereg_replace("[^A-Za-z0-9]", " ", $curl);
   $curl=ltrim($curl);
    $curl=rtrim($curl);
     $curl = str_replace(' ','-', $curl);
      $curl = str_replace('----','-', $curl);
       $curl = str_replace('---','-', $curl);
        $curl = str_replace('--','-', $curl);
         $curl = str_replace(' - ','-', $curl);
	
  $length = strlen($curl);
	if($length > '240'){
		 $min = $length - 240;
		 $curl = substr($curl, 0, -$min);		  
	   }	
$curl2 = $curl."-$max_id.html";
$coupon_url = str_replace('--','-', $curl2);

 $sql_sname="select storename, store_url, default_html from stores where store_id = '$sid' ";
 $rs_sname=$db->ExecuteQuery($sql_sname);
 list($storename, $store_url, $default_html)=$rs_sname->FetchAsArray();

 $sql_insert = "INSERT INTO coupons (store_id,store_name,couponname,coupon_url,start_date,exp_date,html_code,coupon_code,status,added_date,user_submitted,username,email)
			 VALUES ('$sid','$storename','$coupon','$coupon_url','$start_date','$cexp','$default_html','$coupon_code','PEN','$added_date','1','Anonymous','$email')";
		  $rs_insert=$db->ExecuteQuery($sql_insert);
		 echo "2"; die;		 
	}
/////////  Subscribe /////////////////////////

 if($_REQUEST['task'] == 'subscribe'){ 
    if (isset($_REQUEST["store"]) && $_REQUEST["store"] > 0) { $store=$_REQUEST["store"]; }else{ $store= '0';}
	  if (isset($_REQUEST["email"])) { $email=$_REQUEST["email"]; }
	     $pieces = explode("@", $_REQUEST['email']);
		 $name = trim($pieces[0]); // piece1	
 
         $sql_chk="select email from subscribers where email = '".$_REQUEST['email']."' "; 
         $rs_chk = $db->ExecuteQuery($sql_chk);
		    
	if($rs_chk->GetSelectedRows()<'1'){
	   $sql = "insert into subscribers(username, fname, email, store_id, added_date, status, active)values ('$name','$name','".$_REQUEST['email']."','$store','$added_date','0','0')";  
		 $rs = $db->ExecuteQuery($sql);
		    /*if($store > 0){
		       $sql2 = "insert into member_fav_stores(memid,store_id,status,adate)values ('".$_REQUEST['email']."','$store','1','$added_date')";  
		       $rs = $db->ExecuteQuery($sql2); 
		      } */
		 
		 }else{
			  echo "1"; die;
		     }	 
   }	 

// Top Header Suggession Starts


if($_REQUEST['task'] == 'fndStore'){
	
	
	$query = $_POST['query'];
	
	 $sql = "SELECT store_id, storename, store_url FROM stores WHERE
	  storename LIKE '%$query%' OR 
	  storename LIKE ' %$query%' OR 
	  storename LIKE '%$query% ' OR 
	  storename LIKE ' %$query% ' 
	   LIMIT 0, 20";   
	
     $resultset = $db->ExecuteQuery($sql);
       
	$array = array();
	  
    while(list($store_id, $storename, $store_url) = $db->FetchAsArray($resultset)) {
			
		  $storeurl = DOMAINVAR."/coupons/".strtolower($store_url);
		  $array [] = array("category"=>$storename, "href"=>$storeurl);
	}
	echo json_encode($array);    


}
	
	// Coupon Comments Starts

if($_REQUEST['task'] == 'copCmnt'){ 
 
    if (isset($_REQUEST["email"]) && $_REQUEST["email"] > 0) { $email=$_REQUEST["email"]; }else{ $email= '0';}	
	  if (isset($_REQUEST["copid"]) && $_REQUEST["copid"] > 0) { $copid=$_REQUEST["copid"]; }else{ $copid= '0';}	 
	    if (isset($_REQUEST["storeid"]) && $_REQUEST["storeid"] > 0) { $storeid=$_REQUEST["storeid"]; }else{ $storeid= '0';}
	 
	    $sql = "insert into coupon_comments(email,couponid,storeid,comments,date_added,status)values ('$email','$copid','$storeid','".$_REQUEST["comments"]."',now(),'0')";  
		$rs = $db->ExecuteQuery($sql);
		if($email != ''){
		                $sql_chk="select email from members where email = '".$_REQUEST['email']."' "; 
                        $rs_chk = $db->ExecuteQuery($sql_chk);
		    
						if($rs_chk->GetSelectedRows()<'1'){
						                    $sql = "insert into members(username,email,store_id,date_reg,status,active)values
											('Anonymous','".$_REQUEST['email']."','$storeid','$added_date','0','0')";  
											 $rs = $db->ExecuteQuery($sql);
											 }
		  }else{
		       $email = 'anonymous@me.com';
		  } 
		$to = "coupon_comments@AnyPromoCode.com";
		$subject = "Coupon Comments";
		$comments = $_REQUEST['comments'];
		$message = "<table width='716' height='192' border='0' align='center' cellpadding='3' cellspacing='5' bordercolor='#FFFFFF' bgcolor='#FFFFFF'>
					  <tr>
						<td height='37' colspan='4' align='center' valign='middle' bgcolor='#E8E9EA'>Coupon Comments</td>
					  </tr>
					  <tr>
						<td height='36' colspan='4' align='center' bgcolor='#E8E9EA'>&nbsp;</td>   
					  </tr>
					  <tr>
						<td width='104' height='47' bgcolor='#E8E9EA'><span style='color: #660000;font-weight: bold;font-family: Verdana;font-size: 12px;'>Store ID:</span></td>
						<td width='148' bgcolor='#E8E9EA'><span style='font-family:Arial;font-size:12px;font-weight:bold;'>$copid</span></td>    
						<td width='128' bgcolor='#E8E9EA'><span style='color: #660000;font-weight: bold;font-family: Verdana;font-size: 12px;'>Coupon ID:</span></td>
						<td width='287' bgcolor='#E8E9EA'><span style='font-family:Arial;font-size:12px;font-weight:bold;'>$storeid</span></td>    
					  </tr>
					  
					  <tr>
						<td width='104' height='47' bgcolor='#E8E9EA'><span style='color: #660000;font-weight: bold;font-family: Verdana;font-size: 12px;'>Comments:</span></td>
						<td colspan='3' bgcolor='#E8E9EA'><span style='font-family:Arial;font-size:12px;font-weight:bold;'>$comments</span></td>    
					  </tr>
					</table> ";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		
		// More headers
		$headers .= 'From: <$email>' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		 
		 
		 
		 echo "1"; die();  
  } 
  // Coupon Comments Ends
  
 if($_REQUEST['task'] == 'yesSmile'){ 
 
     if(isset($_REQUEST["cid"]) && $_REQUEST["cid"] > 0) { $cid=$_REQUEST["cid"]; }else{ $cid= '0';}
	 
	     $sql_vote = "select votey from coupons where coupon_id = '".$cid."' "; 
          $rs_vote  = $db->ExecuteQuery($sql_vote);
		   $totaly   = $rs_vote->GetSelectedRows() + 1;
		   
		 $sql_total = "select total_votes from coupons where coupon_id = '".$cid."' "; 
          $rs_total  = $db->ExecuteQuery($sql_total);
		   $total   = $rs_total->GetSelectedRows() + 1;	   
	 
	    $sql_clock = "Update coupons SET votey = '$totaly',total_votes = '$total' WHERE coupon_id='$cid' ";			
        $rs_clock=$db->ExecuteQuery($sql_clock);
	 
		 echo "1"; die();  
  } 
  
 if($_REQUEST['task'] == 'noSmile'){ 
 
    if (isset($_REQUEST["cid"]) && $_REQUEST["cid"] > 0) { $cid=$_REQUEST["cid"]; }else{ $cid= '0';}
	 
	   $sql_vote = "select votey from coupons where coupon_id = '".$cid."' "; 
          $rs_vote  = $db->ExecuteQuery($sql_vote);
		   $totaly   = $rs_vote->GetSelectedRows() + 1;
		   
		 $sql_total = "select total_votes from coupons where coupon_id = '".$cid."' "; 
          $rs_total  = $db->ExecuteQuery($sql_total);
		   $total   = $rs_total->GetSelectedRows() + 1;	   
	 
	    $sql_clock = "Update coupons SET votey = '$totaly',total_votes = '$total' WHERE coupon_id='$cid' ";			
        $rs_clock=$db->ExecuteQuery($sql_clock);
		
		 echo "1"; die();  
  } 
// Top Header Suggession Ends


 ?>
