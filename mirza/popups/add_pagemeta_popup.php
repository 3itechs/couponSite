<?php include "../includes/DB.php";
$db= new DB();?>
<div class="modal-dialog2" style="width:80%">
  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
        <header class="panel-heading modal-header"> Add Page Info </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
            <form name="add_category" class="form" role="form" method="post" action="ajax/add-pagemeta-process.php" enctype="multipart/form-data"> 
               <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  
                 <label for="exampleInputPassword" class="pull-left">Page Title</label>
                  <input  class="form-control m-bot5" type="text"  name="ptitle" value="<?php echo $ptitle;?>" placeholder="Page Title" > 
                  
                
                  <label for="exampleInputPassword" class="pull-left">Description</label>
                  <textarea rows="2" class="form-control m-bot5" id="pdesc" name="pdesc" placeholder="Description" ><?php echo $description; ?></textarea>
                  
                  <label  class="pull-left">Status</label>
                  <select id="status" name="status" class="form-control m-bot5" >
                    <option value="ENA">Enable</option>
                    <option value="DIS">Disable</option>
                  </select>               
                     
                 </div>
               </div>
              
             <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               
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
  