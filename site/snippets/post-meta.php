<div id="informations" class="row readonly">  
	<?php 
	foreach (page('categories')->children() as $categorie) :

		$currentCategorie = $page->categorie();
		$currentCategorieTitle = page('categories/'.$currentCategorie)->title();
		$active = ( $currentCategorie == $categorie->uid() ) ?  'active' : '' ;

		?>

		<div class='inputsGroup col-xs-12 meta-bloc <?php echo $active ?>' id='cat-<?php echo $categorie->uid() ?>' data-populate='informations'>
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
				<div class="meta-elem col-xs-12 col-lg-6 <?php if (!$value){ echo 'editOnly'; } ?>">
					<?php if ($value){ echo '<div class="viewOnly infoTitle">'.$critere['nom'].' : </div>'; }; ?>
					<div class="editOnly infoTitle"><?php echo $critere['nom'] ?> : </div>
					<div>
					<?php
					
					// MAP
					if ($type == 'map') : 
						$location = json_decode($value); 
						$city = 'Adresse';
						if ($location) {
							$city = $location->street .", ". $location->zip ." ". $location->city;
						} 
						?>
						<?php if ($value): ?>
						<div class='name infoContent viewOnly'>
							<?php echo $city ?>
						</div>	
						<div class='name infoContent viewOnly display-map'>
							<button class='btn btn-default glyphicon glyphicon-globe' data-toggle='modal' data-target='#modal-geopicker' data-toggle="tooltip" data-placement="bottom" title="Afficher la carte"></button>
						</div>
						<?php endif; ?>
						<input type='text' class='form-control input hidden'  data-slug='<?php echo $critere["slug"] ?>' value='<?php echo $value ?>' readonly/>

					<?php 
					elseif ($type == 'date') : 
						echo "<input type='text' class='datepicker form-control input editOnly' data-date-format='dd.mm.yyyy' data-slug='{$critere['slug']}' value='{$value}' readonly/>";
						if ($value){ echo "<div class='viewOnly infoContent'>{$value}</div>"; };
						
					// TEXT
					else :
						echo "<input type='text' class='autocomplete form-control input editOnly' data-slug='{$critere['slug']}' value='{$value}' readonly/>";
						if ($value){ echo "<div class='viewOnly infoContent'>{$value}</div>"; };	
					endif;

					echo "</div>";
				echo "</div>";
			endforeach;
		echo "</div>";
	endforeach; ?>
</div>

