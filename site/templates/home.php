<?php snippet('header') ?>

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

<?php
/*--------------------------------
           FUNCTIONS
---------------------------------*/

function get_Date($date, $besoin) {
	setlocale (LC_TIME, 'fr_FR','fra');
	$hour = strftime("%k" ,strtotime($date)).'h'.strftime("%M" ,strtotime($date)); 
	$day = strftime("%A" ,strtotime($date)); 
	$dayNum = strftime("%d" ,strtotime($date)); 
	$month = strftime("%B" ,strtotime($date)); 
	$monthAbv = strftime("%b" ,strtotime($date)); 
	$monthNum = strftime("%m" ,strtotime($date)); 
	$year = strftime("%Y" ,strtotime($date)); 

	if($besoin == 'rdv'){
		return $dayNum.' '.$month;
	} else if($besoin == 'periode') {
		return $dayNum.' '.$month;
	}
}

?>


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
				<!-- <div id="hide-menu" class="glyphicon glyphicon-remove"></div> -->
				<?php snippet('admin') ?>
				<?php snippet('menu') ?>
			</header>

			<?php if( $site->user() ): ?>
				<div id="addNew" class="container-fluid toolbox usersOnly">
					<div class="row">
						<div class="col-xs-12 elem">
							<button id="btn-new" class='btn btn-lg' data-width='100%'>
								<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> 
								<span class='name'> Nouvelle annonce</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif;?>

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



