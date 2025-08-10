<?php include "../includes/DB.php";
$db= new DB();?>
<div class="modal-dialog2" style="width:80%">
  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
        <header class="panel-heading modal-header"> Add Network </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
            <form name="add_keyword" class="form" role="form" method="post" action="ajax/add-keyword-process.php" enctype="multipart/form-data"> 
               <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  
                 <label for="inputUser" class="pull-left">Keyword</label>
                  <input  class="form-control m-bot5" type="text" name="keyword_name" value="<?php echo $keyword_name;?>" placeholder="Network Name*" required>
                  
                 <label for="inputUser" class="pull-left">Keyword Type</label>
                  <select id="kwd_type" name="kwd_type" class="form-control m-bot5" >
                    <option value="categories">Categories</option>
                    <option value="products">Products</option>
                    <option value="tags">Tags</option>
                  </select>
                
                  
                  <label for="exampleInputPassword" class="pull-left">Parent Keyword
                  <? $sql_pc = "Select kwd_id, keyword from keywords where status = 'ENA' order by keyword  ";	?>
                  </label>                  
                  <select id="parent_id" name="parent_id" class="form-control m-bot5" >
                    <option value="">--Parent Keyword*--</option>
                     <?
				
					$rs_sql_pc = $db->ExecuteQuery($sql_pc); 
					while(list($kwdid, $parent_kwd) = $db->FetchAsArray($rs_sql_pc))
						{ ?>
                    <option <? if($kwdid == $parent_id){echo "selected";} ?> value="<?php echo $kwdid;?>"><?php echo $parent_kwd;?></option><?php }?>
                  </select>
                  
                  <label for="exampleInputPassword" class="pull-left">Keyword Heading</label>
                  <input  class="form-control m-bot5" type="text"  name="keyword_heading" value="<?php echo $keyword_heading;?>" placeholder="Page H1" > 
                  
                  <label for="exampleInputPassword" class="pull-left">Url</label>
                  <input  class="form-control m-bot5" type="text"  name="url" value="<?php echo $url;?>" placeholder="Keyword Url" > 
                  
                  <label for="exampleInputPassword" class="pull-left">Description</label>
                  <textarea rows="2" class="form-control m-bot5" id="keyword_desc" name="keyword_desc" placeholder="Keyword Description" ><?php echo $keyword_desc; ?></textarea>
                  
                  <?php /*?><div class="col-sm-8 col-xs-12">
				  <?php  if($kwd_img == ''){?>               
                     <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../images/keywords/<?php echo $kwd_img;?>" alt="" />
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
                          </div>
                         <?php }else{?>                                              
                          <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                              <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                <!-- <img src="../images/logos/<?php echo $kwd_img;?>" alt="" />-->
                              </div>
                              <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                              
                              <img style="max-height: 100px;" src="../images/keywords/<?php echo $kwd_img;?>" alt="" />
                              </div>
                              <div>
                                <span class="btn btn-white btn-sm btn-file">
                                <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Logo</span>
                                <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                <input type="file" class="default m-bot5" name="img">
                               </span>
                                  <a data-dismiss="fileupload" id="<?php echo $kwd_id?>" class="btn btn-danger btn-sm fileupload-exists dellogo" href="#"><i class="icon-trash"></i> Remove</a>
                              </div>
                          </div>
                          <?php }?>
                   </div>  <?php */?>                
                     
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

 <?php  include "../includes/js.php"; ?>
  