<?php snippet('header') ?>

<!--
<svg class="defs-only">
  <filter id="monochrome" color-interpolation-filters="sRGB"
          x="0" y="0" height="100%" width="100%">
    <feColorMatrix type="matrix"
      values="0.95	0 0 0 1 
              0.85	0 0 0 0.13  
              1		0 0 0 0 
              0		0 0 0.7 0" />
  </filter>
</svg>
-->



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

		<div id="column-annonces" class="column  container-fluid">
			<header class="column-header" role="banner">
				<div id="hide-menu" class="glyphicon glyphicon-remove"></div>
				<?php snippet('admin') ?>
				<?php snippet('menu') ?>
				<?php if( $site->user() ): ?>
					<button id="btn-new" class='btn btn-lg toolbox usersOnly' data-width='100%'>
						<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> 
						<span class='name'> Nouvelle annonce</span>
					</button>
				<?php endif;?>
			</header>

			<?php snippet('liste-annonces', array ('results'=>$results)); ?>

		</div>

		<div id="column-content" class="column">
			<div id="show-menu" class="glyphicon glyphicon-chevron-left"></div>
			<div class="col-xs-12">
				<?php
				if ( kirby()->request()->path()->nth(0) == "annonces" ):
					snippet('annonce', array('page'=>page("annonces/".kirby()->request()->path()->nth(1))));
				else :
					?>
						<h1 class="title"><?php echo page('home')->title() ?></h1>
  					<div class="about">
					<?php 
					echo page('home')->text()->kirbytext();
				endif;
  					?>
					</div>
			</div>
		</div>


		
	</div>

  <?php if($user = $site->user() and $user->hasRole('admin')): ?>
  <?php endif ?>

<?php snippet('modals') ?>
<?php snippet('footer') ?>



