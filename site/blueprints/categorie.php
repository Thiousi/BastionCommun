<?php if(!defined('KIRBY')) exit ?>

title: Categorie
pages: false
files: false
fields:
	title:
		label: Nom de la catégorie
		type:  text
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
    			important:
    				label: Liste
    				type: checkbox
    				text: Faire apparaître sur la liste des annonces.
    			type:
    				label: Type
    				type: select
    				options:
    					text: Texte
    					number: Nombre
    					date: Date
    					select: Liste déroulante
    					tag: Tag
    					map: Carte
    			values:
    				label: Valeurs possibles de la liste déroulante (séparés par des virgules)
    				type: text