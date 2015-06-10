<!-- Map -->
<div class="modal fade" id="modal-geopicker" tabindex="-1" role="dialog" aria-labelledby="Geopicker" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="geopickerLabel">Où ?</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">Location:</label>
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
          <div class="form-group">
            <div class="col-sm-4"><input type="text" id="geopicker-street" class="form-control" placeholder="Rue"/></div>
            <div class="col-sm-4"><input type="text" id="geopicker-city" class="form-control" placeholder="Ville"/></div>
            <div class="col-sm-4"><input type="text" id="geopicker-zip" class="form-control" placeholder="Code postal"/></div>
            <div class="hidden"><input type="text" id="geopicker-country" class="form-control" placeholder="Pays"/></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="confirm-geolocation">ICI</button>
      </div>
    </div>
  </div>
</div>