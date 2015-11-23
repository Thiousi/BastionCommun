<?php
$currentCategorie = $page->categorie();
$user = ($site->user()) ? $site->user()->username() : '' ;
$sections = page('categories/'.$currentCategorie)->sections()->split();
?>

<main>
	<article class="main viewMode <?php echo strtolower($currentCategorie) ?>" id="annonce" data-user="<?= $user ?>" data-uri="<?= $page->uri() ?>" role="main">
		<?php snippet('post-buttons', array('page' => $page)) ?>	
		<div class="container-fluid">
			<?php
			foreach ( $sections as $section ) {
				if ($section != 'post-comments') {
					snippet($section, array('page' => $page));
				}
			}
			?>
			

		</div>
	</article>

	<?php 
	if (in_array('post-comments', $sections)) :
		snippet('post-comments', array('page' => $page)) ;
	endif; ?>

</main>
