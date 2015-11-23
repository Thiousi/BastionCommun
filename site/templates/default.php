<?php 
snippet('header');

// CONNECTION
if(get('username')) { if($user = $site->user(get('username')) and $user->login(get('password'))) {
		//go('/');
	} else { }
} else if(get('logout')) {
	if($user = site()->user()) $user->logout();
	go($page->url());
}

// AIGUILLAGE
if ( kirby()->request()->path()->nth(0) == "annonces" ){ 
	$modeAnnonce = true; 
	if (kirby()->request()->path()->nth(1) == "") {
		$annonce = page('annonces')->children()->sortBy('modified', 'desc')->first(); 
	} else {
		$annonce = page("annonces/".kirby()->request()->path()->nth(1));
	}
} else { 
	$modeAnnonce = false; 
}

if ( $modeAnnonce ){ 
	snippet('annonces', array('page'=> $annonce )); 
} else { 
	snippet('homepage'); 
}

snippet('modals');
snippet('footer');
?>	




