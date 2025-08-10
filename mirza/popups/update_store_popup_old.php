<?php include "../includes/DB.php";
$db= new DB();
$fname = 'updatestore'; 
if(isset($_REQUEST['sid'])){$strid=$_REQUEST['sid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlStores = "SELECT store_id, storename, store_url, store_logo, store_thumbnail, store_title, network_id, web_address, primary_category, country, tracking_link, imp_code, store_desc, trademark_keywords, network_store_id, network_store_name, status, top, feature, meta_title, meta_keywords, meta_desc, added_date, edited_date, added_by FROM stores WHERE store_id=".$strid;
               
	$rs_store=$db->ExecuteQuery($sqlStores);            
	list($storeid, $storename, $store_url, $store_logo, $store_thumbnail, $store_title, $networkid, $web_address, $primary_category, $countryid, $tracking_link, $imp_code,$store_desc, $trademark_keywords, $network_store_id, $network_store_name, $status, $top, $feature, $meta_title, $meta_keywords, $meta_desc, $added_date, $edited_date, $added_by )=$rs_store->;
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
                  
                  <input  class="form-control m-bot5" type="text" name="storename" id="storename" value="<?php echo $storename;?>" placeholder="Store Name*" required>
                  
                  <input  class="form-control m-bot5" type="text" name="store_url" value="<?php echo $store_url;?>" placeholder="Store Url" >
                  
                   <?php
				  $sql = "Select  network_id, network_name From network" ;
				  $rs_sql=$db->ExecuteQuery($sql); ?>
                  <select id="network_id" name="network_id" class="form-control m-bot5" required>
                    <option value="">--Select Network*--</option>
                      <?php	while(list($network_id, $networkname)=$db->FetchAsArray($rs_sql)) {?>
                         <option <?php if($network_id == $networkid){echo "selected";} ?> value="<?php echo $network_id; ?>" ><?php echo $networkname; ?></option>
                      <?php }?>
                  </select>
                   <input  class="form-control m-bot5" type="text" name="web_address" value="<?php echo $web_address;?>" placeholder="Website Address" required>
                   <select id="primary_category" name="primary_category" class="form-control m-bot5" required >
                    <option value="">--Primary Category*--</option>
                     <?
				    $sql="Select category_id, category from categories where status='ENA' and parent_id='0' order by category  ";	
					$rs_sql=$db->ExecuteQuery($sql); 
					while(list($category_id,$category) = $db->FetchAsArray($rs_sql))
						{ ?>
                    <option <? if($category_id == $primary_category){echo "selected";} ?> value="<?php echo $category_id;?>"><?php echo $category;?></option><?php }?>
                  </select>
                  
                  <select id="country_id" name="country_id" class="form-control m-bot5" required >
                    <option value="">--Select Country*--</option>
                    <?
					$sql_country ="Select country_id, country from countries where countries.show = 1 order by country  ";	
					$rs_country = $db->ExecuteQuery($sql_country); 
					while(list($country_id,$country) = $db->FetchAsArray($rs_country))
							{?>
                     <option <? if($country_id == $countryid){echo "selected";} ?> value="<?php echo $country_id;?>"><?php echo $country;?></option><?php }?>
                  </select> 
                  
                 <textarea rows="2" class="form-control m-bot5" id="tracking_link" name="tracking_link" placeholder="Tracking Link*" required><?php echo $tracking_link; ?></textarea>
                 <textarea rows="2" class="form-control m-bot5" id="imp_code" name="imp_code" placeholder="Impression Code"><?php echo $imp_code; ?></textarea> 
                 
                  <textarea rows="2" class="form-control m-bot5" id="store_desc" name="store_desc" placeholder="Store Description*"><?php echo $store_desc; ?></textarea> 
                  <textarea rows="2" class="form-control m-bot5" id="trademark_keywords" name="trademark_keywords" placeholder="Search Keywords"><?php echo $trademark_keywords; ?></textarea>
                   <input  class="form-control m-bot5" type="text" name="network_store_id" value="<?php echo $network_store_id; ?>" placeholder="Network Store ID*" required>
                  <input  class="form-control m-bot5" type="text" name="network_store_name" value="<?php echo $network_store_name; ?>" placeholder="Network Store Name*" required>
                  
                                  
                  <select id="status" name="status" class="form-control m-bot5" required >
                    <option <? if($status == 'ENA'){echo "selected";} ?> value="ENA">Enable</option>
                    <option <? if($status == 'DIS'){echo "selected";} ?> value="DIS">Disable</option>
                   <?php /*?> <option <? if($status == 'PEN'){echo "selected";} ?> value="PEN">Pending</option><?php */?>
                  </select>  
                  
                    <div class="col-lg-8 m-bot15 text-left">
                  <label class="checkbox-inline">
                      <input type="checkbox" <? if($top == 1){echo "checked";} ?>  id="top" name="top" value="1"> Top
                  </label>
                  <label class="checkbox-inline">
                      <input type="checkbox" <? if($feature == 1){echo "checked";} ?> id="feature" name="feature" value="1"> Featured
                  </label>
                 </div>
                 
                                             
              
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  
                                      <div class="col-sm-6 col-xs-12">
									  <?php  if($store_logo == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="../assets/img/stores/<?php echo $store_logo;?>" alt="" />
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
                                              <div data-provides="fileupload" class="fileupload fileupload-exists">
                                                <input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                     <img src="" alt="" /> </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="../assets/img/stores/<?php echo $store_logo;?>" alt="" />
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
                                             <div class="col-sm-6 col-xs-12"> 
                                            <?php  if($store_thumbnail == ''){?>               
                                               <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="../images/thumbs/<?php echo $store_thumbnail;?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Thumbnail</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="store_thumbnail" class="default m-bot5"/>
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>[ <?php echo STHUMB_WIDTH?>x<?php echo STHUMB_WIDTH?> ] 
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                    <!-- <img src="../images/thumbs/<?php echo $store_thumbnail;?>" alt="" />-->
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="../images/thumbs/<?php echo $store_thumbnail;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Thumbnail</span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="store_thumbnail">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $storeid?>" class="btn btn-danger btn-sm fileupload-exists delthumb" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>[ <?php echo STHUMB_WIDTH?>x<?php echo STHUMB_WIDTH?> ] 
                                              </div>
                                           
                                              <?php }?> 
                                                    </div>             
                                        
                                             <div class="col-md-9 m-bot5">       
                                              <label class="control-label">Other Categories</label>
                                  <?php  $skid_ar[]='';
								         $sql_sk = "select keyword_id from  store_keywords where  store_id = '$storeid'";
										  $rs_sk = $db->ExecuteQuery($sql_sk);								
										  while(list($skid)=$rs_sk->){ $skid_ar[] = $skid; }
								  
								  
								        $sql_pcat = "Select category_id, category from categories where status='ENA' and parent_id='0'  order by category  ";	
										$rs_pcat = $db->ExecuteQuery($sql_pcat); ?>
                                      <select multiple="multiple" class="multi-select" id="my_multi_select1" name="other_categories[]">
                                          
  <? while(list($category_id,$category) = $rs_pcat->)
											   { ?>
                                              
                                            <option <? if (in_array($category_id, $skid_ar)){echo "selected";} ?> value="<? echo  $category_id; ?>"><? echo "<b>".$category."</b>"; ?></option>
                                            <? $sql_sub="Select category_id, category from categories where  parent_id='$category_id' and status='ENA'  order by category  ";	
											$rs_sub=$db->ExecuteQuery($sql_sub);
											while(list($kwd_id2,$keyword2) = $rs_sub->)
												 { ?>
                                            <option <? if (in_array($kwd_id2, $skid_ar)){echo "selected";} ?> value="<? echo  $kwd_id2; ?>">&nbsp;&nbsp;-&nbsp;<? echo $keyword2; ?></option>
                                            <? } } ?>                                          
                                      </select>
                                </div>                             
                     <div class="col-md-9 m-bot5">
                          <input  class="form-control m-bot5" type="text" name="store_title" value="<?php echo $store_title;?>" placeholder="Store Title" >                          <textarea rows="2" class="form-control m-bot5" id="meta_title" name="meta_title" placeholder="Meta Title" ><?php echo $meta_title; ?></textarea>
                         <textarea rows="2" class="form-control m-bot5" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords"><?php echo $meta_keywords; ?></textarea>                         <textarea rows="2" class="form-control m-bot5" id="meta_desc" name="meta_desc" placeholder="Meta Description"><?php echo $meta_desc; ?></textarea> 
                     </div> 
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
  