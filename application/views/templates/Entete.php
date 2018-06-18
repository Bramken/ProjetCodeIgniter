<html>
    <head>
       <title>Spiritueux Shop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>        
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">                            
            <a class="navbar-brand" href="#">
                <!--<img src=<?php echo img_url("logo.jpg") ?> alt="logo" style="width:40px;">-->
                Spiritueux de legende
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><img src=<?php echo glyph('glyphicons-1-glass') ?>> Produits</a>
                        <div class="dropdown-menu">
                            <!--<a class="dropdown-item" href="<?php echo site_url('visiteur/afficherAccueil') ?>">Accueil</a>-->
                            <a class="dropdown-item" href="<?php echo site_url('visiteur/listerLesProduits') ?>">Tous les Produits</a>
                            <a class="dropdown-item" href="<?php echo site_url('visiteur/listerLesProduitsAvecPagination') ?>">Lister les Produits (par 3)</a>
                            <a class="dropdown-item" href="<?php echo site_url('visiteur/listerLesCategories') ?>">Par Categories</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><img src=<?php echo glyph('glyphicons-4-user') ?>> Compte</a>
                        <div class="dropdown-menu">
                            <?php if (!is_null($this->session->email)) : ?>                     
                            <a class="dropdown-item" href=""><?php echo 'Utilisateur connecté : <B>'.$this->session->email.'</B>';?></a>
                            <a class="dropdown-item" href="<?php echo site_url('visiteur/seDeconnecter') ?>">
                                <img src=<?php echo glyph('glyphicons-388-log-out') ?>> Se deconnecter
                            </a>
                            <?php if ($this->session->profil==('admin')) : ?>
                            <a class="dropdown-item" href="<?php echo site_url('administrateur/ajouterUnProduit') ?>">Ajouter un produit</a></a>
                            <a class="dropdown-item" href="<?php echo site_url('administrateur/afficherLesCommandes') ?>">Afficher les commandes</a></a>
                            <?php endif; ?>
                            <?php else : ?>
                            <a class="dropdown-item" href="<?php echo site_url('visiteur/seConnecter') ?>">
                                <img src=<?php echo glyph('glyphicons-387-log-in') ?>> Se connecter   
                            </a>
                            <a class="dropdown-item" href="<?php echo site_url('visiteur/ajouterUnClient') ?>">
                                <img src=<?php echo glyph('glyphicons-7-user-add') ?>> S'enregistrer
                            </a>
                            <?php endif; ?>                    
                        </div>
                    </li>
                                   
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('visiteur/afficherPanier') ?>">
                            <img src=<?php echo glyph('glyphicons-203-shopping-cart') ?>> Panier
                        </a>
                    </li>
                </ul>
            </div>                      
            <span> <?php 
                echo form_open("/visiteur/listerProduitRecherche",array('class'=>'form-inline my-2 my-lg-0')); 
                echo form_input(array('name'=>'txtProduitRecherche','class'=>'form-control','type'=>'search','placeholder'=>'Search'));
                echo form_submit(array('name'=>'btnRecherche','class'=>'btn btn-success','type'=>'submit','value'=>'Rechercher'));
                echo form_close();?>
            </span>          
        </nav>