<?php 

require 'comments.read.php';

if (count($comments['data'])):

	?>

	<h3>Commentaires</h3>

	<ul id="comments">
		<?php foreach ($comments['data'] as $comment):
			echo '<li class="comment">'.
			'
			<div class="comment-meta"><u>'.$comment['name'].'</u> le '.date(c::get('comments.date.format' ?: 'D-M-Y'), strtotime($comment['date'])).'</div>
			<div class="comment-text">'.kirbytext($comment['text']).'</div>
			</li>';
		endforeach; ?>
	</ul>
	<?php 
endif;

