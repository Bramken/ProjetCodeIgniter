

<h2><?php echo $TitreDeLaPage ?></h2>
<div class="row">
    <div class="col"></div>
    <div class="col-sm-3">
        <?php
        echo form_open('visiteur/seconnecter');

                echo form_label('Email','lblEmail'); // creation d'un label devant la zone de saisie
                echo form_input(array('type'  => 'email','name'  => 'txtEmail','title' => 'Entrez votre email','class' => 'form-control','required'=>'required','placeholder'=>'nom@domaine.tld'));
                
                echo form_label('Mot de passe','lblMotDePasse');
                echo form_password(array('type'  => 'pwd','name'  => 'txtMotDePasse','title' => 'Entrez votre mot de passe','class' => 'form-control','required'=>'required','placeholder'=>'Mot de passe'));
                echo '</br>';
                echo form_submit(array('type'  => 'submit','name'=>'btnConnecter','value'  => 'Se connecter','title' => 'Cliquer','class' => 'btn btn-primary'));

        echo form_close();
        echo '<p>'.'Pas de compte ? '.anchor('visiteur/ajouterUnClient','créer un compte').'</p>';
        ?>
    </div>
    <div class="col"></div>
</div>