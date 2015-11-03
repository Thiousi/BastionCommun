<div id="admin" class="row">
	<?php if($user = $site->user()): ?>
		<span class="dropdown">
			<a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-expanded="false"></a>
			<ul class="dropdown-menu" role="menu">
				<li>
					<a href="<?php echo page('my-account')->url() ?>">Profile</a>			
				</li>
				<li>
					<a href="<?php echo $page->url() ?>?logout=1">Déconnexion</a>			
				</li>
			</ul>
		</span>
		<span class="new-comments dropdown">
			<a href="#" class="dropdown-toggle glyphicon glyphicon-comment" data-toggle="dropdown" role="button" aria-expanded="false"></a>
			<ul class="dropdown-menu" role="menu">
				<?php
				$newcoms = unserialize($user->newComments());
				foreach($newcoms as $comment => $num):
				?>
				<li>
					<a href="<?php echo page($comment)->url() ?>"><?php echo page($comment)->title().' ('.$num.')' ?></a>			
				</li>
				<?php endforeach; ?>
			</ul>
		</span>
	<?php else : ?>
		<span class="dropdown">
			<a href="#" class="dropdown-toggle signin glyphicon glyphicon-cog" data-toggle="dropdown" role="button" aria-expanded="false"></a>
			<ul class="dropdown-menu" role="menu">
				<?php snippet('signin'); ?>
			</ul>
		</span>
	<?php endif; ?>
	<span id="hide-menu" class="glyphicon glyphicon-remove"></span>
</div>

