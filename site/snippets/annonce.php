<?php 
$currentCategorie = $page->categorie();

	if($currentCategorie == 'bastion-commun'):
		snippet('annonce-special', array('page' => $page));
	elseif ($currentCategorie == 'artiste-resident') :
		snippet('annonce-artiste', array('page' => $page));
	elseif ($currentCategorie == 'categorie-1') : /* exposition */ 
		snippet('annonce-evenement', array('page' => $page));
	elseif ($currentCategorie == 'petites-annonces"') :
		snippet('annonce-petite', array('page' => $page));
	elseif ($currentCategorie == 'fournisseur') :
		snippet('annonce-fournisseur', array('page' => $page)); 
	else :
		snippet('annonce-default', array('page' => $page));
	endif; 

?>


