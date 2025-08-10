<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['uid'])){$id=$_REQUEST['uid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlusers = "SELECT admin_id, admin_name, username, password, admin_email, admin_level, status FROM admin WHERE admin_id=".$id;
               
 $rs_user=$db->ExecuteQuery($sqlusers);            
 list($admin_id, $admin_name, $username, $password, $admin_email, $admin_level, $status )= $db->FetchAsArray($rs_user);

?>
   <div class="modal-dialog2" style="width:85%">
    <div class="modal-content2">                  
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix">
         <header class="panel-heading modal-header"> Update User </header>
         <div class="adv-table text-center" >         
          <div class="dataTables_wrapper">
           <form name="edit_user" class="form" role="form" method="post" action="ajax/update-user-process.php" enctype="multipart/form-data" >             
              <input  type="hidden" name="userid" value="<?php echo $admin_id;?>" > 
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label for="inputUser" class="pull-left">Admin Name</label>
                  <input  class="form-control m-bot5" type="text" name="admin_name" value="<?php echo $admin_name;?>" placeholder="Admin Name*" required>
                  
                  <label for="inputUser" class="pull-left">User Name</label>
                  <input  class="form-control m-bot5" type="text" name="username" value="<?php echo $username;?>" placeholder="User Name*" required>
                 
                    
                  <div class="text-right">
                      <label for="exampleInputPassword" class="pull-left">Password</label>
                      <input  class="form-control m-bot5" type="text" id="userpass" value="" name="password" placeholder="Password" disabled >
                     <label class="checkbox-inline">
                      <input class="pull-left m-bot5" type="checkbox" onClick="theChecker()" value="1" id="change_pass" name="change_pass"> Change Password
                     </label>
                  </div>     
                  
                  
                  <label for="exampleInputEmail1" class="pull-left">Email address</label>
                  <input  class="form-control m-bot5" type="text" value="<?php echo $admin_email;?>" name="admin_email" placeholder="Email" ><br>
                                                       
                </div>
              </div> 
                           
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                  
                 <label for="inputLevel" class="pull-left">User level</label>
                  <select id="admin_level" name="admin_level" class="form-control m-bot5" required >
                    <option <?php if($admin_level == 3){echo  "selected";}?> value="3">User</option>
                    <option <?php if($admin_level == 2){echo  "selected";}?> value="2">Manager</option>
                    <option <?php if($admin_level == 1){echo  "selected";}?> value="1">Admin</option>
                  </select>
                  <label for="inputStatus" class="pull-left">Status</label>
                  <select id="status" name="status" class="form-control m-bot5" required >
                    <option <?php if($status == 1){echo  "selected";}?> value="1" >Enable</option>
                    <option <?php if($status == 0){echo  "selected";}?> value="0">Disable</option>
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

 <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

  <script type="text/javascript" src="<?=DOMAINVAR?>/js/date-picker-popup.js"></script>
 