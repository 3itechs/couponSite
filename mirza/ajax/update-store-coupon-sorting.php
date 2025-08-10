<?php session_start();
include "../includes/DB.php";
$db= new DB();
//$action = mysql_real_escape_string($_POST['action']);
$action =  $_POST['action'];

if ($action == "sort"){
    $records = $_POST['rid'];
    $counter = 1;
    foreach ($records as $record) {
     echo   $query = "UPDATE coupons SET rank='$counter' WHERE coupon_id='$record'";
        $db->ExecuteQuery($query);
        $counter = $counter + 1;
    }
}
?>