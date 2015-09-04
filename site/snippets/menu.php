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
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav nav-justified">
				<li class="active">
					<a hraf="<?php echo $site->url() ?>">Bastion Commun</a>
				</li>
				<li>
					<a hraf="#">Petites annonces</a>
				</li>
				<li>
					<a hraf="#">Annonce</a>
				</li>
        <?php
        /*foreach($pages->visible()->not('error', 'login', 'about') as $p){
          e($p->isAncestorOf( $page ), '<li class="active">', '<li>');
            echo "<a href='{$p->url()}'>{$p->title()}</a>";
          echo '</li>';
        }*/
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
             <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <?php if($user = $site->user()):
              snippet('param');
            else :
              snippet('signin');
            endif;
            ?>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



