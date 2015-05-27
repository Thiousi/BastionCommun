<?php snippet('header') ?>

	 <main class="main" role="main">
		<h1><?php echo $page->title()->html() ?></h1>
		<?php if($user = $site->user() and $user->hasRole('admin')): ?>
			This part of the page is only visible for clients with the role Admin
		<?php endif ?>
		<?php if($user = $site->user() and $user->hasRole('admin')):?>
			<form autocomplete="off" class="form" method="post" action="/panel/app/controllers/api/pages/<?php echo kirby()->request()->path();?>">

			<label class="label" for="form-field-title">Title</label>
			<input autocomplete="on" class="input" id= "form-field-title" name="title" required="" type="title" value="<?php echo $page->title() ?>">

			<input type="submit" value="Save">

			</form>
		<?php endif;?> 
	</main>
		<div>
			<div onclick="">
			</div>
			
		</div>
<?php snippet('footer') ?>