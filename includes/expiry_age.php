<? 

   $to_time = strtotime($exp_date);

   $from_time = strtotime(date("Y-m-d H:i:s",time()));

if($to_time > $from_time){		   

	$difference = abs($to_time - $from_time);

	$years2 = floor($difference / (365*60*60*24));			   

	$months2 = floor(($difference - $years2 * 365*60*60*24) / (30*60*60*24));

	$days2 = floor(($difference - $years2 * 365*60*60*24 - $months2*30*60*60*24)/ (60*60*24));

	$hours2 = floor(($difference - $years2 * 365*60*60*24 - $months2*30*60*60*24 -$days2*60*60*24 )/ (60*60));

	$minuts2 = floor(($difference - $years2 * 365*60*60*24 - $months2*30*60*60*24 -$days2*60*60*24 -$hours2*60*60 )/ (60));



if($years2 > '0'){ if($years2==1){$old=$years2.' year';}else{$old=$years2.' years';}

 }elseif($months2 > '0'){ if($months2==1){$old=$months2.' month';}else{$old=$months2.' months';}

	   }elseif($days2 > '0'){ if($days2==1){$old=$days2.' day';}else{$old=$days2.' days';}

	          }elseif($hours2 > '0'){ if($hours2==1){$old=$hours2.' hour';}else{$old=$hours2.' hours';}	   

			  }elseif($minuts2 > '0'){  if($minuts2==1){$old=$minuts2.' minut';}else{$old=$minuts2.' minuts';} }else{ $old='0 minut';}			  

			  $expdate = "Expires in ".$old;

	}

?>