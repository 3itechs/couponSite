<?php session_start();
include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['keywordid']) && $_POST['keywordid'] != ''){
 
if(isset($_REQUEST['keywordid'])){$kwdid = $_REQUEST['keywordid'];}

if(isset($_REQUEST['keyword_name'])){$keyword_name = $_REQUEST['keyword_name'];}
if(isset($_REQUEST['parent_id'])){$parent_id = $_REQUEST['parent_id'];}
if(isset($_REQUEST['keyword_heading'])){$keyword_heading = $_REQUEST['keyword_heading'];}
if(isset($_REQUEST['url'])){$url = $_REQUEST['url'];}
if(isset($_REQUEST['keyword_desc'])){$keyword_desc = $_REQUEST['keyword_desc'];}
if(isset($_REQUEST['meta_title'])){$meta_title = $_REQUEST['meta_title'];}
if(isset($_REQUEST['meta_keywords'])){$meta_keywords = $_REQUEST['meta_keywords'];}
if(isset($_REQUEST['meta_desc'])){$meta_desc = $_REQUEST['meta_desc'];}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}
if(isset($_REQUEST['kwd_type'])){$kwd_type = $_REQUEST['kwd_type'];}

$sqlUpdate = "UPDATE keywords SET keyword = '$keyword_name', parent_id = '$parent_id', keyword_heading = '$keyword_heading', url = '$url', kwd_type = '$kwd_type',  "; 
$sqlUpdate .= " keyword_desc = '$keyword_desc', meta_title = '$meta_title', meta_keywords = '$meta_keywords', meta_desc = '$meta_desc', status = '$status'  "; 		 	
$sqlUpdate .="  WHERE kwd_id='$kwdid'";	
 //echo $sqlUpdate; die;
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../keywords.php?u=1");
 exit;
 
}  header("location: ../keywords.php?u=2"); exit;
?>
