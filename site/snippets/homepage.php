<?php /*
<div id="megabloc">
	<div id="wrapper-accueil" class="column grid">
		<div id="textaccueil" class="grid-item">
			<?php echo $page->text()->kirbytext(); ?>
		</div>


		<?php foreach (page("annonces/")->children()->sortBy('date', 'desc') as $annonce) : ?>
			<figure class="grid-item">
	            <?php
				if($files = $annonce->files()->filter(function($file) { return in_array($file->type(), array('image')); })->sortBy('sort', 'asc') ): 
					foreach($files as $file): ?>
						<img src="<?php echo thumb($file, array('width' => 320, 'crop' => false))->url(); ?>">
					<?php break; endforeach ?>
				<?php endif ?>
	            <h3>
	                <a href="<?php echo $annonce->url(); ?>">
	                    <?php echo $annonce->title(); ?>
	                </a>
	            </h3>
			</figure>
		<?php endforeach; ?>
	</div>
</div>

*/ ?>

<div id="megabloc" class="accueil">
	<div id="column-gauche" class="column">
		<div id="annonces-wrapper" class="container-fluid">
			<div id="cover" class="row">THIS IS THE COVER THAT COVERS THE COVER</div>
			<?php $results = page('annonces')->children()->sortBy('modified', 'desc'); ?>
			<?php snippet('liste-annonces', array ('results'=>$results)); ?>
		</div>
	</div>
	<div id="column-content" class="column">
		<div id="show-menu" class="glyphicon glyphicon glyphicon-list"></div>
		<div id="loadingContainer" class="hidden">
			<div id="loading" class="glyphicon glyphicon-refresh"></div>
		</div>
		<div id="content" class="col-xs-12">
		</div>
	</div>
</div>