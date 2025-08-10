<?php session_start();

include "includes/DB.php";
$db= new DB(); 
//print_r($_POST);
//if( $db->checkViewPermission('store')!='1'){  header("location: index.php"); exit(); }  

if( isset($_POST['username']) && $_POST['username'] != ''){ 

if(isset($_REQUEST['username'])){$username=$_REQUEST['username'];}
if(isset($_REQUEST['password'])){$password=$_REQUEST['password'];}
if(isset($_REQUEST['admin_email'])){$admin_email=$_REQUEST['admin_email'];}
if(isset($_REQUEST['admin_level'])){$admin_level=$_REQUEST['admin_level'];}

if($username != ''){
$insert2 = "INSERT INTO admin (username, password, admin_email, admin_level, status) VALUES ('$username', '$password', '$admin_email', '$admin_level', '1')";						$rs_insert = $db->ExecuteQuery($insert2);}

$username = ''; 	 $password = ''; $admin_email = ''; $admin_level = '';
	  					
}
// unset($_POST);
	  header("location: users.php");
?>
