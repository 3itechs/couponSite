<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['network_name']) && $_POST['network_name'] != ''){ 

if(isset($_REQUEST['network_name'])){$network_name = $_REQUEST['network_name'];}
if(isset($_REQUEST['network_owner'])){$network_owner = $_REQUEST['network_owner'];}

	if($network_name != ''){
	   $insert = "INSERT INTO network (network_name, network_owner, status, added_date) VALUES ('$network_name', '$network_owner', '1', now())";
	   $rs_insert = $db->ExecuteQuery($insert);	
	   header("location: ../networks.php?a=1"); exit;  					
	}	  
} header("location: ../networks.php?a=2"); exit;
?>
