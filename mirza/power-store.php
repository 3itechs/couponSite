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
<title>Power Store</title>
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
    
  <!--For Html Editor Starts-->
  <link rel="stylesheet" href="<?=DOMAINVAR?>/ckeditor/samples/css/samples.css">
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
                          <strong>!</strong> Store added successfully.
           </div><?php } ?>
              <!-- page start-->
           <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
         <header class="panel-heading modal-header"> Add Store </header>
         <div class="adv-table addstore text-center" >         
          <div class="dataTables_wrapper">
            <form class="form" role="form" method="post" action="ajax/add-power-store-process.php" enctype="multipart/form-data">              
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
               
               <div class="form-group">       
                  <label class="control-label pull-left">Store Name</label>
                  <input  class="form-control m-bot5" type="text" name="storename" value="<?php echo $storename;?>" placeholder="Store Name*" required>
               </div>
                
               
                  <div class="form-group">       
                  <label class="control-label pull-left">Website Address</label>
                   <input  class="form-control m-bot5" type="text" name="web_address" placeholder="Website Address" required>
                   </div>
                    <div class="form-group">       
                  <label class="control-label pull-left">Category Name</label>
                     <select id="mancat_id" name="primary_category" class="form-control m-bot5" required >
                        <option value="">--Category Name--</option>
                        <?php
                        
                        $sql = $db->ExecuteQuery("SELECT category_id, category FROM categories WHERE parent_id = '0' ");
                        while($row=mysqli_fetch_array($sql))
                            {
                            $id=$row['category_id'];
                            $data=$row['category'];
                            echo '<option value="'.$id.'">'.$data.'</option>';
                            } ?>
                    </select>
                      </div>
                       
                       <div class="form-group">       
                          <label class="control-label pull-left">Sub Category</label>
                          <select id="subcat_id" name="child_category" class="form-control m-bot5" required >
                                 <option value="" >--Select Sub Category--</option>
                         </select>
                       </div>   
                  
                                    
                   <div class="form-group">       
                  <label class="control-label pull-left">Select Country</label>  
                  <select id="country_id" name="country_id" class="form-control m-bot5" required >
                    <option value="">--Select Country*--</option>
                    <?
					$sql_country ="Select country_id, country from countries where countries.show = 1 order by country  ";	
					$rs_country = $db->ExecuteQuery($sql_country); 
					while(list($country_id,$country) = $db->FetchAsArray($rs_country))
							{?>
                     <option <? if($country_id == $countryid){echo "selected";} ?> value="<?php echo $country_id;?>"><?php echo $country;?></option><?php }?>
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
                           <span class="fileupload-new"><i class="icon-paper-clip"></i> Select Logo</span>
                           <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                           <input type="file" name="store_logo" class="default m-bot5" />
                           </span>
                              <a href="#" class="btn btn-danger btn-sm fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                          </div>
                       </div>Store Logo [ <?php echo SLOGO_WIDTH?>x<?php echo SLOGO_HEIGHT?> ]
                     </div>
                  
                  <div class="form-group">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">    
                
                <div class="form-group">       
                  <label class="control-label pull-left">Coupons Limit</label>                 
                  <input  class="form-control m-bot5" type="text" name="coupons_limit" id="coupons_limit" value="" placeholder="Coupons Limit" required>
                </div>
                
                <div class="form-group">       
                  <label class="control-label pull-left">Store Products</label>
                 <textarea rows="2" class="form-control m-bot5" id="store_products" name="store_products" placeholder="Store Products" required></textarea>
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
      <!--main content end-->
     <?php include "includes/footer.php"; ?>
  </section>
        
  <style type="text/css">
		
 .twitter-typeahead{
   width:100%;
   }

.twitter-typeahead .tt-query,
.twitter-typeahead .tt-hint {
  margin-bottom: 0;
}
.tt-dropdown-menu {
  min-width: 160px;
  margin-top: 2px;
  padding: 5px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0,0,0,.2);
  *border-right-width: 2px;
  *border-bottom-width: 2px;
  -webkit-border-radius: 6px;
     -moz-border-radius: 6px;
          border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
  -webkit-background-clip: padding-box;
     -moz-background-clip: padding;
          background-clip: padding-box;
  width:100%;        
}

.tt-suggestion {
  display: block;
  padding: 3px 20px;
}

.tt-suggestion.tt-is-under-cursor {
  color: #fff;
  background-color: #0081c2;
  background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
  background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
  background-image: -o-linear-gradient(top, #0088cc, #0077b3);
  background-image: linear-gradient(to bottom, #0088cc, #0077b3);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0)
}

.tt-suggestion.tt-is-under-cursor a {
  color: #fff;
}

.tt-suggestion p {
  margin: 0;
  text-align:left;
}
</style>  
  <script>
	initSample();
	initSample2();
</script> 
  <!-- js placed at the end of the document so the pages load faster -->
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

<script type="text/javascript">
	$(document).ready(function()
		{
			
		$("#mancat_id").change(function()
			{
			var id=$(this).val();
			var dataString = 'id='+ id;
			
				$.ajax
				({
				type: "POST",
				url: "ajax/subcat-list.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
				$("#subcat_id").html(html);
				} 
			});
		
		});
	
	});
</script> 
  </body>

</html>