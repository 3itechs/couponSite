<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "events";
$fileName = "getevents.php";
$storename = "";
$country = "";
$queryCondition = "";

if(!empty($_REQUEST["uname"])) { $uname = $_REQUEST['uname'];  $queryCondition .= " and event_title like '%".trim($uname)."%' "; }else{$uname = '';}
if(!empty($_REQUEST["event_img"])) { $event_img = $_REQUEST['event_img']; $queryCondition .= " and event_img like '%".trim($event_img)."%' "; }else{$event_img = '';}

if(!empty($_POST["status"])) { $status = $_POST['status']; $queryCondition .= ' and status ='."'".$status."'";}else{$status = '';}

$orderby = " ORDER BY eid desc";
$sql = "SELECT eid, event_title, event_url, event_img, status, added_date FROM $tblName where 1 " . $queryCondition;
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
           <th><strong>Event Title</strong></th>
           <th><strong>Event Url</strong></th>
           <!--<th><strong>Event Image</strong></th> -->         
           <th><strong>Status</strong></th>
              <th><strong>Added Date</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($eid, $event_title, $event_url, $event_img, $status, $added_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $eid; ?>">
        <td class="eid"><?php echo $eid; ?></td>
        <td class="event_title"><?php echo $event_title; ?></td>
        <td class="event_url"><?php echo $event_url; ?></td>        
       <!-- <td class="event_img">        
        <a data-toggle="modal" data-target="#myModal" class="btnImg" id="<?php echo $eid; ?>" href="#"><img src="../assets/img/event/<?php echo $event_img; ?>" height="50" width="50" ></a>-->
        </td>
        <td class="added_by"><?php if($status == 'ENA'){ echo "Enable";}else{echo "Disable";} ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>
        
        <td class="action">
        <!--<a href="#" class="btnEditAction"  id="<?php echo $eid; ?>" data-toggle="modal" data-target="#myModal">Edit</a>--> 
        <a target="_blank" href="update-event.php?eid=<?php echo $eid; ?>" class="btnEditAction"  id="<?php echo $eid; ?>" ><img src="img/edit.png"></a> <a href="#" id="<?php echo $eid; ?>" class="btnDeleteAction" ><img src="img/delete.png"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>

<tbody>
</table>
