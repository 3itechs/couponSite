<?php session_start();
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['pageid']) && $_POST['pageid'] != ''){
	
  if(isset($_REQUEST['pageid'])){$pid = $_REQUEST['pageid'];}	
  if(isset($_REQUEST['ptitle'])){$ptitle = $_REQUEST['ptitle'];}
  if(isset($_REQUEST['pdesc'])){$pdesc = $_REQUEST['pdesc'];}
  if(isset($_REQUEST['meta_title'])){$meta_title = $_REQUEST['meta_title'];}
  if(isset($_REQUEST['meta_keywords'])){$meta_keywords = $_REQUEST['meta_keywords'];}
  if(isset($_REQUEST['meta_desc'])){$meta_desc = $_REQUEST['meta_desc'];}
  if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}


$sqlUpdate = "UPDATE translation SET  ptitle = '$ptitle', "; 
$sqlUpdate .= " pdesc = '$pdesc', meta_title = '$meta_title', meta_keywords = '$meta_keywords', meta_desc = '$meta_desc', status = '$status'  "; 		 	
$sqlUpdate .="  WHERE pid='$pid'";	
 // echo $sqlUpdate; die;
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../translation.php?u=1");
 exit;
 
}  header("location: ../translation.php?u=2"); exit;
?>
