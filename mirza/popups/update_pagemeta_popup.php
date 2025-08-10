<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['id'])){$id=$_REQUEST['id'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
  $sqlcategorys = "SELECT pid, ptitle, pdesc, meta_title,  meta_desc, meta_keywords, added_date, status FROM pages WHERE pid=".$id; 
               
 $rs_category=$db->ExecuteQuery($sqlcategorys);            
 list( $page_id, $ptitle, $pdesc, $meta_title, $meta_desc, $meta_keywords, $added_date, $status)=$db->FetchAsArray($rs_category);

?>
  <div class="modal-dialog2" style="width:80%">
  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
        <header class="panel-heading modal-header"> Update Page Info </header>
        <div class="adv-table addstore text-center" >        
          <div class="dataTables_wrapper">
           <form name="edit_page" class="form" role="form" method="post" action="ajax/update-pagemeta-process.php" enctype="multipart/form-data" >             
              <input  type="hidden" name="pageid" value="<?php echo $page_id;?>" > 
              
              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            
                  <label for="exampleInputPassword" class="pull-left">Page Title</label>
                  <input  class="form-control m-bot5" type="text"  name="ptitle" value="<?php echo $ptitle;?>" placeholder="Page Title" > 
                  
                                    
                  <label for="exampleInputPassword" class="pull-left">Description</label>
                  <textarea rows="2" class="form-control m-bot5"  name="pdesc" placeholder="Description" ><?php echo $pdesc; ?></textarea>
                  
                   <label  class="pull-left">Status</label>
                 <select ="status" name="status" class="form-control m-bot5" >
                    <option <? if($status == 'ENA'){echo "selected";} ?> value="ENA">Enable</option>
                    <option <? if($status == 'DIS'){echo "selected";} ?> value="DIS">Disable</option>
                  </select>
                  
                     
                 </div>
               </div>
              
             <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 
                  
                  <label  class="pull-left">Meta Title</label>
                  <textarea rows="2" class="form-control m-bot5"  name="meta_title" placeholder="Meta Title" ><?php echo $meta_title; ?></textarea>
                  <label  class="pull-left">Meta Keyword</label>
                  <textarea rows="2" class="form-control m-bot5"  name="meta_keywords" placeholder="Meta Keywords"><?php echo $meta_keywords; ?></textarea>                  <label  class="pull-left">Meta Description</label>
                  <textarea rows="2" class="form-control m-bot5"  name="meta_desc" placeholder="Meta Description"><?php echo $meta_desc; ?></textarea>
                
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
<?php  include "../includes/js.php"; ?>     
 
 