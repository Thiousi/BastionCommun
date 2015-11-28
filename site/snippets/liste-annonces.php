<div id="liste-annonces">
	<?php foreach($results as $annonce): ?>
		<?php 
		if( $site->user() || $annonce->private() != 'true'  ) :
			$author = '';
			if($annonce->author() != '') {
				$author = ''.$annonce->author();
				$author =  $site->users()->get( $author );
			}
			
			$private =  $annonce->private(); 
			$categorie = $annonce->categorie();
			$categoryColor = page('categories/'.$categorie)->bgcolor();
			$currentCategorieTitle = page('categories/'.$categorie)->title();
			# mise au singulier
			$splited = explode(' ', $currentCategorieTitle);
			foreach ($splited as $sKey => $sVal) :
				$splited[$sKey] = rtrim($sVal, 's');
			endforeach;
			$currentCategorieTitle = implode(' ', $splited);
			$follower = false;
			if ($annonce->followers() != '' && $site->user()):
				in_array($site->user()->username(), json_decode($annonce->followers())) ? $follower = true : $follower = false ; 
			endif;
			?>
			<a class="elem annonce-mini" href="<?php echo $annonce->url() ?>" data-uri="<?php echo $annonce->uri() ?>">

				<?php if ($private=='false' && $user = $site->user()) : ?>
					<div class="glyphicon glyphicon-eye-open publicOrNot" data-toggle="tooltip" data-placement="bottom" title="annonce externe"></div>
				<?php elseif ($private=='true' && $user = $site->user()) : ?>
					<div class="glyphicon glyphicon-eye-close publicOrNot white" data-toggle="tooltip" data-placement="bottom" title="annonce interne"></div>
				<?php endif; ?>
				
				<div class="label-mini"><span class="gommette" style="background-color:<?php echo $categoryColor; ?>"></span><?php echo $currentCategorieTitle?></div>
				<div class="container-fluid">

					<?php 
					if ($currentCategorieTitle == "Artistes résidents") : ?>
						<div class="avatar">
							<?php if($image = $annonce->image()): ?>
								<img class="media-object" src="<?php echo thumb($image, array('width' => 140, 'height' => 170, 'crop' => true))->url(); ?>" alt="<?php echo $annonce->title() ?>">
							<?php else: ?>
								<div class="user placeholder glyphicon glyphicon-user"></div>
							<?php endif; ?>
						</div>
						<div class="small-content">
							<h3 class="media-heading"><?php echo $annonce->title() ?></h3>
						</div>


					<?php elseif ($currentCategorieTitle == "Expositions") : ?>
						<div class="avatar">
							<?php if($image = $annonce->image()): ?>
								<img class="media-object" src="<?php echo thumb($image, array('width' => 150, 'height' => 170, 'crop' => true))->url(); ?>" alt="<?php echo $annonce->title() ?>">
							<?php else: ?>
								<div class="user placeholder glyphicon glyphicon-user"></div>
							<?php endif; ?>

						</div>
						<div class="small-content">
							<h3 class="media-heading"><?php echo $annonce->title() ?></h3>
							<?php 
								snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce, 'key' => 'date' ));
							?>
						</div>




					<?php elseif ($currentCategorieTitle == "Fournisseur") : ?>
						<div class="avatar">
							<div class="user placeholder glyphicon glyphicon-wrench"></div>
						</div>
						<div class="small-content">
							<h3 class="media-heading"><?php echo $annonce->title() ?></h3>
							<?php 
								snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce, 'key' => 'adresse' ));
							?>
						</div>




					<?php elseif ($currentCategorieTitle == "bastion-commun") : ?>
						<div class="avatar">
							<div class="user placeholder glyphicon glyphicon-wrench"></div>
						</div>
						<div class="small-content">
							<h3 class="media-heading"><?php echo $annonce->title() ?></h3>
						</div>




					<?php else : ?>
						<div class="regular-content">
							<h3 class="media-heading"><?php echo $annonce->title() ?></h3>
							<?php snippet('meta-mini', array( 'page'=>$annonce )) ?>
							<p><small>Le <?php echo $annonce->date('%d/%m/%Y') ?> 
								<?php
								if ($author) {
									echo 'par'.$author->firstName()." ".$author->lastName();
								} ?>
								</small> </p>
						</div>
					<?php endif; ?>

					<div class="barreActive"></div>
				</div>
			</a>


		<?php endif; ?>
	<?php endforeach; ?>
</div>