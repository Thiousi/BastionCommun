<div role="tabpanel">
  <!-- Nav tabs -->
  <ul class="nav nav-pills editOnly" role="tablist">
    <li role="presentation" class="dropdown btn-block active" data-populate="categorie">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
        Catégorie : <span class="current">—</span> <span class="caret"></span>
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

  <!-- Tab panes -->
  <div class="tab-content">
    <?php 
    foreach (page('categories')->children() as $categorie) :

      $active = ( $currentCategorie == $categorie->uid() ) ?  'active' : '' ;

      echo "<div role='tabpanel' class='tab-pane inputsGroup {$active}' id='cat-{$categorie->uid()}' data-populate='informations'>";
        echo "<div class='catName viewOnly'><p>Catégorie : {$currentCategorieTitle}</p></div>";
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
                $location = json_decode($value); 
                $city = 'Adresse';
                if ($location) {
                  $city = $location->city . ' (' . $location->zip . ')';
                } ?>
                <button class='btn btn-default' data-toggle='modal' data-target='#modal-geopicker'>
                  <span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span> 
                  <span class='name'><?php echo $city ?></span>
                </button>
                <input type='text' class='form-control input hidden'  data-slug='<?php echo $critere["slug"] ?>' value='<?php echo $value ?>' readonly/><?php 
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