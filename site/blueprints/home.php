<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: false
fields:
	title:
		label: Title
		type:  text
	text:
		label: Text
		type:  textarea
		size:  large
	cover:
		label: Image de fond
		type: select
		options: images
		width: 1/4