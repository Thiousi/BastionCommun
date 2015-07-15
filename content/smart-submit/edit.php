<?php 

header('Content-type: application/json');


if($user = $site->user()):
  $request = array();
  foreach(kirby()->request()->data() as $key=>$value) {
    if( substr($key, 0, 1) == "_" ) {
      $key=substr($key, 1);
      if ($key=="informations") {
        $value = json_decode($value);
        $structure = [];
        foreach($value as $subkey => $value) {
          $structure[] = array('key'=>$subkey, 'value'=>$value);
        }
        $value = yaml::encode($structure);
      }
      $request[$key]= $value;
    }
  }
  page(get('uri'))->update($request);
  die('{"success":"Form has been submitted to '.get('uri').'!"}');
endif;

die('{"error":"You must be logged"}');
