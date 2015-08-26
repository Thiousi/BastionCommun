<?php foreach($results as $annonce): ?>
	<?php 
	if( $site->user() || $annonce->private() != 'true'  ) :
		$author = "".$annonce->author();
		$author =  $site->users()->get( $author );
		$private =  $annonce->private(); ?>

		<div class="row">
			<div class="col-xs-12">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<?php $categorie = $annonce->categorie(); ?>
							<p><?php echo $currentCategorieTitle = page('categories/'.$categorie)->title(); ?></p>
						</div>
						<div class="col-xs-3">
							<?php if($image = $annonce->image()): ?>
							<a href="<?php echo $annonce->url() ?>">
								<img class="media-object" src="<?php echo thumb($image, array('width' => 280, 'height' => 210, 'crop' => true))->url(); ?>" alt="<?php echo $annonce->title() ?>">
							</a>
							<?php endif; ?>
						</div>
						<div class="col-xs-5">
							<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>" class="link-annonce" data-uri="<?php echo $annonce->uri() ?>"><?php echo $annonce->title() ?></a></h3>
							<?php snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce )) ?>
						</div>
						<div class="col-xs-2 text-center">
							<p><small><?php echo $author->firstName()." ".$author->lastName() ?> <br> 
								le <?php echo $annonce->date('d/m/Y') ?></small> <br>
							</p>
							<?php if ($private=='false') : ?>
								<p class="glyphicon glyphicon-star" data-toggle="tooltip" data-placement="bottom" title="Public"></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endif; ?>
<?php endforeach; ?>