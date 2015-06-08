<?php
$newPage;
$message = 'Veuillez choisir un titre';
if($site->user()):
    if($title = get('title')) :

      try {

        $newPage = page('annonces')->children()->create($title, 'annonce', array(
          'title' => $title,
          'author'  => $site->user()->username(),
          'date'  => date('Y-m-d'),
          'description'  => 'This is my new article',
        ));

        $message = 'The new page has been created';
        
        print_r ($newPage->uri());

      } catch(Exception $e) {

        $message = $e->getMessage();

      }

    endif;  
  endif;
go( $newPage->uri() ); ?>