<?php session_start();
// include("../resize-class.php");
include "../includes/DB.php";
$db= new DB();
$ddate = date("Y-m-d");
$store_id = $db->getStoreIDFromStoreName($_POST['storename']);
if( isset($_POST['event_title']) && $_POST['event_title'] != ''){
if(isset($_REQUEST['event_title'])){$event_title = addslashes($_REQUEST['event_title']);} 
if(isset($_REQUEST['event_url'])){$event_url = addslashes($_REQUEST['event_url']);} 
if(isset($_REQUEST['subsid'])){$eid = $_REQUEST['subsid'];}
if(isset($_REQUEST['status'])){$status = $_REQUEST['status'];}

     if(!empty($_POST["exp-sdate"]) || !empty($_POST["exp-sdate"]) ) {                                            
											$expsdate = $_POST['exp-sdate'];											
											$expsdate_ar = explode("/",$expsdate);
											$start_date =  $expsdate_ar[2]."-".$expsdate_ar[1]."-".$expsdate_ar[0];                                            
										 }
										 
	
		if(!empty($_POST["exp-edate"]) || !empty($_POST["exp-edate"]) ) {                                            
											$expedate = $_POST['exp-edate'];											
											$expedate_ar = explode("/",$expedate);
											$exp_date =  $expedate_ar[2]."-".$expedate_ar[1]."-".$expedate_ar[0];                                            
										 }	

if($_FILES["event_img"]["name"] != '')
		  {
			$tmp_img = str_replace(" ","-",$_FILES["event_img"]["name"]);
			$uploaddir = IMGPATH.'/event/';
			$uploadfile = $uploaddir.$tmp_img;
			move_uploaded_file($_FILES['event_img']['tmp_name'], $uploadfile);
		
		 $sql_logo = "UPDATE events SET event_img = '$tmp_img' WHERE eid = '$eid'";
		 	
           $rs_logo = $db->ExecuteQuery($sql_logo);
		    $imagePath = $uploaddir.$tmp_img;   $destPath  = $uploaddir.$tmp_img;					
		    $db->resizeImage($imagePath,$destPath,EVENT_WIDTH,EVENT_HEIGHT,100);  // resizeImage(imgPath,destPath,width,height,qualitiy)
			
			} 

$sqlUpdate = "UPDATE events SET event_title='$event_title', event_url='$event_url', status='$status', start_date='$start_date', exp_date='$exp_date' "; 		 	
$sqlUpdate.="  WHERE eid='$eid'";
//die($sqlUpdate);			
 $rs_Update=$db->ExecuteQuery($sqlUpdate);
 header("location: ../events.php?u=1");
 exit;
}	 
?>
