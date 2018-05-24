<?php
echo '<h2>'.$unProduit['LIBELLE'].'</h2>';
echo '<div class="row">';
echo '<div class="col-sm-1">'.'</div>';
echo '<div class="col-sm-5">'.$unProduit['DETAIL'].'</div>';
echo '<div class="col-sm-4">'.'<p>','<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>','<p>'.'</div>';
echo '</div>';
echo '<div class="col"></div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="col-sm-1">'.'</div>';
echo '<div class="col-sm-5">'.'</div>';
echo '<div class="col-sm-2">'.$unProduit['PRIXHT'].' €'.'</div>';
echo '<div class="col-sm-3">';

echo form_open('visiteur/ajouterproduitpanier/');
echo form_hidden(array(
        'noProduit'  => $unProduit['NOPRODUIT'],
        'libelleProduit' => $unProduit['LIBELLE'],
        'prixHT'   => $unProduit['PRIXHT']));
echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
echo form_close();
echo '<p>'.anchor('visiteur/listerLesProduits','Retour à la liste des produits').'</p>';
echo '</div>';
?>
