<?php session_start();
if(!isset($_COOKIE['admin_username'])){ 
header("location: login.php"); exit();}
include "includes/DB.php";
$db= new DB();   
$fname = 'stores.php'; 
$pageTitle = 'Manage Stores';
$pageHeading = 'Stores List'; ?>
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
              <header class="panel-heading modal-header" style="padding:15px 0 45px;"> <div class="col-md-9 col-ms-10 col-xs-6"><?php echo $pageHeading;?></div>                 
                  <div class="col-md-3 col-ms-2 col-xs-12">
                  <!--<a target="_blank" href="power-store.php" class="btn btn-success">Power Create</a>&nbsp;-->
                  	<a target="_blank" href="add-store.php" class="btn btn-success">Add New</a>
                  </div>
                  
                  </header>                    
                     <div class="adv-table editable-table" >
                      
                        <?php if ($_REQUEST['a'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> Store added successfully.
                         </div><?php }		   
						    $jskeysfile = "js/all-stores-list.js";
							$jskeys = fopen($jskeysfile, 'w') or die("can't open file");
							$res = "select storename from stores  where 1 order by storename ASC";
							$rs_store = $db->ExecuteQuery($res);							
							$total= $db->GetSelectedRows($rs_store);
							
														 
							$keys = "$('#'+mysid).typeahead({ local: [";
							fwrite($jskeys, $keys);
							$cnt = 0;
							while(list($storename) = $db->FetchAsArray($rs_store)){
							if($cnt==$total-1){$keys = '"'.$storename.'"';}else{$keys = '"'.$storename.'",';}
							fwrite($jskeys, $keys);
							$cnt++;}
							$keys = ']});';
							fwrite($jskeys, $keys);
							fclose($jskeys); 
						 
						 
						 ?>                     
                        <?php if ($_REQUEST['u'] == 1){?>
                        <div class="alert alert-success fade in">
                          <button data-dismiss="alert" class="close close-sm" type="button">
                              <i class="icon-remove"></i>
                          </button>
                          <strong>!</strong> Store updated successfully.
                         </div><?php }
						   		    $jskeysfile = "js/all-stores-list.js";
									$jskeys = fopen($jskeysfile, 'w') or die("can't open file");
									$res = "select storename from stores  where status !='DEL' order by storename ASC";
							        $rs_store = $db->ExecuteQuery($res);							
							        $total= $db->GetSelectedRows($rs_store);
									 
									$keys = "$('#'+mysid).typeahead({ local: [";
									fwrite($jskeys, $keys);
									$cnt = 0;
									while(list($storename) = $db->FetchAsArray($rs_store)){
							        if($cnt==$total-1){$keys = '"'.$storename.'"';}else{$keys = '"'.$storename.'",';}
									fwrite($jskeys, $keys);
									$cnt++;}
									$keys = ']});';
									fwrite($jskeys, $keys);
									fclose($jskeys);
						 
						 ?>  
                                                
                        <div class="dataTables_wrapper form-inline" >
                         <form class="form-inline" role="form" method="post">
                          <div class="padding-top-10">
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                             <div class="form-group">
                                 <input style="margin-bottom:5px" type="text" class="form-control" id="store_id"  name="store_id" placeholder="Store ID">          <input style="margin-bottom:5px" type="text" class="form-control" id="str_name" name="str_name"  placeholder="Store Name">
                                 
                                  <select id="country_id" name="country_id" class="form-control m-bot5" required >
                                    <option value="">--Select Country*--</option>
                                    <?
                                    $sql_country ="Select country_id, country from countries where countries.show = 1 order by country  ";	
                                    $rs_country = $db->ExecuteQuery($sql_country); 
                                    while(list($country_id,$country) = $db->FetchAsArray($rs_country))
                                            {?>
                                     <option  value="<?php echo $country_id;?>"><?php echo $country;?></option><?php }?>
                                  </select> 
                              </div>
                             </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                           <div class="form-group">
                                    <?
                                    $sql = "Select  network_id,  network_name From network" ;
                                      $rs_sql=$db->ExecuteQuery($sql); ?>
                                      <select style="margin-bottom:5px" id="network" name="network" class="form-control m-bot15">
                                        <option value="">--Select Network--</option>
                                         <? while(list($networkid,$networkname)=$db->FetchAsArray($rs_sql)) { ?>
                                        <option value="<? echo $networkid ?>" <? if($network==$networkid)echo"selected";?>> <? echo $networkname ?> </option><? } ?>
                                      </select>
                                      
                                     <select style="margin-bottom:5px" name="status" id="status" class="form-control m-bot15">
                                        <option value="">--Select Status--</option>
                                        <option value="ENA">Enable</option>
                                        <option value="DIS">Disable</option>
                                     </select> 
                                     
                                      <select id="primary_category" name="primary_category" class="form-control m-bot5" required >
                                        <option value="">--Primary Category*--</option>
                                         <?
                                        $sql="Select category_id, category from categories where status = 'ENA'  and parent_id ='0' order by category  ";	
                                        $rs_sql=$db->ExecuteQuery($sql); 
                                        while(list($category_id,$category) = $db->FetchAsArray($rs_sql))
                                            { ?>
                                        <option  value="<?php echo $category_id;?>"><?php echo $category;?></option><?php }?>
                                      </select>
                                      
                                       <div class="col-lg-10 m-bot15 text-left"> 
                                          Popular: <input type="checkbox" value="0" name="feature" id="feature" /> 
									      <?php echo "&nbsp;&nbsp;&nbsp;";?> 
                                          Top: <input type="checkbox" value="1" name="top" id="top" />
                                          
                                         								      
                                      </div>
                                                                            
                                  </div>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                      <button type="button" id="btnSearch" class="btn btn-danger pull-right">Search</button>
                                  </div>
                              </div>
                             </div>
                                  <input type="hidden" id="dsort" name="dsort" value="store_id">
                                  <input type="hidden" id="sortorder" name="sortorder" value="DESC">
                              </form>
                              <div class="clearfix"></div>
                             <div class="panel-body col-sm-12" id="data-grid" style="height:920px;"> </div>
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
<script type="text/javascript" src="<?=DOMAINVAR?>/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=DOMAINVAR?>/assets/data-tables/DT_bootstrap.js"></script>
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


  
 <script src="<?=DOMAINVAR?>/js/autocomplete-jquery-ui.js"></script>
  
 <script type="text/javascript">	
	function getresult(url) {  
	                  var $top_val = $("#top").is(':checked') ? 1 : 0;
					  var $feature_val = $("#feature").is(':checked') ? 1 : 0;
					  var $elinks_val = $("#elinks").is(':checked') ? 1 : 0;
	<!--$('#loading').html('<img src="img/loader.gif"> loading...').fadeIn(); -->
	$.ajax({
		url: url,
		type: "POST",
		data:  {rowcount:$("#rowcount").val(),dsort:$("#dsort").val(),storeid:$("#store_id").val(),sname:$("#str_name").val(),network:$("#network").val(),sorder:$("#sortorder").val(),dsort:$("#dsort").val(),status:$("#status").val(),country:$("#country_id").val(),category:$("#primary_category").val(), top: $top_val, feature: $feature_val, elinks: $elinks_val },
		success: function(data){ $("#data-grid").html(data); $('#add-form').hide();}
	   });
	}
	
	$(document).on('click', '#btnSearch', function(){ getresult("getstores.php"); });
	  
	getresult("getstores.php");	
  
  $(document).on('click', '.btnViewAction', function(){
        var id = $(this).attr('id');
		$.ajax({
			url: "popups/view_coupons_popup.php?sid="+id,
			type: "POST",
			data:  {},
			success: function(data){ $("#myModal").html(data); }
		   });
    });
	
  $(document).on('click', '.btnEditAction', function(){
        var id = $(this).attr('id');
		$.ajax({
			url: "popups/update_store_elink_popup.php?sid="+id,
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
			 url: "ajax/dell_store.php?sid="+id,
			 type: "POST",
			 success: function(data){ $("#tr-"+id).html(''); }
		    });
		 }
	 });
  </script>         
  </body>
</html>
