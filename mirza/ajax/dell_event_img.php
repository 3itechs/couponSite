<?php 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["eid"])) {
	$eid=trim($_GET["eid"]);
 }
 
  $sql_getlogo = "select event_img from events WHERE eid='$eid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($event_img) = $db->FetchAsArray($rs_getlogo);								  
       	    $logo = IMGPATH."/event/".$event_img;
	
	  unlink($logo);
	   
      $sql_logo = "UPDATE events SET event_img = '' WHERE eid='$eid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);	

$db->closeConnection(); ?>


