<?php snippet('navigation'); ?>

<div id="megabloc" class="accueil large">
	<div id="column-content" class="column">
		<div id="cover"></div>
		<div id="content" class="col-xs-12">
			<div id="annonces-wrapper">
				<?php $results = page('annonces')->children()->sortBy('modified', 'desc'); ?>
				<?php snippet('liste-annonces', array ('results'=>$results)); ?>
			</div>
		</div>
	</div>
</div>