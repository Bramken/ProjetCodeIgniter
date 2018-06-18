<div class="container">
<h2 class="text-center"><?php echo $TitreDeLaPage ?></h2></br>
    <?php
    echo form_open('administrateur/modifierUnProduit/'.$unProduit['NOPRODUIT']);?>
    <div class="form-group">
        <label for="txtTitre">Titre du produit</label>
        <input class= "form-control" required="required" type="input" name="txtTitre" value="<?php echo $unProduit['LIBELLE']; ?>" /><br/>

        <label for="txtCategorie">Categorie :</label><br/>
        <?php $options = array(
            '1'=> 'Cognac',
            '2'=> 'Wiskey',
            '3'=> 'Rhum',
            );
        echo form_dropdown('txtCategorie', $options,$unProduit['NOCATEGORIE'],'class="form-control"');
        ?></br>
 
        <label for="txtMarque">Marque :</label><br/>
        <?php $options = array(
            '1'=> 'Jack Daniel',
            '2'=> 'Lagavulin',
            '3'=> 'Angostura',
            '4'=> 'Courvoisier',
            '5'=> 'Nikka',
            );
        echo form_dropdown('txtMarque', $options,$unProduit['NOMARQUE'],'class="form-control"');
        ?></br>

        <label for="txtDetail">Detail du produit</label>
        <textarea class= "form-control" required="required" type="input" rows="10" name="txtDetail"><?php echo $unProduit['DETAIL']; ?></textarea><br/>

        <label for="txtPrixHT">Prix HT</label>
        <input class= "form-control" required="required" type="number" step="0.01" min="10" name="txtPrixHT" value="<?php echo $unProduit['PRIXHT']; ?>" /><br/>

        <label for="txtQuantite">Quantité en stock</label>
        <input class= "form-control" required="required" type="number" min="0" max="100" name="txtQuantite" value="<?php echo $unProduit['QUANTITEENSTOCK']; ?>" /><br/>

        <label for="txtNomFichierImage">Nom du fichier Image</label>
        <input class= "form-control" required="required" name="txtNomFichierImage" value="<?php echo $unProduit['NOMIMAGE']; ?>" /><br/>

        <label for="txtDisponible">Disponibilité :</label><br/>
        <?php $options = array(
            '1'=> 'Disponible',
            '2'=> 'Indisponible',
            );
        echo form_dropdown('txtDisponible', $options,$unProduit['DISPONIBLE'],'class="form-control"');
        ?></br>

        <input class="btn btn-primary" type="submit" name="BoutonModifier" value="Modifier un produit" />
    </div>
    </form>
</div>