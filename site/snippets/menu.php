
<div id="menu">

	<span class="prefix"><span class="prefix-title">Afficher</span><span> : </span></span>
	<form action="<?php echo page('smart-submit')->url().'?handler=list' ?>" data-response-div="liste-annonces" method="post" class="smart-submit" id="form-annonces">
		<div id="filters-buttons">
			<div id="categories">
				<select id="cat-select" class="selectpicker" data-style="btn-lg btn-default" name="cat" title="Toutes les annonces">
					<option value="">Toutes les annonces</option>
					<?php foreach ( page('categories')->children() as $categorie ) : ?>
						<option value="<?php echo $categorie->uid(); ?>"> <?php echo $categorie->title(); ?> </option>
					<?php endforeach ?>
				</select>
				<input type="submit" class="btn btn-default btn-lg hidden" value="Go !" />
			</div>
			
		</div>
	
	<div id="searchbar">
		<?php 
		$question = "";
		if (isset($query)):
			if($query): 
				$question = $query;
				?>
				<a href="<?php echo $page->url() ?>" role="button" class="btn btn-default btn-lg" aria-label="Voir tout">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				</a>&nbsp;
		<?php endif; endif; ?>
		<div id="search-cont">
			<div id="search-wrap">
				<!-- <span class="scope">Petites annonces:</span> -->
				<input type="text" name="q" value="<?php echo $question ?>" class="form-control btn-default input-lg" aria-label="rechercher" id="search" placeholder="Rechercher">
			</div>
		</div>
		<span id="searchbutton" class="glyphicon glyphicon-search" aria-hidden="true"></span>
	</div>	
		
		</form>



</div>

