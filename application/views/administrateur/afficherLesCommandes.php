<h3 class="text-center"><?php echo $TitreDeLaPage ?></h3></br>
<!--
$TitreDeLaPage : variable récupérée depuis le contrôleur
$lesProduits : variable récupérée depuis le contrôleur (en 'mode tableau associatif')
 -->
<div class="row">
    <div class="col"></div>
    <div class="col-sm-5">
        <table class="table">
            <tr>
                    <th>N° Client</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date commande</th>
                    <th>Date traitement</th>
            </tr>
            <?php foreach ($lesCommandes as $uneCommande):
                echo '<tr>';
                echo '<td>'.'<p>'.'<h6>'.anchor('visiteur/voirUnProduit/'.$uneCommande['NOCOMMANDE'],$uneCommande['NOCLIENT']).'</h6>'.'</p>'.'</td>'; 
                echo '<td>'.$uneCommande['NOM'].'</td>';
                echo '<td>'.$uneCommande['PRENOM'].'</td>';
                echo '<td>'.$uneCommande['DATECOMMANDE'].'</td>';
                if($uneCommande['DATETRAITEMENT']==NULL)
                {
                    echo '<td>Non traitée</td>';
                }
                else
                {
                    echo '<td>'.$uneCommande['DATETRAITEMENT'].'</td>';
                }
                /*echo form_open('visiteur/ajouterproduitpanier/');
                echo form_hidden(array(
                    'noProduit'  => $unProduit['NOPRODUIT'],
                    'libelleProduit' => $unProduit['LIBELLE'],
                    'prixHT'   => $unProduit['PRIXHT']));
                echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Ajouter au panier','title' => 'Cliquer','class' => 'btn btn-primary'));
                echo form_close().'</div>'.'</div>'.'</h6>'.'</p>';*/
                echo '</tr>';
            endforeach ?>    
        </table>
    </div>
    <div class="col"></div>
</div>
<p class="text-center">Pour afficher le détail d'une commande, cliquer sur son titre</p>