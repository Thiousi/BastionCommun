<?php if(!defined('KIRBY')) exit ?>

title: Projects
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
  author:
    label: Auteur
    type:  user
    width: 1/4
  date:
    label: Date
    type: dateAuto
    width: 1/4
  categorie:
    label: Catégorie
    type: select
    options: query
    query:
      page: categories
      fetch: children
  informations:
    label: Informations
    type: structure
    width: 1/2
    entry: {{ key }} {{ value }}
    fields:
      key:
        label: Info
        type: text
      value:
        label: Contenu
        type: text
  description:
    label: Description
    type:  textarea