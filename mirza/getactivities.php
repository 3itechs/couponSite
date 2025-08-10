<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "user_action_log";
$fileName = "getactivities.php";
$user_name = "";
$country = "";
$queryCondition = "";


if(!empty($_POST["uname"])) { $uname = $_POST['uname'];  $queryCondition .= " and user_name = '".trim($uname)."' "; }else{$uname = '';}
if(!empty($_POST["section"])) { $section = $_POST['section'];  $queryCondition .= " and section = '".trim($section)."' "; }else{$section = '';}
if(!empty($_POST["action"])) { $action = $_POST['action'];  $queryCondition .= " and action = '".trim($action)."' "; }else{$action = '';}

if(!empty($_POST["adsdate"]) || !empty($_POST["adedate"]) ) {
                                            
											$adsdate = $_POST['adsdate'];											
											$adsdate_ar = explode("/",$adsdate);
											$ad_sdate =  "'".$adsdate_ar[2]."-".$adsdate_ar[1]."-".$adsdate_ar[0]."'";
											           
											$adedate = $_POST['adedate'];
											$adedate_ar = explode("/",$adedate);
											$ad_edate =  "'".$adedate_ar[2]."-".$adedate_ar[1]."-".$adedate_ar[0]."'";
											 
											$queryCondition .= ' and ( added_date >= '.$ad_sdate.' AND added_date <= '.$ad_edate." )";
                                            
										 }
										 


$orderby = " ";
$sql = "SELECT ual_id, user_name, store_id, section, action, detail, added_date FROM $tblName where 1 " . $queryCondition;
$paginationlink = $fileName."?page=";					
$page = 1;
if(!empty($_GET["page"])) { $page = $_GET["page"]; }

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . $orderby .  " limit " . $start . "," . $perPage->perpage;  /* print_r($_POST);*/ //  echo $query;

$res_total = $db->ExecuteQuery($sql);

if(empty($_GET["rowcount"])) {
   $_GET["rowcount"] = $db->GetSelectedRows($res_total);
}
$result = $db->ExecuteQuery($query);
if($page !=''){ $curpage = $page;}else{$curpage = "1";}

echo "<span>Page <b>" . $curpage . "</b> of <b>" . $_GET["rowcount"] . "</b> Records</span>";
$perpageresult = $perPage->perpage($_GET["rowcount"], $paginationlink); ?>
	<table cellpadding="10" cellspacing="1" class="table table-striped table-hover table-bordered" >
        <thead>
		 <tr>
           <th><strong>ID</strong></th>
           <th><strong>User Name</strong></th>
           <th><strong>Section</strong></th>
           <th><strong>Action</strong></th>
           <th><strong>Store Name</strong></th>
		   <th><strong>Details</strong></th>           
           <th><strong>Added Date</strong></th>
		   <?php /*?><th><strong>Action</strong></th><?php */?>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($ual_id, $user_name, $store_id, $section, $action, $detail, $added_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $ual_id; ?>">
        <td class="user_name"><?php echo $ual_id; ?></td>
        <td class="user_name"><?php echo $user_name; ?></td>
        <td class="added_by"><?php echo $section; ?></td>      
        <td class="added_by"><?php echo $action; ?></td>
        <td class="network_id"><?php  
	   $sql_netwrok="select storename from stores where store_id = '".$store_id."'";		 
	     $rs_network = $db->ExecuteQuery($sql_netwrok);												
		  list($storename) = $db->FetchAsArray($rs_network);		
		 if($storename != ""){echo $storename; }else{echo $store_id;} ?></td>       
        <td class="web_address"><?php echo $detail; ?></td>        
        <td class="added_date"><?php echo $added_date; ?></td>
       
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
