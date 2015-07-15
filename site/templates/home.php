<?php snippet('header') ?>

  <header class="header cf" role="banner">
		<?php snippet('menu') ?>
	</header>

	<div id="cover">
		<?php if ($page->cover() != "" ): ?>
			<div id="welcome">BIENVENUE AU BASTION 14</div>
			<figure id="cover-img">
				<img src="<?php echo $page->image($page->cover())->url() ?>">
			</figure>
		<?php endif ?>
	</div>

	<div id="megabloc-wrapper">
    <div id="megabloc">
      <div id="column-home" class="column">
        <main class="main" role="main">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-10">
                <?php echo page('home')->text()->kirbytext() ?>
              </div>
            </div>
          </div>
        </main>
      </div>
      <div id="column-annonces" class="column">
        <iframe src="<?php echo page('annonces')->url() ?>"></iframe> 
      </div>
      <div id="column-annonce" class="column">
        <iframe src=""></iframe> 
      </div>
    </div>
  </div>

  <?php if($user = $site->user() and $user->hasRole('admin')): ?>

  <?php endif ?>

<?php snippet('footer') ?>