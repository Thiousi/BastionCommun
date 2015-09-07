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
			<!--
			<div id="column-home" class="column">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-10">
				  <h1 class="title"><?php echo page('home')->title() ?></h1>
								<?php echo page('home')->text()->kirbytext() ?>
							</div>
						</div>
					</div>
			</div>-->

	<div id="megabloc">
		<div id="column-annonces" class="column">
			<header class="column-header" role="banner">
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
			</header>
			<?php snippet('annonces') ?>
	</div>
		
	<div id="column-content" class="column">
	</div>

<!-- MODALS -->
<?php snippet('modal-delete') ?>
<?php snippet('modal-geopicker') ?>

  <?php if($user = $site->user() and $user->hasRole('admin')): ?>

  <?php endif ?>

<?php snippet('footer') ?>