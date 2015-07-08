<?php snippet('header') ?>

  <main class="main" role="main">
	<?php if($user = $site->user() and $user->hasRole('admin')): ?>	
		
		<div class="text text-center">
			
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
			
			<div class="cf">&nbsp;</div>
			
			<div>
				<?php if ($page = $user->page() && $site->page($user->page()) != false ) :
					$url = $user->page.'#edit';
					$texte = 'Modifier ma page';
				else:
					$url = page('create')->url().'?create=1&cat=artiste-resident&user='.$user->username();
					$texte = 'Créer ma page';
				endif; ?>
				<h2><a href="<?php echo $url ?>" class="btn btn-default btn-lg"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  <?php echo $texte ?></a></h2>
			</div>
			
			<div class="cf">&nbsp;</div>
			
			<div id="account-iframe-wrapper">
				<iframe id="account-iframe" class="autoHeight" src="panel/#/users/edit/<?php echo $site->user() ?>"></iframe>
			</div>
			
			</div>
		
	<?php endif; ?>

  </main>

<?php snippet('footer') ?>