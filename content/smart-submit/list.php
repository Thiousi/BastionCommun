<?php

header('Content-type: text/html');

$query = $cat = false;

if (get('q')):
	$query   = get('q');
	$results = page('annonces')->search($query);
else :
	$results = page('annonces')->children();
endif;

if (get('cat')):
	$cat = get('cat');
	$results = $results->filterBy('categorie', $cat);
endif;

$results = $results->sortBy('modified', 'desc');

?>

<?php snippet('liste-annonces', array ('results'=>$results)); ?>