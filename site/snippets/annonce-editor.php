<?php if ($site->user()): ?>
<form action="<?php echo page('smart-submit')->url().'?handler=edit' ?>" data-response-div="annonce" method="post" class="smart-submit">

	<div class="viewOnly">
		<button class="btn col-xs-12 btn-primary btn-lg button editButton" data-toggle="button"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>  Modifier</button> 
	</div>

	<div class="btn-group btn-group-justified" role="group">
		<div class="btn-group editOnly" role="group">
			<button type="submit" name="submit" class="btn btn-success submitButton"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Enregistrer</button> 
		</div>
		<div class="btn-group editOnly" role="group">
			<button type="submit" name="submit" class="btn btn-primary cancelButton"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Annuler</button> 
		</div>
	</div>
	<button type="button" class=" editOnly btn btn-danger col-xs-12" data-toggle="modal" data-target="#modal-delete"><span class='glyphicon glyphicon-trash' aria-hidden='true'> Supprimer l'annonce</button>	
	
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
<?php endif; ?>