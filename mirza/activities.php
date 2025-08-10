<?php session_start();
if(!isset($_COOKIE['admin_username'])){ 
header("location: login.php"); exit();}
include "includes/DB.php";
$db= new DB(); 
$fname = 'activities.php'; 
$pageTitle = 'Manage Activities';
$pageHeading = 'Activities List'; ?>
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
              <header class="panel-heading modal-header" style="padding:15px 0 45px;"> <div class="col-md-10 col-ms-10 col-xs-6"><?php echo $pageHeading;?></div>                 
                 
                  </header>                    
                     <div class="adv-table editable-table" >
                      
                        <?php if ($_REQUEST['a'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> Coupon added successfully.
                         </div><?php }?>                     
                        <?php if ($_REQUEST['u'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> Coupon updated successfully.
                         </div><?php }?>  
                                                
                        <div class="dataTables_wrapper form-inline" >
                         <form class="form-inline" role="form" method="post">
                          <div class="padding-top-10">
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                             <div class="form-group">
                                  <select style="margin-bottom:5px" name="user_name" id="user_name" class="form-control m-bot15">
                                           <option value="">--Select User--</option>
                                              <? 
                                            if($_COOKIE['levelid'] == 1){
                                              $sql_user="select admin_id, username from admin order by admin_id ASC "; 	
                                              $res_user=$db->ExecuteQuery($sql_user);
                                               while(list($member_id, $mname) = $db->FetchAsArray($res_user)){
                                              ?>
                                            <option <? if($user_name == $mname){echo "selected";} ?>  value="<?=$mname?>"><?=$mname?></option>
                                              <? } 
                                                }else{ ?>
                                                 <option  value="<?php echo $_COOKIE['admin_username'];?>" selected><?php echo $_COOKIE['admin_username'];?></option>
                                                <? }
                                              ?>
                                   </select>                           
                                 
                             <select style="margin-bottom:5px" name="section" id="section" class="form-control m-bot15">
                                <option value="">--Select Section</option>
                                <option <? if($section == 'store'){echo 'selected';}?> value="store">Store</option>
                                <option <? if($section == 'coupon'){echo 'selected';}?> value="coupon">Coupon</option>
                             </select>
                                
                                 
                              </div>
                             </div>
                         <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                           <div class="form-group">                                  
                                <select style="margin-bottom:5px" name="action" id="action" class="form-control m-bot15">
                                    <option value="">--Select Action</option>
                                    <option <? if($action == 'add'){echo 'selected';}?> value="add">Add</option>
                                    <option <? if($action == 'update'){echo 'selected';}?> value="update">Update</option>
                                    <option <? if($action == 'delete'){echo 'selected';}?> value="delete">Delete</option>
                                </select>                                                                       
                               <label class="control-label  pull-left">Added Date Range:</label>
                               <div class="form-group">
                                  <div class="input-group input-large" data-date="" data-date-format="">
                                      <input type="text" class="form-control sdate" id="sdate" name="sdate">
                                      <span class="input-group-addon">To</span>
                                      <input type="text" class="form-control edate" id="edate" name="edate">
                                  </div><span class="error" id="adate-error"></span>                 
                              </div>                                                                       
                           </div>
                         </div>
                         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                      <button type="button" id="btnSearch" class="btn btn-danger pull-right">Search</button>
                                  </div>
                              </div>
                         </div>
                          <input type="hidden" id="dsort" name="dsort" value="coupon_id">
                          <input type="hidden" id="sortorder" name="sortorder" value="DESC">
                          </form>
                          <div class="clearfix"></div>
                         <div class="panel-body col-sm-12" id="data-grid" style="height:980px;"> </div>
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
    <script src="<?=DOMAINVAR?>/js/advanced-form-components3.js"></script>

 
  <script type="text/javascript">	

	function getresult(url) { 	
							 var $top_val = $("#top").is(':checked') ? 1 : 0;
							 var $feature_val = $("#feature").is(':checked') ? 1 : 0;
							 var $exclusive_val = $("#exclusive").is(':checked') ? 1 : 0;
							 var $brand_val = $("#brand").is(':checked') ? 1 : 0;
	     $.ajax({        
			    url: url,
		        type: "POST",
		        data:  {			
			rowcount:$("#rowcount").val(),dsort:$("#dsort").val(),uname:$("#user_name").val(),section:$("#section").val(),action:$("#action").val(), adsdate:$("#sdate").val(), adedate:$("#edate").val() },
		success: function(data){ $("#data-grid").html(data); $('#add-form').hide();}

	   });
	}

	$(document).on('click', '#btnSearch', function(){ getresult("getactivities.php"); });

	  

	getresult("getactivities.php");	

	

  

	$(document).on('click', '.btnEditAction', function(){

        var id = $(this).attr('id');

		$.ajax({

			url: "popups/update_coupon_popup.php?sid="+id,

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

			 url: "ajax/dell_coupon.php?cid="+id,

			 type: "POST",

			 success: function(data){ $("#tr-"+id).html(''); }

		    });

		 }

	 });

  </script>

  
  </body>

</html>