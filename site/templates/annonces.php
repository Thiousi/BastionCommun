<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="text">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
      <?php foreach( $page->children() as $annonce ) : ?>
        <h2><a href="<?php echo $annonce->url() ?>"><?php echo $annonce->title() ?></a></h2>
      <?php endforeach; ?>
      <a class="btn btn-primary" href="<?php echo page('create')->url() ?>">Publier une annonce</a>
    </div>

  </main>



<?php snippet('footer') ?>