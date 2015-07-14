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
    width: 1/4
    query:
      page: categories
      fetch: children
  private:
    label: Privé ?
    type:  toggle
    width: 1/4
  description:
    label: Description
    type:  textarea
  informations:
    label: Informations
    type: structure
    entry: {{ key }} {{ value }}
    fields:
      key:
        label: Info
        type: text
      value:
        label: Contenu
        type: text