<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "keywords";
$fileName = "getkeywords.php";
$storename = "";
$country = "";
$queryCondition = "";

if(!empty($_REQUEST["keywordname"])) { $kwdname = $_REQUEST['keywordname'];  $queryCondition .= " and keyword like '%".trim($kwdname)."%' "; }else{$kwdname = '';}
if(!empty($_REQUEST["parent"])) { $parent = $_REQUEST['parent']; $queryCondition .= ' and parent_id ='.$parent;}else{$parent = '';}
if(!empty($_REQUEST["kwd_type"])) { $kwd_type = $_REQUEST['kwd_type']; $queryCondition .= ' and kwd_type = '."'".$kwd_type."'"; }else{$kwd_type = '';}

$orderby = " ORDER BY keyword desc";
$sql = "SELECT kwd_id, keyword, kwd_type, keyword_heading, parent_id, url, img, meta_title, meta_desc, meta_keywords, date_added, status FROM $tblName where 1  " . $queryCondition;
$paginationlink = $fileName."?page=";					
$page = 1;
if(!empty($_GET["page"])) { $page = $_GET["page"]; }

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . $orderby .  " limit " . $start . "," . $perPage->perpage;  //  echo $query;

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
           <th><strong>Keyword</strong></th>
           <th><strong>Keyword Type</strong></th>	 
           <th><strong>Keyword Url</strong></th>
           <th><strong>Parent</strong></th>
           <th><strong>Added Date</strong></th>
		   <th><strong>Action</strong></th>
		   </thead>
          </tr>
        <tbody><?php
 while(list($kwd_id, $keyword, $kwd_type, $keyword_heading, $parent_id, $cat_url, $img, $meta_title, $meta_desc, $meta_keywords, $date_added, $status) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $kwd_id; ?>">
        <td class="kwd_id"><?php echo $kwd_id; ?></td>
        <td class="keyword_name"><?php echo $keyword; ?></td>        
        <td class="keyword_owner"><?php echo $kwd_type; ?></td>
        <td class="keyword_owner"><?php echo $cat_url; ?></td>
        <td class="keyword_owner"><?php echo $parent_id; ?></td>
        <td class="added_date"><?php echo $date_added; ?></td>
        
        <td class="action">
        <a href="#" class="btnEditAction"  id="<?php echo $kwd_id; ?>" data-toggle="modal" data-target="#myModal">Edit</a> <a id="<?php echo $kwd_id; ?>" class="btnDeleteAction" >Delete</a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
