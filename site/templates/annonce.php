<?php snippet('header') ?>
<main class="main viewMode" role="main">
  <div class="container-fluid">

    <div class="row">
      <div class="col-xs-8">
        <!-- TITLE -->
        <div id="title">
          <h2 id="field-title" class="simpleEdit" data-populate="title">
            <?php echo $page->title() ?>
          </h2>
        </div>
        <!-- NAME & DATE -->
        <div id="meta">
          <p>
            Posté par <?php echo $page->author() ?>
            le <?php echo $page->date('d/m/Y') ?>
          </p>
        </div>
      </div>
      
      <!-- VALIDATION BUTTON -->
      <div id="controlButtons" class="usersOnly col-xs-4 text-right">
        <!-- HIDDEN FORM -->
        <form action="<?php echo page('smart-submit')->url().'?handler=edit' ?>" method="post" id="smart-submit">
          <div id="hiddenForm" class="hidden">
            titre
            <textarea id="hidden-title" name="_title"></textarea>
            categorie
            <textarea id="hidden-categorie" name="_categorie"></textarea>
            informations
            <textarea id="hidden-informations" name="_informations"></textarea>
            description
            <textarea id="hidden-description" name="_description"></textarea>
            <textarea name="uri"><?php echo $page->uri() ?></textarea>
          </div>
          <div class="clearfix">&nbsp;</div>
          <button type="submit" name="submit" class="btn btn-success submitButton editOnly"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Enregistrer</button> 
          <button type="submit" name="submit" class="btn btn-warning cancelButton editOnly"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Annuler</button> 
          <button class="btn btn-primary button editButton viewOnly" data-toggle="button"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>  Modifier</button> 
					<button type="button" class="btn btn-danger viewOnly" data-toggle="modal" data-target="#modal-delete">Supprimer</button>
        </form>
      </div>
    </div>

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