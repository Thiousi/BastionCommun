<?php 

header('Content-type: application/json');

if($user = $site->user()):
  if( get('page') && $user = get('user') ) :
		
		$annonce = get('page');
		$follow = get('follow');

		if($follow == 'true') :
			if (page($annonce)->followers() != '') {
				$followers = json_decode(page($annonce)->followers());
			} else {
				$followers = [];
			}
			if (!in_array('samuel', $followers)) {
				$followers[] = $user;
			}
			array_unique ($followers);
			page($annonce)->update(array(
				"followers" => json_encode($followers)
			));
		else :
			if (page($annonce)->followers() != '') {
				$followers = json_decode(page($annonce)->followers());
				$followers = array_diff($followers, [$user]);
				page($annonce)->update(array(
					"followers" => json_encode($followers)
				));
			}
		endif;
		die('{"success":"user follow updated"}');
	endif;
	die('{"error":"params not complete"}');
endif;
die('{"error":"not logged"}');

?>