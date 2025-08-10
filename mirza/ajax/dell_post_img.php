<?php session_start();  
$sesid = session_id(); 
include "../includes/DB.php";
$db= new DB();

if (isset($_GET["pid"])) {
	$pid=trim($_GET["pid"]);
 }
 
  $sql_getlogo = "select post_img from posts WHERE post_id='$pid'";	
    $rs_getlogo = $db->ExecuteQuery($sql_getlogo);
 	  list($post_img) = $db->FetchAsArray($rs_getlogo);								  
       $pimg = POST_IMG_UPLOADER.$post_img;	
	  unlink($pimg);
	  
	     
      $sql_logo = "UPDATE posts SET post_img = '' WHERE post_id='$pid'";	
            $rs_logo = $db->ExecuteQuery($sql_logo);	

mysql_close();
?>
