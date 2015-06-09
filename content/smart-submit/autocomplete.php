<?php 

header('Content-type: application/json');

$array['suggestions'] = [];

if (get('query')):
  $array['query']=get('query');
  $array['field']=get('field');
  foreach( page('annonces')->children()->pluck('informations') as $informations):
    $informations = $informations->yaml();
    $meta = array();
    foreach($informations as $information) :
      if(array_key_exists('key', $information)) {
        if ($information['key'] == get('field')):
          if( stristr( $information['value'], get('query') ) ):
            $array['suggestions'][] = $information['value'];
          endif;
        endif;
        
      }
    endforeach;
  endforeach;
endif;

echo json_encode($array);

?>