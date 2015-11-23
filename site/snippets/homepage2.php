

<div id="bigSlider" class="swiper-container" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
	<div class="swiper-wrapper">
		<?php 
		foreach (page("annonces/")->children()->sortBy('date', 'desc') as $annonce) : ?>
			<figure class="swiper-slide">
	            <h2>
	                <a href="<?php echo $annonce->url(); ?>">
	                    <?php echo $annonce->title(); ?>
	                </a>
	            </h2>
	            <?php
				if($files = $annonce->files()->filter(function($file) { return in_array($file->type(), array('image')); })->sortBy('sort', 'asc') ): 
					foreach($files as $file): ?>
						<span class="center"></span><img src="<?php echo thumb($file, array('width' => 1200, 'height' => 1200 ,'crop' => false))->url(); ?>">
					<?php break; endforeach ?>
				<?php endif ?>
			</figure>
		<?php endforeach; ?>
	</div>
</div>

<div id="column-gauche" class="column accueil">
	<div id="annonces-wrapper" class="container-fluid">
		<div id="textaccueil">
			<?php echo $page->text()->kirbytext(); ?>
			<div id="closeText" class="glyphicon glyphicon-remove"></div>
		</div>
		<div id="annoncesButton">
			<a href='<?php echo page("annonces")->url(); ?>'>Accéder aux annonces</a>
		</div>
	</div>
</div>