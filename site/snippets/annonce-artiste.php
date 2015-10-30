<?php
$currentCategorie = $page->categorie();
$user = ($site->user()) ? $site->user()->username() : '' ;
?>


<main class="main viewMode <?php echo strtolower($currentCategorie) ?>" id="annonce" data-user="<?= $user ?>" data-uri="<?= $page->uri() ?>" role="main">
	<?php snippet('post-buttons', array('page' => $page)) ?>	
	<div class="container-fluid">
		<div class="row">
			<?php snippet('post-title', array('page' => $page)) ?>
			<?php snippet('post-meta', array('page' => $page)) ?>
		</div>
	
		<?php snippet('post-viewer', array('page' => $page)); ?>
		<?php snippet('post-text', array('page' => $page)); ?>
		<!-- no author -->
		<?php snippet('post-links', array('page' => $page)) ?>

	</div>
</main>

<!-- no comments -->
