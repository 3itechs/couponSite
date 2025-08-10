<?php session_start();
if(!isset($_COOKIE['admin_username'])){ 
header("location: login.php"); exit();}
include "includes/DB.php";
$db= new DB(); 
 
$pageTitle = 'Update Coupons';
$pageHeading = 'Update Coupons'; 
$fname = 'updatecoupon';  
if(isset($_REQUEST['cid'])){$strid=$_REQUEST['cid'];}
 $db->ExecuteQuery("set sql_big_selects=1"); 
  
 $sqlCoupons = "SELECT coupon_id, couponname, discount_title, product_image, discount_image, coupon_desc, tracking_link, imp_code, coupon_code, insert_type, ctype, coupon_type, discount_type, discount_value, store_id, status, primary_category, added_date, start_date, exp_date, exclusive, sitewide, feature, top, brand FROM coupons WHERE coupon_id=".$strid; 
 
	$rs_coupon=$db->ExecuteQuery($sqlCoupons);            
	list($couponid, $couponname, $discount_title, $product_image, $discount_image, $coupon_desc, $tracking_link, $imp_code, $coupon_code,  $insert_type, $ctype, $coupon_type, $discount_type, $discount_value, $store_id, $status, $primary_category, $added_date, $start_date, $exp_date, $exclusive, $sitewide, $feature, $top, $brand )=$db->FetchAsArray($rs_coupon);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">
<title><?php echo $pageTitle;?></title>
    <!-- Bootstrap core CSS -->
