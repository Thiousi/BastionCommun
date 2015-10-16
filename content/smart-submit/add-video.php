<?php 

header('Content-type: application/json');

if($user = $site->user()):
  if(get('annonceUri') && get('videoUrl')) :

		$dir = page(get('annonceUri'))->root() . '/';
		$filename = uniqid('video-');
		$myfile = fopen($dir.$filename.".md", "w") or die("Unable to open file!");
		$txt = get('videoUrl');
		fwrite($myfile, $txt);
		fclose($myfile);
		die('{"success":"video added"}');

	endif;
endif;
die('{"error":"not logged"}');

?>