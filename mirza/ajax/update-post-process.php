<?php session_start(); 
include "../includes/DB.php";
$db= new DB();
include("../resize-class.php");
require_once('../ImageManipulator.php');

$fname = 'updatestore';
$ddate = date("Y-m-d");
$er = '';
$errStr="";
//print_r($_POST);  die;
 if(isset($_POST['meta_title']))   
       {    
	    $postid = addslashes(trim($_POST['postid']));
		$postname = addslashes(trim($_POST['postname']));		
		$storeurl = str_replace(" ","",$_POST['postname']);
		$post_heading = addslashes($_POST['post_heading']);
		
		$author = addslashes($_POST['author_name']);
		$post_desc = addslashes($_POST['post_desc']);
				  
		$post_url = addslashes($_POST['post_url']);
		$post_slug = addslashes($_POST['post_slug']);
		$post_number = addslashes($_POST['post_number']);
		$word_count = addslashes($_POST['word_count']);
		$primary_category = $_POST['primary_category'];
		
		/*$sql_sub = $db->ExecuteQuery("select subcat_id from tags WHERE tag_id = '".$tag."'") ;  
	     list($child_category)=mysqli_fetch_array($sql_sub);
		 
		$sql_cat = $db->ExecuteQuery("select parent_id from subcategories WHERE category_id = '".$child_category."'") ;  
	     list($primary_category)=mysqli_fetch_array($sql_cat);*/
		
		$meta_title = addslashes($_POST['meta_title']);
		$meta_keywords = addslashes($_POST['meta_keywords']);
		$meta_desc = addslashes($_POST['meta_desc']);
		$status = $_POST['status'];
		$top = $_POST['top'];
		$feature = $_POST['feature'];				
						
		$post_img = $_POST['post_img'];
				
		if(isset($_POST['top']) && $top != ''){$top = $_POST['top'];}else{$top = '0';}	
		if(isset($_POST['feature']) && $feature != ''){$feature = $_POST['feature'];}else{$feature = '0';}						
			
		if($_FILES["post_img"]["name"] != '')
		  {
			/* $manipulator = new ImageManipulator($_FILES['post_img']['tmp_name']);
			$width  = $manipulator->getWidth();
			$height = $manipulator->getHeight();
			$centreX = round($width / 2);
			$centreY = round($height / 2);
			$x1 = $centreX - 380; // 200 / 2
			$y1 = $centreY - 225; // 130 / 2 
			$x2 = $centreX + 380; // 200 / 2
			$y2 = $centreY + 225; // 130 / 2
			$newImage = $manipulator->crop($x1, $y1, $x2, $y2);
			$manipulator->save(IMGPATH.'/posts/temp/' . str_replace(" ","-",$_FILES['post_img']['name']));

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
			$uploaddir = IMGPATH.'/posts/';
			$uploadfile = $uploaddir.$tmp_img;
			move_uploaded_file($_FILES['post_img']['tmp_name'], $uploadfile);		
		       $sql_logo = "UPDATE posts SET post_img = '$tmp_img' WHERE post_id = '$postid'";	// die;
            $rs_logo = $db->ExecuteQuery($sql_logo);
			
			/*$imagePath = IMGPATH.'/posts/temp/'.$tmp_img;
			$destPath_big = IMGPATH.'/posts/big_list/'.$tmp_img;					
			
		    $db->resizeImage($imagePath, $destPath_big, 660,300,100); 
			
			$imagePath = IMGPATH.'/posts/big_list/'.$tmp_img;
			$destPath_small = IMGPATH.'/posts/small_list/'.$tmp_img;					
			
		    $db->resizeImage($imagePath, $destPath_small, 450,240,100); 
			
			$imagePath = IMGPATH.'/posts/big_list/'.$tmp_img;
			$destPath = IMGPATH.'/posts/slider/'.$tmp_img;					
			
		    $db->resizeImage($imagePath, $destPath, 265,120,100);*/ 
			
			} 
				
 $sqlUpdate = "UPDATE posts SET postname='$postname' ,post_heading='$post_heading' ,author_name='$author', post_desc='$post_desc', post_url='$post_url', post_slug='$post_slug', post_number = '$post_number', word_count = '$word_count', primary_category = '$primary_category', child_category='$child_category', tag = '$tag', meta_title = '$meta_title', meta_keywords='$meta_keywords', meta_desc='$meta_desc', status = '$status', top='$top', feature='$feature', added_date='$added_date', edited_date = now(),  "; 	 		 	
$sqlUpdate.="edited_by = '".$_COOKIE['adminname']."'   WHERE post_id='$postid'";  
$rs_Update=$db->ExecuteQuery($sqlUpdate);	//echo $sqlUpdate;  die;						
		header("location: ../update-post.php?u=1&pid=$postid");
		exit;
} ?>