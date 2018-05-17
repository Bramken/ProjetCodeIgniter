<h3><?php echo $TitreDeLaPage ?></h3>

<?php foreach ($ResultatRecherche as $unProduit):
     echo '<h5>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h5>';
endforeach ?>

<p>Pour avoir afficher le détail d'un produit, cliquer sur son titre</p>
