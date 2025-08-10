<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['uid'])){$id=$_REQUEST['uid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlusers = "SELECT id, username, email, store_id, status, added_date FROM subscribers WHERE id=".$id;
               
 $rs_user=$db->ExecuteQuery($sqlusers);            
 list($id, $username, $email, $store_id, $status, $added_date )= $db->FetchAsArray($rs_user);

?>
   <div class="modal-dialog2" style="width:85%">
    <div class="modal-content2">                  
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix">
         <header class="panel-heading modal-header"> Update Subscriber </header>
         <div class="adv-table text-center" >         
          <div class="dataTables_wrapper">
           <form name="edit_user" class="form" role="form" method="post" action="ajax/update-subscriber-process.php" enctype="multipart/form-data" >             
              <input  type="hidden" name="subsid" value="<?php echo $id;?>" > 
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="inputUser" class="pull-left">User Name</label>
                  <input  class="form-control m-bot5" type="text" name="username" value="<?php echo $username;?>" placeholder="User Name*" required>
                                
                  
                  <label for="exampleInputEmail1" class="pull-left">Email address</label>
                  <input  class="form-control m-bot5" type="text" value="<?php echo $email;?>" name="email" placeholder="Email" >
                                                       
                </div>
              </div> 
                           
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                  
                 <label for="inputLevel" class="pull-left">Store Name</label>
                  <input  class="form-control m-bot5" type="text" name="storename" id="storename" value="<?php echo $db->getStoreNameFromSID($store_id);?>" placeholder="Store Name*" >
                  <label for="inputStatus" class="pull-left">Status</label>
                  <select id="status" name="status" class="form-control m-bot5" required >
                    <option <?php if($status == '1'){echo  "selected";}?> value="1" >Enable</option>
                    <option <?php if($status == '0'){echo  "selected";}?> value="0">Disable</option>
                  </select>
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
  <script type="text/javascript" src="<?=DOMAINVAR?>/js/typeahead.js"></script>
   <script type="text/javascript"> var mysid = 'storename' ; </script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/js/all-stores-list.js"></script>