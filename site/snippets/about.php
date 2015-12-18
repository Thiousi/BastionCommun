<?php $annonces = page('annonces')->children()->sortBy('title', 'asc'); 
?>


<div id="about" class="closed column" style="background-color:<?php echo page('about')->bgcolor();?>">
	<div class="container">
		<section>
			<div class="row">
				<div class="col-xs-12">
					<h2><?php echo page('about')->title() ?></h2>
				</div>       
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 first-bloc">
					<?php snippet('about-slider', array('page'=>page('about'))); ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<?php echo page('about')->bastion()->kirbytext() ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 first-bloc">
					<?php echo page('about')->bastionCommun()->kirbytext() ?>
				</div>
				<div class="col-xs-12 col-sm-6">   
					<div class="row">
						<div class="col-xs-12 col-md-6">    
							<h4>Membres :</h4>
							<ul> 
							<?php foreach($annonces as $annonce):          
								$private = $annonce->private(); 
								$categorie = $annonce->categorie();
								if ($categorie == "artiste-resident"):								
									if( $private=='false' ) :
										echo '<li><a href="'.$annonce->url().'">'.$annonce->title().'</a></li>';
									elseif( $private=='true' && $user = $site->user() ):
										echo '<li><a href="'.$annonce->url().'">'.$annonce->title().'</a></li>';
									endif;
								endif;
							endforeach; ?> 
							</ul>          
						</div>             
						<div class="col-xs-12 col-md-6 colophon">
							<h4>Colophon :</h4>                
							<?php echo page('about')->colophon()->kirbytext() ?>
						</div>             
					</div>
				</div>
			</div>
		</section>
		<?php /* if($user = $site->user()): ?>
			<section>
				<div class="row">
					<div class="col-xs-12">
						<h2><?php echo page('notice')->title() ?></h2>
					</div>     
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 first-bloc">
						<?php echo page('notice')->bienvenue()->kirbytext() ?>
					</div>
					<div class="col-xs-12 col-sm-6">
						<?php echo page('notice')->utilisation()->kirbytext() ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 first-bloc">
						<img src="<?php echo page('notice')->image('new.png')->url() ?>">					
					</div>
					<div class="col-xs-12 col-sm-6">
						<?php echo page('notice')->articles()->kirbytext() ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 first-bloc">
						<img src="<?php echo page('notice')->image('') ?>">					
					</div>
					<div class="col-xs-12 col-sm-6">
						<?php echo page('notice')->commentaires()->kirbytext() ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 first-bloc">
						<img src="<?php echo page('notice')->image('') ?>">					
					</div>
					<div class="col-xs-12 col-sm-6">
						<?php echo page('notice')->pourlesadmins()->kirbytext() ?>
					</div>
				</div>
			</section>
		<?php endif; */ ?>
	</div>
	<div class="closeButton glyphicon glyphicon-remove"></div>
</div>
