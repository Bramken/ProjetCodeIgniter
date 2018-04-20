<?php
class Visiteur extends CI_Controller 
{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('assets'); // helper 'assets' ajouté a Application
        $this->load->library("pagination");
        $this->load->model('ModeleProduit'); // chargement modèle, obligatoire
        $this->load->model('ModeleClient');
        $this->load->model('ModeleCategorie'); 
        $this->load->view('templates/Entete');
    } // __construct
 
    public function listerLesProduits() // lister tous les Produits
    {
        $DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduits();
        $DonneesInjectees['TitreDeLaPage'] = 'Tous les Produits';
        $this->load->view('visiteur/listerLesProduits', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    } // listerLesProduits

    public function voirUnProduit($noProduit = NULL) // valeur par défaut de noProduit = NULL
    {   
        $DonneesInjectees['unProduit'] = $this->ModeleProduit->retournerProduits($noProduit);          
        if (empty($DonneesInjectees['unProduit']))   
        {   // pas de produit correspondant au n°   
            show_404();   
        }
          
        $DonneesInjectees['TitreDeLaPage'] = $DonneesInjectees['unProduit']['LIBELLE'];   
        // ci-dessus, entrée ['LIBELLE'] de l'entrée ['unProduit'] de $DonneesInjectees          
        $this->load->view('visiteur/VoirUnProduit', $DonneesInjectees);   
        $this->load->view('templates/PiedDePage');   
    } // voirUnProduit   

    public function seConnecter()
    {   
        $this->load->helper('form');           
        $DonneesInjectees['TitreDeLaPage'] = 'Se connecter';    
            $Client = array( // EMAIL, MOTDEPASSE : champs de la table client   
            'EMAIL' => $this->input->post('txtEmail'),   
            'MOTDEPASSE' => $this->input->post('txtMotDePasse'),   
            ); // on récupère les données du formulaire de connexion   
       
            // on va chercher le client correspondant a l'email et MdPasse saisis   
            $ClientRetourne = $this->ModeleClient->retournerClient($Client);   
            if (!($ClientRetourne == null))   
            {    // on a trouvé, email et profil (droit) sont stockés en session  
                $this->load->library('session');   
                $this->session->email = $ClientRetourne->EMAIL;   
                $this->session->profil = $ClientRetourne->PROFIL;   
                $DonneesInjectees['Email'] = $Client['EMAIL'];   
                $this->load->view('visiteur/connexionReussie', $DonneesInjectees);   
                $this->load->view('templates/PiedDePage');   
            }   
            else   
            {    // client non trouvé on renvoie le formulaire de connexion   
                $this->load->view('visiteur/seConnecter', $DonneesInjectees);   
                $this->load->view('templates/PiedDePage');   
            }     
    } // fin seConnecter

    public function seDeConnecter() 
    { // destruction de la session = déconnexion
        $this->session->sess_destroy();    
    }

    // affichage avec pagination
    public function listerLesProduitsAvecPagination() 
    {
        // les noms des entrées dans $config doivent être respectés
        $config = array();
        $config["base_url"] = site_url('visiteur/listerLesProduitsAvecPagination');
        $config["total_rows"] = $this->ModeleProduit->nombreDProduits();
        $config["per_page"] = 3; // nombre d'Produits par page
        $config["uri_segment"] = 3; /* le n° de la page sera placé sur le segment n°3 de URI,
        pour la page 4 on aura : visiteur/listerLesProduitsAvecPagination/4   */
   
        $config['first_link'] = 'Premier';
        $config['last_link'] = 'Dernier';
        $config['next_link'] = 'Suivant';
        $config['prev_link'] = 'Précédent';
  
        $this->pagination->initialize($config);
  
        $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        /* on récupère le n° de la page - segment 3 - si ce segment est vide, cas du premier appel
        de la méthode, on affecte 0 à $noPage */
   
        $DonneesInjectees['TitreDeLaPage'] = 'Les Produits, avec pagination';
        $DonneesInjectees["lesProduits"] = $this->ModeleProduit->retournerProduitsLimite($config["per_page"], $noPage);
        $DonneesInjectees["liensPagination"] = $this->pagination->create_links();

        $this->load->view("visiteur/listerLesProduitsAvecPagination", $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    } // fin listerLesProduitsAvecPagination

    public function listerLesCategories()
    {
        $DonneesInjectees['lesCategories'] = $this->ModeleCategorie->retournerCategories();
        $DonneesInjectees['TitreDeLaPage'] = 'Toutes les Categories';
        $this->load->view('visiteur/listerLesCategories', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');
    }
    public function voirUneCategorie($noCategorie = NULL) // valeur par défaut de noCategorie = NULL
    {   
        $DonneesInjectees['lesProduitsDansCategorie'] = $this->ModeleCategorie->produitsDansCategorie($noCategorie);          
        if (empty($DonneesInjectees['lesProduitsDansCategorie']))   
        {   // pas de produit correspondant au n° de categorie   
            show_404();   
        }
        $DonneesInjectees['TitreDeLaPage'] = 'Les Produits';
        $this->load->view('visiteur/voirUneCategorie', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');   
    }
    public function rechercherProduit($produitRecherche=NULL)
    {
                 
        /*$DonneesInjectees['TitreDeLaPage'] = 'Se connecter';    
            $Client = array(
            'EMAIL' => $this->input->post('txtEmail'),   
            'MOTDEPASSE' => $this->input->post('txtMotDePasse'),   
            ); // on récupère les données du formulaire de connexion   
       
            // on va chercher le client correspondant a l'email et MdPasse saisis   
            $ClientRetourne = $this->ModeleClient->retournerClient($Client); */

        $DonneesInjectees['lesProduitsRecherche'] = $this->ModeleProduit->retournerProduitsRecherche($produitRecherche);          
        if (empty($DonneesInjectees['lesProduitsRecherche']))   
        {   // pas de produit correspondant au n° de categorie   
            show_404();   
        }
        $DonneesInjectees['TitreDeLaPage'] = 'Resultat de recherche';
        $this->load->view('visiteur/listerProduitRecherche', $DonneesInjectees);
        $this->load->view('templates/PiedDePage');      
    }
}  // Visiteur