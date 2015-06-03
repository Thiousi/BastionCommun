<?php 

header('Content-type: application/json');


//validate using Kirby toolkit
/*$errors = array();
if (!get('name'))            	{ die('{"error":"'.(l::get('error.name-required') ?: 'Please enter your name.').'"}'); }
if (!v::email(get('email'))) 	{ die('{"error":"'.(l::get('error.email-invalid') ?: 'Please enter valid e-mail address.').'"}'); }
if (!get('text'))            	{ die('{"error":"'.(l::get('error.message-required') ?: 'Message is required.').'"}'); }*/

// .....
// do actual work here! Send email, add info to database, whatever.
// .....
$request = array();
foreach(kirby()->request()->data() as $key=>$value) {
  if( substr($key, 0, 1) == "_" ) {
    $key=substr($key, 1);
    if ($key=="informations") {
      $value = json_decode($value);
      $value = yaml::encode($value);
    }
    $request[$key]= $value;
  }
}
page(get('uri'))->update($request);

die('{"success":"Form has been submitted to '.get('uri').'!"}');
