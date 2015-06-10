<?php snippet('header') ?>

  <main class="main" role="main">

    <div class="text">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
      <?php foreach( $page->children() as $annonce ) : ?>
        <h2><a href="<?php echo $annonce->url() ?>"><?php echo $annonce->title() ?></a></h2>
      <?php endforeach; ?>
      <button class='btn btn-primary' data-toggle='modal' data-target='#modal-newname'>
        <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> 
        <span class='name'>Publier une annonce</span>
      </button>
    </div>

  </main>


<?php snippet('modal-newname') ?>
<?php snippet('footer') ?>