<?php
if($site->user()):
    if(get('create')) :

      try {

        $newPage = page('annonces')->children()->create('new', 'annonce', array(
          'title' => 'My new article',
          'author'  => $user->username(),
          'date'  => date('Y-m-d'),
          'description'  => 'This is my new article',
        ));

        $message = 'The new page has been created';

      } catch(Exception $e) {

        $message = $e->getMessage();

      }

    endif;  
  endif;
go(page('annonces/new')->url()) ?>