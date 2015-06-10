<div id="viewer" class="fieldsGroup">
  <!-- SWIPER -->
  <div id="slider" class="swiper-container" data-pageuri="<?php echo $page->uri() ?>" data-pageurl="<?php echo $page->url() ?>">
      <div class="swiper-wrapper">
        <?php 
        if($images = $page->images()->sortBy('sort', 'asc')):
          foreach($images as $image): ?>
            <figure class="swiper-slide" data-filename="<?php echo $image->filename() ?>">
              <div class="swiper-image" style="background-image:url(<?php echo thumb($image, array('width' => 800, 'crop' => false))->url(); ?>)"></div>              
              <?php $caption = $image->caption();
              if ($caption != ""): ?>
                <figcaption><?php echo $caption ?></figcaption>
              <?php endif ?>
            </figure>
          <?php endforeach ?>
        <?php endif ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next swiper-button-white"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
      <div id="swiper-button-delete" class="btn btn-danger btn-xs editOnly">Supprimer l'image <i class="glyphicon glyphicon-remove"></i></div>
      <!-- UPLOADER -->
      <div id="uploadImages" class="editOnly">
        <span class="btn btn-success btn-xs fileinput-button">
          <i class="glyphicon glyphicon-plus"></i>
          <span>Ajouter des images</span>
          <input id="fileupload" type="file" name="files[]" value="Select files..." data-url="<?php echo page('upload')->url().'?annonce='.$page->uid() ?>" multiple>
        </span>
        <br>
        <br>
        <div id="uploader-message"></div>
        <div id="files" class="files"></div>
      </div>   
  </div>
  <div id="progress" class="progress editOnly">
    <div class="progress-bar progress-bar-success"></div>
  </div>
</div>