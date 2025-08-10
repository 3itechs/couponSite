<?php  include "../includes/DB.php";
$db= new DB();
$path = DOMAIN.'/assets/images/translation/';
?>

  <div class="modal-content2">
   <section id="main-content">
    <section class="wrapper">
      <!-- page start-->
      <section class="panel clearfix" style="padding-bottom:20px;">
          <button type="button" class="close" data-dismiss="modal">&times;&nbsp;</button>
        <header class="panel-heading modal-header"> Add Image </header>
        <div class="adv-table addstore text-center" >
          <div class="dataTables_wrapper">
             
             <div style=" float:left">
                      <form id="imageform" method="post" enctype="multipart/form-data" action='translation-image.php'>
                        Upload your image <input type="file" class="custom-file-upload " name="photoimg" id="photoimg" />
                      </form>
                 </div>
                      <div id='preview'></div>   <div id='preview2'></div>
              
                    
                  
          </div>
        </div>
      </section>
      <!-- page end-->
    </section>
   </section>
  </div>



 <script type="text/javascript" src="<?=DOMAINVAR?>/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?=DOMAINVAR?>/js/jquery.form.js"></script> 
<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html('<img src="../loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
		
		 var filename =  $('#photoimg')[0].files[0]['name'];
			 $("#preview2").html('<?=$path?>'+filename);
			
			});
			 
        }); 
</script>

<style>

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 12px 12px;
    cursor: pointer;
	margin-left:10px;
}

		.preview{
			width:200px;
			border:solid 1px #dedede;
			padding:10px;
		    }
		#preview{
			color:#cc0000;
			font-size:12px
			}

</style>
  