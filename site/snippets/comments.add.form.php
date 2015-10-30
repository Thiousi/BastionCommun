<?php 

if (c::get('comments.enabled')):

if($user = $site->user()):
	$userName = $user->userName();
	$userLongName = $user->firstName().' '.$user->lastName();
	$userMail = $user->email();
else :
	$userName = false;
	$userLongName = cookie::get('comments_author_name') ?: '' ;
	$userMail = cookie::get('comments_author_email') ?: '' ;
endif;
?>

<h3>Ajouter un commentaire :</h3>
<div id="addComment">
	<form class="add-comment-form smart-submit" data-reload="1" action="<?= url('smart-submit') ?>?handler=add-comment">

		<div class="input-group comment-field-name">
		  <span class="input-group-addon">Nom</span>
		  <input type="text" class="text required form-control"  name="name" id="name" placeholder="Nom" value="<?= $userLongName ?>">
		</div>
			
		<div class="input-group comment-field-mail">
		  <span class="input-group-addon">@</span>
		  <input type="email" class="text required email form-control"  name="email" id="email" placeholder="E-mail (ne sera pas affiché)" value="<?= $userMail ?>">
		</div>
			
		<textarea rows="5" placeholder="Commentaire" name="text" class="required" id="text"></textarea>

		<input type="submit" class="submit btn btn-success" value="<?= l::get('comments.send') ?: 'Envoyer' ?>">
		<input type="hidden" name="diruri" value="<?= $page->uri() ?>">
		<input type="hidden" name="userName" value="<?= $userName ?>">
		<?php 
		if ($site->user()):
			$checked = false;
			if ($page->followers() != ''):
				$followers = json_decode($page->followers());
				in_array($site->user()->uid(), $followers) ? $checked = "checked" : $checked = false ; 
			endif;
			?>
			<span class="text-right pull-right">
				<label>Suivre la discussion </label>
				<input id="toggle-follow" class="bootstrap-toggle" <?php echo $checked ?> data-toggle="toggle" data-on=" " data-off=" " data-style="rounded-button" data-onstyle="default" type="checkbox">
			</span>
		<?php endif; ?>

	</form>
</div>


<?php endif; ?>