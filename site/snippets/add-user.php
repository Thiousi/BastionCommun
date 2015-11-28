<?php
$user = ($site->user()) ? $site->user()->username() : '' ;
?>


<main>
	<article class="main" data-user="<?= $user ?>" data-uri="<?= $page->uri() ?>" role="main">
		
		<div class="container-fluid">
			<?php if($user = $site->user() and $user->hasRole('admin')): ?>	
				<div id="top-bar">
					<div id="buttons-left">
						<span id="category-label" style="background-color:#FF6B6B">
							<h3><?php echo $page->title()->html() ?></h3>
						</span>
					</div>
				</div>

				<div id="account-iframe-wrapper">
					<iframe id="account-iframe" class="autoHeight" src="/BastionCommun/panel/#/users/add"></iframe>
				</div>

			<?php endif; ?>
		</div>
		
	</article>
	
</main>

