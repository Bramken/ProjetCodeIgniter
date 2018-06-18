<div class="container">
    <h2 class="text-center"><?php echo $TitreDeLaPage ?></h2></br>

    <?php echo form_open('administrateur/ajouterUnProduit') ?>
    <div class="form-group">
        <label for="txtTitre">Titre du produit</label>
        <input class= "form-control" required="required" type="input" name="txtTitre" value="<?php echo set_value('txtTitre'); ?>" /><br/>

        <label for="txtCategorie">Categorie :</label><br/>
        <?php $options = array(
            '1'=> 'Cognac',
            '2'=> 'Wiskey',
            '3'=> 'Rhum',
            );
        echo form_dropdown('txtCategorie', $options,'1','class="form-control"');
        ?></br>
 
        <label for="txtMarque">Marque :</label><br/>
        <?php $options = array(
            '1'=> 'Jack Daniel',
            '2'=> 'Lagavulin',
            '3'=> 'Angostura',
            '4'=> 'Courvoisier',
            '5'=> 'Nikka',
            );
        echo form_dropdown('txtMarque', $options,'1','class="form-control"');
        ?></br>

        <label for="txtDetail">Detail du produit</label>
        <textarea class= "form-control" required="required" name="txtDetail" value="<?php echo set_value('txtDetail'); ?>"></textarea><br/>

        <label for="txtPrixHT">Prix HT</label>
        <input class= "form-control" required="required" type="number" step="0.01" name="txtPrixHT" value="<?php echo set_value('txtPrixHT'); ?>" /><br/>

        <label for="txtQuantite">Quantité en stock</label>
        <input class= "form-control" required="required" type="number" min="0" max="100" name="txtQuantite" value="<?php echo set_value('txtQuantite'); ?>" /><br/>

        <label for="txtQuantite">Date d'ajout</label>
        <input class= "form-control" required="required" type="date" name="txtDateAjout" value="<?php echo set_value('txtDateAjout'); ?>" /><br/>

        <label for="txtNomFichierImage">Nom du fichier Image</label>
        <input class= "form-control" name="txtNomFichierImage" required="required" type="file" accept=".jpg"/><br/>
        
        <label for="txtDisponible">Disponibilité :</label><br/>
        <?php $options = array(
            '1'=> 'Disponible',
            '2'=> 'Indisponible',
            );
        echo form_dropdown('txtDisponible', $options,'1','class="form-control"');
        ?></br>

        <input class="btn btn-primary" type="submit" name="BoutonAjouter" value="Ajouter un produit" />
    </div>
    </form>
</div>