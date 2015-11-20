
<main>
		<h1 id="logo"><img src="assets/images/logo.png" alt="<?php echo $site->title() ?>"/></h1>
		<img class="home-bg" src="assets/images/bastion.jpg" alt="<?php echo $site->title() ?>"/>

	<h3>Dernières annonces :</h3>
	<?php foreach (page("annonces/")->children()->sortBy('date', 'desc') as $annonce) : ?>
		<article class="main viewMode" id="annonce" data-uri="<?= $page->uri() ?>" role="main">
			<?php if($files = $annonce->files()->filter(function($file) { return in_array($file->type(), array('image', 'document')); })->sortBy('sort', 'asc') ): 
				foreach($files as $file): ?>
					<figure class="homeImg" data-filename="<?php echo $file->filename() ?>">
						<a href="<?php echo $annonce->url(); ?>">
							<?php
//								echo $annonce->date();
							switch($file->type()):
								case 'image' : ?>
									<img src="<?php echo thumb($file, array('width' => 840 ,'crop' => false))->url(); ?>">           
									<?php break 2;
								case 'document' :
									echo '<div class="swiper-image">';
									$url = file_get_contents($file->root());
									echo kirbytag(array(
										'oembed'  => $url
									));
									echo '</div>';
									break 2;
							endswitch;
							?>
						</a>
					</figure>
				<?php endforeach; ?>
			<?php endif ?>
			<h2>
				<a href="<?php echo $annonce->url(); ?>">
					<?php echo $annonce->title(); ?>
				</a>
			</h2>
		</article>
	<?php endforeach; ?>

</main>