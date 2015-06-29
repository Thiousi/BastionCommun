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

	
endforeach;
?>
</ul>