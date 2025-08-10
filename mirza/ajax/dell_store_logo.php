<?php session_start();  
$sesid = session_id(); 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["sid"])) {
	$sid=trim($_GET["sid"]);
 }
 
  $sql_getlogo = "select store_logo from stores WHERE store_id='$sid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($slogo) = $db->FetchAsArray($rs_getlogo);								  
       $logo = SLOGO_UPLOADER.$slogo;
	
	  unlink($logo);
	   
      $sql_logo = "UPDATE stores SET store_logo = '' WHERE store_id='$sid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);	

mysql_close();
?>
