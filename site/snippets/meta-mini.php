<ul>
<?php
	$categorie_uid = $page->categorie();
	$categorie = page( 'categories/'.$categorie_uid );
	$informations = $page->informations()->yaml();
	$meta = array();
	foreach($informations as $information) {
		$meta[ $information['key'] ] = $information['value'];
	}

	foreach ($categorie->criteres()->yaml() as $label):
		$value = '';
		// est-ce que ce label existe dans la liste des informations de cette page
		if( array_key_exists ( $label['slug'] , $meta) ){
			// $value contient la valeur de ce label
			$value = $meta[$label['slug']];
		}
		
		// est-ce que ce label doit être affiché dans le résumé des infos de cette annonce ?
		if( array_key_exists ( 'important' , $label) ){
			echo "<li>";
			//echo "<span>{$label['nom']} : </span>";
				echo "<span>";

					$type = $label['type'];
					switch ($type) :
						case 'date' :
							if ($label['slug']=='debut') :
								if(!$meta['fin']) :
									echo "Le ".$value;
								else :
									echo "Du ".$value;
									echo " au ".$meta['fin'];
								endif;
							else :
								echo $value;
							endif;
							break;
						default :
							if($value):
								echo $label['nom'].' : '.$value;
							endif;
							break;
					endswitch;

				echo "</span>";
			echo "</li>";
		}

	endforeach;
	?>
</ul>