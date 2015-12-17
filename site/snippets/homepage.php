<?php snippet('navigation'); ?>

<div id="megabloc" class="accueil large">
	<div id="column-content" class="column">
		<div id="cover">
			<?php snippet('home-slider', array('page'=>$page)); ?>
		</div>
		<div id="annonces" class="col-xs-12">
			<h2 class="subtitle">Dernières annonces publiées :</h2>		
			<div id="annonces-wrapper">
				<?php $results = page('annonces')->children()->sortBy('modified', 'desc'); ?>
				<?php snippet('liste-annonces', array ('results'=>$results)); ?>
			</div>
		</div>
	</div>
</div>