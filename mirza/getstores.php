<?php 
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "stores";
$fileName = "getstores.php";
$storename = "";
$country = "";
$queryCondition = "";
if(!empty($_POST["storeid"])) { $storeid = $_POST['storeid'];  $queryCondition .= " and store_id = '".trim($storeid)."' "; }else{$storeid = '';}
if(!empty($_POST["sname"])) { $sname = addslashes($_POST['sname']); 

 $queryCondition .= " and  ( storename like '%".trim($sname)."%' || storename like ' %".trim($sname)."%' || storename like '%".trim($sname)."% ' || storename like ' %".trim($sname)."% ' ) "; 
 
 
 }else{$sname = '';}
if(!empty($_POST["network"])) { $network = $_POST['network']; $queryCondition .= ' and network_id ='.$network;}else{$network = '';}
if(!empty($_POST["status"])) { $status = $_POST['status']; $queryCondition .= ' and status ='."'".$status."'";}else{$status = '';}

if(!empty($_POST["country"])) { $country = $_POST['country']; $queryCondition .= ' and country ='."'".$country."'";}else{$country = '';}
if(!empty($_POST["category"])) { $category = $_POST['category']; $queryCondition .= ' and primary_category ='."'".$category."'";}else{$category = '';}

if($_POST['feature'] == 1){ $feature = $_POST['feature']; $queryCondition .= ' and feature = '."'".$feature."'";}
if (isset($_POST['top']) && $_POST['top'] == 1) { $top = $_POST['top']; $queryCondition .= ' and top = '."'".$top."'";}else{ $top ='0';}

if (isset($_POST['elinks']) && $_POST['elinks'] == 1) { $queryCondition .= ' and external_links = '."' '";}else{ $elinks ='0';}

$orderby = " ORDER BY store_id desc";
$sql = "SELECT store_id, storename, store_url, network_id, country, primary_category, web_address, external_links, status, added_by, added_date, edited_by, edited_date FROM $tblName where 1 " . $queryCondition;
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
           <th><strong>Store Name</strong></th>
           <th><strong>Network</strong></th>          
           <th><strong>Category</strong></th>
           <th><strong>Status</strong></th>
		   <th><strong>Web Address</strong></th> 
                      
            <th><strong>Country</strong></th>
             <th><strong>Added By</strong></th>
              <th><strong>Added Date</strong></th>
               
                <th><strong>View Store</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($store_id, $storename, $store_url, $network_id, $country, $primary_category, $web_address, $external_links, $status, $added_by, $added_date, $edited_by, $edited_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $store_id; ?>">
        <td class="storename"><?php echo $store_id; ?></td>
        <td class="storename"><?php echo $storename; ?></td>
        <td class="network_id"><?php
		$sql_netwrok="select network_name from network where network_id='".$network_id."'";		 
	     $rs_network = $db->ExecuteQuery($sql_netwrok);	 											
		  list($network_name) = $db->FetchAsArray($rs_network);		
		 echo $network_name; ?></td>
        <td class="primary_category"><?php 
		 $sql_category = "Select category from categories where status='ENA'  and parent_id='0' and category_id='".$primary_category."' order by category ";		 
	     $rs_category = $db->ExecuteQuery($sql_category);												
		  list($category)=$db->FetchAsArray($rs_category);
		 echo $category; ?></td>
         <td class="added_by"><?php echo $status; ?></td>
         <td class="web_address"><textarea cols="30" rows="2" name="webaddres"><?php echo $web_address; ?></textarea></td>
                
        <td class="country"><?php
		 $sql_country = "select country from countries where country_id='".$country."'";		 
	     $rs_country = $db->ExecuteQuery($sql_country);												
		  list($country)=$db->FetchAsArray($rs_country);
		 echo $country; ?></td>        
        <td class="added_by"><?php echo $added_by; ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>       
        
        <td class="edited_date"><a title="View Store" target="_blank" href="<?=DOMAIN?>/<?=STORE_URL_CONSTANT?><?=$store_url?>" class="btnEditAction" ><img alt="View Store" src="img/link.png"></a></td>
        
        <td class="action">
        <a title="Update Store" target="_blank" href="update-store.php?sid=<?php echo $store_id; ?>" class="btnEditAction" ><img alt="Update Store" src="img/edit.png"></a><a title="Delete Store" id="<?php echo $store_id; ?>" class="btnDeleteAction" ><img  alt="Delete Store" src="img/delete2.png"></a><a href="#" title="View Coupons" class="btnViewAction"  id="<?php echo $store_id; ?>" data-toggle="modal" data-target="#myModal"><img alt="View Coupons" src="img/tag.png" height="20" width="20"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
