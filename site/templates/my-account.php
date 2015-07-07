<?php snippet('header') ?>

  <main class="main" role="main">
	<?php if($user = $site->user() and $user->hasRole('admin')): ?>	
		
		<div class="text text-center">
			
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
			
			<div id="account-iframe-wrapper">
				<iframe id="account-iframe" class="autoHeight" src="panel/#/users/edit/<?php echo $site->user() ?>"></iframe>
			</div>
			
			</div>
		
	<?php endif; ?>

  </main>

<?php snippet('footer') ?>