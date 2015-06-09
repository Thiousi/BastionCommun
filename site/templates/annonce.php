<?php snippet('header') ?>
<main class="main viewMode" role="main">
  <div class="container-fluid">

    <!-- VALIDATION BUTTON -->
    <div id="controlButtons" class="usersOnly row">
      <div class="col-xs-12">
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
          <button type="submit" name="submit" class="editOnly btn btn-success">Submit</button>
          <button class="btn btn-primary button editButton viewOnly" data-toggle="button">Edit</button>
        </form>
      </div>
    </div>
    
    <!-- TITLE -->
    <div id="title" class="row ">
      <div class="col-xs-12">
        <h2 id="field-title" class="simpleEdit" data-populate="title">
          <?php echo $page->title() ?>
        </h2>
      </div>
    </div>

    <!-- NAME & DATE -->
    <div id="meta" class=" row">
      <div class="col-xs-12">
        <p>
          Posté par <?php echo $page->author() ?>
          le <?php echo $page->date('d/m/Y') ?>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-8">
        <!-- VIEWER -->
        <?php snippet('viewer', array('page' => $page)); ?>
        <!-- UPLOADER -->
        <div class="editOnly">
          <div id="uploadImages" class="">
            <span class="btn btn-success fileinput-button">
                <span>Select files...</span>
                <input id="fileupload" type="file" name="files[]" value="Select files..." data-url="<?php echo page('upload')->url().'?annonce='.$page->uid() ?>" multiple>
            </span>
            <br>
            <br>
            <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div>
            <div id="files" class="files"></div>
          </div>
        </div>
      </div>
      
      <!-- META -->
      <div id="informations" class="col-xs-4 ">
        
        <div role="tabpanel">
            
          <!-- Nav tabs -->
          <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="dropdown btn-block text-center active" data-populate="categorie">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                Catégorie : <span class="current"></span> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu btn-block" role="menu" data-populate="categorie">
                <?php
                $currentCategorie = $page->categorie();
                foreach (page('categories')->children() as $categorie) :
                  $active = ( $currentCategorie == $categorie->uid() ) ?  'class="active"' : '' ;
                  echo "<li role='presentation' {$active} data-value='{$categorie->uid()}'>";
                  echo "<a href='#cat-{$categorie->uid()}' role='tab' data-toggle='pill'>{$categorie->title()}</a>";
                  echo "</li>";
                endforeach;
                ?>
              </ul>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <?php 
            foreach (page('categories')->children() as $categorie) :
            $active = ( $currentCategorie == $categorie->uid() ) ?  'active' : '' ;
            echo "<div role='tabpanel' class='tab-pane inputsGroup {$active}' id='cat-{$categorie->uid()}' data-populate='informations'>";
              echo "<table class='table table-bordered'>";
                foreach ($categorie->criteres()->yaml() as $critere):
                  $informations = $page->informations()->yaml();
                  $type = $critere['type'];
                  $meta = array();
                  foreach($informations as $information) {
                    $meta[ $information['key'] ] = $information['value'];
                  }
                  $value='';
                  if( array_key_exists ( $critere['slug'] , $meta) ){
                    $value = $meta[$critere['slug']];
                  }
                  echo "<tr>";
                    echo "<td>{$critere['nom']}</td>";
                    echo "<td>";
                    if ($type == 'map') :
                      echo "<button class='btn btn-default input' data-city='marseille' data-toggle='modal' data-target='#modal-geopicker' data-slug='{$critere['slug']}'><span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span> {$value}</button>";
                    else :
                      echo "<input type='text' class='autocomplete form-control input' data-slug='{$critere['slug']}' value='{$value}' readonly/>";
                    endif;
                    echo "</td>";
                  echo "</tr>";
                endforeach;
              echo "</table>";
            echo "</div>";
          endforeach; ?>
        </div>
          
      </div>    
    </div>

    <!-- MAIN TEXT -->
    <div id="description" class=" row">
      <div class="col-xs-12">
        <div id="field-description" class="fullEdit"><?php echo $page->description()->kirbytext() ?></div>
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
<?php snippet('modal-geopicker') ?>
<?php snippet('footer') ?>