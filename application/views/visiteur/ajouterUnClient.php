<h2 class="text-center"><?php echo $TitreDeLaPage ?></h2>
<div class="row">
<div class="col"></div>
<div class="col-sm-3">

<?php echo form_open('visiteur/ajouterUnClient') ?>

<label for="txtNom">Nom</label>
<input class= "form-control" required="required" name="txtNom" value="<?php echo set_value('txtNom'); ?>" /><br/>

<label for="txtPrenom">Prénom</label>
<input class= "form-control" required="required" name="txtPrenom" value="<?php echo set_value('txtPrenom'); ?>"></textarea><br/>

<label for="txtAdresse">Adresse</label>
<input class= "form-control" required="required" type="input" name="txtAdresse" value="<?php echo set_value('txtAdresse'); ?>" /><br/>

<label for="txtVille">Ville</label>
<input class= "form-control" required="required" type="input" name="txtVille" value="<?php echo set_value('txtVille'); ?>" /><br/>

<label for="txtCodePostal">CodePostal</label>
<input class= "form-control" required="required" type="number" min="10000" max="99999" name="txtCodePostal" value="<?php echo set_value('txtCodePostal'); ?>" /><br/>

<label for="txtEmail">Email</label>
<input class= "form-control" required="required" type="mail" placeholder="nom@domaine.tld"  name="txtEmail" value="<?php echo set_value('txtEmail'); ?>" /><br/>

<label for="txtMotDePasse">Mot de passe</label>
<input class= "form-control" required="required" type="password" name="txtMotDePasse" value="<?php echo set_value('txtMotDePasse'); ?>" /><br/>

<input class="btn btn-primary" required="required" placeholder="nom@domaine.tld" type="submit" name="BoutonAjouter" value="Valider" />

</form>
</div>
<div class="col"></div>
</div>