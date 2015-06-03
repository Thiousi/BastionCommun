<?php if(!defined('KIRBY')) exit ?>

title: Categorie
pages: false
files: false
fields:
  title:
    label: Title
    type:  text
  criteres:
    label: Critères
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