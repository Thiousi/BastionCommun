<?php snippet('header') ?>

  <main class="main" role="main">		
				
		<div class="container-fluid">
			<?php if( $site->user() ): ?>
        <div class="row">
          <div class="col-xs-12">
            <a href='<?php echo page('create')->url() ?>?create=1' id="btn-new" class='btn btn-default btn-lg' data-width='100%'>
              <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> 
              <span class='name'> Publier une annonce</span>
            </a>
          </div>
        </div>
			<?php endif; ?>
      
			<div class="clearfix">&nbsp;</div>
			
			<form>
				<div>
					<div class="row">
						<div class="col-xs-6 flexible">
							<?php if ($query): ?>
							<a href="<?php echo $page->url() ?>" role="button" class="btn btn-default btn-lg" aria-label="Voir tout">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							</a>&nbsp;
							<?php endif ?>
							<input type="text" name="q" value="<?php echo esc($query) ?>" class="form-control btn-default input-lg" aria-label="rechercher" id="search" placeholder="Rechercher">
						</div>

						<div class="col-xs-6 flexible">
							<select class="selectpicker" data-style="btn-lg btn-default" data-width="100%" onchange="this.form.submit()" name="cat" title="Catégorie">
								<option value="">Toutes</option>
								<?php foreach ( page('categories')->children() as $categorie ) : ?>
									<option value="<?php echo $categorie->uid(); ?>" <?php e($categorie->uid() == $cat, "selected") ?>><?php echo $categorie->title(); ?></option>
								<?php endforeach ?>
							</select>
							<input type="submit" class="btn btn-default btn-lg hidden" value="Go !" />
						</div>

					</div>
				</div>
				
			</form>
			
			<div class="clearfix">&nbsp;</div>
			
		</div>
		<div id="liste-annonces" class="container-fluid">
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
                    <h3 class="media-heading"><a href="<?php echo $annonce->url() ?>"><?php echo $annonce->title() ?></a></h3>
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
		</div>
  </main>


<?php snippet('modal-new') ?>
<?php snippet('footer') ?>