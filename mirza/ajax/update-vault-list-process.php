<?php session_start();
//include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");

if( isset($_POST['vl_title']) && $_POST['vl_title'] != ''){
   
   if(isset($_REQUEST['sid'])){$sid = $_REQUEST['sid'];}
    if(isset($_REQUEST['vl_title'])){$vl_title = $_REQUEST['vl_title'];}
     if(isset($_REQUEST['vl_alt'])){$vl_alt = $_REQUEST['vl_alt'];}
       if(isset($_REQUEST['vl_link']))  {$vl_link = $_REQUEST['vl_link'];}
	      if(isset($_REQUEST['status']))  {$status = $_REQUEST['status'];}
 
    if($_FILES["vl_img"]["name"] != '')
		  {
			$tmp_img1 = str_replace(" ","-",$_FILES["vl_img"]["name"]);
			 $uploaddir1 = VAULT_IMG_UPLOADER;
			  $uploadfile1 = $uploaddir1.$tmp_img1;
			   move_uploaded_file($_FILES['vl_img']['tmp_name'], $uploadfile1);
			   
			   		
		      $sql_1 = "UPDATE vault_list SET vl_img = '$tmp_img1' WHERE sid = '$sid'";	 
             $rs_1 = $db->ExecuteQuery($sql_1);			
			}
			
			
$sqlUpdate = "UPDATE vault_list SET vl_title = '$vl_title', 
              vl_alt = '$vl_alt', vl_link = '$vl_link', status = '$status' WHERE sid='$sid'";			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);  // echo $sqlUpdate; die;
 header("location: ../vault-list.php?u=1");
 exit;
}	 
?>
