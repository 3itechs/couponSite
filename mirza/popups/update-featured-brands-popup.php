<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['sid'])){$sid=$_REQUEST['sid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlusers = "SELECT sid, fb_title, fb_alt, fb_link, fb_img, status, added_date FROM featured_brands WHERE sid=".$sid;
               
 $rs_user=$db->ExecuteQuery($sqlusers);            
 list($sid, $fb_title, $fb_alt, $fb_link, $fb_img, $status, $added_date)= $db->FetchAsArray($rs_user); ?>
   <div class="modal-dialog2" style="width:85%">
    <div class="modal-content2">                  
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix"><button type="button" class="close" data-dismiss="modal">&times;&nbsp;</button>
         <header class="panel-heading modal-header"> Update Brands </header>
         <div class="adv-table text-center" >         
          <div class="dataTables_wrapper">
           <form name="edit_user" class="form" role="form" method="post" action="ajax/update-featured-brands-process.php" enctype="multipart/form-data" >             
              <input  type="hidden" name="sid" value="<?php echo $sid;?>" > 
             
             
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                
               
               <div class="form-group">       
                  <label class="control-label pull-left">Brand Title</label>
                  <input  class="form-control m-bot5" type="text" name="fb_title" id="fb_title" value="<?php echo $fb_title;?>" placeholder="Brand Title" required>
               </div>
               
                 <div class="form-group">       
                  <label class="control-label pull-left">Image Alt</label>
                  <input  class="form-control m-bot5" type="text" name="fb_alt" value="<?php echo $fb_alt;?>" placeholder="Image Alt" >
               </div>                           
               
               <div class="form-group">       
                  <label class="control-label pull-left">Brand Link</label>
                  <input  class="form-control m-bot5" type="text" name="fb_link" id="fb_link" value="<?php echo $fb_link;?>" placeholder="Brand Link">
               </div>
               <div class="form-group">       
                  <label class="pull-left">Status</label>                                 
                  <select id="status" name="status" class="form-control m-bot5" >
                    <option value="1" <?php if($status == '1'){echo "selected";}?> >Enable</option>
                    <option value="0" <?php if($status == '0'){echo "selected";}?>>Disable</option>
                  </select>  
               </div>
               
               
                              
                    <div class="col-sm-6 col-xs-12">
                        
                         <?php if($fb_img == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image </span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="fb_img" class="default m-bot5"/>
                                                  [ <?php echo FEACH_BRAND_WIDTH?>x<?php echo FEACH_BRAND_HEIGHT?> ] 
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                    <!-- <img src="../images/logos/<?php echo $fb_img;?>" alt="" />-->
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="<?php echo FEATURED_BRANDS_PATH;?><?php echo $fb_img;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image </span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="fb_img">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $sid?>" class="btn btn-danger btn-sm fileupload-exists dellfbimg" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                              <?php }?>  [ <?php echo FEACH_BRAND_WIDTH?>x<?php echo FEACH_BRAND_HEIGHT?> ] 
                          
                                                                      
                     </div>
              
                                          
                </div>
              </div>              
              
              
              
              
              <div class="form-group last">
                 <div class="col-sm-12 col-xs-12">
                      <button type="submit" class="btn btn-danger pull-right m-bot15">Update</button>
                  </div>
               </div>
               
               <div class="form-group last">
                 <div class="col-sm-12 col-xs-12">
                     
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
  