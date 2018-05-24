<h3 class="text-center"><?php echo $TitreDeLaPage ?></h3></br>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesCategories : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
-->
        <?php foreach ($lesCategories as $uneCategorie):
            //echo '<h3>'.anchor('visiteur/voirUneCategorie/'.$uneCategorie['NOCATEGORIE'],$uneCategorie['LIBELLE']).'</h3>';
            echo '<h6 class="text-center">'.anchor('visiteur/voirUneCategorie/'.$uneCategorie['NOCATEGORIE'],$uneCategorie['LIBELLE']).'</h6>';
        endforeach ?>
<p class="text-center">Pour afficher les produits d'une categorie, cliquer sur son titre</p>