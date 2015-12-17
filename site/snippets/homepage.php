<?php snippet('navigation'); ?>

<div id="megabloc" class="accueil large">
	<div id="column-content" class="column">
		<div id="cover" style="background:url(<?php echo page('home')->images()->shuffle()->first()->url() ?>)">
			<div id="textAccueil" class="column">
				<?php echo page('home')->text()->kirbytext() ?>
			</div>
		</div>
		<div id="content" class="col-xs-12">
			<h2 class="subtitle">Dernières annonces publiées :</h2>		
			<div id="annonces-wrapper">
				<?php $results = page('annonces')->children()->sortBy('modified', 'desc'); ?>
				<?php snippet('liste-annonces', array ('results'=>$results)); ?>
			</div>
		</div>
	</div>
</div>