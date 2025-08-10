<?php include "../includes/DB.php";
$db= new DB();
$fname = 'updatestore'; 
if(isset($_REQUEST['sid'])){$strid=$_REQUEST['sid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlStores = "SELECT store_id, storename, store_url, web_address, external_links FROM stores WHERE store_id=".$strid;
               
	$rs_store=$db->ExecuteQuery($sqlStores);            
	list($storeid, $storename, $store_url, $web_address, $external_links )= $db->FetchAsArray($rs_store);
?>
   <div id="pop" class="modal-dialog2" style="width:80%">
    <div class="modal-content2">                  
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix" style="padding-bottom:20px;">
         <header class="panel-heading modal-header"> Update Store </header>
        
         <div class="adv-table addstore text-center" >         
          <div class="dataTables_wrapper">
            <form class="form" role="form" method="post" action="ajax/update-store-process.php" enctype="multipart/form-data" >             
               <input  type="hidden" name="storeid" value="<?php echo $storeid;?>" >
              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  
                  <input  class="form-control m-bot5" type="text" name="storename" id="storename" value="<?php echo $storename;?>" placeholder="Store Name" disabled>
                  
                 <input  class="form-control m-bot5" type="text" name="web_address" value="<?php echo $web_address;?>" placeholder="Website Address" disabled>
                   
                 
                  
                 <textarea rows="2" class="form-control m-bot5" id="tracking_link" name="tracking_link" placeholder="Tracking Link" disabled ><?php echo $tracking_link; ?></textarea>
                
                 
                  <textarea rows="6" cols="30" class="form-control m-bot5" id="external_links" name="external_links" placeholder="External Links*"><?php echo $external_links; ?></textarea> 
                  
                 </div>
                 
                
              </div>
              
                  <div class="form-group last">
                   <div class="col-sm-12 col-xs-12">
                      <button type="submit" class="btn btn-danger pull-right m-bot15">Update</button>
                  </div>
                </div>               
                </form>
              </div>
            </div>
          </section>
          <!-- page end-->
        </section>
      </section>
    </div>
 </div>

<script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
 <!-- <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/moment.min.js"></script> -->
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  
<!--
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>    
   <script src="<?=DOMAINVAR?>/js/advanced-form-components.js"></script>-->

  

  <script type="text/javascript"> var mysid = 'storename' ; </script> 
  <script src="<?=DOMAINVAR?>/js/typeahead.js"></script>
  <script src="<?=DOMAINVAR?>/js/all-stores-list.js"></script>
  