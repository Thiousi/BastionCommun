
<ul class="user-list ">
	<?php foreach($site->users() as $user):?>
	<li>
		<?php if($avatar = $user->avatar()): ?>
			<img src="<?php echo $avatar->url() ?>" alt="<?php echo "avatar de ".$user->firstName()." ".$user->lastName() ;?>">
		<?php endif ?>
		<?php echo $user->firstName() ;?>
		<?php echo $user->lastName() ;?>
		<?php echo $user->email() ;?>
	</li>
	<?php endforeach ?>
</ul>
