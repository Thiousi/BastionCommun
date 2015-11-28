<?php 

require 'comments.read.php';

if (count($comments['data'])):

	?>

	

	<?php 
	if ($site->user()):
		$checked = true;
		if ($page->followers() != ''):
			$followers = json_decode($page->followers());
			in_array($site->user()->username(), $followers) ? $checked = "checked" : $checked = false ; 
		endif;
		?>
		<span class="text-right pull-right toggle-comments">
			<label>Suivre la discussion </label>
			<input id="toggle-follow" class="bootstrap-toggle" <?php echo $checked ?> data-toggle="toggle" data-on=" " data-off=" " data-style="rounded-button" data-onstyle="default" type="checkbox">
		</span>
	<?php endif; ?>

<h3>Commentaires</h3>

	<ul id="comments">
		<?php foreach ($comments['data'] as $comment): ?>
			<li class="comment">
				<div class="comment-text">
					<div class="comment-meta">
						<small>
							<?= $comment['name'] ?>,
							<?= relativeDate($comment['date']); ?>
						</small>
					</div>
					<?= kirbytext($comment['text']) ?>
				</div>
				
			</li>
		<?php endforeach; ?>
	</ul>
	<?php 
endif;

