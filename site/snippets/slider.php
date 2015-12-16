
<?php	
$countFiles = $page->files()->filter(function($file) { return in_array($file->type(), array('image', 'document')); })->count(); 
if ($countFiles > 1): ?>
	<div id="slider" class="swiper-container" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
<?php elseif ($countFiles == 1) :?>
	<div id="slider" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
<?php endif; ?>

		<div class="swiper-wrapper">
			<?php 
			if($files = $page->files()->filter(function($file) {
					return in_array($file->type(), array('image', 'document'));
				})->sortBy('sort', 'asc') ):
				foreach($files as $file): ?>
					<figure class="swiper-slide" data-filename="<?php echo $file->filename() ?>">
						<?php
						switch($file->type()):
							case 'image' : ?>
								<div class="swiper-image" style="background-image:url(<?php echo thumb($file, array('width' => 840, 'height' => 500 ,'crop' => false))->url(); ?>)"></div>              
								<?php $caption = $file->caption();
								if ($caption != ""): ?>
									<figcaption><?php echo $caption ?></figcaption>
								<?php endif ?>
							<?php break;
							case 'document' :
								echo '<div class="swiper-image">';
								$url = file_get_contents($file->root());
								echo kirbytag(array(
									'oembed'  => $url
								));
								echo '</div>';
						endswitch;
						?>
					</figure>
				<?php endforeach ?>
			<?php endif ?>
		</div>

	<?php if ($countFiles > 1): ?>
		<div class="swiper-button-next swiper-button-black"></div>
		<div class="swiper-button-prev swiper-button-black"></div>
		</div>
	<?php elseif ($countFiles == 1): ?>
		</div>
	<?php endif; ?>
<?php if ($countFiles > 1): ?>
	<div class="swiper-pagination"></div>
<?php endif; ?>