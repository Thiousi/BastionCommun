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
				<h4>PETITES ANNONCES</h4>
				<?php if( $site->user() ): ?>
					<div class="container-fluid toolbox usersOnly">
						<div class="row">
							<div class="col-xs-12">
								<button id="btn-new" class='btn btn-info' data-width='100%'>
									<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> 
									<span class='name'> Déposer une annonce</span>
								</button>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php snippet('annonces') ?>
			</header>
			<div id="liste-annonces" class="container-fluid">
				<?php snippet('liste-annonces', array ('results'=>$results)); ?>
			</div>
		</div>
		<div id="column-content" class="column">
			<div class="col-xs-12">
  				<h1 class="title"><?php echo page('home')->title() ?></h1>
  				<div class="about">
					<?php echo page('home')->text()->kirbytext() ?>
				</div>
			</div>
		</div>
	</div>

  <?php if($user = $site->user() and $user->hasRole('admin')): ?>

  <?php endif ?>

<?php snippet('modal-geopicker') ?>
<?php snippet('modal-delete') ?>
<?php snippet('footer') ?>