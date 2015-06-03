<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$annonce = $_GET["annonce"];
$dir = page('annonces/'.$annonce)->root() . '/';
$options = array ('upload_dir' => $dir, 'image_versions' => array());
$upload_handler = new UploadHandler($options);