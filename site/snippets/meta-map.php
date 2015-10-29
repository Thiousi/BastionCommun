<?php 
	$currentCategorie = $page->categorie();
	$currentCategorieTitle = page('categories/'.$currentCategorie)->title();
	# mise au singulier
	$splited = explode(' ', $currentCategorieTitle);
	foreach ($splited as $sKey => $sVal) {
		$splited[$sKey] = rtrim($sVal, 's');
	}
	$currentCategorieTitle = implode(' ', $splited);
	$user = ($site->user()) ? $site->user()->username() : '' ;

	$meta = array();
	foreach ( $page->informations()->yaml() as $information ){
		$meta[ $information['key'] ] = $information['value'];
	}

	?>



	<div class='inputsGroup meta-bloc active row' id='cat-<?php echo $currentCategorie->uid() ?>' data-populate='informations'>
		<?php 
		foreach ($criteres as $critere): 
			$value='';
			if( array_key_exists ( $critere, $meta) ){
				$value = $meta[$critere];
			}
			?>
			<div class="meta-elem col-md-12 col-lg-6">
				<?php if($critere == 'society_name'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Nom de la société</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Nom de la société</div>
					<div>
						<input type='text' class='autocomplete form-control input editOnly' data-slug='<?php echo $critere ?>' value='><?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>



				<?php elseif($critere == 'adresse'): ?>
					<?php if ($value): ?>
						<div class="viewOnly infoTitle">Adresse :</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Adresse :</div>
					<div>
						<?php
						$location = json_decode($meta['adresse']); 
						$city = 'Adresse';
						if ($location) {
							$city = $location->street .", ". $location->zip ." ". $location->city;
						} 
						if($value):
						?>
						<div class='name viewOnly'><?php echo $city ?></div>
						<?php endif; ?>
			            <input  id="geopicker-address-buffer" placeholder="Indiquez un lieu" class="form-control input editOnly" data-gps='<?php echo $meta['adresse'] ?>'  data-slug='<?php echo $critere ?>' type="text" value='<?php echo $city ?>'/>
						<input id="geopicker-address" class="hidden input form-control" type="text" data-slug='<?php echo $critere ?>' value='<?php echo $meta['adresse'] ?>' type="text" readonly/>


						<div class="<?php if(!$value){echo 'editOnly';} ?>" id="block-geopicker">
							<div id="geopicker" style="width: 100%; height: 400px;"></div>
							<div class="hidden">
								<label class="col-sm-2 control-label">Lat.:</label>
								<div class="col-sm-3">
									<input type="text" id="geopicker-lat" class="form-control" />
								</div>
								<label class="col-sm-2 control-label">Long.:</label>
								<div class="col-sm-3">
									<input type="text" id="geopicker-lon" class="form-control" />
								</div>
							</div>
							<div class="hidden">
								<div class="col-sm-4"><input type="text" id="geopicker-street" class="form-control" placeholder="Rue"/></div>
								<div class="col-sm-4"><input type="text" id="geopicker-city" class="form-control" placeholder="Ville"/></div>
								<div class="col-sm-4"><input type="text" id="geopicker-zip" class="form-control" placeholder="Code postal"/></div>
								<div class="hidden"><input type="text" id="geopicker-country" class="form-control" placeholder="Pays"/></div>
							</div>
						</div>
					</div>


				<?php elseif($critere == 'date'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Date</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Date</div>
					<div>
						<input type='text' class='datepicker form-control input editOnly' data-date-format='dd.mm.yyyy' data-slug='<?php echo $critere ?>' value='<?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>


				<?php elseif($critere == 'horaires'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Horaires</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Horaires</div>
					<div>
						<input type='text' class='autocomplete form-control input editOnly' data-slug='<?php echo $critere ?>' value='<?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>



				<?php elseif($critere == 'telephone'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Contact</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Contact</div>
					<div>
						<input type='text' class='autocomplete form-control input editOnly' data-slug='<?php echo $critere ?>' value='<?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>



				<?php elseif($critere == 'pratique'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Pratique</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Pratique</div>
					<div>
						<input type='text' class='autocomplete form-control input editOnly' data-slug='<?php echo $critere ?>' value='<?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>




				<?php elseif($critere == 'année'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Années de résidence</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Années de résidence</div>
					<div>
						<input type='text' class='autocomplete form-control input editOnly' data-slug='<?php echo $critere ?>' value='<?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>



				<?php elseif($critere == 'participants'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Avec</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Avec</div>
					<div>
						<input type='text' class='autocomplete form-control input editOnly' data-slug='<?php echo $critere ?>' value='<?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>



				<?php elseif($critere == 'prix'): ?>
					<?php if ($value): ?> 
						<div class="viewOnly infoTitle">Prix</div> 
					<?php endif; ?>
					<div class="editOnly infoTitle">Prix</div>
					<div>
						<input type='text' class='autocomplete form-control input editOnly' data-slug='<?php echo $critere ?>' value='<?php echo $value ?>' readonly/>
						<div class='viewOnly'><?php echo $value ?></div>
					</div>


				<?php endif; ?>

			</div>
		<?php endforeach; ?>
	</div>




