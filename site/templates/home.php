<?php snippet('header') ?>

<?php
if(get('username')) {
  // fetch the user by username and run the 
  // login method with the password
  if($user = $site->user(get('username')) and $user->login(get('password'))) {
    // redirect to the homepage 
    // if the login was successful
    //go('/');
  } else {
    // make sure the alert is being 
    // displayed in the template
    $error = true;
  }

} else if(get('logout')) {
  if($user = site()->user()) $user->logout();
  go($page->url());
}
?>

  <header class="header cf" role="banner">
		<?php //snippet('menu') ?>
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
		<div class="columns-header">
			<div class="column-header">
				<div id="connect-left">
					<li class="dropdown">
						 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							 <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<?php if($user = $site->user()):
								snippet('param');
							else :
								snippet('signin');
							endif;
							?>
						</ul>
					</li>
				</div>
				<h4>Bastion 14</h4>
			</div>
			<div class="column-header">
				<span id="arrow-slide-left" class="glyphicon glyphicon-chevron-left"></span>
				<h4>Petites annonces</h4>
				<span id="arrow-slide-right" class="glyphicon glyphicon-chevron-right"></span>
			</div>
			<div class="column-header"><h4>Annonces</h4></div>
		</div>
    <div id="megabloc">
      <div id="column-home" class="column">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-10">
              <h1 class="title"><?php echo page('home')->title() ?></h1>
							<?php echo page('home')->text()->kirbytext() ?>
						</div>
					</div>
				</div>
      </div>
      <div id="column-annonces" class="column">
				<?php snippet('annonces') ?>
      </div>
      <div id="column-annonce" class="column">
        aaa
      </div>
    </div>
  </div>

  <?php if($user = $site->user() and $user->hasRole('admin')): ?>

  <?php endif ?>

<?php snippet('footer') ?>