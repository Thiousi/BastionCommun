
<h1>Login</h1>

<?php if($error): ?>
	<div class="alert"><?php echo $pages->find('login')->alert()->html() ?></div>
<?php endif ?>

<form method="post">
	<div>
		<label for="username"><?php echo $pages->find('login')->username()->html() ?></label>
		<input type="text" id="username" name="username">
	</div>
	<div>
		<label for="password"><?php echo $pages->find('login')->password()->html() ?></label>
		<input type="password" id="password" name="password">
	</div>
	<div> 
		<input type="submit" name="login" value="<?php echo $pages->find('login')->button()->html() ?>">
	</div>
</form>

