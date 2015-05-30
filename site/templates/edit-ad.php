<?php snippet('header') ?>

<?php
  
  if (kirby()->request()->body()) {
    
    $uri = kirby()->request()->get('_uri');
    
    try {
      
      $request = array();
      foreach(kirby()->request()->data() as $key=>$value) {
        if( substr($key, 0, 1) != "_" ) {
          $request[$key]=$value;
        }
      }
      
      page($uri)->update($request);

      echo 'The page has been updated';

    } catch(Exception $e) {

      echo $e->getMessage();

    }
  }
  $ad = "ad01";
?>

  <main class="main" role="main">
    
    <form action="<?php echo $page->url()?>" method="post">
      
      <input type="hidden" name="_uri" value="<?php echo page('annonces/'.$ad)->uri() ?>" />

      <div id="title">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?php echo page('annonces/'.$ad)->title() ?>" />
      </div>

      <div id="slider-wrapper">
        <div id="slider-slides"></div>
        <div id="slider-carrousel"></div>
      </div>

      <div id="meta"></div>

      <div id="informations"></div>

      <div id="description">
        <div id="description-editor"><?php echo page('annonces/'.$ad)->description()->kirbytext() ?></div>
        <textarea name="description" id="description-markdown" class="hidden"><?php echo page('annonces/'.$ad)->description()->html() ?></textarea>
      </div>

      <button class="submitButton" type="submit" name="_submit">Submit</button>
      <div class="button editButton">Edit</div>      
      
    </form>

    <div id="bottomLinks">
      <div id="saveAd"></div>
      <div id="advise"></div>
      <div id="btFb"></div>
      <div id="btTweeter"></div>
    </div>

    <div id="comments"></div>

    <div id="footer"></div>

  </main>

<?php snippet('footer') ?>