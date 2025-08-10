<?php include "../includes/DB.php";
$db= new DB();
$fname = 'updatecoupon';  
if(isset($_REQUEST['sid'])){$sid=$_REQUEST['sid'];}
 $db->ExecuteQuery("set sql_big_selects=1");?>
<style type="text/css">
<!--

  .sortable-row { list-style: none; }
  .sortable-row li { margin-bottom:2px; padding:7px; background-color:#dee8ff;cursor:move; font-size:12px; border:#1F8Bcc 1px solid; }
-->
</style>
   <div id="pop" class="modal-dialog2" style="width:80%">
    <div class="modal-content2">                  
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix" style="padding-bottom:20px;">
         <header class="panel-heading modal-header"> <?php echo $db->getStoreNameFromSID($sid);?> Coupons </header>
         <div class="adv-table addcoupon text-center" >         
          <div class="dataTables_wrapper text-center">
                   
                   <? if($sid!=''){
                           $sql = "select coupon_id, couponname, status from coupons where 1 and store_id = $sid and (status = 'ENA' || status = 1)  ORDER BY rank  ";
                      $res = $db->ExecuteQuery($sql);	
                   ?> 			 
                           <div id="sort_items">
                                <ul class="sortable-row">
                                   <?
								   while(list($coupon_id, $couponname,$status) = $db->FetchAsArray($res) ){
                                   ?>
                                    <li id="rid_<? echo $coupon_id;?>" ><?php echo $couponname;?></li>
                                    <? }?>
                                </ul>
                            </div>
                                                    
                             <? }?>
                             
   
             
          
          
              </div>
            </div>
          </section>
          <!-- page end-->
        </section>
      </section>
    </div>
 </div>
<script type="text/javascript" src="<?=DOMAINVAR?>/js/jquery.js"></script>
<script type="text/javascript" src="<?=DOMAINVAR?>/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript"> 
	$(document).ready(function(){
		$(function() {
			$("#sort_items ul").sortable({ opacity:0.6, update: function() {
			var order = $(this).sortable("serialize") + '&action=sort';
			$.post("ajax/update-store-coupon-sorting.php",order);
			}
			});
		});
	});
					
</script>
 
  