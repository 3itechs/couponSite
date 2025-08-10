<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['username']) && $_POST['username'] != ''){ 
if(isset($_REQUEST['userid'])){$admin_id = $_REQUEST['userid'];}
if(isset($_REQUEST['admin_name'])){$admin_name = $_REQUEST['admin_name'];}
if(isset($_REQUEST['username'])){$username = $_REQUEST['username'];}
if($_REQUEST['change_pass'] == 1){
if(isset($_REQUEST['password'])){$password = md5($_REQUEST['password']);} }
if(isset($_REQUEST['admin_email'])){$admin_email = $_REQUEST['admin_email'];}
if(isset($_REQUEST['admin_level'])){$admin_level = $_REQUEST['admin_level'];}

$db->userLog($_COOKIE['admin_username'],0,'update','update',"Update a User '$admin_name' "); 

$sqlUpdate = "UPDATE admin SET admin_name='$admin_name', username='$username', password='$password', admin_email='$admin_email', admin_level='$admin_level', status='$status' "; 		 	
$sqlUpdate.="  WHERE admin_id='$admin_id'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../users.php?u=1");
 exit;
}	 
?>
