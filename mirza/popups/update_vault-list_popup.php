<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['sid'])){$sid=$_REQUEST['sid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlusers = "SELECT sid, vl_title, vl_alt, vl_link, vl_img, status, added_date FROM vault_list WHERE sid=".$sid;
               
 $rs_user = $db->ExecuteQuery($sqlusers);            
 list($sid, $vl_title, $vl_alt, $vl_link, $vl_img, $status, $added_date) = $db->FetchAsArray($rs_user); ?> 
   <div class="modal-dialog2" style="width:85%">
    <div class="modal-content2">                  
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix">
         <header class="panel-heading modal-header"> Update Vault List </header>
         <div class="adv-table text-center" >         
          <div class="dataTables_wrapper">
           <form name="edit_user" class="form" role="form" method="post" action="ajax/update-vault-list-process.php" enctype="multipart/form-data" >              <input  type="hidden" name="sid" value="<?php echo $sid;?>" > 
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                
               <div class="form-group">       
                  <label class="control-label pull-left">Vault List Title</label>
                  <input  class="form-control m-bot5" type="text" name="vl_title" id="vl_title" value="<?php echo $vl_title;?>" placeholder="Vault List Title" required>
               </div>
                 <div class="form-group">       
                  <label class="control-label pull-left">Image Alt</label>
                  <input  class="form-control m-bot5" type="text" name="vl_alt" value="<?php echo $vl_alt;?>" placeholder="Image Alt" >
               </div>                           
               
               <div class="form-group">       
                  <label class="control-label pull-left">Tracking Link</label>
                  <input  class="form-control m-bot5" type="text" name="vl_link" id="vl_link" value="<?php echo $vl_link;?>" placeholder="Tracking Link">
               </div>
               <div class="form-group">       
                  <label class="pull-left">Status</label>                                 
                  <select id="status" name="status" class="form-control m-bot5" >
                    <option value="1" <?php if($status == '1'){echo "selected";}?> >Enable</option>
                    <option value="0" <?php if($status == '0'){echo "selected";}?>>Disable</option>
                  </select>  
               </div>
               
               
                              
                    <div class="col-sm-6 col-xs-12">
                        
                         <?php if($vl_img == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image </span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="vl_img" class="default m-bot5"/>
                                                   [ <?php echo VAULT_IMG_WIDTH; ?>x<?php echo VAULT_IMG_HEIGHT; ?> ] 
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                    <!-- <img src="../images/logos/<?php echo $vl_img;?>" alt="" />-->
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="<?php echo VAULT_IMG_PATH;?><?php echo $vl_img;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image </span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="vl_img">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $sid?>" class="btn btn-danger btn-sm fileupload-exists dellvlimg" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                              <?php }?>[ <?php echo "1015";?>x<?php echo "395"; ?> ] 
                          
                                                                      
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
  