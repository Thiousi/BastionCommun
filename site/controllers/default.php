<?php 

return function($site, $pages, $page) {
	
	$cat = ''; 
	$query = '';
	
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

  return array(
    'query'   => $query,
    'results' => $results->sortBy('date', 'desc'), 
    'cat' => $cat
  );

};