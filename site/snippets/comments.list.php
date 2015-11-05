<?php 

require 'comments.read.php';

if (count($comments['data'])):

	?>

	<h3>Commentaires</h3>

	<ul id="comments">
		<?php foreach ($comments['data'] as $comment): ?>
		<?php //$date = strftime(c::get('comments.date.format' ?: '%A %d %B %Y'), strtotime($comment['date'])) ?>
			<li class="comment">
				<div class="comment-meta">
					<u><?= $comment['name'] ?></u> —
					<?= relativeDate($comment['date']); ?>
				</div>
			<div class="comment-text"><?= kirbytext($comment['text']) ?></div>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php 
endif;

