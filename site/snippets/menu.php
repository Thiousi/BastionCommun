
<nav role="navigation">
	<ul class="menu cf">
		<?php
		function nested($element){ 
			echo '<li>';
				echo "<span class='element'><a class='title' href='{$element->url()}'>{$element->title()->html()}</a></span>";
			echo '</li>';
		};

		foreach($pages->not('error', 'login', 'about') as $p){
			if($p->title('private') && $user = $site->user()){
				nested($p);
			} else {
				nested($p);
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
				<?php if($error): ?>
					<div class="alert"><?php echo page('login')->alert()->html() ?></div>
				<?php endif ?>
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

return function($site, $pages, $page) {

  // don't show the login screen to already logged in users
  if($site->user()) go('/');

  // handle the form submission
  if(r::is('post') and get('login')) {

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

  } else {
    // nothing has been submitted
    // nothing has gone wrong
    $error = false;  
  }

  return array('error' => $error);

};

?>



