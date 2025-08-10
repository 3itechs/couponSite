<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["id"])) { $id=trim($_GET["id"]); }	   
      $sql_admin = "DELETE FROM categories  WHERE category_id = '$id'";	
        $rs_admin = $db->ExecuteQuery($sql_admin);	
$db->closeConnection(); ?>
