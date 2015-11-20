<?php if(!defined('KIRBY')) exit ?>

title: Categorie
pages: false
files: false
fields:
  bgcolor:
    label: Couleur de la catégorie 
    type: color
    default: #efefef
	title:
		label: Nom de la catégorie
		type:  text
	sections:
		label: Sections visibles
		type: checkboxes
		columns: 3
		default:
			- post-title
			- post-meta
			- post-viewer
			- post-text
			- post-author
			- post-links
			- post-comments
		options:
			post-title: Titre
			post-meta: Meta
			post-viewer: Images
			post-text: Texte
			post-author: Auteur
			post-links: Liens
			post-comments: Commentaires
	criteres:
		label: Criteres
		type:  structure
		entry: >
			{{nom}} ({{type}})
		fields:
			nom:
				label: Nom
				type: text
				width: 1/2
			slug:
				label: Slug
				type: text
				width: 1/2
			type:
				label: Type
				type: select
				width: 1/2
				options:
					text: Texte
					adresse: Adresse
					date: Date
			important:
				label: Liste
				type: checkbox
				text: Afficher
				width: 1/2

