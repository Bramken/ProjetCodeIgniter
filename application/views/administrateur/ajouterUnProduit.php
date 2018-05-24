<div class="container">
    <h2 class="text-center"><?php echo $TitreDeLaPage ?></h2></br>

    <?php echo form_open('administrateur/ajouterUnProduit') ?>
    <div class="form-group">
        <label for="txtTitre">Titre du produit</label>
        <input class= "form-control" required="required" type="input" name="txtTitre" value="<?php echo set_value('txtTitre'); ?>" /><br/>

        <label for="txtCategorie">Categorie :</label><br/>
        <select class="form-control" name="txtCategorie" id="Categorie" />
            <option value="1">Cognac</option>
            <option value="2">Wiskey</option>
            <option value="3">Rhum</option>
        </select><br/>

        <label for="txtMarque">Marque :</label><br/>
        <select class="form-control" name="txtMarque" id="Marque" />
            <option value="1">Jack Daniel</option>
            <option value="2">Lagavulin</option>
            <option value="3">Angostura</option>
            <option value="4">Courvoisier</option>
            <option value="5">Nikka</option>
        </select><br/>

        <label for="txtDetail">Detail du produit</label>
        <textarea class= "form-control" required="required" name="txtDetail" value="<?php echo set_value('txtDetail'); ?>"></textarea><br/>

        <label for="txtPrixHT">Prix HT</label>
        <input class= "form-control" required="required" type="input" name="txtPrixHT" value="<?php echo set_value('txtPrixHT'); ?>" /><br/>

        <label for="txtQuantite">Quantité en stock</label>
        <input class= "form-control" required="required" type="number" min="0" max="100" name="txtPrixHT" value="<?php echo set_value('txtQuantite'); ?>" /><br/>

        <label for="txtQuantite">Date d'ajout</label>
        <input class= "form-control" required="required" type="date" name="txtDateAjout" value="<?php echo set_value('txtDateAjout'); ?>" /><br/>

        <label for="txtNomFichierImage">Nom du fichier Image</label>
        <input class= "form-control" required="required" type="input" name="txtNomFichierImage" value="<?php echo set_value('txtNomFichierImage'); ?>" /><br/>

        <input class="btn btn-primary" type="submit" name="BoutonAjouter" value="Ajouter un produit" />
    </div>
    </form>
</div>