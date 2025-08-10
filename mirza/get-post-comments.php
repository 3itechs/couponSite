<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "post_comments";
$fileName = "post-comments.php";
$cmnt_name = "";
$country = "";
$queryCondition = "";   // print_r($_POST);
if(!empty($_POST["cmntid"])) { $cmntid = $_POST['cmntid'];  $queryCondition .= " and post_id = '".trim($cmntid)."' "; }else{$cmntid = '';}

if(!empty($_POST["cname"])) { $cname = $_POST['cname'];
$sql_post = "SELECT post_id FROM posts where post_heading = '$cname' ";
		 $res_post = $db->ExecuteQuery($sql_post);
		  list($postid) = $db->FetchAsArray($res_post);
  $queryCondition .= " and post_id = '".trim($postid)."' "; }else{$cname = '';}

if($_POST["status"] != '') { $status = $_POST['status']; $queryCondition .= ' and status = '.$status;}else{$status = '';}

if(!empty($_POST["category"])) { $category = $_POST['category']; $queryCondition .= ' and primary_category = '."'".$category."'";}else{$category = '';}



$orderby = " ORDER BY cmnt_id desc";
$sql = "SELECT cmnt_id, post_id, cmnt_name, cmnt_email, comments,  status, added_date FROM $tblName where 1 " . $queryCondition;
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
           <th><strong>Post ID</strong></th>
           <th><strong>Post Title</strong></th>
           <th><strong>User Name</strong></th>
           <th><strong>User Email</strong></th>
           
		   <th><strong>Added Date</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($cmnt_id, $post_id, $cmnt_name, $cmnt_email, $comments,  $status, $added_date) = $db->FetchAsArray($result))
	 { 
	   $sql_post = "SELECT post_heading FROM posts where post_id = '$post_id' ";
		 $res_post = $db->ExecuteQuery($sql_post);
		  list($post_heading) = $db->FetchAsArray($res_post);
	 
	 ?>
    <tr id="tr-<?php echo $cmnt_id; ?>">       
          <td class="cmnt_id"><?php echo $cmnt_id; ?></td>
          <td class="post_id"><?php echo $post_id; ?></td>
          <td class="post_id"><?php echo $post_heading; ?></td>
          <td class="cmnt_name"><?php echo $cmnt_name; ?></td>
          <td class="cmnt_email"><?php echo $cmnt_email; ?></td>       
         
          <td class="added_date"><?php echo $added_date; ?></td>
          <td class="action">
        <a target="_blank" href="update-post-comments.php?cid=<?php echo $cmnt_id; ?>" class="btnEditAction btn btn-xs" ><img alt="Update Coupon" src="img/edit.png"></a> <a href="#" id="<?php echo $cmnt_id; ?>" class="btnDeleteAction btn btn-xs" ><img  alt="Delete Coupon" src="img/delete2.png"></a>
        
       <?php if($status == '1'){?>
              <a title="Disable it" id="<?php echo $cmnt_id; ?>" class="btnEnable" ><img  id="img<?php echo $cmnt_id; ?>" height="20" width="20"  alt="Disable it" src="img/yes.png"></a>
			  <? }else{?>
               <a title="Enable it" id="<?php echo $cmnt_id; ?>" class="btnDisable" ><img  id="img<?php echo $cmnt_id; ?>" height="20" width="20"  alt="Enable it" src="img/no.png"></a>
				<?php  } ?></td>
        
        
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
