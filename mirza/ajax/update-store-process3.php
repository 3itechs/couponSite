<?php session_start();
include "../includes/DB.php";
$db= new DB();
$fname = 'updatestore';
$ddate = date("Y-m-d");
   
  $storeid = addslashes(trim($_POST['storeid']));
  $external_links = addslashes($_POST['external_links']);
		
  $sqlUpdate = "UPDATE stores SET external_links = '$external_links'  WHERE store_id='$storeid'";
  $rs_Update=$db->ExecuteQuery($sqlUpdate);
 							
	header("location: ../stores.php?u=1&sid=$storeid"); exit;
 	 
?>
