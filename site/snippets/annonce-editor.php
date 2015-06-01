<?php
	if (kirby()->request()->body()) {
		try {
			$request = array();
			foreach(kirby()->request()->data() as $key=>$value) {
				if( substr($key, 0, 1) != "_" ) {
					$request[$key]=$value;
				}
			}
			$page->update($request);
			echo 'The page has been updated';
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
?>

<main class="main" role="main">
  <form action="<?php echo $page->url().'?action=edit' ?>" method="post">
    <div id="title">
      <label for="title">Titre</label>
      <input type="text" name="title" id="title" value="<?php echo $page->title() ?>" />
    </div>
    <div id="slider-wrapper">
      <!--<label for="fileupload">Titre</label>
      <input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>-->
      <div id="slider-slides"></div>
      <div id="slider-carrousel"></div>
    </div>
    <div id="meta"></div>
    <div id="informations"></div>
    <div id="description">
      <div id="description-editor" class="editable"><?php echo $page->description()->kirbytext() ?></div>
      <textarea name="description" id="description-markdown" class="hidden"><?php echo $page->description()->html() ?></textarea>
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