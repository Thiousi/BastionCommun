<?php snippet('header') ?>

  <main class="main" role="main">
	<?php if($user = $site->user() and $user->hasRole('admin')): ?>	
		<button>Ajouter un membre</button>
	<?php endif; ?>

    <div class="text">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <hr>

    <?php snippet('membres') ?>

  </main>

<?php snippet('footer') ?>