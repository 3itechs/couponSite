<? include "includes/DB.php";



$domain = DOMAINVAR;



ob_start();



$sql_click = "select used_total from coupons where coupon_id = '".$db->real_escape_string($_GET['cid'])."' ";



		 $res_click = $db->ExecuteQuery($sql_click);



		  list($clicks) = $db->FetchAsArray($res_click);		



		    $total_clicks = $clicks + 1; 

		



	$sql_view_edit = "UPDATE coupons SET used_total = '$total_clicks'  where coupon_id = '".$db->real_escape_string($_GET['cid'])."' ";		     $rs_edit = $db->ExecuteQuery($sql_view_edit);

		

	  $res_click = $db->ExecuteQuery($sql_view_edit);



		  



if(isset($_GET['cid']) && $_GET['cid']!=""){



 $sql_country="select s.country,c.imp_code,s.storename from coupons c, stores s where s.store_id = c.store_id and c.coupon_id = '".$db->real_escape_string($_GET['cid'])."' ";



			$rs_country = $db->ExecuteQuery($sql_country);



			list($country,$imp_code,$storename) = $db->FetchAsArray($rs_country);



						



			}?>







        	<? 



 				if(isset($_GET['sid']) && $_GET['sid']!=""){ 



 					$sql_url1 = "select storename,tracking_link,store_url,web_address, status from stores where store_id ='".$db->real_escape_string($_GET['sid'])."' ";



					$res_url1 = $db->ExecuteQuery($sql_url1);



					list($storename,$default_html,$store_url,$web_address, $status) = $db->FetchAsArray($res_url1); 

					    

						$default_html = "http://".str_replace("http://","",str_replace("https://","",$default_html));

						

					    header("location: $default_html"); exit(); 

						 

					  ?>

					<script type="text/javascript">



					  window.location.href='<?=$default_html?>';

				

					</script>		



					

				<?php	}  ?>

					

					

				



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html lang="en-US" prefix="og: https://ogp.me/ns#">



<head>



<meta name="robots" content="nofollow, noindex">



<title>Get Offer</title>



<?php include("includes/analytics.php");?>



</head>



<body>

	



	



   <?  //header("location: $url"); exit();      



  if(isset($_GET['cid']) && $_GET['cid']!=""){



 $coupon_id=$_REQUEST['cid'];						



   $sql = "select c.store_id,c.couponname,s.storename, c.tracking_link,c.coupon_code,date_format(c.exp_date,'%b %d, %Y') as exp_date , c.network_id, s.status, s.store_url, s.web_address from coupons c,stores s where s.store_id = c.store_id and coupon_id= '$coupon_id' ";



			$res = $db->ExecuteQuery($sql); 



			list($store_id,$couponname,$storename,$url,$ccode,$exp_date,$network_id,$store_status,$store_url,$web_address) = $db->FetchAsArray($res);



			 



			  if($db->GetSelectedRows($res) > '0'){  

			  

			  

				       if($store_status == '0'){ $curl =  $domain."/".$store_url; }



				          if($store_status == '1'){ $curl = $url; } 

						  

						     $curl = "http://".str_replace("http://","",str_replace("https://","",$curl));

						  

						     ?>



								



                                <script type="text/javascript">



								  window.location.href='<?php echo trim($curl);?>';



								</script>

				   <?



				   }else{ header("location: $domain/404.php"); exit(); }				



				   }else{ 



				         header("location: $domain/404.php"); exit(); 



		}



?>



<!-- Google Code for Redeem Conversion Page -->





</body>



</html> <?php $db->closeConnection();?>