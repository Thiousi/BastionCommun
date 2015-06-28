<!-- Name -->
<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="New" aria-hidden="true">
  <div class="modal-dialog">
    <form class="contact" name="contact" method="post" action="<?php echo page('create')->url() ?>">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="newnameLabel">Nouvelle annonce</h4>
        </div>
        <div class="modal-body">
          <div class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-3 control-label">Titre:</label>
              <div class="col-sm-9"><input placeholder="Indiquez un titre" name="title" class="form-control" id="newname-title" type="text"></div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Catégorie:</label>
              <div class="col-sm-3">
                <select name="categorie" class="selectpicker">
                  <?php
                  foreach (page('categories')->children() as $categorie) :
                    echo "<option value='{$categorie->uid()}'>{$categorie->title()}</option>";
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Description:</label>
              <div class="col-sm-9"><textarea class="form-control" name="description" id="newname-description" rows="5"></textarea></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input class="btn btn-primary" type="submit" id="confirm-create" value="Créer"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        </div>
      </div>
    </form>
  </div>
</div>