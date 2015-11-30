<?php snippet('header'); ?>
<?php $results = page('annonces')->children()->sortBy('modified', 'desc'); ?>


<?php snippet('navigation'); ?>


<div id="megabloc" class="showContent">
	<div id="column-gauche" class="column">
		<div id="annonces-wrapper" class="container-fluid">
			<?php snippet('menu') ?>
			<?php if( $site->user() ): ?>
			<button id="btn-new" class="btn btn-lg toolbox usersOnly" data-width='100%' data-toggle="modal" data-target="#modal-create" aria-hidden='true' title="Nouvelle annonce">
				<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> 
				<span class='name'> Nouvelle annonce</span>
			</button>   
			<?php endif;?>
			<?php snippet('liste-annonces', array ('results'=>$results)); ?>
		</div>
	</div>

	<div id="column-content" class="column">
		<div id="loadingContainer" class="hidden">
			<div id="loading" class="glyphicon glyphicon-refresh"></div>
		</div>
		<div id="content" class="col-xs-12">
			<?php snippet('annonce', array('page'=>$page)); ?>
		</div>
	</div>

	
</div>

<?php
snippet('modals');
snippet('footer');
?>
