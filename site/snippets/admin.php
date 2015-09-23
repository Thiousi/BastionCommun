<div id="admin">
	<?php if($user = $site->user()): ?>
		<span class="signin dropdown right">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<span class="glyphicon glyphicon-user"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					<a href="<?php echo page('my-account')->url() ?>">Profile</a>			
				</li>
				<li>
					<a href="<?php echo $page->url() ?>?logout=1">Déconnexion</a>			
				</li>
			</ul>
		</span>
	<?php else : ?>
		<span class="dropdown right">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<span class="signin glyphicon glyphicon-cog"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<?php snippet('signin'); ?>
			</ul>
		</span>
	<?php endif; ?>
</div>

<span id="show-menu" class="glyphicon glyphicon-chevron-left"></span>
