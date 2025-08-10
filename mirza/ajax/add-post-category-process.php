<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['category_name']) && $_POST['category_name'] != ''){ 

if(isset($_REQUEST['category_name'])){$category_name = addslashes($_REQUEST['category_name']);}
if(isset($_REQUEST['parent_id'])){$parent_id = $_REQUEST['parent_id'];}
if(isset($_REQUEST['category_title'])){$category_title = addslashes($_REQUEST['category_title']);}
if(isset($_REQUEST['category_url'])){$category_url = addslashes($_REQUEST['category_url']);}
if(isset($_REQUEST['category_desc'])){$category_desc = addslashes($_REQUEST['category_desc']);}
if(isset($_REQUEST['meta_title'])){$meta_title = addslashes($_REQUEST['meta_title']);}
if(isset($_REQUEST['meta_keywords'])){$meta_keywords = addslashes($_REQUEST['meta_keywords']);}
if(isset($_REQUEST['meta_desc'])){$meta_desc = addslashes($_REQUEST['meta_desc']);}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
if(isset($_REQUEST['tags'])){$tags = $_REQUEST['tags'];}

if($category_name != ''){
   $insert = "INSERT INTO post_categories ( category, category_title, parent_id, category_url, img, category_desc,  meta_title, meta_desc, meta_keywords, status, date_added) VALUES (  
   '$category_name', '$category_title', '$parent_id', '$category_url', '$img', '$category_desc', '$meta_title', '$meta_desc', '$meta_keywords', '$status', now())";
   $rs_insert = $db->ExecuteQuery($insert);
  // echo $insert ;  die;
   header("location: ../post-categories.php?a=1"); exit;  					
}
	  
}header("location: ../post-categories.php?a=2"); exit;

?>
