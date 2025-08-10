<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["pid"])) { $pid=trim($_GET["pid"]); }	   
     
	 $sqlPosts = "SELECT cmnt_id, status FROM post_comments WHERE cmnt_id = '$pid'";               
      $res_posts = $db->ExecuteQuery($sqlPosts);            
       list($post_id, $status )= $db->FetchAsArray($res_posts);
	   
	       if($status == '1'){			   
			   $sql_edit = "Update post_comments set status = '0' WHERE cmnt_id = '$pid'";	
                $rs_edit = $db->ExecuteQuery($sql_edit);
			   }else{
				    $sql_edit = "Update post_comments set status = '1' WHERE cmnt_id = '$pid'";	
                     $rs_edit = $db->ExecuteQuery($sql_edit);
				   }
	  
	  
			
$db->closeConnection(); ?>



