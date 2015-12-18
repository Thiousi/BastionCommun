<?php 

header('Content-type: application/json');

if($user = $site->user()):
  if(get('cat')) :
		try {
      $uid = uniqid();
      $newPage = page('annonces')->children()->create($uid, 'annonce', array(
        'title' => get('titre') ?: 'Titre',
        'author' => $site->user()->username(),
        'date' => date('Ymd'),
				'lastupdate' => time(),
				'categorie' => get('cat')
      ));
			
			if($userName = get('user')) :
				$site->user($userName)->update(array(
					'page' => $newPage->uri()
				));
			endif;
			
			die('{ "uri": "'.$newPage->uri().'" }');
      
    } catch(Exception $e) {
			
			die('{ "error": "'.$e->getMessage().'" }');

    }
	endif;
endif;


?>