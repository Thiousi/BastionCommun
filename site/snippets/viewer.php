<div id="viewer" class="fieldsGroup">
  <!-- SWIPER -->
  <div id="slider" class="swiper-container gallery-top">
      <div class="swiper-wrapper">
        <?php 
        if($images = $page->images()->sortBy('sort', 'asc')):
          foreach($images as $image): ?>
            <figure class="swiper-slide">
              <div class="swiper-image" style="background-image:url(<?php echo thumb($image, array('width' => 800, 'crop' => false))->url(); ?>)"></div>              
              <?php $caption = $image->caption();
              if ($caption != ""): ?>
                <figcaption><?php echo $caption ?></figcaption>
              <?php endif ?>
            </figure>
          <?php endforeach ?>
        <?php endif ?>
      </div>
      <div class="swiper-button-next swiper-button-white"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  <div id="slider-thumbs" class="swiper-container gallery-thumbs">
      <div class="swiper-wrapper">
        <?php 
        if($images = $page->images()->sortBy('sort', 'asc')):
          foreach($images as $image): ?>
            <figure class="swiper-slide">
              <div class="swiper-image" style="background-image:url(<?php echo thumb($image, array('width' => 300, 'crop' => false))->url(); ?>)"></div>
              <?php $caption = $image->caption();
              if ($caption != ""): ?>
                <figcaption><?php echo $caption ?></figcaption>
              <?php endif ?>
            </figure>
          <?php endforeach ?>
        <?php endif ?>
      </div>
      <div class="swiper-button-next swiper-button-white"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
  </div>
</div>