<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['eid'])){$eid=$_REQUEST['eid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlusers = "SELECT eid, event_title, event_url, event_img, status, added_date FROM events WHERE eid=".$eid;
               
 $rs_user=$db->ExecuteQuery($sqlusers);            
 list($eid, $event_title, $event_url, $event_img, $status, $added_date )= $db->FetchAsArray($rs_user);

?>
   <div class="modal-dialog2" style="width:85%"> 
    <div class="modal-content2">                    
    <section id="main-content">
      <section class="wrapper">
      <!-- page start-->
       <section class="panel clearfix">
         <header class="panel-heading modal-header"> Update Event </header>
         <div class="adv-table text-center" >         
          <div class="dataTables_wrapper">
           <form name="edit_user" class="form" role="form" method="post" action="ajax/update-event-process.php" enctype="multipart/form-data" >             
              <input  type="hidden" name="subsid" value="<?php echo $eid;?>" > 
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                  <label for="inputUser" class="pull-left">Event Title</label>
                  <input  class="form-control m-bot5" type="text" name="event_title" value="<?php echo $event_title;?>" placeholder="Event Title" required>   <label for="inputUser" class="pull-left">Event Url</label>
                  <input  class="form-control m-bot5" type="text" name="event_url" value="<?php echo $event_url;?>" placeholder="Event Url" required>
                  
                   <br>                                    
                
                
                 <label class="text-left">Expiry Date Range</label>
                   <div class="form-group">
                          <div class="input-group input-large" data-date="" data-date-format="">
                          <?php $start_ar = explode("-",$start_date);
						   $start_date =  $start_ar[2]."/".$start_ar[1]."/".$start_ar[0]; ?>
                              <input type="text" class="form-control exp-sdate" id="exp-sdate" name="exp-sdate" value="<?php echo $start_date;?>" >
                              <span class="input-group-addon">To</span>
                              <?php $exp_ar = explode("-",$exp_date);
						   $expiry_date =  $exp_ar[2]."/".$exp_ar[1]."/".$exp_ar[0]; ?>
                              <input type="text" class="form-control exp-edate" id="exp-edate" name="exp-edate" value="<?php echo $expiry_date;?>" >
                          </div><span class="error" id="expdate-error"></span>                 
                   </div>
                   
                   
               </div>    
                   
                   
              </div> 
                           
              <div class="col-sm-6 col-xs-12">
									  <?php if($event_img == ''){?>               
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                      <img src="../assets/img/event/<?php echo $event_img;?>" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-sm btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image </span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="event_img" class="default m-bot5"/>
                                                   [ <?php echo EVENT_WIDTH?>x<?php echo EVENT_HEIGHT?> ] 
                                                   </span>
                                                      <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                             <?php }else{?>                                              
                                              <div data-provides="fileupload" class="fileupload fileupload-exists"><input type="hidden" value="" name="">
                                                  <div style="width: 100px; height: 100px;" class="fileupload-new thumbnail">
                                                    <!-- <img src="../images/logos/<?php echo $event_img;?>" alt="" />-->
                                                  </div>
                                                  <div style="max-width: 100px; max-height: 100px; line-height: 10px;" class="fileupload-preview fileupload-exists thumbnail">
                                                  
                                                  <img style="max-height: 100px;" src="../assets/img/event/<?php echo $event_img;?>" alt="" />
                                                  </div>
                                                  <div>
                                                    <span class="btn btn-white btn-sm btn-file">
                                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image </span>
                                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                    <input type="file" class="default m-bot5" name="event_img">
                                                   </span>
                                                      <a data-dismiss="fileupload" id="<?php echo $eid?>" class="btn btn-danger btn-sm fileupload-exists delleventimg" href="#"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                                              <?php }?>[ <?php echo EVENT_WIDTH?>x<?php echo EVENT_HEIGHT?> ] 
                                              
              
              
              <label for="inputStatus" class="pull-left">Status</label>
                  <select id="status" name="status" class="form-control m-bot5" required >
                    <option <?php if($status == 'ENA'){echo  "selected";}?> value="ENA" >Enable</option>
                    <option <?php if($status == 'DIS'){echo  "selected";}?> value="DIS">Disable</option>
                  </select>
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
  <!--<script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>-->
  
 <!-- <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  
-->  
<!--<script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/moment.min.js"></script>  
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>    
   <script src="<?=DOMAINVAR?>/js/advanced-form-components.js"></script>-->
   
    <script type="text/javascript" src="<?=DOMAINVAR?>/js/date-picker-popup.js"></script> 