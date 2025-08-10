<?php session_start();
include("../resize-class.php");
require_once('../ImageManipulator.php');
include "../includes/DB.php";
$db= new DB(); 

if(isset($_POST['meta_title']))
    {   
	 
        $postname = addslashes(trim($_POST['postname']));		
		$storeurl = str_replace(" ","",$_POST['postname']);
		$post_heading = addslashes($_POST['post_heading']);
		$author = addslashes($_POST['author_name']);
		$feature = addslashes($_POST['feature']);
		$post_desc = $_POST['post_desc'];		  
		$post_url = addslashes($_POST['post_url']);
		$post_slug = addslashes($_POST['post_slug']);
		$post_number = addslashes($_POST['post_number']);
		$word_count = addslashes($_POST['word_count']);		
		$meta_title = addslashes($_POST['meta_title']);
		$meta_keywords = addslashes($_POST['meta_keywords']);
		$meta_desc = addslashes($_POST['meta_desc']);
		$status = $_POST['status'];
		$top = $_POST['top'];					
		$post_img = $_POST['post_img'];		
		$primary_category = $_POST['primary_category'];
		
/*		$sql_sub = $db->ExecuteQuery("select subcat_id from tags WHERE tag_id = '".$tag."'") ;  
	       list($child_category)=mysqli_fetch_array($sql_sub);
		 
		$sql_cat = $db->ExecuteQuery("select parent_id from subcategories WHERE category_id = '".$child_category."'") ;  
	        list($primary_category)=mysqli_fetch_array($sql_cat);*/
				
		if(isset($_POST['top']) && $top != ''){$top = $_POST['top'];}else{$top = '0';}	
		if(isset($_POST['feature']) && $feature != ''){$feature = $_POST['feature'];}else{$feature = '0';}						
			
		if($_FILES["post_img"]["name"] != '')
		  {
	

			/*$manipulator = new ImageManipulator($_FILES['post_img']['tmp_name']);
			$width  = $manipulator->getWidth();
			$height = $manipulator->getHeight();
			$centreX = round($width / 2);
			$centreY = round($height / 2);
			$x1 = $centreX - 330; // 200 / 2
			$y1 = $centreY - 145; // 130 / 2 
			$x2 = $centreX + 330; // 200 / 2
			$y2 = $centreY + 145; // 130 / 2
			$newImage = $manipulator->crop($x1, $y1, $x2, $y2);
			$manipulator->save(IMGPATH.'/posts/big_list/' . str_replace(" ","-",$_FILES['post_img']['name']));

			$manipulator2 = new ImageManipulator($_FILES['post_img']['tmp_name']);
			$width2  = $manipulator2->getWidth();
			$height2 = $manipulator2->getHeight();
			$centreX2 = round($width2 / 2);
			$centreY2 = round($height2 / 2);
			$x12 = $centreX2 - 250; // 200 / 2
			$y12 = $centreY2 - 143; // 130 / 2 
			$x22 = $centreX2 + 250; // 200 / 2
			$y22 = $centreY2 + 143; // 130 / 2
			$newImage2 = $manipulator2->crop($x12, $y12, $x22, $y22);
			$manipulator2->save(IMGPATH.'/posts/small_list/' . str_replace(" ","-",$_FILES['post_img']['name']));*/
			
			$tmp_img = str_replace(" ","-",$_FILES["post_img"]["name"]);
			$uploaddir = POST_IMG_UPLOADER;
			$uploadfile = $uploaddir.$tmp_img;
			move_uploaded_file($_FILES['post_img']['tmp_name'], $uploadfile);
			//$imagePath = $uploaddir.$tmp_img;   $destPath  = $uploaddir.$tmp_img;
			
			/*$imagePath = IMGPATH.'/posts/big_list/'.$tmp_img;
			$destPath = IMGPATH.'/posts/slider/'.$tmp_img;					
			
		    $db->resizeImage($imagePath, $destPath, 272,148,100); */			
		  }

 $sql_pcat = "select post_count from post_categories where category_id = '$primary_category' "; 
  $res_pcat = $db->ExecuteQuery($sql_pcat); 
    list($clicks) = $db->FetchAsArray($res_pcat);	 
         $post_count = $clicks + 1; 
 $sql_pcat_edit = "UPDATE post_categories SET post_count = '$post_count'  where category_id = '$primary_category'";	
 $rs_edit=$db->ExecuteQuery($sql_pcat_edit);
 
  /*$sql_ccat = "select post_count from subcategories where category_id = '$child_category' "; 
  $res_ccat = $db->ExecuteQuery($sql_ccat); 
    list($clicks) = $res_ccat->; 
         $post_count = $clicks + 1; 
 $sql_ccat_edit = "UPDATE subcategories SET post_count = '$post_count'  where category_id = '$child_category'";	
 $rs_edit=$db->ExecuteQuery($sql_ccat_edit);
 
  $sql_tag = "select post_count from tags where tag_id = '$tag' "; 
  $res_tag = $db->ExecuteQuery($sql_tag); 
    list($clicks) = $res_tag->; 
         $post_count = $clicks + 1; 
  $sql_tag_edit = "UPDATE tags SET post_count = '$post_count'  where tag_id = '$tag'";	
  $rs_edit = $db->ExecuteQuery($sql_tag_edit);*/
    			
				
$sql = "Insert into posts 
(postname, post_heading, author_name, post_desc, post_url, post_img, post_slug, post_number, word_count, primary_category, child_category, tag, meta_title, meta_keywords, meta_desc, status, top, feature, added_date, edited_date, added_by )Values 
('$postname', '$post_heading', '$author', '$post_desc','$post_url', '$tmp_img', '$post_slug', '$post_number', '$word_count', '$primary_category', '$child_category', '$tag', '$meta_title', '$meta_keywords', '$meta_desc', '$status', '$top', '$feature', now(), now(),'".$_COOKIE['adminname']."')";	 
	 	$rs_store=$db->ExecuteQuery($sql);	   
		//$new_id = $db->getLastInsertId(); 	 
 		  //die($sql);		  						
		header("location: ../add-post.php?a=1"); 	exit;
	} header("location: ../add-post.php?a=2"); 	exit;	 
?>
