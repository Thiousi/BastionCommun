<ul>
<?php
	$categorie_uid = $page->categorie();
	$categorie = page( 'categories/'.$categorie_uid );
	$informations = $page->informations()->yaml();
	$meta = array();
	foreach($informations as $information) {
		$meta[ $information['key'] ] = $information['value'];
	}

	foreach ($categorie->criteres()->yaml() as $critere):
		if( array_key_exists ( $critere['slug'] , $meta) ){
			$value = $meta[$critere['slug']];
		}
	
		if( array_key_exists ( 'important' , $critere) ){
			echo "<li>";
			//echo "<span>{$critere['nom']} : </span>";
				echo "<span>";

					$type = $critere['type'];
					switch ($type) :
						case 'map' : 
							$location = json_decode($value); 
							if ($location) :
								$city = $location->city . ' (' . $location->zip . ')';
								echo $city; 
							endif; 
							break;
						case 'date' :
							if ($critere['slug']=='debut') :
								if(!$meta['fin']) :
									echo "le ".$value;
								else :
									echo "du ".$value;
									echo " au ".$meta['fin'];
								endif;
							else :
								echo $value;
							endif;
							break;
						default :
							echo $value;
							break;
					endswitch;

				echo "</span>";
			echo "</li>";
		}

	endforeach;
	?>
</ul>
<?php
/*
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
*/
?>