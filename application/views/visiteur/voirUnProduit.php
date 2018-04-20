<?php
echo '<h2>'.$unProduit['LIBELLE'].'</h2>';
echo $unProduit['DETAIL'];
echo '<p>','<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>','<p>';
//echo '<p>'.img($unArticle['cNomFichierImage']).'<p>'; // Affiche directement l'image
// Nota Bene : img_url($unProduit['nomimage']) aurait retourne l'url de l'image (cf. assets)
echo '<p>'.anchor('visiteur/listerLesProduits','Retour à la liste des produits').'</p>';