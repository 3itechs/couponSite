<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['username']) && $_POST['username'] != ''){ 

if(isset($_REQUEST['admin_name'])){$admin_name = $_REQUEST['admin_name'];}
if(isset($_REQUEST['username'])){$username = $_REQUEST['username'];}
if(isset($_REQUEST['password'])){$password = md5($_REQUEST['password']);}
if(isset($_REQUEST['admin_email'])){$admin_email = $_REQUEST['admin_email'];}
if(isset($_REQUEST['admin_level'])){$admin_level = $_REQUEST['admin_level'];}

if($username != ''){
$insert2 = "INSERT INTO admin (admin_name, username, password, admin_email, admin_level, status) VALUES ('$admin_name','$username', '$password', '$admin_email', '$admin_level', '1')";						$rs_insert = $db->ExecuteQuery($insert2);}

$db->userLog($_COOKIE['admin_username'],0,'user','add',"Add a User '$admin_name' "); 

 header("location: ../users.php?a=1"); exit;	  					
}
	  header("location: ../users.php?a=2"); exit;
?>
