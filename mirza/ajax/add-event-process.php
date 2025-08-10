<?php session_start();
include "../includes/DB.php";
$db= new DB(); 
if( isset($_POST['event_title']) && $_POST['event_title'] != ''){ 
if(isset($_REQUEST['event_title'])){$event_title = addslashes($_REQUEST['event_title']);}
if(isset($_REQUEST['event_url'])){$event_url = addslashes($_REQUEST['event_url']);}
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
		
		    $imagePath = $uploaddir.$tmp_img;   $destPath  = $uploaddir.$tmp_img;						
		    $db->resizeImage($imagePath,$destPath,EVENT_WIDTH,EVENT_HEIGHT,100);  // resizeImage(imgPath,destPath,width,height,qualitiy)
			
			}

if($event_title != ''){
echo $insert2 = "INSERT INTO events (event_title, event_url, event_img, status, added_date, start_date, exp_date) VALUES ('$event_title', '$event_url', '$tmp_img', '$status', now(), '$start_date', '$exp_date')";	
$rs_insert = $db->ExecuteQuery($insert2);}
 header("location: ../events.php?a=1"); exit;	  					
}
	  header("location: ../events.php?a=2"); exit;
?>
