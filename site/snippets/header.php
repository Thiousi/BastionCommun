<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<meta name="description" content="<?php echo $site->description()->html() ?>">
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

	<?php echo css(array(
		'assets/css/main.css',
		'https://cdnjs.cloudflare.com/ajax/libs/medium-editor/4.10.1/medium-editor.min.css',
		'https://cdnjs.cloudflare.com/ajax/libs/medium-editor/4.10.2/css/themes/flat.min.css',
		'assets/css/entypo.css',
	)) ?>
	<?php echo js(array(
		'assets/js/jquery-1.11.2.min.js',
		'assets/js/script.js',
		'https://cdnjs.cloudflare.com/ajax/libs/medium-editor/4.10.1/medium-editor.min.js',
		'assets/js/me-markdown.standalone.min.js'
	)) ?>

</head>
<body class="template-<?php echo $page->intendedTemplate() ?>">

	<header class="header cf" role="banner">
		<?php snippet('menu') ?>
	</header>
