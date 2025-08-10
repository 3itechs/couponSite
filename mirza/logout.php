<?php session_start();
include "includes/DB.php";
$db= new DB();
session_destroy();
//$db->userLog($_COOKIE['admin_username'],"Logged out ",'login'); // User Logs
setcookie("remember_me", '', time()-((3600*24)*365),"/");
setcookie("admin_name", "", time()-3600);
setcookie("admin_username", "", time()-3600);
setcookie("adminid", "", time()-36000);
setcookie("levelid", "", time()-3600);
/*unset($_COOKIE['admin_username']);
unset($_COOKIE['adminid']);
unset($_COOKIE['levelid']);*/
$url=DOMAINVAR."/login.php";
header("location: ".$url);
exit;
?>

