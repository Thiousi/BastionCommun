<?php 

header('Content-type: application/json');

if($user = $site->user()):
  if(get('page') && get('file') && get('type') == 'file'):
    $root = page(get('page'))->file(get('file'))->root();
    unlink($root);
		die('{"success": "'.get('file').' a bien été supprimé"}');
	elseif (get('page') && get('type') == 'page'):
		try {
      page(get('page'))->delete();
      die('{"success": "'.get('page').' has been deleted"}');
    } catch(Exception $e) {
			$message = $e->getMessage();
			die('{"success": "'.$message.'"}');
    }
  endif;
endif;

die('{"error": "error"'.get('type').'}');
