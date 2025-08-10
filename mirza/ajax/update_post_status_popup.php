<?php 
include "../includes/DB.php";
$db= new DB();
if (isset($_GET["pid"])) { $pid=trim($_GET["pid"]); }	   
     
	 $sqlPosts = "SELECT post_id, status FROM posts WHERE post_id = '$pid'";               
      $res_posts = $db->ExecuteQuery($sqlPosts);            
       list($post_id, $status )= $db->FetchAsArray($res_posts);
	   
	       if($status == 'ENA'){			   
			   $sql_edit = "Update posts set status = 'DIS' WHERE post_id = '$pid'";	
                $rs_edit = $db->ExecuteQuery($sql_edit);
			   }else{
				    $sql_edit = "Update posts set status = 'ENA' WHERE post_id = '$pid'";	
                     $rs_edit = $db->ExecuteQuery($sql_edit);
				   }
	  
	  
			
$db->closeConnection(); ?>



