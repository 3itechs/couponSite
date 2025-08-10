<?php session_start();
include "../includes/DB.php";
$db= new DB();

if($_POST['id'])
	{
	$cid=$_POST['id'];
	$aid=$_POST['aid'];
	$sql = $db->ExecuteQuery("SELECT category_id, category FROM categories WHERE parent_id = '$cid'  ");
	while($row=mysqli_fetch_array($sql))
	{
	$userid=$row['category_id'];
	$data=$row['category'];
	if($cid == $userid ){ $select = "selected";}else{$select = "";}
	echo '<option '.$select.' value="'.$userid.'">'.$data.'</option>';
	}
} 


?>
