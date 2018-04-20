<h2><?php echo $TitreDeLaPage ?></h2>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesCategories : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
 -->
<?php foreach ($lesCategories as $uneCategorie):
     echo '<h3>'.anchor('visiteur/voirUneCategorie/'.$uneCategorie['NOCATEGORIE'],$uneCategorie['LIBELLE']).'</h3>';
endforeach ?>
<p>Pour afficher les produits d'une categorie, cliquer sur son titre</p>