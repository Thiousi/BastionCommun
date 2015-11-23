<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<meta name="description" content="<?php echo $site->description()->html() ?>">
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

	<?php echo css(array(
			'assets/css/datepicker.css',
			'assets/css/bootstrap.min.css',
			'assets/css/bootstrap-select.min.css',
			'assets/css/bootstrap-toggle.min.css',
			'assets/css/medium-editor.min.css',
			'assets/css/flat.min.css',
			'assets/css/font-awesome.min.css',
			'assets/css/entypo.css',
			'assets/css/swiper.min.css',
			'assets/css/main.css',
			'assets/css/perfect-scrollbar.css',
			'assets/oembed/oembed.css'
	)) ?>

	<?php echo js(array(
		'assets/js/jquery-1.11.2.min.js',
		'assets/js/smart-submit.js',
		'assets/js/script.js',
		'assets/js/medium-editor.min.js',
		'assets/js/swiper.jquery.min.js',
		'assets/js/bootstrap.min.js',
		'http://maps.google.com/maps/api/js?sensor=false&libraries=places',
		'assets/js/me-markdown.standalone.min.js',
		'assets/js/jquery.ui.widget.js',
		'assets/js/jquery-sortable-min.js',
		'assets/js/jquery.iframe-transport.js',
		'assets/js/jquery.fileupload.js',
		'assets/js/jquery.autocomplete.min.js',
		'assets/js/locationpicker.jquery.min.js',
		'assets/js/bootstrap-select.min.js',
		'assets/js/bootstrap-toggle.min.js',
		'assets/js/perfect-scrollbar.jquery.min.js',
		'assets/js/bootstrap-datepicker.js',
		'assets/js/masonry.pkgd.min.js'
	)) ?>
	
	<script>
		var BASTION = {};
		BASTION.smartSubmitUrl = "<?php echo page('smart-submit')->url() ?>";
		BASTION.siteUrl = "<?php echo $site->url() ?>";
	</script>

</head>
<body class="template-<?php echo $page->intendedTemplate() ?>">