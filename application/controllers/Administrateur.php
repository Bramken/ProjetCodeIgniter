<?php
class Administrateur extends CI_Controller 
{
 
    public function __construct()
    { 
        parent::__construct();
        $this->load->model('ModeleProduit');      
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('ModeleProduit'); // chargement modèle, obligatoire
        $this->load->model('ModeleClient');
        $this->load->model('ModeleCategorie'); 
        $this->load->helper('assets'); // helper 'assets' ajouté a Application
        /* les méthodes du contrôleur Administrateur doivent n'être
        accessibles qu'à l'administrateur (Nota Bene : a chaque appel
        d'une méthode d'Administrateur on a appel d'abord du constructeur */
        $this->load->library('session');
        if ($this->session->profil!=("admin")) // 0 : statut visiteur
        {
            redirect('/visiteur/seConnecter'); // pas les droits : redirection vers connexion
        }
        $this->load->view('templates/Entete');
    } // __construct
 
    public function ajouterUnProduit()
    {
        $this->load->helper('form');
        $DonneesInjectees['TitreDeLaPage'] = 'Ajouter un Produit';
 
        if ($this->input->post('BoutonAjouter'))
        {   // formulaire non validé, on renvoie le formulaire
            $donneesAInserer = array(
                'LIBELLE' => $this->input->post('txtTitre'),
                'DETAIL' => $this->input->post('txtDetail'),
                'NOMIMAGE' => $this->input->post('txtNomFichierImage'),
                'NOCATEGORIE'=>$this->input->post('txtCategorie'),
                'NOMARQUE'=>$this->input->post('txtMarque'),
                'QUANTITEENSTOCK'=> $this->input->post('txtQuantite'),
                'PRIXHT'=> $this->input->post('txtPrixHT'),              
                'DATEAJOUT'=> $this->input->post('txtDateAjout')  
            ); // cTitre, cTexte, cNomFichierImage : champs de la table tabProduit
            $this->ModeleProduit->insererUnProduit($donneesAInserer); // appel du modèle
            $this->load->view('administrateur/insertionReussie');   
        }
        else
        {   
            $this->load->view('administrateur/ajouterUnProduit', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
    } // ajouterUnProduit
    
    public function  modifierUnProduit($noProduit)
    {
        $DonneesInjectees['unProduit'] = $this->ModeleProduit->retournerProduits($noProduit);          
        if (empty($DonneesInjectees['unProduit']))   
        {   // pas de produit correspondant au n°   
            show_404();   
        }
          
        $DonneesInjectees['TitreDeLaPage'] = 'Modifier un Produit';  
        $this->load->helper('form');
 
        if ($this->input->post('BoutonModifier'))
        {   // formulaire non validé, on renvoie le formulaire
            $donneesAInserer = array(
                'LIBELLE' => $this->input->post('txtTitre'),
                'DETAIL' => $this->input->post('txtDetail'),
                'NOMIMAGE' => $this->input->post('txtNomFichierImage'),
                'NOCATEGORIE' => $this->input->post('txtCategorie'),
                'NOMARQUE' => $this->input->post('txtMarque'),
                'QUANTITEENSTOCK' => $this->input->post('txtQuantite'),
                'PRIXHT' => $this->input->post('txtPrixHT'),
                'DISPONIBLE' => $this->input->post('txtDisponible')
            ); // cTitre, cTexte, cNomFichierImage : champs de la table tabProduit
            $this->ModeleProduit->updateUnProduit($donneesAInserer,$noProduit); // appel du modèle
            $this->load->view('administrateur/insertionReussie');   
        }
        else
        {   
            $this->load->view('administrateur/ModifierUnProduit', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
    }
    public function afficherLesCommandes()
    {
        $DonneesInjectees['lesCommandes'] = $this->ModeleProduit->retournerCommandes();
        $DonneesInjectees['TitreDeLaPage'] = 'Toutes les commandes';
        $this->load->view('administrateur/afficherlescommandes', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }

    public function voirUneCommande($noCommande)
    {
        $DonneesInjectees['uneCommande'] = $this->ModeleProduit->retournerLignesCommandeAAfficher($noCommande);          
            $DonneesInjectees['TitreDeLaPage'] = 'Produits dans la commande ';   
            // ci-dessus, entrée ['LIBELLE'] de l'entrée ['unProduit'] de $DonneesInjectees          
            $this->load->view('administrateur/voirUneCommande', $DonneesInjectees);   
            $this->load->view('templates/PiedDePage'); 
    }

    public function validerCommande()
    {
        $donneesAInserer = array(
            'DATETRAITEMENT' => date('Y-m-d H:i:s')
        );
        $this->ModeleProduit->insererValidationCommande($donneesAInserer);
        $lesLignes = $this->ModeleProduit->retournerLignesCommande($this->input->post("noCommande"));
        $i=1;
        foreach ($lesLignes as $uneLigne):
            $unProduit=$this->ModeleProduit->retournerProduits($uneLigne['NOPRODUIT']);
            $nouvelleQuantite= ($unProduit['QUANTITEENSTOCK'])-($uneLigne['QUANTITECOMMANDEE']);
            $donneesAInserer = array(
                'QUANTITEENSTOCK' => $nouvelleQuantite
                );
            $this->ModeleProduit->updateUnProduit($donneesAInserer,$uneLigne['NOPRODUIT']);  
            ++$i;
        endforeach;
        redirect('/administrateur/afficherLesCommandes');
    }
}