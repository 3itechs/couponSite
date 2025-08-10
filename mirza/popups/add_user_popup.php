<?php include "../includes/DB.php";
$db= new DB();?>
<div class="modal-dialog2" style="width:80%">
  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix">
        <header class="panel-heading modal-header"> Add User </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
            <form class="form" role="form" method="post" action="ajax/add-user-process.php" enctype="multipart/form-data">              
             
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="inputUser" class="pull-left">Admin Name</label>
                  <input  class="form-control m-bot5" type="text" name="admin_name" placeholder="Admin Name*" required>
                  
                  <label for="inputUser" class="pull-left">User ID</label>
                  <input  class="form-control m-bot5" type="text" name="username" placeholder="User ID*" required>                  
                   <label for="exampleInputPassword" class="pull-left">Password</label>
                  <input  class="form-control m-bot5" type="text"  name="password" placeholder="Password" > 
                   <label for="exampleInputEmail1" class="pull-left">Email address</label>
                  <input  class="form-control m-bot5" type="text" name="admin_email" placeholder="Email" > <br>                
                </div>
              </div> 
                           
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">               
                <label for="inputLevel" class="pull-left">User level</label>
                  <select id="admin_level" name="admin_level" class="form-control m-bot5" required >
                    <option value="3" selected>User</option>
                    <option value="2">Manager</option>
                    <option value="1">Admin</option>
                  </select>
                  <label for="inputStatus" class="pull-left">Status</label>
                  <select id="status" name="status" class="form-control m-bot5" required >
                    <option value="ENA" selected>Enable</option>
                    <option value="DIS">Disable</option>
                  </select>
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
<!-- <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
   <script src="<?=DOMAINVAR?>/js/advanced-form-components.js"></script>-->
   
