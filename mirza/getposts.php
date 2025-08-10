<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "posts";
$fileName = "getposts.php";
$postname = "";
$country = "";
$queryCondition = "";
if(!empty($_POST["storeid"])) { $storeid = $_POST['storeid'];  $queryCondition .= " and post_id = '".trim($storeid)."' "; }else{$storeid = '';}
if(!empty($_POST["sname"])) { $sname = $_POST['sname'];  $queryCondition .= " and postname like '%".trim($sname)."%' "; }else{$sname = '';}
if(!empty($_POST["network"])) { $network = $_POST['network']; $queryCondition .= ' and network_id ='.$network;}else{$network = '';}
if(!empty($_POST["status"])) { $status = $_POST['status']; $queryCondition .= ' and status ='."'".$status."'";}else{$status = '';}

if(!empty($_POST["country"])) { $country = $_POST['country']; $queryCondition .= ' and country ='."'".$country."'";}else{$country = '';}
if(!empty($_POST["category"])) { $category = $_POST['category']; $queryCondition .= ' and primary_category ='."'".$category."'";}else{$category = '';}

if($_POST['feature'] == 1){ $feature = $_POST['feature']; $queryCondition .= ' and feature = '."'".$feature."'";}
if (isset($_POST['top']) && $_POST['top'] == 1) { $top = $_POST['top']; $queryCondition .= ' and top = '."'".$top."'";}else{ $top ='0';}

$orderby = " ORDER BY post_id desc";
$sql = "SELECT post_id, postname, post_heading, post_url, primary_category, child_category, tag, status, added_by, added_date, edited_by, edited_date FROM $tblName where 1 " . $queryCondition;
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
           <th><strong>Post Heading</strong></th>       
           <th><strong>Category</strong></th>
          <!-- <th><strong>Sub Category</strong></th>
		   <th><strong>Tag</strong></th> -->          
            <th><strong>Post Url</strong></th>
             <th><strong>Added By</strong></th>
              <th><strong>Added Date</strong></th>
               <th><strong>Edited By</strong></th>
                <th><strong>Published</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($post_id, $postname, $post_heading, $post_url, $primary_category, $child_category, $tag, $status, $added_by, $added_date, $edited_by, $edited_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $post_id; ?>">
        <td class="postid"><?php echo $post_id; ?></td>
        <td class="postheading"><?php echo $post_heading; ?></td>
        <td class="primary_category"><?php echo $db->getPostCategoryFromID($primary_category); ?></td>
      <!--   <td class="added_by"><?php // echo $db->getSubCategoryFromID($child_category); ?></td>
        <td class="web_address"><?php // echo $db->getTagFromID($tag); ?></td> -->       
        <td class="country"><?php echo $post_url;?></td>        
        <td class="added_by"><?php echo $added_by; ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>
        <td class="edited_by"><?php echo $edited_by; ?></td>
        <td class="published" align="center"><?php 
		   if($status == 'ENA'){?>
              <a title="Un Publish Post" id="<?php echo $post_id; ?>" class="btnPublishAction" ><img  id="img<?php echo $post_id; ?>" height="20" width="20"  alt="Un Publish Post" src="img/yes.png"></a>
			  <? }else{?>
               <a title="Publish Post" id="<?php echo $post_id; ?>" class="btnUnPublishAction" ><img  id="img<?php echo $post_id; ?>" height="20" width="20"  alt="Publish Post" src="img/no.png"></a>
				<?php  } ?></td>
        <td class="action">
        <a title="Update Post" target="_blank" href="update-post.php?pid=<?php echo $post_id; ?>" class="btnEditAction" ><img alt="Update Post" src="img/edit.png"></a><a title="Delete Post" id="<?php echo $post_id; ?>" class="btnDeleteAction" ><img  alt="Delete Post" src="img/delete2.png"></a>
        <a target="_blank" title="View Post" href="viewpost.php?pid=<?php echo $post_id; ?>" ><img  alt="View Post" src="img/view.png"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
