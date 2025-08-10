<?php include "../includes/DB.php";
$db= new DB();?>
<div class="modal-dialog2" style="width:80%">
  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
        <header class="panel-heading modal-header"> Add Post Category </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
            <form name="add_category" class="form" role="form" method="post" action="ajax/add-post-category-process.php" enctype="multipart/form-data"> 
               <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  
                 <label for="inputUser" class="pull-left">Category</label>
                  <input  class="form-control m-bot5" type="text" name="category_name" value="<?php echo $category_name;?>" placeholder="Category Name*" required>
                  
                                 
                 <?php /*?> <label for="exampleInputPassword" class="pull-left">Parent Category
                  <? $sql_pc = "Select category_id, category from categories where status = 'ENA' and parent_id = '0' order by category  ";	?>
                  </label>                  
                  <select id="parent_id" name="parent_id" class="form-control m-bot5" >
                    <option value="">--Parent Category*--</option>
                     <?
				
					$rs_sql_pc = $db->ExecuteQuery($sql_pc); 
					while(list($kwdid, $parent_kwd) = $db->FetchAsArray($rs_sql_pc))
						{ ?>
                    <option <? if($kwdid == $parent_id){echo "selected";} ?> value="<?php echo $kwdid;?>"><?php echo $parent_kwd;?></option><?php }?>
                  </select><?php */?>
                  
                  <label for="exampleInputPassword" class="pull-left">Category Heading</label>
                  <input  class="form-control m-bot5" type="text"  name="category_title" value="<?php echo $category_title;?>" placeholder="Page H1" > 
                  
                  <label for="exampleInputPassword" class="pull-left">Category Url</label>
                  <input  class="form-control m-bot5" type="text"  name="category_url" value="<?php echo $category_url;?>" placeholder="Category Url" > 
                  
                  <label for="exampleInputPassword" class="pull-left">Description</label>
                  <textarea rows="2" class="form-control m-bot5" id="category_desc" name="category_desc" placeholder="Category Description" ><?php echo $category_desc; ?></textarea>
                     
                 </div>
               </div>
              
             <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label  class="pull-left">Status</label>
                  <select id="status" name="status" class="form-control m-bot5" >
                    <option value="ENA">Enable</option>
                    <option value="DIS">Disable</option>
                  </select>
                  <label  class="pull-left">Meta Title</label>
                  <textarea rows="2" class="form-control m-bot5" id="meta_title" name="meta_title" placeholder="Meta Title" ><?php echo $meta_title; ?></textarea>
                  <label  class="pull-left">Meta Keyword</label>
                  <textarea rows="2" class="form-control m-bot5" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords"><?php echo $meta_keywords; ?></textarea>                  <label  class="pull-left">Meta Description</label>
                  <textarea rows="2" class="form-control m-bot5" id="meta_desc" name="meta_desc" placeholder="Meta Description"><?php echo $meta_desc; ?></textarea>
                  
                  <?php /*?><div class="col-sm-8 col-xs-12">
				  <?php  if($cat_img == ''){?>               
                     <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../assets/img/categories/<?php echo $cat_img;?>" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div>
                          </div> [ <?php echo CAT_BANNER_WIDTH?> X <?php echo CAT_BANNER_HEIGHT?>]
                         <?php }else{?>                                              
                          <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                              <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                <!-- <img src="../images/logos/<?php echo $cat_img;?>" alt="" />-->
                              </div>
                              <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                              
                              <img style="max-height: 100px;" src="../assets/img/categories/<?php echo $cat_img;?>" alt="" />
                              </div>
                              <div>
                                <span class="btn btn-white btn-sm btn-file">
                                <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                                <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                <input type="file" class="default m-bot5" name="img">
                               </span>
                                  <a data-dismiss="fileupload" ="<?php echo $category_id?>" class="btn btn-danger btn-sm fileupload-exists dellogo" href="#"><i class="icon-trash"></i> Remove</a>
                              </div>
                          </div>[ <?php echo CAT_BANNER_WIDTH?> X <?php echo CAT_BANNER_HEIGHT?>]
                          <?php }?>
                   </div><?php */?>
                
                </div>
              </div>
                           
                          
              <div class="form-group last">
                 <div class="col-sm-12 col-xs-12">
                      <button type="submit" class="btn btn-danger pull-right m-bot15">Add New</button>
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
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
   <script src="<?=DOMAINVAR?>/js/advanced-form-components.js"></script>
  