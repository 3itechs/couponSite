<?php
include "includes/DB.php";
$db= new DB();
require_once("pagination.class.php");
$perPage = new PerPage();
$tblName = "coupons";
$fileName = "getcoupons.php";
$couponname = "";
$country = "";
$queryCondition = "";
if(!empty($_POST["couponid"])) { $couponid = $_POST['couponid'];  $queryCondition .= " and coupon_id = '".trim($couponid)."' "; }else{$couponid = '';}
if(!empty($_POST["cname"])) { $cname = $_POST['cname'];  $queryCondition .= " and couponname like '%".trim($cname)."%' "; }else{$cname = '';}
if(!empty($_POST["sname"])) { 
$store = $_POST['sname'];
$sid = $db->getStoreIDFromStoreName($store);
$queryCondition .= ' and store_id ='."'".$sid."'";}else{$sid = '';}
if(!empty($_POST["status"])) { $status = $_POST['status']; $queryCondition .= ' and status = '."'".$status."'";}else{$status = '';}
if(!empty($_POST["category"])) { $category = $_POST['category']; $queryCondition .= ' and primary_category = '."'".$category."'";}else{$category = '';}

if($_POST['exclusive'] == 1){$exclusive = $_POST['exclusive']; $queryCondition .= ' and exclusive = '."'".$exclusive."'";}	
	// if($_POST['sitewide'] == 1){$sitewide = $_POST['sitewide']; $queryCondition .= ' and sitewide = '."'".$sitewide."'";}
	   if($_POST['feature'] == 1){$feature = $_POST['feature']; $queryCondition .= ' and feature = '."'".$feature."'";}
	      if (isset($_POST['top']) && $_POST['top'] == 1) {$top = $_POST['top'];$queryCondition .= ' and top = '."'".$top."'";}else{ $top ='0';}
		   if (isset($_POST['brand']) && $_POST['brand'] == 1) {$brand = $_POST['brand'];$queryCondition .= ' and brand = '."'".$brand."'";}else{ $brand ='0';}
		

if(!empty($_POST["adsdate"]) || !empty($_POST["adedate"]) ) {
                                            
											$adsdate = $_POST['adsdate'];											
											$adsdate_ar = explode("/",$adsdate);
											$ad_sdate =  "'".$adsdate_ar[2]."-".$adsdate_ar[1]."-".$adsdate_ar[0]."'";
											           
											$adedate = $_POST['adedate'];
											$adedate_ar = explode("/",$adedate);
											$ad_edate =  "'".$adedate_ar[2]."-".$adedate_ar[1]."-".$adedate_ar[0]."'";
											 
											$queryCondition .= ' and ( added_date >= '.$ad_sdate.' AND added_date <= '.$ad_edate." )";
                                            
										 }
										 
if(!empty($_POST["upsdate"]) || !empty($_POST["upedate"]) ) {
                                            
											$upsdate = $_POST['upsdate'];											
											$upsdate_ar = explode("/",$upsdate);
											$up_sdate =  "'".$upsdate_ar[2]."-".$upsdate_ar[1]."-".$upsdate_ar[0]."'";
											           
											$upedate = $_POST['upedate'];
											$upedate_ar = explode("/",$upedate);
											$up_edate =  "'".$upedate_ar[2]."-".$upedate_ar[1]."-".$upedate_ar[0]."'";
											 
											$queryCondition .= ' and ( edited_date >= '.$up_sdate.' AND edited_date <= '.$up_edate." )";
                                            
										 }


$orderby = " ORDER BY coupon_id desc";
$sql = "SELECT coupon_id, couponname, coupon_desc, show_desc, coupon_code, store_id, tracking_link, imp_code, primary_category, landing_url, coupon_type, currency, start_date, exp_date, status, added_by, added_date, edited_by, edited_date FROM $tblName where 1 " . $queryCondition;
$paginationlink = $fileName."?page=";					
$page = 1;
if(!empty($_GET["page"])) { $page = $_GET["page"]; }

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . $orderby .  " limit " . $start . "," . $perPage->perpage;  /* print_r($_POST);*/  //   echo $query;

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
           <th><strong>Coupon Title</strong></th>
           <th><strong>Store Name</strong></th>
           <th><strong>Status</strong></th>
		   <th><strong>Coupon Code</strong></th>           
            <th><strong>Tracking Link</strong></th>
             <th><strong>Added By</strong></th>
              <th><strong>Added Date</strong></th>
               <th><strong>Edited By</strong></th>
                <th><strong>Edited Date</strong></th>
		   <th><strong>Action</strong></th>
		 </tr>
	   </thead>
        <tbody><?php
 while(list($coupon_id, $couponname, $coupon_desc, $show_desc, $coupon_code, $store_id, $tracking_link, $imp_code, $primary_category, $landing_url, $coupon_type, $currency, $start_date, $exp_date, $status, $added_by, $added_date, $edited_by, $edited_date) = $db->FetchAsArray($result))
	 { ?>
    <tr id="tr-<?php echo $coupon_id; ?>">
        <td class="couponname"><?php echo $coupon_id; ?></td>
        <td class="couponname"><?php echo $couponname; ?></td>
        <td class="network_id"><?php  
	  $sql_netwrok="select storename from stores where store_id = '".$store_id."'";		 
	     $rs_network = $db->ExecuteQuery($sql_netwrok);												
		  list($storename) = $db->FetchAsArray($rs_network);		
		 echo $storename; ?></td>
       
         <td class="added_by"><?php echo $status; ?></td>
        <td class="web_address"><?php echo $coupon_code; ?></td>        
        <td class="country"><textarea cols="20" rows="2"><?php echo $tracking_link; ?></textarea></td>        
        <td class="added_by"><?php echo $added_by; ?></td>
        <td class="added_date"><?php echo $added_date; ?></td>
        <td class="edited_by"><?php echo $edited_by; ?></td>
        <td class="edited_date"><?php echo $edited_date; ?></td>
        <td class="action">
        <a target="_blank" href="update-coupon.php?cid=<?php echo $coupon_id; ?>" class="btnEditAction btn btn-xs" ><img alt="Update Coupon" src="img/edit.png"></a> <a href="#" id="<?php echo $coupon_id; ?>" class="btnDeleteAction btn btn-xs" ><img  alt="Delete Coupon" src="img/delete2.png"></a>
        </td>
    </tr>
<?php } if(isset($perpageresult)) { ?>
<tr>
<td colspan="11" align=right> <?php echo $perpageresult; ?></td>
</tr>
<?php } ?>
<tbody>
</table>
