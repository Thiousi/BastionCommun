<?php 

header('Content-type: application/json');

if($user = $site->user()):
  if( get('elements') && $annonce = get('annonce') ) :

		$elements = json_decode(stripslashes(get('elements')));

		foreach($elements as $key=>$element) {
			$filename = $element->{'filename'};
			$caption = $element->{'caption'};
			$file = page($annonce)->file($filename);
			try {
				$file->update(array(
					'sort' => $key,
					'caption' => $caption,
				));
			} catch(Exception $e) {
				
			}
		}
		die('{"success":"elements sorted"}');

	endif;
	die('{"error":"no elements"}');
endif;
die('{"error":"not logged"}');

?>