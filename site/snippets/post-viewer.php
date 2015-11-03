<div class="row">
	<div id="viewer" class="fieldsGroup cf col-lg-12">
	  <!-- SWIPER -->
	  	<?php snippet('slider', array('page'=>$page)); 
		$countFiles = $page->files()->filter(function($file) { return in_array($file->type(), array('image', 'document')); })->count();
		if($countFiles == 0){ $mediaCaption = " Ajouter des médias"; } else { $mediaCaption = " Modifier le diaporama"; };
		?>
		
		<!-- MANAGE MEDIA -->
		<div class="btn-group editOnly" id="manageDiapo">
			<!-- UPDATE -->
			<button class='btn btn-default'><span class='glyphicon glyphicon-th-list' aria-hidden='true'></span><?php echo $mediaCaption; ?></button>
		</div>
		<div id="diapo-manager">
			<!-- ADD -->
			<div class="media-add cf">
				<!-- ADD IMAGES -->
				<div id="uploadImages" class="btn-group">
					<span class="btn btn-default fileinput-button">
						<div id="progress" class="progress editOnly">
							<div class="progress-bar progress-bar-success"></div>
						</div>
						<i class="glyphicon glyphicon-plus"></i> <span>Image</span>
						<input id="fileupload" type="file" name="files[]" value="Select files..." data-url="<?php echo page('upload')->url().'?annonce='.$page->uid() ?>" multiple>
					</span>
					<!-- ADD VIDEOS -->
					<button class='btn btn-default' data-toggle='modal' data-target='#modal-add-video'>
						<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Vidéo
					</button>
				</div>
				<div id="updateMedia-button" class="btn-group">
					<!-- UPDATE -->
					<button id="updateMedia" class='btn btn-default' data-annonce-uri="<?php echo $page->uri() ?>"><span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span> Enregistrer</button>
				</div>
			</div>
			
			<!-- LISTE -->
			<ol class="media-list" data-annonce="<?php echo $page->uri() ?>"><?php //snippet("liste-media", array('page'=>$page)) ?></ol>
		</div>
	</div>
</div>