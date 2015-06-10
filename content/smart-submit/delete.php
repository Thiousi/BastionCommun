<?php 

header('Content-type: application/json');

if($user = $site->user()):
  if(get('page') && get('file')):
    $root = page(get('page'))->file(get('file'))->root();
    unlink($root);
  endif;
endif;

die('{"success": "'.get('file').' has been deleted"}');
