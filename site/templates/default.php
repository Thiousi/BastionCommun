<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-10">
          <?php echo page('home')->text()->kirbytext() ?>
        </div>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>