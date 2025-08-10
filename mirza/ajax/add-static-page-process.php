<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['ptitle']) && $_POST['ptitle'] != ''){ 

if(isset($_REQUEST['ptitle'])){$ptitle = $_REQUEST['ptitle'];}
if(isset($_REQUEST['pdesc'])){$pdesc = $_REQUEST['pdesc'];}
if(isset($_REQUEST['meta_title'])){$meta_title = $_REQUEST['meta_title'];}
if(isset($_REQUEST['meta_keywords'])){$meta_keywords = $_REQUEST['meta_keywords'];}
if(isset($_REQUEST['meta_desc'])){$meta_desc = $_REQUEST['meta_desc'];}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}

if($ptitle != ''){
   $insert = "INSERT INTO pages ( ptitle, pdesc,  meta_title, meta_desc, meta_keywords, status, added_date) VALUES ( '$ptitle', '$pdesc', '$meta_title', '$meta_desc', '$meta_keywords', '$status', now())";
   $rs_insert = $db->ExecuteQuery($insert);
  // echo $insert ;  die;
   header("location: ../static-pages.php?a=1"); exit;  					
}
	  
}header("location: ../static-pages.php?a=2"); exit;

?>
