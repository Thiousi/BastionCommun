<!-- ADD VIDEO -->
<div class="modal" id="modal-add-video" tabindex="-1" role="dialog" aria-labelledby="delete">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-body">
			<p>Adresse url de la vidéo (Youtube ou Vimeo) :</p>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><span class='glyphicon glyphicon-link' aria-hidden='true'></span></span>
				<input type="text" id="add-video-url" class="form-control" placeholder="https://vimeo.com/121048385">
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
		<button id="button-add-video" class="btn btn-success"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>  Ajouter</button> 
	  </div>
	</div>
  </div>
</div>

<!-- DELETE -->
<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="delete">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-body">
		Voulez-vous vraiment supprimer cette annonce ?
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
		<button id="button-delete-annonce" class="btn btn-danger"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>  Supprimer</button> 
	  </div>
	</div>
  </div>
</div>

<!-- CREATE -->
<div class="modal" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="create">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-body">
			<div class="form-group row">
            <label class="col-sm-2 control-label">Titre</label>
            <div class="col-sm-10"><input placeholder="Titre" id="nouvelle-annonce-titre" class="form-control" type="text"></div>
			</div>
			<div class="form-group row">
                <label class="col-sm-2 control-label">Catégorie</label>
				<select class="selectpicker col-sm-10" id="nouvelle-annonce-categorie" data-style="btn-lg btn-default" name="cat" title="Catégorie">
					<?php foreach ( page('categories')->children() as $categorie ) : ?>
						<?php if($categorie->uid() != "artiste-resident") : ?>
							<option value="<?php echo $categorie->uid(); ?>"> <?php echo $categorie->title(); ?> </option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
		<button id="button-create-annonce" class="btn btn-success"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>  Créer</button> 
	  </div>
	</div>
  </div>
</div>

<!-- GEOPICKER -->
<div class="modal" id="modal-geopicker" tabindex="-1" role="dialog" aria-labelledby="Geopicker" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="geopickerLabel">Adresse</h4>
      </div>-->
      <div class="modal-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">Adresse</label>
            <div class="col-sm-10"><input placeholder="Indiquez un lieu" class="form-control" id="geopicker-address" type="text"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <div id="geopicker" style="width: 100%; height: 400px;"></div>
            </div>
          </div>
          <div class="form-group hidden">
            <label class="col-sm-2 control-label">Lat.:</label>
            <div class="col-sm-3">
              <input type="text" id="geopicker-lat" class="form-control" />
            </div>
            <label class="col-sm-2 control-label">Long.:</label>
            <div class="col-sm-3">
              <input type="text" id="geopicker-lon" class="form-control" />
            </div>
          </div>
          <div class="form-group hidden">
            <div class="col-sm-4"><input type="text" id="geopicker-street" class="form-control" placeholder="Rue"/></div>
            <div class="col-sm-4"><input type="text" id="geopicker-city" class="form-control" placeholder="Ville"/></div>
            <div class="col-sm-4"><input type="text" id="geopicker-zip" class="form-control" placeholder="Code postal"/></div>
            <div class="hidden"><input type="text" id="geopicker-country" class="form-control" placeholder="Pays"/></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" id="confirm-geolocation">OK</button>
      </div>
    </div>
  </div>
</div>