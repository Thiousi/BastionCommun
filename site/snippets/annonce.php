<?php
$currentCategorie = $page->categorie();
$currentCategorieTitle = page('categories/'.$currentCategorie)->title();
?>

<main class="main viewMode" id="annonce" data-uri="<?php echo $page->uri() ?>" role="main">
  <div class="container-fluid">
		
		<!-- VALIDATION BUTTON -->
		<div class="row">
			<div class="col-sm-8">				
				<!-- TITLE -->
				<div id="title">
					<h2 id="field-title">
						<span class="simpleEdit" data-populate="title"><?php echo $page->title() ?></span>
						<?php $page->private()->bool() ? $checked = "checked" : $checked = false ; ?>
						<input id="toggle-public" <?php echo $checked ?> data-toggle="toggle" data-on="Privé" data-off="Publique" data-onstyle="default" data-size="mini" type="checkbox" data-populate="private" disabled>
					</h2>
				</div>
				<div class="col-sm-4">
					<div>
						<h3 class="viewOnly"><?php echo $currentCategorieTitle ?></h3>
						<h3>
							<ul class="editOnly" role="tablist">
								<li role="presentation" class="dropdown btn-block active" data-populate="categorie">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
										<span class="current">—</span> <span class="caret"></span>
									</a>
									<ul class="dropdown-menu btn-block" role="menu" data-populate="categorie">
										<?php
										$currentCategorie = $page->categorie();
										$currentCategorieTitle = page('categories/'.$currentCategorie)->title();
										foreach (page('categories')->children() as $categorie) :
											$active = ( $currentCategorie == $categorie->uid() ) ?  'class="active"' : '' ;
											echo "<li {$active} data-value='{$categorie->uid()}'>";
											echo "<a href='#cat-{$categorie->uid()}' role='tab' data-toggle='tab'>{$categorie->title()}</a>";
											echo "</li>";
										endforeach;
										?>
									</ul>
								</li>
							</ul>
						</h3>
					</div>
				</div>
			</div>
			<div id="controlButtons" class="row col-sm-4 usersOnly">
				<?php snippet('annonce-editor', array('page' => $page)) ?>
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
				<h4><small>
							<?php echo $page->author() ?>
							le <?php echo $page->date('d/m/Y') ?>
				</small></h4>
		<div id="field-description" class="fullEdit" data-placeholder="Texte de l'annonce"><?php echo $page->description()->kirbytext() ?></div>
	  </div>
	  
	  <!-- META -->
	  <div id="informations" class="col-xs-4 readonly">  
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