<?php

include "includes/DB.php";

$db= new DB();

require_once("pagination.class.php");

$perPage = new PerPage();

$tblName = "translation";

$fileName = "gettranslation.php";

$storename = "";

$country = "";

$queryCondition = "";



if(!empty($_REQUEST["ptitle"])) { $kwdname = $_REQUEST['ptitle'];  $queryCondition .= " and category like '%".trim($kwdname)."%' "; }else{$kwdname = '';}



$orderby = " ORDER BY pid ASC";



$sql = "SELECT pid, ptitle, pdesc, meta_title, meta_desc, meta_keywords, added_date, status FROM $tblName where 1  " . $queryCondition;

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

           <th><strong>Page Title</strong></th>	 

           <th><strong>Meta Title</strong></th>

           <th><strong>Added Date</strong></th>

		   <th><strong>Action</strong></th>

		   </thead>

          </tr>

        <tbody><?php

 while(list($page_id, $ptitle, $pdesc, $meta_title, $meta_desc, $meta_keywords, $added_date, $status) = $db->FetchAsArray($result))

	 { ?>

    <tr id="tr-<?php echo $page_id; ?>">

        <td class="page_id"><?php echo $page_id; ?></td>

        <td class="ptitle"><?php echo $ptitle; ?></td>

        <td class="meta_title"><?php echo $meta_title; ?></td>

        <td class="added_date"><?php echo $added_date; ?></td>        

        <td class="action">

        <a target="_blank" href="update-translation.php?id=<?php echo $page_id; ?>" class="btnEditAction"  id="<?php echo $page_id; ?>" ><img src="img/edit.png"></a> <a href="#" id="<?php echo $page_id; ?>" class="btnDeleteAction" ><img src="img/delete.png"></a>

        </td>

    </tr>

<?php } if(isset($perpageresult)) { ?>

<tr>

<td colspan="11" align=right> <?php echo $perpageresult; ?></td>

</tr>

<?php } ?>

<tbody>

</table>

