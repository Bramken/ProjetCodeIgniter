<h3 class="text-center"><?php echo $TitreDeLaPage ?></h3></br>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
 -->
<div class="row">
    <div class="col"></div>
    <div class="col-sm-6">
        <table class="table">
            <tr>
                <th>Nom du produit</th>
                <th>Quantitée commandée</th>
            </tr>
            <?php foreach ($uneCommande as $uneLigne):
                echo '<tr>';
                echo '<td>'.$uneLigne['LIBELLE'].'</td>'; 
                echo '<td>'.$uneLigne['QUANTITECOMMANDEE'].'</td>';
                echo '</div>';
                echo '</tr>';
            endforeach ?>    
        </table>
    </div>
    <div class="col"></div>
</div>
<p class="text-center">Pour afficher le détail d'une commande, cliquer sur son titre</p>