<form action="" method="post" id="signin">
	<div class="form-group">
		<label class="sr-only" for="username"><?php echo page('login')->username()->html() ?></label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Pseudonyme">
	</div>
	<div class="form-group">
		<label class="sr-only" for="password"><?php echo page('login')->password()->html() ?></label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
	</div>
	<button class="btn btn-default" type="submit"><?php echo page('login')->button()->html() ?></button>
</form>