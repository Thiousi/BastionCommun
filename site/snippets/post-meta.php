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
					
          switch ($type):
            case 'adresse':
              ?>
              <input type='text' class='form-control input editOnly' data-slug='<?= $critere['slug'] ?>' value='<?= $value ?>' readonly/>
              <?php if ($value){ ?>
                <div class='viewOnly infoContent'>
                  <a href="https://www.google.com/maps/search/<?= $value ?>" target="_blank"><?= $value ?> <span class='glyphicon glyphicon-globe' title='Afficher la carte'></span></a>
                </div>
              <?php }
              break;
            case 'date':
              echo "<input type='text' class='datepicker form-control input editOnly' data-date-format='dd.mm.yyyy' data-slug='{$critere['slug']}' value='{$value}' readonly/>";
						  if ($value){ echo "<div class='viewOnly infoContent'>{$value}</div>"; };
              break;
            default:
              echo "<input type='text' class='autocomplete form-control input editOnly' data-slug='{$critere['slug']}' value='{$value}' readonly/>";
						  if ($value){ echo "<div class='viewOnly infoContent'>{$value}</div>"; }	
              break;
          endswitch;

					echo "</div>";
				echo "</div>";
			endforeach;
		echo "</div>";
	endforeach; ?>
</div>

