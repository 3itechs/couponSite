<?php session_start();
if(!isset($_COOKIE['admin_username'])){ 
header("location: login.php"); exit();}
include "includes/DB.php";
$db= new DB();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">
<title>Add Post</title>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=DOMAINVAR?>/css/editor.css" type="text/css" rel="stylesheet"/>

    <!-- Bootstrap core CSS -->
<link href="<?=DOMAINVAR?>/css/bootstrap-reset.css" rel="stylesheet">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
  <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/jquery-multi-select/css/multi-select.css" />
<link rel="stylesheet" href="<?=DOMAINVAR?>/assets/data-tables/DT_bootstrap.css" />
<!-- Custom styles for this template -->
<link href="<?=DOMAINVAR?>/css/style.css" rel="stylesheet">
<link href="<?=DOMAINVAR?>/css/style-responsive.css" rel="stylesheet" />


<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->     
    
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-timepicker/compiled/timepicker.css" />  
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
 
  <!--For Html Editor Starts-->
 <!-- <link rel="stylesheet" href="<?=DOMAINVAR?>/ckeditor/samples/css/samples.css">-->
  <script src="<?=DOMAINVAR?>/ckeditor/ckeditor.js"></script>
  <script src="<?=DOMAINVAR?>/ckeditor/samples/js/sample.js"></script>
  <script src="<?=DOMAINVAR?>/ckeditor/samples/js/sample2.js"></script>
    <!--For Html Editor Ends-->
   
 </head>
  <body>
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >Control<span>Panel</span></a>
          <!--logo end-->
      </header>
      <!--header end-->
      <!--sidebar start-->
       <?php include "includes/mainleft.php"; ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          
           <?php if ($_REQUEST['a'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> Post added successfully.
           </div><?php } ?>
              <!-- page start-->
           <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
         <header class="panel-heading modal-header"> Add Post </header>
         <div class="adv-table addstore text-center" >         
          <div class="dataTables_wrapper">
            <form class="form" role="form" method="post" action="ajax/add-post-process.php" enctype="multipart/form-data">              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
               
             
                  
                  <div class="form-group">       
                  <label class="control-label pull-left">Post Heading</label>
                   <input  class="form-control m-bot5" type="text" name="post_heading" placeholder="Post Heading" required>
                   </div>
                   
                 <div class="form-group">       
                  <label class="control-label pull-left">Author</label>
                   <input  class="form-control m-bot5" type="text" name="author_name" value="<?php echo $author_name;?>" placeholder="Author Name" required >
                </div>
                   
                   <div class="form-group">       
                  <label class="control-label pull-left">Post Url</label>
                   <input  class="form-control m-bot5" type="text" name="post_url" placeholder="Post Url" required>
                   </div>
                                    
                   <div class="form-group">       
                  <label class="control-label pull-left">Post Category</label>  
                  <select id="primary_category" name="primary_category" class="form-control m-bot5" required >
                      <option value="">--Select Category*--</option>
							<?php
                            $sql="Select category_id, category from post_categories where status='ENA'  order by category  ";	
                            $rs_sql=$db->ExecuteQuery($sql); 
                            while(list($category_id,$category) = $db->FetchAsArray($rs_sql))
                                { ?>
                            <option  value="<?php echo $category_id;?>"><?php echo $category;?></option><?php }?>
                     </select> 
                  </div>
                  
                <div class="col-lg-8 m-bot15 text-left">                  
                  <label class="checkbox-inline">
                      <input type="checkbox" id="feature" name="feature" value="1"> Featured
                  </label>
                 </div> 
                 
                 <div class="form-group" style="height:20px"> </div>
                  
                <div class="form-group">       
                      <label class="control-label pull-left">Post Status</label>                 
                      <select id="status" name="status" class="form-control m-bot5" required >
                        <option value="ENA" selected>Enable</option>
                        <option value="DIS">Disable</option>
                      </select>  
                </div>
                
                 
                
                
                  
                </div>
              </div>              
              
                             
                  <div class="col-sm-6 col-xs-12">
                    
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                              <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                          </div>
                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100px; max-height: 100px; line-height: 20px;"></div>
                          <div>
                           <span class="btn btn-white  btn-sm btn-file">
                           <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Image</span>
                           <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                           <input type="file" name="post_img" class="default m-bot5" />
                           </span>
                              <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                          </div>
                       </div>Post Image [ <?php echo POST_IMG_WIDTH?>x<?php echo POST_IMG_HEIGHT?> ]
                     </div>
                  
                  <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">    
                
                 <?php /*?><div class="form-group">       
                  <label class="control-label pull-left">Words Count</label>
                      <input  class="form-control m-bot5" type="text" name="word_count" id="word_count" value="<?php echo $word_count;?>" placeholder="Words Count" required>
                </div> <?php */?>
                 
               
                  
                <div class="form-group">       
                  <label class="control-label pull-left">Page Title</label>
                  <input  class="form-control m-bot5" type="text" name="meta_title" id="meta_title" value="<?php echo $meta_title;?>" placeholder="Page Title" required>
                  </div>   
                <div class="form-group">       
                  <label class="control-label pull-left">Meta Keywords</label>
                        <textarea rows="2" class="form-control m-bot5" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords"></textarea>
                </div>       
                <div class="form-group">       
                  <label class="control-label pull-left">Meta Description</label>                  
                        <textarea rows="2" class="form-control m-bot5" id="meta_desc" name="meta_desc" placeholder="Meta Description"></textarea>              
                </div>
                
                <div class="form-group" style="height:10px"> </div>
                 
                   
                     
                </div>
              </div>
             
                            
              <div class="form-group">       
                 <div class="col-sm-12 col-xs-12">                        
                    <a href="popups/add-static-img-popup.php" class="btn btn-success pull-right" data-toggle="modal" data-target="#myAddModal">Upload Post Image</a>
                    
                  </div>
              </div> 
              
              
             
              <div class="form-group">       
                  <label class="control-label pull-left">&nbsp;&nbsp;&nbsp;&nbsp;Post Detail</label>
                 	<div class="row">
						<div class="col-lg-12">
                  <textarea rows="2"  id="editor" name="post_desc" placeholder="Post Detail*"><?php echo  htmlspecialchars($post_desc) ;?></textarea> </div></div>
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
      <!--main content end-->
  <?php include "includes/footer.php"; ?>
     
  <div id="myModal" class="modal fade"></div>
  <div id="myAddModal" class="modal fade"></div>
     
  </section>
        
   <script>
	initSample();
	initSample2();
   </script> 
       
    <script class="include" type="text/javascript" src="<?=DOMAINVAR?>/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=DOMAINVAR?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?=DOMAINVAR?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=DOMAINVAR?>/js/respond.min.js" ></script>  
    <!--this page plugins-->

  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="<?=DOMAINVAR?>/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
    <!--common script for all pages-->
    <script src="<?=DOMAINVAR?>/js/common-scripts.js"></script>
    <!--this page  script only-->
   <script type="text/javascript" src="<?=DOMAINVAR?>/js/date-picker-popup.js"></script> 
 
  <script>
  var matched, browser;

jQuery.uaMatch = function( ua ) {
    ua = ua.toLowerCase();

    var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
        /(msie) ([\w.]+)/.exec( ua ) ||
        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
        [];

    return {
        browser: match[ 1 ] || "",
        version: match[ 2 ] || "0"
    };
};

matched = jQuery.uaMatch( navigator.userAgent );
browser = {};

if ( matched.browser ) {
    browser[ matched.browser ] = true;
    browser.version = matched.version;
}

// Chrome is Webkit, but Webkit is also Safari.
if ( browser.chrome ) {
    browser.webkit = true;
} else if ( browser.webkit ) {
    browser.safari = true;
}

jQuery.browser = browser;
  </script>         

<script type="text/javascript">
	$(document).ready(function()
		{
		
  var dataString = 'cid='+ <?=$child_category?> + '&pid=' + <?=$primary_category?>;
	 $.ajax
		({
		type: "POST",
		url: "ajax/childcat-list.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
		$("#childcat_id").html(html);
		} 
		});		
			
						
		$("#pcat_id").change(function()
			{
			var id=$(this).val();
			var dataString = 'id='+ id;			
				$.ajax
				({
				type: "POST",
				url: "ajax/childcat-list.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
				$("#childcat_id").html(html);
				} 
			});		
		});
			
	var dataString = 'tid='+ <?=$tag?> + '&cid=' + <?=$child_category?>;
	 $.ajax
		({
		type: "POST",
		url: "ajax/tag-list.php",
		data: dataString,
		cache: false,
		success: function(html)
		{  
		$("#tagid").html(html);
		} 
		});		
		
		$("#childcat_id").change(function()
			{
			var id=$(this).val();
			var dataString = 'id='+ id;			
				$.ajax
				({
				type: "POST",
				url: "ajax/tag-list.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
				$("#tagid").html(html);
				} 
			});		
		});	
	});
</script>  
  </body>

</html>