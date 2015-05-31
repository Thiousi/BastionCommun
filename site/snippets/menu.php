
<nav role="navigation">
	<ul class="menu cf">
		<?php
		if($user = $site->user()){
			foreach($pages->visible()->not('error', 'login', 'about') as $p){
				echo '<li>';
					echo "<span class='element'><a class='title' href='{$p->url()}'>{$p->title()->html()}</a></span>";
				echo '</li>';
			}
		}
		?>
	</ul>

	<div id="interface">
		<?php if($user = $site->user()): ?>
			<div id="paramButton" class="panelButton icon-cog"></div>
			<div class="paramPanel panel">
				<?php snippet('param') ?>
			</div>
		<?php else: ?>
			<div id="loginButton" class="panelButton icon-key"></div>
			<div class="loginPanel panel">
				<form method="post">
					<div>
						<label for="username"><?php echo page('login')->username()->html() ?></label>
						<input type="text" id="username" name="username">
					</div>
					<div>
						<label for="password"><?php echo page('login')->password()->html() ?></label>
						<input type="password" id="password" name="password">
					</div>
					<div>
						<input class="button" type="submit" name="login" value="<?php echo page('login')->button()->html() ?>">
					</div>
				</form>
			</div>
		<?php endif ?>
	</div>

</nav>

<?php 
	if ( kirby()->request()->body() and get('login') ) {
		// fetch the user by username and run the 
		// login method with the password
		if($user = $site->user(get('username')) and $user->login(get('password'))) {
			// redirect to the homepage 
			// if the login was successful
			go('/');
		} else {
			// make sure the alert is being 
			// displayed in the template
			$error = true;
		}
	}
?>



