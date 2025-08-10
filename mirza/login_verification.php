<?php session_start();
include "includes/DB.php";
$db= new DB();
	
$ref = $_POST['ref'];
$username = $_POST['username'];
$_SESSION['pwd']  = $_POST['password'];
$pass  = md5($_POST['password']);

   echo $sql = "select admin_id, admin_name, username, password ,level_id from admin where username = '$username' and password = '$pass'";  
	$result= $db->ExecuteQuery($sql);		
	if(mysqli_num_rows($result)) 
	   {  	 
			$row = mysqli_fetch_array($result);
			setcookie("admin_username", $row['username'], COOKIETIME); 
			setcookie("adminname", $row['admin_name'], COOKIETIME); 
			setcookie("adminid", $row['admin_id'], COOKIETIME); 
			setcookie("levelid", $row['level_id'], COOKIETIME);
				
			if($ref!=''){$url=$ref;}else{$url=DOMAINVAR."/index.php";}			
			
			if($url == DOMAINVAR."/login.php?error=1" || $url == DOMAINVAR."/update_password.php?a=1"){
			   $url=DOMAINVAR."/index.php";
			  }
			 
			header("location: ".$url);	exit;		
	}else {	  
			header("location: login.php?r=1"); exit;
		 }
	?>