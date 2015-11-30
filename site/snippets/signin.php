<form action="<?= $site->url(); ?>/" method="post" id="signin">
	<div class="form-group">
		<label class="sr-only" for="username">Pseudo</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Pseudonyme">
	</div>
	<div class="form-group">
		<label class="sr-only" for="password">Mot de passe</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
	</div>
	<button class="btn btn-default" type="submit">Go !</button>
</form>