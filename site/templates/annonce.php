<?php snippet('header') ?>
<?php
$currentCategorie = $page->categorie();
$currentCategorieTitle = page('categories/'.$currentCategorie)->title();
?>
<main class="main viewMode" role="main">
  <div class="container-fluid">
		

			
		<div class="row">
			<div class="col-xs-8">
				<!-- NAME & DATE -->
				<div id="meta">
					<h4><small>
						<a href="<?php echo page('annonces')->url() ?>">Annonces</a> > <a href="<?php echo page('annonces')->url() ?>?cat=<?php echo $currentCategorie ?>"><?php echo $currentCategorieTitle ?></a> > <?php echo $page->title() ?>
					</small></h4>
				</div>
			</div>
			<div class="col-xs-4 text-right">
				<!-- VALIDATION BUTTON -->
				<div id="controlButtons" class="usersOnly pull-right">
					<?php snippet('form-annonce', array('page' => $page)) ?>
				</div>
				<h4 class="pull-right"><small>
					Posté par <?php echo $page->author() ?>
					le <?php echo $page->date('d/m/Y') ?>
				</small></h4>
			</div>    
		</div>

		<div class="row">
			<div class="col-xs-8">
				
				<!-- TITLE -->
				<div id="title">
					
					<h2 id="field-title">
						<input id="toggle-public" checked data-toggle="toggle" data-on="Privé" data-off="Public" data-onstyle="default" data-size="" type="checkbox" data-populate="private" disabled>
						<span class="simpleEdit" data-populate="title"><?php echo $page->title() ?></span>
						
					</h2>
				</div>
			</div>
			<div class="col-xs-4 text-right">
				<div>
					<h2><?php echo $currentCategorieTitle ?></h2>
				</div>
			</div>
		</div>
			
		<div class="clearfix">&nbsp;</div>

		<div class="row">
			<div class="col-xs-12">
				<!-- VIEWER -->
				<?php snippet('viewer', array('page' => $page)); ?>
			</div>
		</div>

    <div class="clearfix">&nbsp;</div>
    
    <div class="row">
      
      <!-- MAIN TEXT -->
      <div id="description" class="col-xs-8">
        <div id="field-description" class="fullEdit" data-placeholder="Texte de l'annonce"><?php echo $page->description()->kirbytext() ?></div>
      </div>
      
      <!-- META -->
      <div id="informations" class="col-xs-4">  
        <?php snippet('meta', array('page' => $page)) ?>
      </div>
      
    </div>

    <!-- BOTTOM LINKS -->
    <div id="bottomLinks">
      <div id="saveAd"></div>
      <div id="advise"></div>
      <div id="btFb"></div>
      <div id="btTweeter"></div>
    </div>

    <!-- COMMENTS -->
    <div id="comments"></div>
  
  </div> <!-- /container-fluid -->

</main>


<!-- MODALS -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        Voulez-vous vraiment supprimer cette annonce ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <a href="<?php echo page('create')->url().'?delete='.$page->uid() ?>" class="btn btn-danger"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>  Supprimer</a> 
      </div>
    </div>
  </div>
</div>
<?php snippet('modal-geopicker') ?>

<?php snippet('footer') ?>