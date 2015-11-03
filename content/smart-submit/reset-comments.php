<?php
if ($site->user() && $pageUri = get('uri')) :
	$newComments = ($site->user()->newComments()) ? unserialize($site->user()->newComments()) : array();
	if (array_key_exists($pageUri, $newComments)):
		//unset($newComments[$pageUri]);
		$newComments[$pageUri] = 0;
	endif;
	$site->user()->update(array( "newComments" => serialize($newComments)));
	die(true);
endif;
die(false);