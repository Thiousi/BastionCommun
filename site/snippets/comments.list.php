<?php 

require 'comments.read.php';

if (count($comments['data'])):

	?>
	<h3>Commentaires</h3>
	<?php 
	if ($site->user()):
		$checked = false;
		if ($page->followers() != ''):
			$followers = json_decode($page->followers());
			in_array($site->user()->uid(), $followers) ? $checked = "checked" : $checked = false ; 
		endif;
		?>
		<input id="toggle-follow" class="bootstrap-toggle" <?php echo $checked ?> data-toggle="toggle" data-on="Oui" data-off="Non" data-onstyle="default" type="checkbox"> Suivre la discussion.
	<?php endif; ?>
	<ul id="comments">
		<?php foreach ($comments['data'] as $comment):
			echo '<li>'.
			'
			<div class="comment-name">'.$comment['name'].'</div>
			<div class="comment-date">'.date(c::get('comments.date.format' ?: 'Y-m-d'), strtotime($comment['date'])).'</div>
			<div class="comment-text">'.kirbytext($comment['text']).'</div>
			</li>';
		endforeach; ?>
	</ul>
	<?php 
endif;

