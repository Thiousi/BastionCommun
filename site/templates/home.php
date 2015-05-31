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

	    <section id="prez">
			<h1><?php echo $page->title()->html() ?></h1>
	    	<?php echo $page->text()->kirbytext() ?>
	    <section>

		<section id="membres">
			<h1>Membre</h1>
			<?php snippet('users') ?>
		</section>

		<section id="actu">
			<h1>Actualité</h1>

		</section>

		<?php if($user = $site->user() and $user->hasRole('admin')): ?>
			This part of the page is only visible for clients with the role Admin
		<?php endif ?>


	</main>

<?php snippet('footer') ?>