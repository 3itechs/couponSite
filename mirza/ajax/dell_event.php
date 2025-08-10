<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["uid"])) { $id=trim($_GET["uid"]); }	   
      $sql_admin = "DELETE FROM events  WHERE eid = '$id'";	
        $rs_admin = $db->ExecuteQuery($sql_admin);	
$db->closeConnection(); ?>
