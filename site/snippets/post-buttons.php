<?php
$currentCategorie = $page->categorie();
$currentCategorieTitle = page('categories/'.$currentCategorie)->title();
$categoryColor = page('categories/'.$currentCategorie)->bgcolor();
# mise au singulier
$splited = explode(' ', $currentCategorieTitle);
foreach ($splited as $sKey => $sVal) {
	$splited[$sKey] = rtrim($sVal, 's');
}
$currentCategorieTitle = implode(' ', $splited);
$username = ($site->user()) ? $site->user()->username() : '' ;
$userCanEdit = ($site->user() && ( $site->user()->hasRole('admin') || $username == $page->author() )) ? true : false ;
?>

<div id="top-bar">
	<div id="buttons-left">
		<span id="category-label" style="background-color:<?php echo $categoryColor ?>">
			<h3><?php echo $currentCategorieTitle ?></h3>
		</span>
		<?php $page->private()->bool() ? $checked = "checked" : $checked = false ; 
		if ($userCanEdit): ?>
			<span id="public-private">
				<input id="toggle-public" class="bootstrap-toggle" <?php echo $checked ?> data-toggle="toggle" data-on="Privé" data-off="Public" data-onstyle="default" type="checkbox" data-populate="private" disabled>
			</span>
		<?php endif; ?>
	</div>
	<div id="buttons-right" class="text-right pull-right usersOnly">
		<?php if ($userCanEdit): ?>
		<form action="<?php echo page('smart-submit')->url().'?handler=edit' ?>" method="post" class="smart-submit">

			<div class="viewOnly">
				<button class="btn btn-success button editButton glyphicon glyphicon-pencil" type="button"  aria-hidden='true' data-toggle="tooltip" data-placement="bottom" title="Modifier"></button> 
			</div>

			<div class="editOnly">
					<button type="submit" name="submit" class="btn btn-success submitButton glyphicon glyphicon-ok" aria-hidden='true' data-toggle="tooltip" data-placement="bottom" title="Valider"></button> 

					<button type="button" name="Cancel" class="btn btn-info cancelButton glyphicon glyphicon-remove" aria-hidden='true' data-toggle="tooltip" data-placement="bottom" title="Annuler"></button> 

					<button type="button" class="btn btn-danger glyphicon glyphicon-trash" data-toggle="modal" data-target="#modal-delete" aria-hidden='true' data-toggle="tooltip" data-placement="bottom" title="Supprimer"></button>	

			</div>
			
			<!-- HIDDEN FORM -->
			<div id="hiddenForm" class="hidden">
				titre
				<textarea id="hidden-title" name="_title"></textarea>
				private
				<textarea id="hidden-private" name="_private"></textarea>
				informations
				<textarea id="hidden-informations" name="_informations"></textarea>
				description
				<textarea id="hidden-description" name="_description"></textarea>
				<textarea name="uri"><?php echo $page->uri() ?></textarea>
			</div>

		</form>
		<?php endif; ?>
	</div>
</div>
