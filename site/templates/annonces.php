<?php snippet('header') ?>

  <main class="main" role="main">
			
			<?php foreach( $page->children() as $annonce ) : ?>
			<div class="media">
				<div class="media-left">
					<p>Posté par <?php echo $annonce->author() ?> le <?php echo $annonce->date('d/m/Y') ?></p>
				</div>
				<div class="media-left">
					<a href="<?php echo $annonce->url() ?>">
						<img class="media-object" src="<?php echo thumb($annonce->image(), array('width' => 230, 'height' => 160, 'crop' => true))->url(); ?>" alt="<?php echo $annonce->title() ?>">
					</a>
				</div>
				<div class="media-body">
					<?php $categorie = $annonce->categorie(); ?>
					<p><?php echo $currentCategorieTitle = page('categories/'.$categorie)->title(); ?></p>
					<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>"><?php echo $annonce->title() ?></a></h3>
					<?php snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce )) ?>
				</div>
			</div>
			<?php endforeach; ?>

			<a href='<?php echo page('create')->url() ?>?create=1' class='btn btn-primary'>
				<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> 
				<span class='name'>Publier une annonce</span>
			</a>

  </main>


<?php snippet('modal-new') ?>
<?php snippet('footer') ?>