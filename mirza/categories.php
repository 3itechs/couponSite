<?php session_start();
if(!isset($_COOKIE['admin_username'])){ 
header("location: login.php"); exit();}
include "includes/DB.php";
$db= new DB(); 
$fname = 'categories.php'; 
$pageTitle = 'Manage Categories';
$pageHeading = ' List Categories';
$pageString = ''; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="category" content="">
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
     <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=DOMAINVAR?>/assets/jquery-multi-select/css/multi-select.css" /> 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
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
              <section class="panel">
              <header class="panel-heading" style="padding:15px 0 45px;"> <div class="col-md-10 col-ms-10 col-xs-6"><?php echo $pageHeading;?></div>                 
                  <div class="col-md-2 col-ms-2 col-xs-6">
                  	<a href="popups/add_category_popup.php" class="btn btn-success" data-toggle="modal" data-target="#myAddModal">Add New</a>
                  </div>
                  </header>                    
                     <div class="adv-table editable-table" >
                      
                        <?php if ($_REQUEST['a'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> <?php echo $pageString;?> added successfully.
                         </div><?php }?>
                                              
                        <?php if ($_REQUEST['a'] == 2){?>
                        <div class="alert alert-block alert-danger fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> <?php echo $pageString;?> couldn't not added, try submitting again.
                         </div><?php }?>
                                                 
                        <div class="dataTables_wrapper form-inline" >
                         <form class="form-inline" role="form" method="post">
                          <div class="padding-top-10">
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                             <div class="form-group">
                                 <label class="pull-left">Category Name</label>
                                 <input type="text" class="form-control" id="categoryname" name="categoryname"  placeholder="Category Name">
                                 
                                 
                              </div>
                             </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                           <div class="form-group">
                                    <label class="pull-left">Parent Category</label>
                                     <? $sql_pc = "Select category_id, category from categories where status = 'ENA' and parent_id = '0'   order by category  ";	?>
								  </label>                  
								  <select id="parent" name="parent" class="form-control m-bot5" >
									<option value="">--Parent Category--</option>
									 <?php
								
									$rs_sql_pc = $db->ExecuteQuery($sql_pc); 
									while(list($catid, $cat) = $db->FetchAsArray($rs_sql_pc))
										{ ?>
									<option value="<?php echo $catid;?>"><?php echo $cat;?></option><?php }?>
								  </select>
                                  
                                 
                                                      
                                  </div>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                      <button type="button" id="btnSearch" class="btn btn-danger pull-right">Search</button>
                                  </div>
                              </div>
                             </div>
                                 
                             </form>
                             <div class="clearfix"></div>
                             <div class="panel-body col-sm-12" id="data-grid" style="height:950px;"> </div>
                             
                          </div>
                     </div>
                   <div id="myModal" class="modal fade"></div>
                   <div id="myAddModal" class="modal fade"></div>                          
              </section> 
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
     <?php include "includes/footer.php"; ?>
  </section>
  
   <!-- js placed at the end of the document so the pages load faster -->
<script src="<?=DOMAINVAR?>/js/jquery-1.8.3.min.js"></script>
<script src="<?=DOMAINVAR?>/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?=DOMAINVAR?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=DOMAINVAR?>/js/jquery.scrollTo.min.js"></script>
<script src="<?=DOMAINVAR?>/js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="/assets/data-tables/DT_bootstrap.js"></script>
<script src="<?=DOMAINVAR?>/js/respond.min.js" ></script>
<!--common script for all pages-->
<script src="<?=DOMAINVAR?>/js/common-scripts.js"></script>
  <!--script for this page only-->
  <script src="<?=DOMAINVAR?>/js/editable-table.js"></script>
  <!-- END JAVASCRIPTS -->
  <script type="text/javascript">
	  jQuery(document).ready(function() {
		  EditableTable.init();
	  });
  </script>
 
 <script src="/js/autocomplete-jquery-ui.js"></script>  
 <script type="text/javascript">	
	function getresult(url) { 
	$.ajax({
		url: url,
		type: "POST",
		data:  {rowcount:$("#rowcount").val(),dsort:$("#dsort").val(),categoryname:$("#categoryname").val(),parent:$("#parent").val()},
		success: function(data){ $("#data-grid").html(data);}
	   });
	}
	
	$(document).on('click', '#btnSearch', function(){ getresult("getcategories.php"); });
	  
	getresult("getcategories.php");	
	
  $(document).on('click', '.btnEditAction', function(){
        var id = $(this).attr('id');
		$.ajax({
			url: "popups/update_category_popup.php?id="+id,
			type: "POST",
			data:  {},
			success: function(data){ $("#myModal").html(data); }
		   });
    });
	
  $(document).on('click', '.btnDeleteAction', function(){
    var id = $(this).attr('id');
	  if(confirm('Are you sure to delete it?'))
	    {
	     $.ajax({
			 url: "ajax/dell_category.php?id="+id,
			 type: "POST",
			 success: function(data){ $("#tr-"+id).html(''); }
		    });
		 }
	 });
  </script>         
  </body>
</html>
