<header id="navbar" class="column-header" role="banner">
	<a href="<?php echo $site->url() ?>" class="title" alt="home link"><h1 class="site-name">Bastion Commun</h1></a>
	<?php  
	if($user = $site->user()): 
	$newcoms = array();
	if ( unserialize($user->newComments()) ) :
		  $newcoms = array_reverse(unserialize($user->newComments())); 
	endif;
		$comsNum = 0;
		foreach($newcoms as $comment => $num):
			$comsNum += intval($num);
		endforeach; 
		?>
		<span id="profileButton" class="dropdown pull-left">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<div class="glyphicon glyphicon-user"></div>
				<?php if($comsNum >= 1){ echo '<div id="newComs">'.$comsNum.'</div>'; }?> 
			</a>
			<ul class="dropdown-menu tooltipUp" role="menu">
				<li>
					<a class="ajaxed" data-uri="<?php echo page('my-account')->uri() ?>" data-snippet="my-account" href="<?php echo page('my-account')->url() ?>">Mon profil</a>	
				</li>
				<li>
					<a class="ajaxed" data-uri="<?php echo page('add-user')->uri() ?>" data-snippet="add-user" href="<?php echo page('add-user')->url() ?>">Ajouter un membre</a>	
				</li>
				<li>
					<a href="<?php echo $page->url() ?>?logout=1">Déconnexion</a>           
				</li>

				<?php if($comsNum >= 1): ?>
				<li role="separator" class="divider"></li>
					<?php 
					foreach($newcoms as $comment => $num):
							$url = page($comment)->url();
							$titre = page($comment)->title();
							switch ($num):
								case 0 :
									//echo "<a href='$url'>$titre</a>";
									break;
								case 1 :
									echo "<li class='commentaire-alert' data-uri='$comment' data-num='$num'><a href='$url'>Un nouveau sur <strong>$titre</strong></a><li>";
									break;
								default :
									echo "<li class='commentaire-alert' data-uri='$comment' data-num='$num'><a href='$url'>$num nouveaux sur <strong>$titre</strong></a></li>";
									break;
							endswitch;      
					endforeach;
				endif; ?>
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
	<span id="hide-menu" class="glyphicon glyphicon-chevron-right"></span>
</header>