<?php

include "includes/DB.php";

$db= new DB();

require_once("pagination.class.php");

$perPage = new PerPage();

$tblName = "categories";

$fileName = "getcategories.php";

$storename = "";

$country = "";

$queryCondition = "";



if(!empty($_REQUEST["categoryname"])) { $kwdname = $_REQUEST['categoryname'];  $queryCondition .= " and category like '%".trim($kwdname)."%' "; }else{$kwdname = '';}

if(!empty($_REQUEST["parent"])) { $parent = $_REQUEST['parent']; $queryCondition .= ' and parent_id ='.$parent;}else{$parent = '';}





$orderby = " ORDER BY category desc";

$sql = "SELECT category_id, category, category_title, parent_id, category_url, img, meta_title, meta_desc, meta_keywords, date_added, status FROM $tblName where 1  " . $queryCondition;

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

           <th><strong>Category</strong></th>	 

           <th><strong>Category Url</strong></th>

           <th><strong>Parent</strong></th>

           <th><strong>Added Date</strong></th>

		   <th><strong>Action</strong></th>

		   </thead>

          </tr>

        <tbody><?php

 while(list($category_id, $category, $category_title, $parent_id, $cat_url, $img, $meta_title, $meta_desc, $meta_keywords, $date_added, $status) = $db->FetchAsArray($result))

	 { ?>

    <tr id="tr-<?php echo $category_id; ?>">

        <td class="category_id"><?php echo $category_id; ?></td>

        <td class="category"><?php echo $category; ?></td>

        <td class="category_url"><?php echo $cat_url; ?></td>

        <td class="parent_id"><?php

		 $sql_cat = "SELECT category FROM $tblName where category_id = '$parent_id' ";

          $res_cat = $db->ExecuteQuery($sql_cat);

		     list($catname) = $db->FetchAsArray($res_cat);

		 echo $catname; ?>

         </td>

        <td class="added_date"><?php echo $date_added; ?></td>

        

        <td class="action">

        <a href="#" class="btnEditAction"  id="<?php echo $category_id; ?>" data-toggle="modal" data-target="#myModal"><img src="img/edit.png"></a> <a href="#" id="<?php echo $category_id; ?>" class="btnDeleteAction" ><img  alt="Delete Category" src="img/delete2.png"></a>

        </td>

    </tr>

<?php } if(isset($perpageresult)) { ?>

<tr>

<td colspan="11" align=right> <?php echo $perpageresult; ?></td>

</tr>

<?php } ?>

<tbody>

</table>

