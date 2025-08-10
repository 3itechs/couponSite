<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["id"])) { $id=trim($_GET["id"]); }	   
      $sql_network = "DELETE FROM network  WHERE network_id = '$id'";	
        $rs_network = $db->ExecuteQuery($sql_network);	
$db->closeConnection(); ?>
