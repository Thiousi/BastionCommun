<?php
$user = ($site->user()) ? $site->user()->username() : '' ;
?>


<main>
	<article class="main" data-user="<?= $user ?>" data-uri="<?= $page->uri() ?>" role="main">
		
		<div class="container-fluid">
			<?php if($user = $site->user()): ?>	
				<div id="top-bar">
					<div id="buttons-left">
						<span id="category-label" style="background-color:#FF6B6B">
							<h3><?php echo $page->title()->html() ?></h3>
						</span>
					</div>
				</div>

				<?php if ($page = $user->page() && $site->page($user->page()) != false ) :
					$url = $user->page.'#edit';
					$texte = 'Modifier ma page';
					?>
					<a href="<?php echo $url ?>" id="btn-my-account" class="btn btn-lg btn-big toolbox" data-width="100%">
						<span class='glyphicon glyphicon-user' aria-hidden='true'></span>
						<span class="name"> <?php echo $texte ?></span>
					</a>
					<?php
				else:
										?>
					<a href="#" id="button-create-user-page" class="btn btn-lg btn-big toolbox" data-username="<?= $site->user() ?>" data-width="100%">
						<span class='glyphicon glyphicon-user' aria-hidden='true'></span>
						<span class="name">Créer ma page</span>
					</a>
					<?php
				endif; ?>
				

				<div class="cf">&nbsp;</div>

				<div id="account-iframe-wrapper">
					<iframe id="account-iframe" class="autoHeight" src="/BastionCommun/panel/#/users/edit/<?php echo $site->user() ?>"></iframe>
				</div>

			<?php endif; ?>
		</div>
		
	</article>
	
</main>