<link href="<?=DOMAINVAR?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=DOMAINVAR?>/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/jquery-multi-select/css/multi-select.css" />
<link rel="stylesheet" href="<?=DOMAINVAR?>/assets/data-tables/DT_bootstrap.css" />
<!-- Custom styles for this template -->
<link href="<?=DOMAINVAR?>/css/style.css" rel="stylesheet">
<link href="<?=DOMAINVAR?>/css/style-responsive.css" rel="stylesheet" />
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->     
    
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-timepicker/compiled/timepicker.css" />
  
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    
    
 </head>
  <body>
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >Control<span>Panel</span></a>
          <!--logo end-->
      </header>
      <!--header end-->
      <!--sidebar start-->
       <?php include "includes/mainleft.php"; ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
           <!-- page start-->
            <section class="panel clearfix" style="padding-bottom:20px;">
         <header class="panel-heading modal-header"> Update Coupon </header>
         <div class="adv-table addcoupon text-center" > 
            <?php if ($_REQUEST['u'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> Coupon updated successfully.
                         </div><?php }?>          
          <div class="dataTables_wrapper">
          <form class="form" role="form" method="post" action="ajax/update-coupon-process.php" enctype="multipart/form-data" >             
            <input  type="hidden" name="couponid" value="<?php echo $couponid;?>" >
              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               
                 <div class="form-group">
                 <label class="control-label pull-left">Store Name*</label>                  
                   <input  class="form-control m-bot5" type="text" name="storename" id="storename" value="<?php echo $db->getStoreNameFromSID($store_id);?>" placeholder="Store Name*" required>
                  </div>
                   
                    
                 <div class="form-group">
                 <label class="control-label pull-left">Coupon Title</label>
                    <input  class="form-control m-bot5" type="text" name="couponname" value="<?php echo $couponname;?>" placeholder="Coupon Title*" required>
                 </div>

               <div class="form-group">
                 <label class="control-label pull-left">Coupon Description</label>
                    <textarea rows="2" class="form-control m-bot5" id="coupon_desc" name="coupon_desc" placeholder="Coupon Description*"><?php echo $coupon_desc;?></textarea> 
                </div>
                    
               <div class="form-group">
                <label class="control-label pull-lef">Expiry Date Range</label>
              
                      <div class="input-group input-large" data-date="" data-date-format="">
                          <?php $start_ar = explode("-",$start_date);
						   $start_date =  $start_ar[2]."/".$start_ar[1]."/".$start_ar[0]; ?>
                              <input type="text" class="form-control exp-sdate" id="exp-sdate" name="exp-sdate" value="<?php echo $start_date;?>" >
                          <span class="input-group-addon">To</span>
                          <?php $exp_ar = explode("-",$exp_date);
						   $expiry_date =  $exp_ar[2]."/".$exp_ar[1]."/".$exp_ar[0]; ?>
                              <input type="text" class="form-control exp-edate" id="exp-edate" name="exp-edate" value="<?php echo $expiry_date;?>" >
                      </div><span class="error" id="expdate-error"></span>                 
               </div>
               
                      
             <div class="col-lg-8 m-bot15 ">
                 <label class="checkbox-inline text-left">
                   <input type="checkbox" id="never_exp" name="never_exp" <?php if($never_exp == 1){ echo "checked";}?> value="1"> Never Expire
                 </label>                
             </div> 
               
               <div class="box">&nbsp;</div>
          <div class="box">&nbsp;</div>
               
                <?php /*?><div class="form-group">              
                 <label class="control-label pull-left">Insert Type:</label>                                 
                     <select id="status" name="insert_type" class="form-control m-bot5" > 
                       <option <? if($insert_type == 'auto'){echo "selected";}?> value="auto">Auto</option>
                       <option <? if($insert_type == 'manual'){echo "selected";}?> value="manual">Manual</option>
                     </select>
                </div>  <?php */?>            
                                
           <div class="col-lg-8 m-bot15 text-left">
                  <label class="checkbox-inline">
                     <!-- <input type="checkbox" <? if($top == 1){echo "checked";} ?>  id="top" name="top" value="1"> Best Picks -->
                  </label>
                  <label class="checkbox-inline">
                      <input type="checkbox" <? if($feature == 1){echo "checked";} ?> id="feature" name="feature" value="1">  Show at Home Page
                  </label>
         </div>   
                    
          </div>
         </div>           
                           
           <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
              
               <?php /*?><div class="col-sm-6 col-xs-12"> 
                             
                             <div class="col-sm-6 col-xs-12"> 
						 <?php  if($discount_image == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="../assets/images/coupons/<?php echo $discount_image;?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="discount_image" class="default m-bot5"/>
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>Discount Image [ <?php echo COUPON_DISCOUNT_WIDTH?>x<?php echo COUPON_DISCOUNT_HEIGHT?> ]
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                    <!-- <img src="../images/logos/<?php echo $store_logo;?>" alt="" />-->
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="../assets/images/coupons/<?php echo $discount_image;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="discount_image">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $strid?>" class="btn btn-danger btn-sm fileupload-exists delldimg" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>Discount Image [ <?php echo COUPON_DISCOUNT_WIDTH?>x<?php echo COUPON_DISCOUNT_HEIGHT?> ]
                                              </div>
                                              <?php }?>                                                                    
                       
                     </div>                            
                              
                              <?php  if($product_image == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="../assets/images/brands/<?php echo $product_image;?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="product_image" class="default m-bot5"/>
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>Brand Image [ <?php echo COUPON_BGIMG_WIDTH?>x<?php echo COUPON_BGIMG_HEIGHT?> ]
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                     <img src="../images/logos/<?php echo $store_logo;?>" alt="" />
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="../assets/images/brands/<?php echo $product_image;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="product_image">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $strid?>" class="btn btn-danger btn-sm fileupload-exists dellcimg" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>Brand Image [ <?php echo COUPON_BGIMG_WIDTH?>x<?php echo COUPON_BGIMG_HEIGHT?> ]
                                              </div>
                                              <?php }?>
                           </div><?php */?>                   
                           
                <div class="form-group">
                     <label class="control-label pull-left">Select Category</label>
                        <select id="primary_category" name="primary_category" class="form-control m-bot5" required >
                            <option value="">--Primary Category*--</option>
                               <?
                                 $sql="Select category_id, category from categories where 1   order by category  "; 
                                   $rs_sql=$db->ExecuteQuery($sql); 
                                      while(list($category_id, $category) = $db->FetchAsArray($rs_sql))
                                          { ?>
                                            <option <?php if($primary_category == $category_id){ echo 'selected';} ?>  value="<?php echo $category_id;?>"><?php echo $category;?></option>
                                      <?php }?>
                      </select>   
                 </div> 
                  
                  <div class="form-group" style="height:10px"> </div>
                      
               <div class="form-group">
                 <label class="control-label pull-left">Tracking link</label>
                    <textarea rows="2" class="form-control m-bot5" id="tracking_link" name="tracking_link" placeholder="Tracking Link*" required><?php echo $tracking_link;?></textarea>
               </div>
                    
                
             <div class="form-group">
                 <label class="control-label pull-left">Coupon Code</label>
                    <input  class="form-control m-bot5" type="text" name="coupon_code" id="coupon_code" value="<?php echo $coupon_code;?>" placeholder="Coupon Code" >   
             </div> 
             
              <div class="form-group">
                         <label class="control-label pull-left">Status</label>                                 
                          <select id="status" name="status" class="form-control m-bot5" required >
                            <option <? if($status == '1'){echo "selected";} ?> value="1" >Enable</option>
                            <option <? if($status == '0'){echo "selected";} ?> value="0" >Disable</option>
                          </select>  
              </div> 
             
             <?php /*?><div class="form-group">
                       <div class=" col-lg-3">                        
                         <label class="control-label pull-left">Discount Type</label>
                          <select id="discount_type" name="discount_type" class="form-control m-bot5" > 
                          <option <? if($discount_type == '1'){echo "selected";} ?> value="1">%</option>
                          <option <? if($discount_type == '2'){echo "selected";} ?> value="2">$</option>
                          <option <? if($discount_type == '3'){echo "selected";} ?> value="3">&euro;</option>
                          <option <? if($discount_type == '4'){echo "selected";} ?> value="4">&pound;</option>
                          </select>
                       </div>
                       
                       <div class=" col-lg-3">  
                          <label class="control-label pull-left">Discount Value</label><input  class="form-control" type="text" name="discount_value" id="discount_value" value="<?php echo $discount_value;?>" > 
                       </div>
                       
                       <div class=" col-lg-5">
                         <label class="control-label pull-left">Coupon Type</label>
                            <select id="coupon_type" name="coupon_type" class="form-control m-bot5" >
                             <option  value="0">--Select Coupon Type--</option>
                             <?php
                           $sql = "Select type_id, coupontype from coupon_type where status = '1'  ";	
                            $rs_sql = $db->ExecuteQuery($sql); 
                            while(list($type_id,$coupontype) = $db->FetchAsArray($rs_sql))
                                { ?>
                            <option <? if($type_id == $coupon_type){echo "selected";} ?> value="<?php echo $type_id;?>"><?php echo $coupontype;?></option><?php }?>
                          </select>
                     </div>
                    
              </div><?php */?>
          
          
          <div class="box">&nbsp;</div>
          <div class="box">&nbsp;</div>
              
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
      <!--main content end-->
     <?php include "includes/footer.php"; ?>
  </section>
        
  <style type="text/css">
		
 .twitter-typeahead{
   width:100%;
   }

.twitter-typeahead .tt-query,
.twitter-typeahead .tt-hint {
  margin-bottom: 0;
}
.tt-dropdown-menu {
  min-width: 160px;
  margin-top: 2px;
  padding: 5px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0,0,0,.2);
  *border-right-width: 2px;
  *border-bottom-width: 2px;
  -webkit-border-radius: 6px;
     -moz-border-radius: 6px;
          border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
  -webkit-background-clip: padding-box;
     -moz-background-clip: padding;
          background-clip: padding-box;
  width:100%;        
}

