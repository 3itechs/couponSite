<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["id"])) { $id=trim($_GET["id"]); }	   
      $sql_page = "DELETE FROM translation  WHERE pid = '$id'";	
        $rs_page = $db->ExecuteQuery($sql_page);	
$db->closeConnection(); ?>
