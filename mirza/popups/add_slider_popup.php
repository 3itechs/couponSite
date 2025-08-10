<?php include "../includes/DB.php";
$db= new DB();?>
<div class="modal-dialog2" style="width:80%">
  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix">
        <header class="panel-heading modal-header"> Add Slider </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
            <form class="form" role="form" method="post" action="ajax/add-slider-process.php" enctype="multipart/form-data">              
            
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                
               
               <div class="form-group">       
                  <label class="control-label pull-left">Slider Title</label>
                  <input  class="form-control m-bot5" type="text" name="slider_title" id="slider_title" value="<?php echo $slider_title;?>" placeholder="Slider Title" required>
               </div>                           
               
               <div class="form-group">       
                  <label class="control-label pull-left">Product title 1</label>
                  <input  class="form-control m-bot5" type="text" name="p1_title" id="p1_title" value="<?php echo $p1_title;?>" placeholder="Product title 1">
               </div>
               <div class="form-group">       
                  <label for="inputStatus" class="pull-left">Select Tag 1</label>
                  <select id="p1_tag" name="p1_tag" class="form-control m-bot5" required >
                    <option <?php if($p1_tag == '1'){echo  "selected";}?> value="1" >OUR PICK</option>
                    <option <?php if($p1_tag == '2'){echo  "selected";}?> value="2">RUNNER-UP</option>
                    <option <?php if($p1_tag == '3'){echo  "selected";}?> value="3">BUDGET</option>
                     <option <?php if($p1_tag == '4'){echo  "selected";}?> value="4">NONE</option>
                  </select>
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Product Price 1</label>
                  <input  class="form-control m-bot5" type="text" name="p1_price" value="<?php echo $p1_price;?>" placeholder="Product Price 1" >
               </div>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Product Link 1</label>
                  <input  class="form-control m-bot5" type="text" name="p1_link" value="<?php echo $p1_link;?>" placeholder="Product Link 1" >
               </div>
                
                <div class="col-sm-6 col-xs-12">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../assets/images/sliders/<?php echo $p1_img;?>" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="p1_img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div>Product Image 1 [ <?php echo PRODUCT_IMG_WIDTH?>x<?php echo PRODUCT_IMG_HEIGHT?> ]
                          </div>                                            
               </div>
              
              <div class="form-group" style="height: 170px"></div>  

               
               <div class="form-group">       
                  <label class="control-label pull-left">Product title 2</label>
                  <input  class="form-control m-bot5" type="text" name="p2_title" id="p2_title" value="<?php echo $p2_title;?>" placeholder="Product title 2" >
               </div>
               <div class="form-group">       
                  <label for="inputStatus" class="pull-left">Select Tag 2</label>
                  <select id="p2_tag" name="p2_tag" class="form-control m-bot5" required >
                    <option <?php if($p2_tag == '1'){echo  "selected";}?> value="1" >OUR PICK</option>
                    <option <?php if($p2_tag == '2'){echo  "selected";}?> value="2">RUNNER-UP</option>
                    <option <?php if($p2_tag == '3'){echo  "selected";}?> value="3">BUDGET</option>
                    <option <?php if($p2_tag == '4'){echo  "selected";}?> value="4">NONE</option>
                  </select>
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Product Price 2</label>
                  <input  class="form-control m-bot5" type="text" name="p2_price" value="<?php echo $p2_price;?>" placeholder="Product Price 2" >
               </div>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Product Link 2</label>
                  <input  class="form-control m-bot5" type="text" name="p2_link" value="<?php echo $p2_link;?>" placeholder="Product Link 2" >
               </div>
                
                <div class="col-sm-6 col-xs-12">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../assets/images/sliders/<?php echo $p2_img;?>" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="p2_img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div>Product Image 2 [ <?php echo PRODUCT_IMG_WIDTH?>x<?php echo PRODUCT_IMG_HEIGHT?> ]
                          </div>                                            
               </div>
               
                 <div class="form-group" style="height: 170px"></div>
                  
                  <div class="form-group">       
                  <label class="control-label pull-left">Product title 3</label>
                  <input  class="form-control m-bot5" type="text" name="p3_title" id="p3_title" value="<?php echo $p3_title;?>" placeholder="Product title 3" >
               </div>
               <div class="form-group">       
                  <label for="inputStatus" class="pull-left">Select Tag 3</label>
                  <select id="p3_tag" name="p3_tag" class="form-control m-bot5" required >
                    <option <?php if($p3_tag == '1'){echo  "selected";}?> value="1" >OUR PICK</option>
                    <option <?php if($p3_tag == '2'){echo  "selected";}?> value="2">RUNNER-UP</option>
                    <option <?php if($p3_tag == '3'){echo  "selected";}?> value="3">BUDGET</option>
                    <option <?php if($p3_tag == '4'){echo  "selected";}?> value="4">NONE</option>
                  </select>
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Product Price 3</label>
                  <input  class="form-control m-bot5" type="text" name="p3_price" value="<?php echo $p3_price;?>" placeholder="Product Price 3" >
               </div>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Product Link 3</label>
                  <input  class="form-control m-bot5" type="text" name="p3_link" value="<?php echo $p3_link;?>" placeholder="Product Link 3" >
               </div>
                
                <div class="col-sm-6 col-xs-12">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../assets/images/sliders/<?php echo $p3_img;?>" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="p3_img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div>Product Image 3 [ <?php echo PRODUCT_IMG_WIDTH?>x<?php echo PRODUCT_IMG_HEIGHT?> ]
                          </div>                                            
               </div>                                
                                              
                
                             
                </div>
              </div>              
                  
                
               
              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">    
                
                 <div class="form-group" style="height: 55px"></div>
                
                 
               <div class="form-group">       
                  <label class="control-label pull-left">Product title 4</label>
                  <input  class="form-control m-bot5" type="text" name="p4_title" id="p4_title" value="<?php echo $p4_title;?>" placeholder="Product title 4" >
               </div>
               <div class="form-group">       
                  <label for="inputStatus" class="pull-left">Select Tag 4</label>
                  <select id="p4_tag" name="p4_tag" class="form-control m-bot5" required >
                    <option <?php if($p4_tag == '1'){echo  "selected";}?> value="1" >OUR PICK</option>
                    <option <?php if($p4_tag == '2'){echo  "selected";}?> value="2">RUNNER-UP</option>
                    <option <?php if($p4_tag == '3'){echo  "selected";}?> value="3">BUDGET</option>
                    <option <?php if($p4_tag == '4'){echo  "selected";}?> value="4">NONE</option>
                  </select>
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Product Price 4</label>
                  <input  class="form-control m-bot5" type="text" name="p4_price" value="<?php echo $p4_price;?>" placeholder="Product Price 4" >
               </div>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Product Link 4</label>
                  <input  class="form-control m-bot5" type="text" name="p4_link" value="<?php echo $p4_link;?>" placeholder="Product Link 4" >
               </div>
                
                <div class="col-sm-6 col-xs-12">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../assets/images/sliders/<?php echo $p4_img;?>" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="p4_img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div>Product Image 4 [ <?php echo PRODUCT_IMG_WIDTH?>x<?php echo PRODUCT_IMG_HEIGHT?> ]
                          </div>                                            
               </div>   
              
              
              <div class="form-group" style="height: 170px"></div>
              
                            
              <div class="form-group">       
                  <label class="control-label pull-left">Product title 5</label>
                  <input  class="form-control m-bot5" type="text" name="p5_title" id="p5_title" value="<?php echo $p5_title;?>" placeholder="Product title 5" >
               </div>
               
               
               <div class="form-group">       
                  <label for="inputStatus" class="pull-left">Select Tag 5</label>
                  <select id="p5_tag" name="p5_tag" class="form-control m-bot5" required >
                    <option <?php if($p5_tag == '1'){echo  "selected";}?> value="1" >OUR PICK</option>
                    <option <?php if($p5_tag == '2'){echo  "selected";}?> value="2">RUNNER-UP</option>
                    <option <?php if($p5_tag == '3'){echo  "selected";}?> value="3">BUDGET</option>
                    <option <?php if($p5_tag == '4'){echo  "selected";}?> value="4">NONE</option>
                  </select>
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Product Price 5</label>
                  <input  class="form-control m-bot5" type="text" name="p5_price" value="<?php echo $p5_price;?>" placeholder="Product Price 5" >
               </div>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Product Link 5</label>
                  <input  class="form-control m-bot5" type="text" name="p5_link" value="<?php echo $p5_link;?>" placeholder="Product Link 5" >
               </div>
                
                <div class="col-sm-6 col-xs-12">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../assets/images/sliders/<?php echo $p5_img;?>" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="p5_img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div>Product Image 5 [ <?php echo PRODUCT_IMG_WIDTH?>x<?php echo PRODUCT_IMG_HEIGHT?> ]
                          </div>                                            
                     </div>                                                    
                
                <div class="form-group" style="height: 170px"></div>     
                
                <div class="form-group">       
                  <label class="control-label pull-left">Product title 6</label>
                  <input  class="form-control m-bot5" type="text" name="p6_title" id="p6_title" value="<?php echo $p6_title;?>" placeholder="Product title 6" >
               </div>
               <div class="form-group">       
                  <label for="inputStatus" class="pull-left">Select Tag 6</label>
                  <select id="p6_tag" name="p6_tag" class="form-control m-bot5" required >
                    <option <?php if($p6_tag == '1'){echo  "selected";}?> value="1" >OUR PICK</option>
                    <option <?php if($p6_tag == '2'){echo  "selected";}?> value="2">RUNNER-UP</option>
                    <option <?php if($p6_tag == '3'){echo  "selected";}?> value="3">BUDGET</option>
                    <option <?php if($p6_tag == '4'){echo  "selected";}?> value="4">NONE</option>
                  </select>
               </div>
               <div class="form-group">       
                  <label class="control-label pull-left">Product Price 6</label>
                  <input  class="form-control m-bot5" type="text" name="p6_price" value="<?php echo $p6_price;?>" placeholder="Product Price 6" >
               </div>
               
               <div class="form-group">       
                  <label class="control-label pull-left">Product Link 6</label>
                  <input  class="form-control m-bot5" type="text" name="p6_link" value="<?php echo $p6_link;?>" placeholder="Product Link 6" >
               </div>
                
                <div class="col-sm-6 col-xs-12">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                  <img src="../assets/images/sliders/<?php echo $p6_img;?>" alt="" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                              <div>
                               <span class="btn btn-white btn-sm btn-file">
                               <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                               <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                               <input type="file" name="p6_img" class="default m-bot5"/>
                               </span>
                                  <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                              </div>Product Image 6 [ <?php echo PRODUCT_IMG_WIDTH?>x<?php echo PRODUCT_IMG_HEIGHT?> ]
                          </div>                                            
                     </div>
                     
                     
                     
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
 