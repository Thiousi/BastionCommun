<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
	sortable: true
fields:
	title:
		label: Title
		type:  text
	year:
		label: Year
		type:  text
	text:
		label: Text
		type:  textarea
	tags:
		label: Tags
		type:  tags

	calendar:
		label: Calendar
		type: structure
		entry: >
			<strong>{{summary}}</strong><br>
			{{description}}<br>
			Beginning: {{_begin_date}} {{_begin_time}}<br>
			End: {{_end_date}} {{_end_time}}
		fields:
			summary:
				label: Summary
				type: text
			description:
				label: Description
				type: textarea
				size: small
			_begin_date:
				label: Beginning date
				type: date
				format: MM/DD/YYYY
			_begin_time:
				label: Beginning time
				type: time
				interval: 15
			_end_date:
				label: Ending date
				type: date
				format: MM/DD/YYYY
			_end_time:
				label: Ending time
				type: time
				interval: 15