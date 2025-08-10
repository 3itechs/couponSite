<?php session_start();  
if(!isset($_COOKIE['admin_username'])){ 
header("location: login.php"); exit();}
include "includes/DB.php";
$db= new DB();  // echo $_SERVER['HTTP_HOST']; die;
$fname = 'updatestore'; 
if(isset($_REQUEST['sid'])){$strid=$_REQUEST['sid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlStores = "SELECT store_id, storename, average_savings, store_url, store_logo, store_products,  store_thumbnail, store_thumbnail_alt, store_heading, network_id, web_address, primary_category, child_category, country, tracking_link, imp_code, store_desc, more_about_desc, trademark_keywords, network_store_id, network_store_name, status, top, feature, meta_title, meta_keywords, meta_desc, address , phone, email, shipping_policy, wikipedia, bbb, store_blog, facebook, twitter, youtube, instagram, store_video1, store_video2, store_video3, store_video4, added_date, edited_date, added_by FROM stores WHERE store_id=".$strid;
 
  

               
	$rs_store=$db->ExecuteQuery($sqlStores);            
	list($storeid, $storename, $average_savings, $store_url, $store_logo, $store_products, $store_thumbnail, $store_thumbnail_alt, $store_heading, $networkid, $web_address,	$primary_category, $child_category, $countryid, $tracking_slink, $imp_code,$store_desc, $more_about_desc, $trademark_keywords, $network_store_id, $network_store_name, $status, $top, $feature, $meta_title, $meta_keywords, $meta_desc, $address , $phone, $email, $shipping_policy, $wikipedia, $bbb, $store_blog, $facebook, $twitter, $youtube, $instagram, $store_video1, $store_video2, $store_video3, $store_video4, $added_date, $edited_date, $added_by )=$db->FetchAsArray($rs_store);

//$fname = 'coupons.php'; 
$pageTitle = 'Update Store';
$pageHeading = 'Update Store'; ?>
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
<link href="<?=DOMAINVAR?>/css/editor.css" type="text/css" rel="stylesheet"/>
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
      <!-- <link rel="stylesheet" href="<?=DOMAINVAR?>/ckeditor/samples/css/samples.css">-->
  <script src="<?=DOMAINVAR?>/ckeditor/ckeditor.js"></script>
  <script src="<?=DOMAINVAR?>/ckeditor/samples/js/sample.js"></script>
  <script src="<?=DOMAINVAR?>/ckeditor/samples/js/sample2.js"></script>
    <!--For Html Editor Ends-->
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
          
           <?php if ($_REQUEST['u'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> Store updated successfully.
           </div><?php } ?>
              <!-- page start-->
           <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
         <header class="panel-heading modal-header"> Update Store </header>
         <div class="adv-table addstore text-center" >         
          <div class="dataTables_wrapper">
            <form class="form" role="form" method="post" action="ajax/update-store-process.php" enctype="multipart/form-data" >             
               <input  type="hidden" name="storeid" value="<?php echo $storeid;?>" >
              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
               
               <div class="form-group">       
                  <label class="control-label pull-left">Store Name</label>
                  <input  class="form-control m-bot5" type="text" name="storename" id="storename" value="<?php echo $storename;?>" placeholder="Store Name*" required>
               </div>
               
              <?php /*?> <div class="form-group">       
                  <label class="control-label pull-left">Average Savings</label>
                  <input  class="form-control m-bot5" type="text" name="average_savings" id="average_savings" value="<?php echo $average_savings;?>" placeholder="Average Savings" required>
               </div><?php */?>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Store Url</label>
                  <input  class="form-control m-bot5" type="text" name="store_url" id="store_url" value="<?php echo $store_url;?>" placeholder="Store Url*" required>
               </div>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Store Heading</label>
                  <input  class="form-control m-bot5" type="text" name="store_heading" id="store_heading" value="<?php echo $store_heading;?>" placeholder="Store Heading">
                </div>
                 
                <div class="form-group">       
                  <label class="control-label pull-left">Select Network</label>
                  <?php
				  $sql = "Select  network_id, network_name From network" ;
				  $rs_sql=$db->ExecuteQuery($sql); ?>
                  <select id="network_id" name="network_id" class="form-control m-bot5" >
                    <option value="">--Select Network--</option>
                      <?php	while(list($network_id, $networkname)=$db->FetchAsArray($rs_sql)) {?>
                         <option <?php if($network_id == $networkid){echo "selected";} ?> value="<?php echo $network_id; ?>" ><?php echo $networkname; ?></option>
                      <?php }?>
                  </select>
                  </div>
                  
                  <div class="form-group">       
                  <label class="control-label pull-left">Website Address</label>
                   <input  class="form-control m-bot5" type="text" name="web_address" value="<?php echo $web_address;?>" placeholder="Website Address" required>
                   </div>
                    <div class="form-group">       
                  <label class="control-label pull-left">Category Name</label>
                     
                     <select id="mancat_id" name="primary_category" class="form-control m-bot5" required >
                        <option  value="">--Category Name--</option>
                        <?php
                        
                        $sql = $db->ExecuteQuery("SELECT category_id, category FROM categories WHERE parent_id = '0' ");
                        while($row=mysqli_fetch_array($sql))
                            {
                            $id=$row['category_id'];
                            $data=$row['category']; ?>
                            <option <?php if($primary_category == $id){echo "selected"; } ?> value="<?=$id?>" ><?=$data?></option>
                           <?php } ?>
                    </select>
                      </div>
                       
                       <div class="form-group">       
                          <label class="control-label pull-left">Sub Category</label>
                          <select id="subcat_id" name="child_category" class="form-control m-bot5" required >
                                 <?php if($child_category != ''){ 
								   $sql_sub = $db->ExecuteQuery("SELECT category_id, category FROM categories 
								               WHERE parent_id = $primary_category ");
									while($row = mysqli_fetch_array($sql_sub))
										{
									      $subid =   $row['category_id'];
                                          $subcat = $row['category'];
								   ?>
                                  <option <?php if($child_category == $subid){echo "selected"; } ?> value="<?=$subid?>" ><?=$subcat?></option>
								  
								  <?php } }else{?>
                                  <option value="" >--Select Sub Category--</option><?php }?>
                         </select>
                       </div>   
                  
                                    
                 <div class="form-group">       
                  <label class="control-label pull-left">Select Country</label>  
                  <select id="country_id" name="country_id" class="form-control m-bot5" required >
                    <option value="">--Select Country*--</option>
                    <?php
					$sql_country ="Select country_id, country from countries where countries.show = 1 order by country  ";	
					$rs_country = $db->ExecuteQuery($sql_country); 
					while(list($country_id,$country) = $db->FetchAsArray($rs_country))
							{?>
                     <option <?php if($country_id == $countryid){echo "selected";} ?> value="<?php echo $country_id;?>"><?php echo $country;?></option><?php }?>
                  </select> 
                  </div>
                 
                 <div class="form-group">       
                  <label class="control-label pull-left">Tracking Link</label>
                 <textarea rows="2" class="form-control m-bot5" id="tracking_slink" name="tracking_slink" placeholder="Tracking Link*" required><?php echo $tracking_slink; ?></textarea>
                 </div>
                 
                 <div class="form-group">       
                  <label class="control-label pull-left">Impression Code</label>
                 <textarea rows="2" class="form-control m-bot5" id="imp_code" name="imp_code" placeholder="Impression Code"><?php echo $imp_code; ?></textarea>
                 </div>
                 
                <?php /*?> <div class="form-group">       
                  <label class="control-label pull-left">Store Products</label>
                 <textarea rows="2" class="form-control m-bot5" id="store_products" name="store_products" placeholder="Store Products"><?php echo $store_products; ?></textarea>
                 </div><?php */?>
                 
                 <div class="col-lg-8 m-bot15 text-left">
                  <label class="checkbox-inline">
                      <input type="checkbox" <? if($top == 1){echo "checked";} ?>  id="top" name="top" value="1"> Top
                  </label>
                  <label class="checkbox-inline">
                      <input type="checkbox" <? if($feature == 1){echo "checked";} ?> id="feature" name="feature" value="1">  Propular
                  </label>
                 </div> 
                 <div class="form-group" style="height:30px"></div>  
                
                <div class="form-group">       
                  <label class="control-label pull-left">Store Status</label>                 
                     <select id="status" name="status" class="form-control m-bot5" required >
                        <option <? if($status == '1'){echo "selected";} ?> value="1">Enable</option>
                        <option <? if($status == '0'){echo "selected";} ?> value="0">Disable</option>
                      </select>  
               </div>                 
                             
            </div>
          </div>              
              <div class="col-sm-3 col-xs-12">
									 
                                      <?php  if($store_logo == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="<?php echo SLOGO_PATH;?><?php echo $store_logo;?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Logo</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="store_logo" class="default m-bot5"/>
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>Store Logo [ <?php echo SLOGO_WIDTH?>x<?php echo SLOGO_HEIGHT?> ]
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                    <!-- <img src="../images/logos/<?php echo $store_logo;?>" alt="" />-->
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="<?php echo SLOGO_PATH;?><?php echo $store_logo;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Logo</span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="store_logo">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $storeid?>" class="btn btn-danger btn-sm fileupload-exists dellogo" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>Store Logo [ <?php echo SLOGO_WIDTH?>x<?php echo SLOGO_HEIGHT?> ]
                                              </div>
                                              <?php }?>
                            </div>
                
                            <div class="col-sm-3 col-xs-12"> 
                            <?php  if($store_thumbnail == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="<?php echo SLOGO_PATH; ?><?php echo $store_thumbnail;?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Thumb</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="store_thumbnail" class="default m-bot5"/>
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>Store Thumb [ <?php echo BANNER_WIDTH?>x<?php echo BANNER_HEIGHT?> ]
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                    <!-- <img src="../images/logos/<?php echo $store_thumbnail;?>" alt="" />-->
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="<?php echo THUMB_PATH;?><?php echo $store_thumbnail;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Thumb</span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="store_logo">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $storeid?>" class="btn btn-danger btn-sm fileupload-exists delthumb" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>Store Thumb [ <?php echo BANNER_WIDTH?>x<?php echo BANNER_HEIGHT?> ]
                                              </div>
                                              <?php }?>
                              <div style="height:20px"></div>                 
                                              
                          </div>
                  
              
              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">   
                
               <div class="form-group">       
                  <label class="control-label pull-left">Store Thumb Alt</label>      
                   <input  class="form-control m-bot5" type="text" name="store_thumbnail_alt" value="<?php echo $store_thumbnail_alt;?>" placeholder="Store Thumb Alt" >
               </div> 
               
               
                
                 
                 <div class="form-group">       
                  <label class="control-label pull-left">Store Address</label>
                 <textarea rows="2" class="form-control m-bot5" id="store_address" name="address" placeholder="Store Address"><?php echo $address; ?></textarea>                 
                 </div>
                 
                 <div class="form-group">       
                  <label class="control-label pull-left">Store Phone</label>
                 <input  class="form-control m-bot5" type="text" name="phone" id="phone" value="<?php echo $phone;?>" placeholder="Store Phone">
                 </div>
                 
                 <div class="form-group">       
                  <label class="control-label pull-left">Store Email</label>
                 <input  class="form-control m-bot5" type="text" name="email" id="email" value="<?php echo $email;?>" placeholder="Store Email">
                 </div>
                
                 
              <?php /*?> <div class="form-group">       
                  <label class="control-label pull-left">Shipping Policy Link</label>      
                   <input  class="form-control m-bot5" type="text" name="shipping_policy" value="<?php echo $shipping_policy;?>" placeholder="Shipping Policy" >
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Store Wikipedia Link</label>      
                   <input  class="form-control m-bot5" type="text" name="wikipedia" value="<?php echo $wikipedia;?>" placeholder="Store Wikipedia Link" >
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Store BBB</label>      
                   <input  class="form-control m-bot5" type="text" name="bbb" value="<?php echo $bbb;?>" placeholder="Store BBB" >
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Store Blog Link</label>      
                   <input  class="form-control m-bot5" type="text" name="store_blog" value="<?php echo $store_blog;?>" placeholder="Store Blog Link" >
               </div>               
               
               <div class="form-group">       
                  <label class="control-label pull-left">Facebook Link</label>      
                   <input  class="form-control m-bot5" type="text" name="facebook" value="<?php echo $facebook;?>" placeholder="Facebook Link" >
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Twitter Link</label>      
                   <input  class="form-control m-bot5" type="text" name="twitter" value="<?php echo $twitter;?>" placeholder="Twitter Link" >
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Youtube Link</label>      
                   <input  class="form-control m-bot5" type="text" name="youtube" value="<?php echo $youtube;?>" placeholder="Youtube Link" >
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Instagram Link</label>      
                   <input  class="form-control m-bot5" type="text" name="instagram" value="<?php echo $instagram;?>" placeholder="Instagram Link" >
               </div><?php */?>
               
               
               
               <div class="form-group">       
                  <label class="control-label pull-left">Meta Title</label>
                   <textarea rows="2" class="form-control m-bot5" id="meta_title" name="meta_title" placeholder="Meta Title" ><?php echo $meta_title; ?></textarea>
               </div>      
               
               <div class="form-group">       
                  <label class="control-label pull-left">Meta Keywords</label>
                        <textarea rows="2" class="form-control m-bot5" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords"><?php echo $meta_keywords; ?></textarea>
               </div>       
               
               <div class="form-group">       
                  <label class="control-label pull-left">Meta Description</label>                  
                        <textarea rows="2" class="form-control m-bot5" id="meta_desc" name="meta_desc" placeholder="Meta Description"><?php echo $meta_desc; ?></textarea>              
               </div>
              
              
                        
              <div class="form-group" style="height:70px"></div>    
                     
                </div>
              </div>
              
              <div class="form-group">       
                  <label class="control-label pull-left">Store Description</label>
                  <textarea rows="2" class="form-control m-bot5" id="editor" name="store_desc" placeholder="Store Description*"><?php echo $store_desc; ?></textarea>
                </div>
                
                <div class="form-group" style="height:20px"> </div>
                
                <div class="form-group">
                <a href="popups/add-store-img-popup.php" class="btn btn-success pull-right" data-toggle="modal" data-target="#myAddModal">Upload Image</a>    
              </div>
               
               <div class="form-group" style="height:30px"> </div>
               
                <div class="form-group">       
                  <label class="control-label pull-left">More About Store</label>
                  <textarea rows="2" class="form-control m-bot5" id="editor2" name="more_about_desc" ><?php echo  $more_about_desc ;?></textarea>
                </div>
                
                
            <?php /*?> <div class="form-group row">
                <div class="col-sm-12 col-xs-12">
                   <button type="submit" class="add_field_button btn btn-success pull-right ">Add Coupons</button>
                </div>
              </div>    
                
             <div class="form-group input_fields_wrap">
             <?php $c = 0; $sql_coupons = "select coupon_id, couponname, coupon_code, tracking_link, coupon_desc, start_date, exp_date, discount_type, discount_value, coupon_type from  coupons  where insert_type = 'manual' and  store_id = '$strid' ";	  $rs_all_coupons = $db->ExecuteQuery($sql_coupons);
				
			while(list($coupon_id, $couponname, $coupon_code, $ctracking_link, $coupon_desc, $start_date, $exp_date, $discount_type, $discount_value, $coupon_type) = $db->FetchAsArray($rs_all_coupons))
					{ 	    			  
						
                   include "short-coupon.php";  ?>
			         <script> 
                      $('#uexp-sdate<?=$c?>').datepicker();
                      $('#uexp-edate<?=$c?>').datepicker();
                      
                      </script>                                       
                                         
                                      <?php $c++; }?>  <?php */?>
            
             
             
             </div>
                
             
                
              
              <div class="form-group row">
                <div class="col-sm-12 col-xs-12">
                   <button type="submit" class="btn btn-danger pull-right ">Update</button>
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
 <div id="myModal" class="modal fade"></div>
  <div id="myAddModal" class="modal fade"></div>
     
  </section>
        
   <script>
	initSample();
	initSample2();
   </script> 
        
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

<script type="text/javascript">
	$(document).ready(function()
		{
			
		$("#mancat_id").change(function()
			{
			var id=$(this).val();
			var dataString = 'id='+ id;
			
				$.ajax
				({
				type: "POST",
				url: "ajax/subcat-list.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
				$("#subcat_id").html(html);
				} 
			});
		
		});
	
	});


$(document).ready(function() {
		var max_fields      = 19; //maximum input boxes allowed
		var wrapper         = $(".input_fields_wrap"); //Fields wrapper
		var add_button      = $(".add_field_button"); //Add button ID
		
		var x = 0; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				 //text box increment
				$(wrapper).append('<div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Coupon Title</label><input  class="form-control m-bot5" type="text" name="couponname[]" value="" placeholder="Coupon Title*" required></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Coupon Code</label><input  class="form-control m-bot5" type="text" name="coupon_code[]" id="coupon_code" value="" placeholder="Coupon Code" ></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Tracking link</label><textarea rows="2" class="form-control m-bot5" id="tracking_link" name="tracking_link[]" placeholder="Tracking Link*" required></textarea></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Coupon Description</label><textarea rows="2" class="form-control m-bot5" id="coupon_desc" name="coupon_desc[]" placeholder="Coupon Description*"></textarea></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-lef">Expiry Date Range</label><div class="input-group input-large" data-date="" data-date-format=""><input type="text" class="form-control exp-sdate" id="exp-sdate'+x+'" name="exp-sdate[]" ><span class="input-group-addon">To</span><input type="text" class="form-control exp-edate" id="exp-edate'+x+'" name="exp-edate[]" ></div><span class="error" id="expdate-error'+x+'"></span></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class=" col-lg-3"><label class="control-label pull-left">Discount Type</label><select id="discount_type'+x+'" name="discount_type['+x+']" class="form-control m-bot5" ><option value="1">%</option><option value="2">$</option><option value="3">&euro;</option><option value="4">&pound;</option></select></div><div class=" col-lg-3"><label class="control-label pull-left">Discount Value</label><input  class="form-control" type="text" name="discount_value['+x+']" id="discount_value'+x+'" value="" ></div><div class=" col-lg-5"><label class="control-label pull-left">Coupon Type</label><select id="coupon_type'+x+'" name="coupon_type['+x+']" class="form-control m-bot5"><option value="4">FreeShipping</option><option value="10">Deals</option><option value="11">Clearance</option><option value="14">Exclusive </option><option value="15">Codes</option></select></div></div><a href="#" class="remove_field txt_red">Remove</a><div class="form-group" style="height:15px; background-color:#A1BFDF;float:left;width:100%;"></div></div>'); //add input box
				$('#exp-sdate'+x).datepicker();
                $('#exp-edate'+x).datepicker();
				//alert(x);
			x++; }
		});
		
		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(this).parent('div').remove(); x--;
		})
	
	});
	
  </script>
 
  <script>
	 	
$(document).on('click', '.btnDeleteAction', function(){
    var id = $(this).attr('id');
	  if(confirm('Are you sure to delete it?'))
	    {
	     $.ajax({
			 url: "ajax/dell_coupon.php?cid="+id,
			 type: "POST",
			 success: function(data){ $("#cop-"+id).html(''); }
		    });
		 }
	 });

 </script> 

 </body>

</html>