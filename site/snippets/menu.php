
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bastion Commun</a>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
          if($user = $site->user()){
            foreach($pages->visible()->not('error', 'login', 'about') as $p){
              e($p->isAncestorOf( $page ), '<li class="active">', '<li>');
                echo "<a href='{$p->url()}'>{$p->title()}</a>";
              echo '</li>';
            }
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
             <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <?php snippet('param') ?>
          </ul>
        </li>
      </ul>

      <!--<div id="interface">
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
    -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
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



