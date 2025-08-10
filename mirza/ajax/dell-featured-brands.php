<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["sid"])) { $sid=trim($_GET["sid"]); }	   
      $sql_admin = "DELETE FROM featured_brands  WHERE sid = '$sid'";	
        $rs_admin = $db->ExecuteQuery($sql_admin);	
$db->closeConnection(); ?>