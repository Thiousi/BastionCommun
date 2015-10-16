<?php
/*--------------------------------
           FUNCTIONS
---------------------------------*/

function get_Date($date, $besoin) {
	setlocale (LC_TIME, 'fr_FR','fra');
	$hour = strftime("%k" ,strtotime($date)).'h'.strftime("%M" ,strtotime($date)); 
	$day = strftime("%A" ,strtotime($date)); 
	$dayNum = strftime("%d" ,strtotime($date)); 
	$month = strftime("%B" ,strtotime($date)); 
	$monthAbv = strftime("%b" ,strtotime($date)); 
	$monthNum = strftime("%m" ,strtotime($date)); 
	$year = strftime("%Y" ,strtotime($date)); 

	if($besoin == 'rdv'){
		return $dayNum.' '.$month;
	} else if($besoin == 'periode') {
		return $dayNum.' '.$month;
	}
}

?>