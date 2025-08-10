<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "admin";
$fileName = "getusers.php";
$storename = "";
$country = "";
$queryCondition = "";

if(!empty($_REQUEST["uname"])) { $uname = $_REQUEST['uname'];  $queryCondition .= " and username like '%".trim($uname)."%' "; }else{$uname = '';}
if(!empty($_REQUEST["email"])) { $email = $_REQUEST['email']; $queryCondition .= ' and admin_email ='.$email;}else{$email = '';}

$orderby = " ORDER BY admin_id desc";
$sql = "SELECT admin_id, admin_name, username, admin_email, admin_level, added_date FROM $tblName where 1 " . $queryCondition;
$paginationlink = $fileName."?page=";					
$page = 1;
if(!empty($_GET["page"])) { $page = $_GET["page"]; }

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . $orderby .  " limit " . $start . "," . $perPage->perpage; // echo $query;

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
           <th><strong>Admin Name</strong></th>
           <th><strong>User Name</strong></th>
           <th><strong>Email</strong></th>          
           <th><strong>Level</strong></th>
              <th><strong>Added Date</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($admin_id, $admin_name, $username, $admin_email, $admin_level, $added_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $admin_id; ?>">
        <td class="admin_id"><?php echo $admin_id; ?></td>
        <td class="admin_name"><?php echo $admin_name; ?></td>
        <td class="username"><?php echo $username; ?></td>        
        <td class="admin_email"><?php echo $admin_email; ?></td>        
        <td class="added_by"><?php echo $admin_level; ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>
        
        <td class="action">
        <a href="#" class="btnEditAction"  id="<?php echo $admin_id; ?>" data-toggle="modal" data-target="#myModal"><img alt="Update User" src="img/edit.png"></a> <a id="<?php echo $admin_id; ?>" class="btnDeleteAction" ><img  alt="Delete User" src="img/delete2.png"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
