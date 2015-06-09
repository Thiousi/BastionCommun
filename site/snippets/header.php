<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<meta name="description" content="<?php echo $site->description()->html() ?>">
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

	<?php echo css(array(
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css',
		'assets/css/main.css',
		'https://cdnjs.cloudflare.com/ajax/libs/medium-editor/4.10.1/medium-editor.min.css',
		'https://cdnjs.cloudflare.com/ajax/libs/medium-editor/4.10.2/css/themes/flat.min.css',
    '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
		'assets/css/entypo.css',
    'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.0.7/css/swiper.min.css'
	)) ?>

	<?php echo js(array(
		'assets/js/jquery-1.11.2.min.js',
		'assets/js/script.js',
		'https://cdnjs.cloudflare.com/ajax/libs/medium-editor/4.10.1/medium-editor.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.0.7/js/swiper.jquery.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js',
    'http://maps.google.com/maps/api/js?sensor=false&libraries=places',
		'assets/js/me-markdown.standalone.min.js',
    'assets/js/jquery.ui.widget.js',
    'assets/js/jquery.iframe-transport.js',
    'assets/js/jquery.fileupload.js',
    'assets/js/smart-submit.js',
    'assets/js/jquery.autocomplete.min.js',
    'assets/js/locationpicker.jquery.min.js',
	)) ?>

</head>
<body class="template-<?php echo $page->intendedTemplate() ?>">

	<?php if(!$page->isHomePage() && !$site->user()) go('/') ?>

	<header class="header cf" role="banner">
		<?php snippet('menu') ?>
	</header>
