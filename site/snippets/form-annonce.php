<form action="<?php echo page('smart-submit')->url().'?handler=edit' ?>" method="post" id="smart-submit">
	<h4>
		<button type="submit" name="submit" class="btn btn-success btn-xs submitButton editOnly"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Enregistrer</button> 
		<button type="submit" name="submit" class="btn btn-warning btn-xs cancelButton editOnly"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Annuler</button> 
		<button class="btn btn-primary btn-xs button editButton viewOnly" data-toggle="button"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>  Modifier</button> 
		<button type="button" class="btn btn-danger btn-xs viewOnly" data-toggle="modal" data-target="#modal-delete">Supprimer</button>	
	</h4>
	
	<!-- HIDDEN FORM -->
	<div id="hiddenForm" class="hidden">
		titre
		<textarea id="hidden-title" name="_title"></textarea>
		private
		<textarea id="hidden-private" name="_private"></textarea>
		categorie
		<textarea id="hidden-categorie" name="_categorie"></textarea>
		informations
		<textarea id="hidden-informations" name="_informations"></textarea>
		description
		<textarea id="hidden-description" name="_description"></textarea>
		<textarea name="uri"><?php echo $page->uri() ?></textarea>
	</div>

</form>