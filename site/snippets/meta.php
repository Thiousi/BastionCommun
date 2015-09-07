<?php 
foreach (page('categories')->children() as $categorie) :

	$currentCategorie = $page->categorie();
	$currentCategorieTitle = page('categories/'.$currentCategorie)->title();
	$active = ( $currentCategorie == $categorie->uid() ) ?  'active' : '' ;

	?>

	<div class='inputsGroup meta-bloc <?php echo $active ?>' id='cat-<?php echo $categorie->uid() ?>' data-populate='informations'>
		<table class='table table-bordered'>
			<?php
			foreach ($categorie->criteres()->yaml() as $critere):
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
				?>
				<tr>
					<td><?php echo $critere['nom'] ?></td>
					<td>
					<?php
					
					// MAP
					if ($type == 'map') : 
						$location = json_decode($value); 
						$city = 'Adresse';
						if ($location) {
							$city = $location->street .", ". $location->zip ." ". $location->city;
						} 
						?>
						<button class='btn btn-default' data-toggle='modal' data-target='#modal-geopicker'>
							<span class='name'><?php echo $city ?></span>
						</button>
						<input type='text' class='form-control input hidden'  data-slug='<?php echo $critere["slug"] ?>' value='<?php echo $value ?>' readonly/>

					<?php 
					elseif ($type == 'date') : 
						echo "<input type='text' class='datepicker form-control input editOnly' data-date-format='dd.mm.yyyy' data-slug='{$critere['slug']}' value='{$value}' readonly/>";
						echo "<span class='viewOnly'>{$value}</span>";
						
					// TEXT
					else :
						echo "<input type='text' class='autocomplete form-control input editOnly' data-slug='{$critere['slug']}' value='{$value}' readonly/>";
						echo "<span class='viewOnly'>{$value}</span>";
					endif;

					echo "</td>";
				echo "</tr>";
			endforeach;
		echo "</table>";
	echo "</div>";
endforeach; ?>
<p id="post-meta"><?php echo $page->author() ?> le <?php echo $page->date('d/m/Y') ?></small></h4></p>
