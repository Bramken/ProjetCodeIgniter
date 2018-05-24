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
                $this->session->noClient = $ClientRetourne->NOCLIENT; 
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
        redirect('/visiteur/listerLesProduits');
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

        /*$config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';*/

        $config['first_link'] = 'Premier';
        //$config['first_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
        //$config['first_tag_close'] = '</a></li>';

        $config['last_link'] = 'Dernier';
        //$config['last_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
        //$config['last_tag_close'] = '</a></li>';

        $config['next_link'] = 'Suivant';
        //$config['next_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
        //$config['next_tag_close'] = '</a></li>';

        $config['prev_link'] = 'Précédent';
        //$config['prev_tag_open'] = '<li class="page-item"><a class="page-link" href="#">';
       //$config['prev_tag_close'] = '</a></li>';

        /*$config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';*/

  
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
    public function listerProduitRecherche()
    {
        $this->load->helper('form');           
        $DonneesInjectees['TitreDeLaPage'] = 'Resultat de recherche';    
        $produitRecherche = $this->input->post('txtProduitRecherche'); // on récupère les données du formulaire de recherche   
        $DonneesInjectees['ResultatRecherche']= $this->ModeleProduit->retournerProduitRecherche($produitRecherche);        
        $this->load->view('visiteur/listerProduitRecherche', $DonneesInjectees);   
        $this->load->view('templates/PiedDePage');                        
    }
    public function ajouterProduitPanier()
    {
        $unProduit=$this->ModeleProduit->retournerProduits($this->input->post('noProduit'));
        $data = array(
            'id'      =>$unProduit['NOPRODUIT'],
            'qty'     => 1,
            'price'   =>$unProduit['PRIXHT'],
            'name'    =>$unProduit['LIBELLE'],
            'options' => array('nomimage' => $unProduit['NOMIMAGE'])
        );
    $this->cart->insert($data); 
    
    redirect('/visiteur/listerLesProduits');
    
    //$DonneesInjectees['lesProduits'] = $this->ModeleProduit->retournerProduits();
    //$DonneesInjectees['TitreDeLaPage'] ='Tous les produits';            
    //$this->load->view('visiteur/listerLesProduits', $DonneesInjectees);   

    //$DonneesInjectees['unProduit'] = $this->ModeleProduit->retournerProduits($this->input->post('noProduit'));
    //$DonneesInjectees['TitreDeLaPage'] = $DonneesInjectees['unProduit']['LIBELLE'];            
    //$this->load->view('visiteur/voirUnProduit', $DonneesInjectees);   
    $this->load->view('templates/PiedDePage');   
    
    }
    public function afficherPanier()
    {
        $this->load->view('visiteur/afficherPanier');
        $this->load->view('templates/PiedDePage');
    }
    public function  updatePanier()
    {
        $i=1;
        foreach ($this->cart->contents() as $items):
            $items=array(
                'rowid'   => $items['rowid'],
                'qty'     => $this->input->post($i.'[qty]')
            );
            $this->cart->update($items);
            ++$i;
        endforeach;
        $this->load->view('visiteur/afficherPanier');
        $this->load->view('templates/PiedDePage');
    }
    public function ajouterUnClient()
    {
        $this->load->helper('form');
        $DonneesInjectees['TitreDeLaPage'] = "S'enregistrer";
 
        if ($this->input->post('BoutonAjouter'))
        {   // formulaire non validé, on renvoie le formulaire
            $donneesAInserer = array(
                //NOCLIENT
                'NOM'=> $this->input->post('txtNom'),
                'PRENOM'=> $this->input->post('txtPrenom'),
                'ADRESSE'=> $this->input->post('txtAdresse'),
                'VILLE'=> $this->input->post('txtVille'),
                'CODEPOSTAL'=> $this->input->post('txtCodePostal'),
                'EMAIL'=> $this->input->post('txtEmail'),
                'MOTDEPASSE'=> $this->input->post('txtMotDePasse'),
            ); // NOM, PRENOM, ADRESSE : champs de la table CLIENT
            if ($this->ModeleClient->insererUnClient($donneesAInserer)); // appel du modèle
            {
                $this->load->view('administrateur/insertionReussie');   
            }
        }
        else
        {   
            $this->load->view('visiteur/ajouterUnClient', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
    } // ajouterUnProduit
    public function passerCommande()
    {
        $this->load->library('email');
        $noProduit =(array(
            'NOCLIENT'=>$this->input->post('noClient')));
        $numeroCommande=$this->ModeleProduit->insererCommande(); // appel du modèle
        $i=1;
        foreach ($this->cart->contents() as $items):
            $donneesAInserer['NOCOMMANDE']=$numeroCommande;
            $donneesAInserer['NOPRODUIT']=$items['id'];
            $donneesAInserer['QUANTITECOMMANDEE']=$items['qty'];
            $this->ModeleProduit->insererLigneCommande($donneesAInserer);
            ++$i;
        endforeach;
        
        $this->email->from('bramkendepannage@gmail.com', 'Victor Guillemot');
        $this->email->to('guillemotvictor@gmail.com'); 
        $this->email->subject('Confirmation de votre commande !');
        $this->email->message('Merci pour votre achat !'.'<br/>'.'A bientôt chez le Spiritueux shop !');	
        if (!$this->email->send())
        {
            $this->email->print_debugger();
        }
        $this->cart->destroy();
        redirect('/visiteur/listerLesProduits');
        $this->load->view('templates/PiedDePage');

    }
    
}  // Visiteur