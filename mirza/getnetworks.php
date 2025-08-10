<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "network";
$fileName = "getnetworks.php";
$storename = "";
$country = "";
$queryCondition = "";

if(!empty($_REQUEST["netname"])) { $netname = $_REQUEST['netname'];  $queryCondition .= " and network_name like '%".trim($netname)."%' "; }else{$netname = '';}
if(!empty($_REQUEST["owner"])) { $owner = $_REQUEST['owner']; $queryCondition .= ' and network_owner ='.$owner;}else{$owner = '';}

$orderby = " ORDER BY network_id desc";
$sql = "SELECT network_id, network_name, network_owner, added_date FROM $tblName where 1 " . $queryCondition;
$paginationlink = $fileName."?page=";					
$page = 1;
if(!empty($_GET["page"])) { $page = $_GET["page"]; }

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . $orderby .  " limit " . $start . "," . $perPage->perpage;   // echo $query;

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
           <th><strong>Network Name</strong></th>
           <th><strong>Network Owner</strong></th>
              <th><strong>Added Date</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($network_id, $network_name, $network_owner, $added_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $network_id; ?>">
        <td class="network_id"><?php echo $network_id; ?></td>
        <td class="network_name"><?php echo $network_name; ?></td>        
        <td class="network_owner"><?php echo $network_owner; ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>
        
        <td class="action">
        <a href="#" class="btnEditAction"  id="<?php echo $network_id; ?>" data-toggle="modal" data-target="#myModal"><img alt="Update Network" src="img/edit.png"></a> <a id="<?php echo $network_id; ?>" class="btnDeleteAction" ><img  alt="Delete Network" src="img/delete2.png"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
