<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "home_sliders";
$fileName = "getsliders.php";
$country = "";
$queryCondition = "";

if(!empty($_REQUEST["uname"])) { $uname = $_REQUEST['uname'];  $queryCondition .= " and name like '%".trim($uname)."%' "; }else{$uname = '';}
if(!empty($_REQUEST["email"])) { $email = $_REQUEST['email']; $queryCondition .= " and email like '%".trim($email)."%' "; }else{$email = '';}

$orderby = " ORDER BY sid desc";
$sql = "SELECT sid, slider_title, p1_title, status, added_date FROM $tblName where 1 " . $queryCondition;
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
           <th><strong>Slider Name</strong></th>
           <th><strong>Product Title</strong></th>
              <th><strong>Added Date</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($id, $name, $title, $status, $added_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $id; ?>">
        <td class="sid"><?php echo $id; ?></td>
        <td class="name"><?php echo $name; ?></td>        
        <td class="title"><?php echo $title; ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>
        
        <td class="action">
        <a href="#" class="btnEditAction"  id="<?php echo $id; ?>" data-toggle="modal" data-target="#myModal"><img alt="Update it" src="img/edit.png"></a> <a id="<?php echo $id; ?>" class="btnDeleteAction" ><img  alt="Delete it" src="img/delete2.png"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
