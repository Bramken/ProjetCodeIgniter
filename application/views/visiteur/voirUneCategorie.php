<h3 class="text-center"><?php echo $TitreDeLaPage ?></h3></br>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
 -->
<?php foreach ($lesProduitsDansCategorie as $unProduit):
    //echo '<h5>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h5>';
    if ($this->session->profil==('admin'))
    {
        echo '<p>'.'<h6>'.'<div class= "row">'.'<div class="col-sm-1">'.'</div>'.'<div class="col-sm-5">'.anchor('administrateur/modifierUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</div>'.'<div class="col-sm-1">'.$unProduit['PRIXHT'].'</div>'.'<div class="col-sm-2">'.'<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>'.'</div>'.'<div class="col-sm-3">';
        echo form_open('administrateur/rendreproduitindisponible');
        echo form_hidden(array(
        'noProduit'  => $unProduit['NOPRODUIT'],
        'libelleProduit' => $unProduit['LIBELLE'],
        'prixHT'   => $unProduit['PRIXHT']));
        echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
        echo form_close().'</div>'.'</div>'.'</h6>'.'</p>';
    }
    if ($unProduit['DISPONIBLE']==1 && $this->session->profil!=('admin'))
    {
        echo '<p>'.'<h6>'.'<div class= "row">'.'<div class="col-sm-1">'.'</div>'.'<div class="col-sm-5">'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</div>'.'<div class="col-sm-1">'.$unProduit['PRIXHT'].'</div>'.'<div class="col-sm-2">'.'<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>'.'</div>'.'<div class="col-sm-3">';
        echo form_open('visiteur/ajouterproduitpanier');
        echo form_hidden(array(
        'noProduit'  => $unProduit['NOPRODUIT'],
        'libelleProduit' => $unProduit['LIBELLE'],
        'prixHT'   => $unProduit['PRIXHT']));
        echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
        echo form_close().'</div>'.'</div>'.'</h6>'.'</p>';
    }
    
endforeach ?>
<p class="text-center">Pour avoir afficher le détail d'un produit, cliquer sur son titre</p>
<?php echo '<p class="text-center">'.anchor('visiteur/listerLesCategories','Retour aux catégories').'</p>'?>