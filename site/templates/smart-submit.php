<?php 

	// detect handler from 1) query parameter ("?handler="), or fallback to 2) http referer
	$handler_name = get('handler');

	$handler_path = kirby()->roots()->content().'/smart-submit/'.$handler_name.'.php';

	// check honeypot
	if (get('smart-submit-honeypot') && intval(get('smart-submit-honeypot')) < 2)
	{
		die('{"error":"'.(l::get('smart-submit-alarm') ?: 'Anti-spam alarm. Please try again.').'"}');
	}
	if (file_exists($handler_path))
	{
		require $handler_path;
	}
	else
	{
		die('{"error":"'.(l::get('smart-submit-missing-handler') ?: 'Error - handler ('.$handler_path.') not found. Please contact web site administrator for details.').'"}');
	}
