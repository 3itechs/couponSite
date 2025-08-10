<?php session_start();  
$sesid = session_id(); 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["sid"])) {
	$sid=trim($_GET["sid"]);
 }
 
  $sql_getthumb = "select store_thumbnail from stores WHERE store_id='$sid'";	
    $rs_getthumb = $db->ExecuteQuery($sql_getthumb);
 	  list($sthumb) = $db->FetchAsArray($rs_getthumb);									  
       $thumb = THUMB_UPLOADER.$sthumb;
	   unlink($thumb);
   
      $sql_thumb = "UPDATE stores SET store_thumbnail = '' WHERE store_id='$sid'";	
            $rs_thumb = $db->ExecuteQuery($sql_thumb);	

mysql_close();
?>
