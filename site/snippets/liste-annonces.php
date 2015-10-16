<?php foreach($results as $annonce): ?>
	<?php 
	if( $site->user() || $annonce->private() != 'true'  ) :
		$author = "".$annonce->author();
		$author =  $site->users()->get( $author );
		$private =  $annonce->private(); ?>

		<?php 
			$categorie = $annonce->categorie();
			$currentCategorieTitle = page('categories/'.$categorie)->title();

			if ($currentCategorieTitle == "Artistes résidents") : ?>
				<div class="row">
					<div class="col-xs-12 elem">
						<div class="container-fluid annonce-mini" data-uri="<?php echo $annonce->uri() ?>">
							<div class="row">
								<div class="label-mini"><?php echo $currentCategorieTitle?></div>
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
									<?php if ($private=='false' && $user = $site->user()) : ?>
										<span class="glyphicon glyphicon-pushpin pushpin" data-toggle="tooltip" data-placement="bottom" title="Public"></span>
									<?php endif; ?>
									<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
								</div>
							</div>
						</div>
					</div>
				</div>


			<?php elseif ($currentCategorieTitle == "Expositions") : ?>
				<div class="row">
					<div class="col-xs-12 elem">
						<div class="container-fluid annonce-mini" data-uri="<?php echo $annonce->uri() ?>">
							<div class="row">
								<div class="avatar">
									<div class="label-mini"><?php echo $currentCategorieTitle?></div>

									<?php if($image = $annonce->image()): ?>
									<a href="<?php echo $annonce->url() ?>">
										<img class="media-object" src="<?php echo thumb($image, array('width' => 150, 'height' => 170, 'crop' => true))->url(); ?>" alt="<?php echo $annonce->title() ?>">
									</a>
									<?php else: ?>
										<div class="user placeholder glyphicon glyphicon-user"></div>
									<?php endif; ?>

								</div>
								<div class="small-content">
									<?php if ($private=='false' && $user = $site->user()) : ?>
										<span class="glyphicon glyphicon-pushpin pushpin" data-toggle="tooltip" data-placement="bottom" title="Public"></span>
									<?php endif; ?>
									<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
									<?php 
										snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce, 'key' => 'date' ));
									?>
								</div>
							</div>
						</div>
					</div>
				</div>




			<?php elseif ($currentCategorieTitle == "Fournisseur") : ?>
				<div class="row">
					<div class="col-xs-12 elem">
						<div class="container-fluid annonce-mini" data-uri="<?php echo $annonce->uri() ?>">
							<div class="row">
								<div class="label-mini"><?php echo $currentCategorieTitle?></div>
								<div class="avatar">
									<div class="user placeholder glyphicon glyphicon-wrench"></div>
								</div>
								<div class="small-content">
									<?php if ($private=='false' && $user = $site->user()) : ?>
										<span class="glyphicon glyphicon-pushpin pushpin" data-toggle="tooltip" data-placement="bottom" title="Public"></span>
									<?php endif; ?>
									<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
									<?php 
										snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce, 'key' => 'adresse' ));
									?>
								</div>
							</div>
						</div>
					</div>
				</div>





			<?php elseif ($currentCategorieTitle == "bastion-commun") : ?>
				<div class="row">
					<div class="col-xs-12 elem">
						<div class="container-fluid annonce-mini" data-uri="<?php echo $annonce->uri() ?>">
							<div class="row">
								<div class="label-mini"><?php echo $currentCategorieTitle?></div>
								<div class="avatar">
									<div class="user placeholder glyphicon glyphicon-wrench"></div>
								</div>
								<div class="small-content">
									<?php if ($private=='false' && $user = $site->user()) : ?>
										<span class="glyphicon glyphicon-pushpin pushpin" data-toggle="tooltip" data-placement="bottom" title="Public"></span>
									<?php endif; ?>
									<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
								</div>
							</div>
						</div>
					</div>
				</div>





			<?php else : ?>
				<div class="row">
					<div class="col-xs-12 elem">
						<div class="container-fluid annonce-mini" data-uri="<?php echo $annonce->uri() ?>">
							<div class="row">
								<div class="label-mini"><?php echo $currentCategorieTitle?></div>
								<div class="regular-content">
									<?php if ($private=='false' && $user = $site->user()) : ?>
										<span class="glyphicon glyphicon-pushpin pushpin" data-toggle="tooltip" data-placement="bottom" title="Public"></span>
									<?php endif; ?>
									<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
									<?php snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce )) ?>
									<p><small>Déposée par <?php //echo $author->firstName()." ".$author->lastName() ?> le <?php echo $annonce->date('d/m/Y') ?></small> </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
	<?php endif; ?>
<?php endforeach; ?>