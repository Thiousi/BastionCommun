<div id="liste-annonces">
	<?php foreach($results as $annonce): ?>
		<?php 
		if( $site->user() || $annonce->private() != 'true'  ) :
			$author = "".$annonce->author();
			$author =  $site->users()->get( $author );
			$private =  $annonce->private(); 
			$categorie = $annonce->categorie();
			$categoryColor = page('categories/'.$categorie)->bgcolor();
			$currentCategorieTitle = page('categories/'.$categorie)->title();
			# mise au singulier
			$splited = explode(' ', $currentCategorieTitle);
			foreach ($splited as $sKey => $sVal) {
				$splited[$sKey] = rtrim($sVal, 's');
			}
			$currentCategorieTitle = implode(' ', $splited);
			$follower = false;
			if ($annonce->followers() != ''):
				in_array($site->user()->username(), json_decode($annonce->followers())) ? $follower = true : $follower = false ; 
			endif;
			?>
			<div class="elem annonce-mini" data-uri="<?php echo $annonce->uri() ?>">

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
							<a href="<?php echo $annonce->url() ?>">
								<img class="media-object" src="<?php echo thumb($image, array('width' => 140, 'height' => 170, 'crop' => true))->url(); ?>" alt="<?php echo $annonce->title() ?>">
							</a>
							<?php else: ?>
								<div class="user placeholder glyphicon glyphicon-user"></div>
							<?php endif; ?>
						</div>
						<div class="small-content">
							<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
						</div>


					<?php elseif ($currentCategorieTitle == "Expositions") : ?>
						<div class="avatar">
							<?php if($image = $annonce->image()): ?>
							<a href="<?php echo $annonce->url() ?>">
								<img class="media-object" src="<?php echo thumb($image, array('width' => 150, 'height' => 170, 'crop' => true))->url(); ?>" alt="<?php echo $annonce->title() ?>">
							</a>
							<?php else: ?>
								<div class="user placeholder glyphicon glyphicon-user"></div>
							<?php endif; ?>

						</div>
						<div class="small-content">
							<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
							<?php 
								snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce, 'key' => 'date' ));
							?>
						</div>




					<?php elseif ($currentCategorieTitle == "Fournisseur") : ?>
						<div class="avatar">
							<div class="user placeholder glyphicon glyphicon-wrench"></div>
						</div>
						<div class="small-content">
							<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
							<?php 
								snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce, 'key' => 'adresse' ));
							?>
						</div>




					<?php elseif ($currentCategorieTitle == "bastion-commun") : ?>
						<div class="avatar">
							<div class="user placeholder glyphicon glyphicon-wrench"></div>
						</div>
						<div class="small-content">
							<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
						</div>




					<?php else : ?>
						<div class="regular-content">
							<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
							<?php snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce )) ?>
							<p><small>Déposée par <?php echo $author->firstName()." ".$author->lastName() ?> le <?php echo $annonce->date('d/m/Y') ?></small> </p>
						</div>
					<?php endif; ?>

					<div class="barreActive"></div>
				</div>
			</div>

		<?php endif; ?>
	<?php endforeach; ?>
</div>