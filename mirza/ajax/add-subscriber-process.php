<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['username']) && $_POST['username'] != ''){ 

$store_id = $db->getStoreIDFromStoreName($_POST['storename']);
if(isset($_REQUEST['username'])){$username = $_REQUEST['username'];}
if(isset($_REQUEST['email'])){$email = $_REQUEST['email'];}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}

if($username != ''){
$insert2 = "INSERT INTO subscribers (username, email, store_id, status, added_date) VALUES ('$username', '$email', '$store_id', '$status', now())";	
$rs_insert = $db->ExecuteQuery($insert2);}
 header("location: ../subscribers.php?a=1"); exit;	  					
}
	  header("location: ../subscribers.php?a=2"); exit;
?>
