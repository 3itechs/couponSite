<?php include "../includes/DB.php";
$db= new DB();
if(isset($_REQUEST['sid'])){$sid=$_REQUEST['sid'];}
 $db->ExecuteQuery("set sql_big_selects=1");  
 $sqlusers = "SELECT sid, slide_title, slide_url, slide_img, status, added_date FROM slides WHERE sid=".$sid;
               
 $rs_user=$db->ExecuteQuery($sqlusers);            
 list($sid, $slide_title, $slide_url, $slide_img, $status, $added_date )= $db->FetchAsArray($rs_user);

?>
     <div class="modal-dialog modal-full"> 
           <div class="modal-content"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"><?php echo $slide_title; ?></h4>
                    </div>
                    <div class="modal-body">
                        <img class="img-responsive" alt="" src="../images/sliders/<?php echo $slide_img; ?>"> </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    </div>
                </div>
            </div>
        </div>