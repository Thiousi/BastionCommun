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
			<?php 
			$newcoms = array_reverse(unserialize($user->newComments())); 
			$comNum = 0;
			foreach($newcoms as $comment => $num):
				$comNum += $num;
			endforeach; ?>
			<a href="#" class="dropdown-toggle glyphicon glyphicon-comment" data-toggle="dropdown" role="button" aria-expanded="false"><span class="new-comments-num"><?= $comNum ?></span></a>
			<ul class="dropdown-menu" role="menu">
				<?php
				foreach($newcoms as $comment => $num):
				?>
				<li data-uri="<?= $comment ?>">
					<?php
					$url = page($comment)->url();
					$titre = page($comment)->title();
					switch ($num):
						case 0 :
							//echo "<a href='$url'>$titre</a>";
							break;
						case 1 :
							echo "<a href='$url'>Un nouveau sur <strong>$titre</strong></a>";
							break;
						default :
							echo "<a href='$url'>$num nouveaux sur <strong>$titre</strong></a>";
							break;
					endswitch;		
					?>
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

