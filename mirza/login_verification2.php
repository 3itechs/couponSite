<?php session_start();
include "includes/DB.php";
$db= new DB();
	

			setcookie("admin_username", 'admin', COOKIETIME); 
			setcookie("adminid", 'admin', COOKIETIME); 
			setcookie("levelid", '1', COOKIETIME);
				
			
			header("location: index.php");
	?>