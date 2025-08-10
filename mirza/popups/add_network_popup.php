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
            <form class="form" role="form" method="post" action="ajax/add-network-process.php" enctype="multipart/form-data"> 
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="inputUser" class="pull-left">Network Name</label>
                  <input  class="form-control m-bot5" type="text" name="network_name" placeholder="Network Namee*" required>                  
                   <label for="exampleInputPassword" class="pull-left">Network Owner</label>
                  <input  class="form-control m-bot5" type="text"  name="network_owner" placeholder="Network Owner" >                                  
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
  