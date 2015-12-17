<?php
$files = $page->files()->sortBy('sort', 'asc');

foreach ($files as $file) :
    if($file->type() == 'image' || $file->extension() == 'md'):
    ?>
    	<li class="cf" data-filename="<?php echo $file->filename() ?>">
    		<?php if ($file->type() == 'image') : ?>
    			<div class="swiper-image" style="background-image:url('<?php echo $file->url() ?>')"></div> 
    		<?php elseif ($file->type() != 'code' && $file->extension() == 'md'): ?>
    			<div class="swiper-image video-file" style="background-color:#DEDEDE;"><span class="glyphicon glyphicon-play"></span><p><?php echo $file->read() ?></p></div> 
    		<?php endif; ?>
    		<div class="media-caption"><input value="<?php echo $file->caption() ?>"></div>
    		<div class="media-delete btn btn-danger"><i class="glyphicon glyphicon-trash"></i></div>
    	</li>
    <?php endif; ?>
<?php endforeach; ?>