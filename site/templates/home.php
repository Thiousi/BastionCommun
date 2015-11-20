<?php snippet('header');

// CONNECTION
if(get('username')) {
  if($user = $site->user(get('username')) and $user->login(get('password'))) {
		//go('/');
  } else {

  }
} else if(get('logout')) {
  if($user = site()->user()) $user->logout();
  go($page->url());
}

// LISTE DES ANNONCES
$results = page('annonces')->children()->sortBy('modified', 'desc');

if ( kirby()->request()->path()->nth(0) == "annonces" ){ $modeAnnonce = true; } else { $modeAnnonce = false; }	
?>

	<div id="megabloc" class="showContent <?php if(!$modeAnnonce){echo 'homepage';} ?>">

		<div id="column-annonces" class="column">
			<div id="annonces-wrapper" class="container-fluid">
				<header class="column-header" role="banner">
					<?php snippet('admin') ?>
					<?php snippet('menu') ?>
					<?php if( $site->user() ): ?>
						<button id="btn-new" class="btn btn-lg toolbox usersOnly" data-width='100%' data-toggle="modal" data-target="#modal-create" aria-hidden='true' title="Nouvelle annonce">
							<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> 
							<span class='name'> Nouvelle annonce</span>
						</button>	
					<?php endif;?>
				</header>

				<?php snippet('liste-annonces', array ('results'=>$results)); ?>
			</div>
		</div>

		<div id="column-content" class="column">
			<div id="show-menu" class="glyphicon glyphicon glyphicon-list"></div>
			<div id="loadingContainer" class="hidden">
				<div id="loading" class="glyphicon glyphicon-refresh"></div>
			</div>
			<div id="content" class="col-xs-12">
				<?php
				if ( $modeAnnonce ):
					snippet('annonce', array('page'=>page("annonces/".kirby()->request()->path()->nth(1))));
				else : ?>
					<div id="homeBG">
						<h1 class="title"><?php echo page('home')->title() ?></h1>
	  					<div class="about">
							<?php echo page('home')->text()->kirbytext(); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>

		
	</div>

  <?php if($user = $site->user() and $user->hasRole('admin')): ?>
  <?php endif ?>

<?php snippet('modals') ?>
<?php snippet('footer') ?>



