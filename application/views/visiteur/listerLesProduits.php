<h2><?php echo $TitreDeLaPage ?></h2>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
 -->
<?php foreach ($lesProduits as $unProduit):
     echo '<h3>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h3>';
endforeach ?>
<p>Pour avoir afficher le détail d'un produit, cliquer sur son titre</p>