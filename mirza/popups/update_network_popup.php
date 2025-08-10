<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['id'])){$id=$_REQUEST['id'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlnetworks = "SELECT network_id, network_name, network_owner, added_date, status FROM network WHERE network_id=".$id;
               
 $rs_network=$db->ExecuteQuery($sqlnetworks);            
 list($network_id, $network_name, $network_owner, $added_date, $status )=  $db->FetchAsArray($rs_network);

?>
   <div class="modal-dialog2" style="width:65%">
    <div class="modal-content2">                  
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix" style="padding-bottom:20px;">
         <header class="panel-heading modal-header"> Update Network </header>
         <div class="adv-table text-center" >         
          <div class="dataTables_wrapper">
           <form name="edit_network" class="form" role="form" method="post" action="ajax/update-network-process.php" enctype="multipart/form-data" >             
              <input  type="hidden" name="networkid" value="<?php echo $network_id;?>" > 
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="inputUser" class="pull-left">Network Name</label>
                  <input  class="form-control m-bot5" type="text" name="network_name" value="<?php echo $network_name;?>" placeholder="Network Name*" required>
                  
                 
                    
                  <div class="text-right">
                      <label for="exampleInputPassword" class="pull-left">Network Owner</label>
                      <input  class="form-control m-bot5" type="text"  name="network_owner" value="<?php echo $network_owner;?>" placeholder="Network Owner" >                    
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

 <?php  include "../includes/js.php"; ?>    
 
 