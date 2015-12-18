
<?php   
$countFiles = $page->files()->filter(function($file) { return in_array($file->type(), array('image', 'document')); })->count(); 
if ($countFiles > 1): ?>
    <div id="about-slider" class="swiper-container" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
<?php elseif ($countFiles == 1) :?>
    <div id="about-slider" class="single-image" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
<?php endif; ?>

        <div class="about-swiper-wrapper">
            <?php 
            if($files = $page->files()->filter(function($file) {
                    return in_array($file->type(), array('image', 'document'));
                })->sortBy('sort', 'asc') ):
                foreach($files as $file): ?>
                    <figure class="about-slide" data-filename="<?php echo $file->filename() ?>">
                        <?php
                        switch($file->type()):
                            case 'image' : ?>
                                <div class="swiper-image" style="background-image:url(<?php echo thumb($file, array('width' => 555, 'height' => 400 ,'crop' => true))->url(); ?>)"></div>              
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
        <div class="about-pagination"></div>
        </div>
    <?php elseif ($countFiles == 1): ?>
        </div>
    <?php endif; ?>