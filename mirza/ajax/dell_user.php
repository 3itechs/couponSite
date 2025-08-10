<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["uid"])) { $id=trim($_GET["uid"]); }

$db->userLog($_COOKIE['admin_username'],0,'user','Del',"Delete a User '$id' "); 

      $sql_admin = "DELETE FROM admin  WHERE admin_id = '$id'";	
        $rs_admin = $db->ExecuteQuery($sql_admin);	
$db->closeConnection(); ?>
