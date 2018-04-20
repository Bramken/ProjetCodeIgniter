<h3><?php echo $TitreDeLaPage ?></h3>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
 -->
<?php foreach ($lesProduitsDansCategorie as $unProduit):
    echo '<h5>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h5>';
endforeach ?>
<p>Pour avoir afficher le détail d'un produit, cliquer sur son titre</p>
<?php echo '<p>'.anchor('visiteur/listerLesCategories','Retour aux catégories').'</p>'?>