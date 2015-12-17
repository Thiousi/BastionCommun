<?php if(!defined('KIRBY')) exit ?>

title: About
pages: false
fields:
    title:
        label: Titre
        type:  text
    text:
        label: Texte
        type:  textarea
        size:  large
    cover:
        label: Image
        type: select
        options: images
        width: 1/4
    bgcolor:
        label: Couleur de fond  
        type: color
        default: #efefef
        width: 1/4