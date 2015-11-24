<?php 

require 'comments.read.php';

if (count($comments['data'])):

	?>

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

