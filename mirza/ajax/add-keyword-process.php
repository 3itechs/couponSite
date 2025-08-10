<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['keyword_name']) && $_POST['keyword_name'] != ''){ 

if(isset($_REQUEST['keyword_name'])){$keyword_name = $_REQUEST['keyword_name'];}
if(isset($_REQUEST['parent_id'])){$parent_id = $_REQUEST['parent_id'];}
if(isset($_REQUEST['keyword_heading'])){$keyword_heading = $_REQUEST['keyword_heading'];}
if(isset($_REQUEST['url'])){$url = $_REQUEST['url'];}
if(isset($_REQUEST['keyword_desc'])){$keyword_desc = $_REQUEST['keyword_desc'];}
if(isset($_REQUEST['meta_title'])){$meta_title = $_REQUEST['meta_title'];}
if(isset($_REQUEST['meta_keywords'])){$meta_keywords = $_REQUEST['meta_keywords'];}
if(isset($_REQUEST['meta_desc'])){$meta_desc = $_REQUEST['meta_desc'];}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
if(isset($_REQUEST['tags'])){$tags = $_REQUEST['tags'];}

if($keyword_name != ''){
   $insert = "INSERT INTO keywords ( keyword, keyword_heading, parent_id, url, img, keyword_desc,  meta_title, meta_desc, meta_keywords, kwd_type, status, date_added) VALUES (  
   '$keyword_name', '$keyword_heading', '$parent_id', '$cat_url', '$img', '$meta_title', '$meta_desc', '$meta_keywords', '$date_added', '$kwd_type', '$status', now())";
   $rs_insert = $db->ExecuteQuery($insert);
  // echo $insert ;  die;
   header("location: ../keywords.php?a=1"); exit;  					
}
	  
}header("location: ../keywords.php?a=2"); exit;

?>