.tt-suggestion {
  display: block;
  padding: 3px 20px;
}

.tt-suggestion.tt-is-under-cursor {
  color: #fff;
  background-color: #0081c2;
  background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
  background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
  background-image: -o-linear-gradient(top, #0088cc, #0077b3);
  background-image: linear-gradient(to bottom, #0088cc, #0077b3);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0)
}

.tt-suggestion.tt-is-under-cursor a {
  color: #fff;
}

.tt-suggestion p {
  margin: 0;
  text-align:left;
}
</style>  

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=DOMAINVAR?>/js/jquery.js"></script>
    <script src="<?=DOMAINVAR?>/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?=DOMAINVAR?>/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=DOMAINVAR?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?=DOMAINVAR?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=DOMAINVAR?>/js/respond.min.js" ></script>  
    <!--this page plugins-->

  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
    <!--common script for all pages-->
    <script src="<?=DOMAINVAR?>/js/common-scripts.js"></script>
    <!--this page  script only-->
   <script type="text/javascript" src="<?=DOMAINVAR?>/js/date-picker-popup.js"></script> 

   <script type="text/javascript" src="<?=DOMAINVAR?>/js/typeahead.js"></script>

   <script type="text/javascript"> var mysid = 'storename' ; </script>

  <script type="text/javascript" src="<?=DOMAINVAR?>/js/all-stores-list.js"></script> 
  
  <script>
  var matched, browser;

jQuery.uaMatch = function( ua ) {
    ua = ua.toLowerCase();

    var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
        /(msie) ([\w.]+)/.exec( ua ) ||
        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
        [];

    return {
        browser: match[ 1 ] || "",
        version: match[ 2 ] || "0"
    };
};

matched = jQuery.uaMatch( navigator.userAgent );
browser = {};

if ( matched.browser ) {
    browser[ matched.browser ] = true;
    browser.version = matched.version;
}

// Chrome is Webkit, but Webkit is also Safari.
if ( browser.chrome ) {
    browser.webkit = true;
} else if ( browser.webkit ) {
    browser.safari = true;
}

jQuery.browser = browser;
  </script>        

  </body>

</html>