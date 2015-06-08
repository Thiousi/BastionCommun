<?php snippet('header') ?>
<main class="main viewMode" role="main">
  
  <!-- TITLE -->
  <div id="title" class="fieldsGroup">
    <h2 id="field-title">
      <?php echo $page->title() ?>
    </h2>
  </div>
  
  <!-- NAME & DATE -->
  <div id="meta" class="fieldsGroup">
    <p>
      Posté par <?php echo $page->author() ?>
      le <?php echo $page->date('d/m/Y') ?>
    </p>
  </div>
  
  <!-- VIEWER -->
  <?php snippet('viewer', array('page' => $page)); ?>
  
  <div class="editOnly">
    <!-- UPLOAD IMAGES -->
    <div id="uploadImages" class="fieldsGroup">
      <span class="btn btn-success fileinput-button">
          <span>Select files...</span>
          <input id="fileupload" type="file" name="files[]" value="Select files..." data-url="<?php echo page('upload')->url().'?annonce='.$page->uid() ?>" multiple>
      </span>
      <br>
      <br>
      <div id="progress" class="progress">
          <div class="progress-bar progress-bar-success"></div>
      </div>
      <div id="files" class="files"></div>
    </div>
  </div>
  
  <!-- CATEGORIE SELECT -->
  <div id="categorie-select-wrapper" class="fieldsGroup">
    <select id="categorie-select" data-populate="categorie">
      <?php
      $currentCategorie = $page->categorie();
      foreach (page('categories')->children() as $categorie) :
        $selected = ( $currentCategorie == $categorie->uid() ) ?  'selected' : '' ;
        ?>
        <option value="<?php echo $categorie->uid() ?>" <?php echo $selected ?>><?php echo $categorie->title() ?></option>
      <?php
      endforeach;
      ?>
    </select>
    <!-- SPECIFICS FIELDS -->
    <div id="informations">
      <?php foreach (page('categories')->children() as $categorie) : ?>
        <?php $selected = ( $currentCategorie == $categorie->uid() ) ?  'selected' : '' ; ?>
        <div class="categorie-<?php echo $categorie->uid() ?> fieldsGroup <?php echo $selected ?>">
          <?php foreach ($categorie->criteres()->yaml() as $critere): ?>
            <?php $informations = $page->informations()->yaml(); 
            $value='';
            if( array_key_exists ( $critere['slug'] , $informations) ){
              $value = $informations[$critere['slug']];
            } ?>
            <label for="value"><?php echo $critere['nom'] ?></label>
            <input type="text" name="value" id="value" data-slug="<?php echo $critere['slug'] ?>" value="<?php echo $value ?>" />
            </br>
          <?php endforeach; ?>
        </div>  
      <?php endforeach; ?>
    </div>
  </div>
  
  <!-- MAIN TEXT -->
  <div id="description" class="fieldsGroup">
    <div id="field-description"><?php echo $page->description()->kirbytext() ?></div>
  </div>
  
  <!-- HIDDEN FORM -->
  <form action="<?php echo page('smart-submit')->url().'?handler=edit' ?>" method="post" id="smart-submit">
    <div id="hiddenForm" class="hidden">
      titre
      <textarea id="hidden-title" name="_title"></textarea>
      categorie
      <textarea id="hidden-categorie" name="_categorie"></textarea>
      informations
      <textarea id="hidden-informations" name="_informations"></textarea>
      description
      <textarea id="hidden-description" name="_description"></textarea>
      <textarea name="uri"><?php echo $page->uri() ?></textarea>
    </div>
    <button type="submit" name="submit" class="editOnly btn btn-primary">Submit</button>
  </form>
  
  <!-- VALIDATION BUTTON -->
  <div id="controlButtons" class="usersOnly">
    <button class="btn btn-primary button editButton viewOnly">Edit</button>
  </div>
  
  <!-- BOTTOM LINKS -->
  <div id="bottomLinks">
    <div id="saveAd"></div>
    <div id="advise"></div>
    <div id="btFb"></div>
    <div id="btTweeter"></div>
  </div>

  <!-- COMMENTS -->
  <div id="comments"></div>

</main>
<?php snippet('footer') ?>