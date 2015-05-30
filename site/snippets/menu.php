
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
			<button id="logout" class="log">
				<a href="<?php echo url('logout') ?>">Logout</a>
			</button>
	        <button id="button">Settings</button>
	        <div id="panel">Settings</div>
		<?php else: ?>
			<button id="login" class="log">
				<a href="<?php echo url('login') ?>">Login</a>
			</button>
		<?php endif ?>
	</div>

</nav>

<!--
<?php if($user = $site->user()): ?>
<form method="get" action="<?php echo $page->url() ?>">
    <input class="input" type="text" name="hoey" value="">
    <input class="btn-submit" type="submit" value="Ajouter">
</form>
<?php endif ?>

-->





