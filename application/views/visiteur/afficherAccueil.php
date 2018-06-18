<h3 class="text-center"><?php echo $TitreDeLaPage ?></h3></br>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
 -->
 <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="la.jpg" alt="Los Angeles">
  </div>
  <div class="carousel-item">
    <img src="chicago.jpg" alt="Chicago">
  </div>
  <div class="carousel-item">
    <img src="ny.jpg" alt="New York">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>
<?php foreach ($lesProduits as $unProduit):
    if ($this->session->profil==('admin'))
    {
        echo '<p>'.'<h6>'.'<div class= "row">'.'<div class="col-sm-1">'.'</div>'.'<div class="col-sm-5">'.anchor('administrateur/modifierUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</div>'.'<div class="col-sm-1">'.$unProduit['PRIXHT'].' €'.'</div>'.'<div class="col-sm-2">'.'<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>'.'</div>'.'<div class="col-sm-3">';
        echo form_open('visiteur/ajouterproduitpanier/');
        echo form_hidden(array(
            'noProduit'  => $unProduit['NOPRODUIT'],
            'libelleProduit' => $unProduit['LIBELLE'],
            'prixHT'   => $unProduit['PRIXHT']));
        echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
        echo form_close().'</div>'.'</div>'.'</h6>'.'</p>';
    }
    if ($unProduit['DISPONIBLE']==1 && $this->session->profil==('client'))
    {
        echo '<p>'.'<h6>'.'<div class= "row">'.'<div class="col-sm-1">'.'</div>'.'<div class="col-sm-5">'.anchor('visiteur/voirUnProduit/'.$unProduit['NOPRODUIT'],$unProduit['LIBELLE']).'</div>'.'<div class="col-sm-1">'.$unProduit['PRIXHT'].' €'.'</div>'.'<div class="col-sm-2">'.'<img class="img-fluid" src='.img_url($unProduit['NOMIMAGE']).'>'.'</div>'.'<div class="col-sm-3">';
        echo form_open('visiteur/ajouterproduitpanier/');
        echo form_hidden(array(
            'noProduit'  => $unProduit['NOPRODUIT'],
            'libelleProduit' => $unProduit['LIBELLE'],
            'prixHT'   => $unProduit['PRIXHT']));
        echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
        echo form_close().'</div>'.'</div>'.'</h6>'.'</p>';
    }    
        
endforeach ?>
<p class="text-center">Pour avoir afficher le détail d'un produit, cliquer sur son titre</p>