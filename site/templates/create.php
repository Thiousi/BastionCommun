<?php
$message = 'Veuillez choisir un titre';
if($site->user()):
  if($title = get('title')) :

    try {

      $newPage = page('annonces')->children()->create($title, 'annonce', array(
        'title' => $title,
        'categorie' => get('categorie'),
        'description' => get('description'),
        'author'  => $site->user()->username(),
        'date'  => date('Y-m-d'),
      ));

      go( $newPage->uri() ); 

    } catch(Exception $e) {

      $message = $e->getMessage();

    }

  endif;  
endif;
?>