<?php snippet('header') ?>

	<div id="cover">
		<?php if ($page->cover() != "" ): ?>
			<div id="welcome">BIENVENUE AU BASTION 14</div>
			<figure id="cover-img">
				<img src="<?php echo $page->image($page->cover())->url() ?>">
			</figure>
		<?php endif ?>
	</div>

	<main class="main" role="main">

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-5">
					<h3>
						<small>Bastion 14</small><br>
						Le Bastion 14 est une ancienne construction militaire faisant partie des fortifications de 1870. Situé rue du Rempart, derrière la gare centrale de Strasbourg, il accueille, depuis sa réouverture en 2003, une cinquantaine d’artistes. La sélection des résidents vise une représentativité des artistes par rapport à la création contemporaine strasbourgeoise dans sa diversité. Un atelier « résidences artistiques » y est également aménagé, permettant d’accueillir des artistes étrangers.
					</h3>
				</div>
				<div class="col-xs-2"></div>
				<div class="col-xs-5">
					<h3>
						<small>Bastion Commun</small><br>
						Bastion Commun est une plateforme d'échange pour les artistes résidents aux Bastion 14. Le cœur de son fonctionnement est un système de petites annonces.
					</h3>
					<h3>
						Bastion Commun est aussi là pour tenir au courant des activités du Bastion 14 et de ses résidents.
					</h3>
				</div>
			</div>
		</div>

		<?php if($user = $site->user() and $user->hasRole('admin')): ?>
			
		<?php endif ?>


	</main>

<?php snippet('footer') ?>