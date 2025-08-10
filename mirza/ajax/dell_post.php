<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["sid"])) { $sid=trim($_GET["sid"]); }	   
      $sql_store = "DELETE FROM posts  WHERE post_id = '$sid'";	
        $rs_store = $db->ExecuteQuery($sql_store);	
$db->closeConnection(); ?>



