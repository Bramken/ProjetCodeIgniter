<h3 class="text-center"><?php echo $TitreDeLaPage ?></h3></br>

<?php foreach ($ResultatRecherche as $unProduit):
    if ($this->session->profil==('admin'))
    {
        echo '<p>'.'<h6>'.'<div class= "row">'.'<div class="col-sm-1">'.'</div>'.'<div class="col-sm-5">'.anchor('administrateur/modifierUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</div>'.'<div class="col-sm-1">'.$unProduit['PRIXHT'].' €'.'</div>'.'<div class="col-sm-2">'.'<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>'.'</div>'.'<div class="col-sm-3">';
        echo '<p>'.'<h6>'.'<div class= "row">'.'<div class="col-sm-1">'.'</div>'.'<div class="col-sm-5">'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</div>'.'<div class="col-sm-1">'.$unProduit['PRIXHT'].' €'.'</div>'.'<div class="col-sm-2">'.'<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>'.'</div>'.'<div class="col-sm-3">';
        echo form_open('visiteur/ajouterproduitpanier');
        echo form_hidden(array(
        'noProduit'  => $unProduit['NOPRODUIT'],
        'libelleProduit' => $unProduit['LIBELLE'],
        'prixHT'   => $unProduit['PRIXHT']));
        echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
        echo form_close().'</div>'.'</div>'.'</h6>'.'</p>';
        //echo '<h5>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h5>';
    }
    if ($unProduit['DISPONIBLE']==1 && $this->session->profil!=('admin'))
    {
        echo '<p>'.'<h6>'.'<div class= "row">'.'<div class="col-sm-1">'.'</div>'.'<div class="col-sm-5">'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</div>'.'<div class="col-sm-1">'.$unProduit['PRIXHT'].' €'.'</div>'.'<div class="col-sm-2">'.'<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>'.'</div>'.'<div class="col-sm-3">';
        echo form_open('visiteur/ajouterproduitpanier');
        echo form_hidden(array(
        'noProduit'  => $unProduit['NOPRODUIT'],
        'libelleProduit' => $unProduit['LIBELLE'],
        'prixHT'   => $unProduit['PRIXHT']));
        echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
        echo form_close().'</div>'.'</div>'.'</h6>'.'</p>';
        //echo '<h5>'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</h5>';
    }
    
endforeach ?>

<p class="text-center">Pour avoir afficher le détail d'un produit, cliquer sur son titre</p>
