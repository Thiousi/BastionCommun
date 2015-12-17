
<?php   
$countFiles = $page->files()->filter(function($file) { return in_array($file->type(), array('image', 'document')); })->count(); 
if ($countFiles > 1): ?>
    <div id="home-slider" class="swiper-container" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
<?php elseif ($countFiles == 1) :?>
    <div id="home-slider" class="single-image" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
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
                                <span class="center"></span><img class="swiper-image" src="<?php echo thumb($file, array('width' => 1200, 'height' => 850 ,'crop' => false))->url(); ?>">              
                                <?php $caption = $file->caption();
                                if ($caption != ""): ?>
                                    <figcaption><?php echo $caption ?></figcaption>
                                <?php endif ?>
                            <?php break;
                        endswitch;
                        ?>
                    </figure>
                <?php endforeach ?>
            <?php endif ?>
        </div>

    <?php if ($countFiles > 1): ?>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next swiper-button-black"></div>
        <div class="swiper-button-prev swiper-button-black"></div>
        </div>
    <?php elseif ($countFiles == 1): ?>
        </div>
    <?php endif; ?>
