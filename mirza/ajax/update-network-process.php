<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['network_name']) && $_POST['network_name'] != ''){
 
if(isset($_REQUEST['networkid'])){$network_id = $_REQUEST['networkid'];}
if(isset($_REQUEST['network_name'])){$network_name = $_REQUEST['network_name'];}
if(isset($_REQUEST['network_owner'])){$network_owner = $_REQUEST['network_owner'];}

$sqlUpdate = "UPDATE network SET network_name = '$network_name', network_owner = '$network_owner'  "; 		 	
$sqlUpdate.="  WHERE network_id='$network_id'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../networks.php?u=1");
 exit;
}	 
?>
