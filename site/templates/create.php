<?php snippet('header') ?>
<?php
$message = 'Veuillez choisir un titre';
if($site->user()):

  if(get('create')) :

    try {
      
      $uid = uniqid();
      $newPage = page('annonces')->children()->create($uid, 'annonce', array(
        'title' => 'Titre',
        'author' => $site->user()->username(),
        'date' => date('Ymd')
      ));
      go( $newPage->uri().'#edit' );
      
    } catch(Exception $e) {

      echo $message = $e->getMessage();

    }

  elseif($delete = get('delete')):
    try {
      
      page('annonces/'.$delete)->delete();
      go( page('annonces')->uri() );
      
    } catch(Exception $e) {

      echo $message = $e->getMessage();

    }

  endif;
endif;
?>
<?php snippet('footer') ?>