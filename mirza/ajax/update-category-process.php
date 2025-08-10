<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['categoryid']) && $_POST['categoryid'] != ''){
 
if(isset($_REQUEST['categoryid'])){$kwdid = $_REQUEST['categoryid'];}

if(isset($_REQUEST['category_name'])){$category_name = addslashes($_REQUEST['category_name']);}
if(isset($_REQUEST['parent_id'])){$parent_id = $_REQUEST['parent_id'];}
if(isset($_REQUEST['category_title'])){$category_title = addslashes($_REQUEST['category_title']);}
if(isset($_REQUEST['category_url'])){$category_url = addslashes($_REQUEST['category_url']);}
if(isset($_REQUEST['category_desc'])){$category_desc = addslashes($_REQUEST['category_desc']);}
if(isset($_REQUEST['meta_title'])){$meta_title = addslashes($_REQUEST['meta_title']);}
if(isset($_REQUEST['meta_keywords'])){$meta_keywords = addslashes($_REQUEST['meta_keywords']);}
if(isset($_REQUEST['meta_desc'])){$meta_desc = addslashes($_REQUEST['meta_desc']);}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
if(isset($_REQUEST['kwd_type'])){$kwd_type = $_REQUEST['kwd_type'];}

$sqlUpdate = "UPDATE categories SET category = '$category_name', parent_id = '$parent_id', category_title = '$category_title', category_url = '$category_url', "; 
$sqlUpdate .= " category_desc = '$category_desc', meta_title = '$meta_title', meta_keywords = '$meta_keywords', meta_desc = '$meta_desc', status = '$status'  "; 		 	
$sqlUpdate .="  WHERE category_id='$kwdid'";	
 //echo $sqlUpdate; die;
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../categories.php?u=1");
 exit;
 
}  header("location: ../categories.php?u=2"); exit;
?>
