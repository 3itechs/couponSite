<?php session_start();
//include("../resize-class.php");
include "../includes/DB.php";
$db= new DB(); 
$fname = 'update-post-comments-process.php';
$ddate = date("Y-m-d");
$er = '';
$errStr="";

if(isset($_POST['cmnt_name']))  
    {    
	    $cmntid = addslashes(trim($_POST['cmntid']));		
		$posttitle = addslashes(trim($_POST['posttitle']));
		
		$sql_post = "SELECT post_id FROM posts where post_heading = '$posttitle' ";
		 $res_post = $db->ExecuteQuery($sql_post);
		  list($postid) = $db->FetchAsArray($res_post);
	
		$cmnt_name = addslashes($_POST['cmnt_name']);
		$cmnt_email = addslashes($_POST['cmnt_email']);
        $comments = addslashes($_POST['comments']);		
		$status = addslashes($_POST['status']);
   			
 $sqlUpdate = "UPDATE post_comments SET cmnt_name = '$cmnt_name',  cmnt_email = '$cmnt_email', comments='$comments', added_date = now(), post_id='$postid', status='$status'  WHERE cmnt_id='$cmntid'";	
    $rs_Update = $db->ExecuteQuery($sqlUpdate);
	//$db->userLog($_COOKIE['admin_username'],$post_id,'coupon','update',"Updated a Coupon of '$storename' having ID '$cmntid' "); // User Logs
						
		header("location: ../update-post-comments.php?cid=$cmntid&u=1");
		exit;
} ?>
