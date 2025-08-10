<?php include "../includes/DB.php";
$db= new DB();?>
<div class="modal-dialog2" style="width:80%">
  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix">
        <header class="panel-heading modal-header"> Add Vault List </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
            <form class="form" role="form" method="post" action="ajax/add-vault-list-process.php" enctype="multipart/form-data">              
            
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
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="vl_img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div> Image [ <?php echo VAULT_IMG_WIDTH; ?>x<?php echo VAULT_IMG_HEIGHT; ?> ]
                          </div>                                            
               </div>
              
              <div class="form-group" style="height: 170px"></div>  

               
                                              
                                              
                
                             
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
 