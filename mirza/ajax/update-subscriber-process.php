<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");
$store_id = $db->getStoreIDFromStoreName($_POST['storename']);
if( isset($_POST['username']) && $_POST['username'] != ''){

if(isset($_REQUEST['username'])){$username = $_REQUEST['username'];} 
if(isset($_REQUEST['subsid'])){$id = $_REQUEST['subsid'];}
if(isset($_REQUEST['email'])){$email = $_REQUEST['email'];}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}

$sqlUpdate = "UPDATE subscribers SET username='$username' ,email='$email', store_id='$store_id', status='$status' "; 		 	
$sqlUpdate.="  WHERE id='$id'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../subscribers.php?u=1");
 exit;
}	 
?>
