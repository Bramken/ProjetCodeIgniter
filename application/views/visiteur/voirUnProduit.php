<?php
echo '<h2>'.$unProduit['LIBELLE'].'</h2>';
echo $unProduit['DETAIL'];
echo $unProduit['PRIXHT'];
echo '<p>','<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>','<p>';
echo form_open('visiteur/ajouterproduitpanier');
echo form_hidden(array(
        'noProduit'  => $unProduit['NOPRODUIT'],
        'libelleProduit' => $unProduit['LIBELLE'],
        'prixHT'   => $unProduit['PRIXHT']));
echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
echo form_close();
echo '<p>'.anchor('visiteur/listerLesProduits','Retour à la liste des produits').'</p>';
?>