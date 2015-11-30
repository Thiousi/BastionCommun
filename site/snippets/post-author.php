<div id="post-author" class="row">
    <div class="col-xs-12 col-lg-8">
        <?php 
				$avatar = '';
				$authorName = 'Anonyme';
				if($page->author() != '') {
					$author = "".$page->author();
					$author =  $site->users()->get( $author );
					if($author) {
						$authorName = $author->firstName().' '.$author->lastName();
						$avatar = $author->avatar();
					}
				}
				$authorInitial = substr($authorName, 0,1);

				if($avatar != ''): ?>
						<img class="avatarImg" src="<?php echo thumb($avatar, array('width' => 30, 'height' => 30, 'crop' => true))->url() ?>" alt="avatar">
				<?php else: ?>
						<span class="avatarImg"><?php echo strtoupper($authorInitial); ?></span>
				<?php endif; ?>
			
        <span class="author-text">Posté par <?php echo $authorName ?> le <?php echo $page->date('%d %B %Y') ?></span>
    </div>
</div>