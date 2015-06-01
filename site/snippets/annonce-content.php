<main class="main" role="main">
    
  <div id="title" class="editable minimalEdit">
    <?php echo $page->title() ?>
  </div>

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
  
  <div id="uploadImages">
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" data-url='<?php echo $page->root() ?>' multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
  </div>
  
  <div id="meta"><?php echo $page->author().' '.$page->date('d m Y') ?></div>

  <div id="informations"><?php echo $page->informations() ?></div>

  <div id="description" class="editable standardEdit"><?php echo $page->description() ?></div>
  
  <div id="controlButtons" class="usersOnly">
    <button class="button submitButton">Submit</button>
    <button class="button editButton">Edit</button>
  </div>

  <div id="bottomLinks">
    <div id="saveAd"></div>
    <div id="advise"></div>
    <div id="btFb"></div>
    <div id="btTweeter"></div>
  </div>

  <div id="comments"></div>

  <div id="footer"></div>

</main>