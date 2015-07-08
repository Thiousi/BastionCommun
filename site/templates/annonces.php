<?php snippet('header') ?>

  <main class="main" role="main">
		
		<div class="panel panel-default">
			<div class="panel-body">
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-8">
							
							<form class="form-inline">
								<div class="form-group">
									<?php if ($query): ?>
										<a href="<?php echo $page->url() ?>" role="button" class="btn btn-default" aria-label="Voir tout">
											<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										</a>
									<?php endif ?>
									<input type="text" name="q" value="<?php echo esc($query) ?>" class="form-control" aria-label="rechercher" id="search" placeholder="Rechercher">
									<select class="selectpicker" name="cat" title="Catégorie">
										<option value="">Toutes</option>
										<?php foreach ( page('categories')->children() as $categorie ) : ?>
											<option value="<?php echo $categorie->uid(); ?>" <?php e($categorie->uid() == $cat, "selected") ?>><?php echo $categorie->title(); ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<input type="submit" class="btn btn-default" value="Go !" />
							</form>
							
						</div>
						<div class="col-xs-4 text-right">
							
							<a href='<?php echo page('create')->url() ?>?create=1' class='btn btn-primary'>
								<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> 
								<span class='name'> Publier une annonce</span>
							</a>
							
						</div>
					</div>
				</div>
				
				
				
				
			</div>
		</div>
		<div id="liste-annonces" class="container-fluid">
			<?php foreach($results as $annonce): ?>
			<?php $author = "".$annonce->author(); ?>
			<?php $author =  $site->users()->get( $author ); ?>
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
					<h3 class="media-heading"><a href="<?php echo $annonce->url() ?>"><?php echo $annonce->title() ?></a></h3>
					<?php snippet('meta-mini', array( 'categorie' => $categorie, 'page'=>$annonce )) ?>
				</div>
				<div class="col-xs-2 text-center">
					<p><small><?php echo $author->firstName()." ".$author->lastName() ?> <br> le <?php echo $annonce->date('d/m/Y') ?></small></p>
				</div>
			</div>
			<hr>
			<?php endforeach; ?>
		</div>
  </main>


<?php snippet('modal-new') ?>
<?php snippet('footer') ?>