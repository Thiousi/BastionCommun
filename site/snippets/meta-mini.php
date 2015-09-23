<ul>
<?php
$cat = page('categories/'.$categorie);

foreach ($cat->criteres()->yaml() as $critere):
	$informations = $page->informations()->yaml();
	$type = $critere['type'];
	$meta = array();
	foreach($informations as $information) {
		$meta[ $information['key'] ] = $information['value'];
	}
	$value='';
	if( array_key_exists ( $critere['slug'] , $meta) ){
		$value = $meta[$critere['slug']];
	}

	/*
	if( array_key_exists ( 'important' , $critere) ){
		echo "<li>";
		echo "<span>{$critere['nom']} : </span>";
		echo "<span>";
		
			if ($type == 'map') : 
				$location = json_decode($value); 
				if ($location) :
					$city = $location->city . ' (' . $location->zip . ')';
					echo $city; 
				endif; 
			else :
				echo $value;
			endif;

		echo "</span>";
		echo "</li>";
	}
	*/
	
endforeach;

if (isset($key)) {
	if ($key == "date"){


		if ( strlen($meta['fin']) <= 1 || $meta['debut'] == $meta['fin']){
			echo 'Le '.get_Date($meta['debut'], 'rdv');
		} else {
			echo 'Du '.get_Date($meta['debut'], 'periode').' au '.get_Date($meta['fin'], 'periode');
		}

	} else if ($key == "adresse" && strlen($meta['adresse']) > 1){
		$adresse = json_decode($meta['adresse']);
		echo $adresse->street.', '.$adresse->zip.' '.$adresse->city;
	} else {
		echo 'yolo';
	}
}
?>
</ul>
