<h2><?php echo $TitreDeLaPage ?></h2>
<!-- données récupérées en 'mode objet' -->
 
<?php foreach ($lesProduits as $unProduit):
     echo '<h3>'.anchor('visiteur/voirUnProduit/'.$unProduit->NOPRODUIT,$unProduit->LIBELLE).'</h3>';
endforeach ?>
 
<p>Pour avoir afficher le détail d'un produit, cliquer sur son titre</p>
 
<p><?php echo $liensPagination; ?></p>