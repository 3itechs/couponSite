<?php session_start();  
include "../includes/DB.php";
$db= new DB(); 

    if(isset($_POST['cmnt_name']))
       {
       		
		$posttitle = addslashes(trim($_POST['posttitle']));
		
		$sql_post = "SELECT post_id FROM posts where post_heading = '$posttitle' ";
		 $res_post = $db->ExecuteQuery($sql_post);
		  list($postid) = $db->FetchAsArray($res_post);
	
		$cmnt_name = addslashes($_POST['cmnt_name']);
		$cmnt_email = addslashes($_POST['cmnt_email']);
        $comments = addslashes($_POST['comments']);		
		$status = addslashes($_POST['status']);
		
 $sql = "Insert into post_comments 
(cmnt_name, cmnt_email, comments,  post_id, status, added_date )Values 
('$cmnt_name', '$cmnt_email', '$comments', '$postid', '$status', now() )"; 
//die($sql);
  $rs_coupon = $db->ExecuteQuery($sql);	 	
	  header("location: ../post-comments.php?a=1"); 	exit;
	} header("location: ../post-comments.php?a=2"); 	exit;	 
?>
