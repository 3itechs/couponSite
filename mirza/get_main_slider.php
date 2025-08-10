<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "main_slider";
$fileName = "get_main_slider.php";
$country = "";
$queryCondition = "";

if(!empty($_REQUEST["title"])) { $ms_title = $_REQUEST['title'];  $queryCondition .= " and ms_title like '%".trim($ms_title)."%' "; }else{$ms_title = '';}


$orderby = " ORDER BY sid desc";
$sql = "SELECT sid, ms_title, ms_alt, ms_link, ms_img, status, added_date FROM $tblName where 1 " . $queryCondition;
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
           <th><strong>Slider Title</strong></th>
           <th><strong>Slider Link</strong></th>
              <th><strong>Added Date</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($sid, $ms_title, $ms_alt, $ms_link, $ms_img, $status, $added_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $sid; ?>">
        <td class="sid"><?php echo $sid; ?></td>
        <td class="title"><?php echo $ms_title; ?></td>        
        <td class="link"><?php echo $ms_link; ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>
        
        <td class="action">
        <a href="#" class="btnEditAction"  id="<?php echo $sid; ?>" data-toggle="modal" data-target="#myModal"><img alt="Update it" src="img/edit.png"></a> <a id="<?php echo $sid; ?>" class="btnDeleteAction" ><img  alt="Delete it" src="img/delete2.png"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
