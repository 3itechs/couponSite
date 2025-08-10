<?php include "../includes/DB.php"; 

if($_REQUEST['storeid'] !='') {
     $sid = $_REQUEST['storeid'];
     $starval = $_REQUEST['starval'];
     
	 $ratingNum = 1;	
	
	$prevRatingQuery ="select rating_number, total_points from stores where store_id = ".$sid;
    $prevRatingResult = $db->ExecuteQuery($prevRatingQuery);
	
    if($prevRatingResult->GetSelectedRows() > 0){
		
       list($rating_number, $total_points) = $prevRatingResult->FetchAsArray();		
            $ratingNum = $rating_number + $ratingNum;
            $starval = $total_points + $starval;
        //Update rating data into the database
       $query = "UPDATE stores SET rating_number = '".$ratingNum."', total_points = '".$starval."' WHERE store_id = ".$sid;
	   $update = $db->ExecuteQuery($query);
	}
		
}
?>