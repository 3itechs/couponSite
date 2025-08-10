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
<title><?php echo $pageTitle;?></title>
    <!-- Bootstrap core CSS -->
<link href="<?=DOMAINVAR?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=DOMAINVAR?>/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

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
      <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
        <header class="panel-heading modal-header"> Add Page Info </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
            
            <form name="add_category" class="form" role="form" method="post" action="ajax/add-static-page-process.php" enctype="multipart/form-data"> 
               <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            
                  <label for="exampleInputPassword" class="pull-left">Page Title</label>
                  <input  class="form-control m-bot5" type="text"  name="ptitle" value="" placeholder="Page Title" > 
                  
                   <label  class="pull-left">Meta Title</label>
                  <textarea rows="2" class="form-control m-bot5"  name="meta_title" placeholder="Meta Title" ></textarea>
                  
                     
                 </div>
               </div>
              
             <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 
                  
                  
                  <label  class="pull-left">Meta Keyword</label>
                  <textarea rows="2" class="form-control m-bot5"  name="meta_keywords" placeholder="Meta Keywords"></textarea>                                    
                  <label  class="pull-left">Meta Description</label>
                  <textarea rows="2" class="form-control m-bot5"  name="meta_desc" placeholder="Meta Description"></textarea>                
                </div>
              </div>
              
               <div class="form-group">       
                  <div class="col-sm-12 col-xs-12">                        
                    <a href="popups/add-static-img-popup.php" class="btn btn-success pull-right" data-toggle="modal" data-target="#myAddModal">Upload Image</a>
                    
                  </div>
              </div> 
              
              <div class="box">&nbsp;</div><div class="box">&nbsp;</div> 
              
              <label for="exampleInputPassword" class="pull-left">Description</label>
              <textarea rows="3" class="form-control" id="editor"  name="pdesc" placeholder="Description" ></textarea>
              
                          
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
      <div style="height:200px"></div>
      <!--main content end-->
     <?php include "includes/footer.php"; ?>
     <div id="myModal" class="modal fade"></div>
     <div id="myAddModal" class="modal fade"></div>
  </section>
 
<script>
	initSample();
	initSample2();
   </script> 
  <script src="<?=DOMAINVAR?>/js/jquery.js"></script>
    <script src="<?=DOMAINVAR?>/js/bootstrap.min.js"></script>
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

   <script type="text/javascript" src="<?=DOMAINVAR?>/js/typeahead.js"></script>

   <script type="text/javascript"> var mysid = 'storename' ; </script>

  <script type="text/javascript" src="<?=DOMAINVAR?>/js/all-stores-list.js"></script> 
  
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
  <!--<script src="<?=DOMAINVAR?>/js/editor.js"></script>   
    <script>
	  $(document).ready(function() {
				
			  $("#txtEditor").Editor();			
             
			  $('#txtEditor').Editor('setText', <?php echo json_encode($pdesc); ?>); 
			  
			  $("button:submit").click(function(){
                $('#txtEditor').text($('#txtEditor').Editor("getText"));
            });
			
			 
        });
	 </script>   -->      

  </body>

</html>