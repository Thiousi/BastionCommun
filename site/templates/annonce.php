<?php snippet('header') ?>
<?php
if(get('action')=='edit'):
  snippet('annonce-editor', array('page' => $page));
else:
  snippet('annonce-content', array('page' => $page));
endif;
?>

<?php snippet('footer') ?>