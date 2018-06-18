<?php
class ModeleProduit extends CI_Model 
{

    public function __construct()
    {
    $this->load->database();
    $this->load->library('session');
    /* chargement database.php (dans config), obligatoirement dans le constructeur */
    }

    public function retournerProduits($pNoProduit = FALSE)
    {
        if ($pNoProduit === FALSE) // pas de n° de produit en paramètre
        {  // on retourne tous les produits
            $requete = $this->db->get('PRODUIT');
            return $requete->result_array(); // retour d'un tableau associatif
        }
        // ici on va chercher le produit dont l'id est $pNoProduit
        $requete = $this->db->get_where('PRODUIT', array('NOPRODUIT' => $pNoProduit));
        return $requete->row_array(); // retour d'un tableau associatif
    } // fin retournerProduits

    public function insererUnProduit($pDonneesAInserer)
    {
        return $this->db->insert('PRODUIT', $pDonneesAInserer);
    } // insererUnProduit

    public function updateUnProduit($pDonneesAInserer,$pNoProduit)
    {
        $this->db->where('NOPRODUIT', $pNoProduit);
        $this->db->update('PRODUIT', $pDonneesAInserer);
    }

    public function retournerProduitsLimite($nombreDeLignesARetourner, $noPremiereLigneARetourner)
    {// Nota Bene : surcharge non supportée par PHP    
        $this->db->limit($nombreDeLignesARetourner, $noPremiereLigneARetourner);    
        $requete = $this->db->get("PRODUIT");    
         
        if ($requete->num_rows() > 0) 
        { // si nombre de lignes > 0    
            foreach ($requete->result() as $ligne) 
            {    
                $jeuDEnregsitrements[] = $ligne;    
            }    
            return $jeuDEnregsitrements;    
        } // fin if    
        return false;        
    } // retournerProduitsLimite
    public function nombreDProduits() 
    { // méthode utilisée pour la pagination
        return $this->db->count_all("PRODUIT");        
    } // nombreDProduits

    public function retournerProduitRecherche($pProduitRecherche)
    {
        $this->db->select('*');
        $this->db->from('PRODUIT');
        $this->db->like ('LIBELLE',$pProduitRecherche);
        $requete = $this->db->get();
        return $requete->result_array();
    }

    public function insererCommande()
    {
        $noProduit =(array(
            'NOCLIENT'=>$this->session->noClient));
        $this->db->insert('COMMANDE',$noProduit);
        $id= $this->db->insert_id();
        return  $id;
    }
    public function insererLigneCommande($pDonneesAInserer)
    {
        $this->db->insert('LIGNE', $pDonneesAInserer);
    }
    
    public function retournerCommandes()
    {
            $requete = $this->db->query("select NOCOMMANDE,COMMANDE.NOCLIENT,NOM,PRENOM,DATECOMMANDE,DATETRAITEMENT from COMMANDE, CLIENT where CLIENT.NOCLIENT=COMMANDE.NOCLIENT and DATETRAITEMENT is null ORDER BY NOCOMMANDE ASC");
            return $requete->result_array(); // retour d'un tableau associatif
    }
    public function retournerLignesCommande($pNoCommande)
    {
        $requete = $this->db->query("select * from LIGNE where NOCOMMANDE=".$pNoCommande);
        return $requete->result_array(); // retour d'un tableau associatif
    }
    public function retournerLignesCommandeAAfficher($pNoCommande)
    {
        $requete = $this->db->query("select LIBELLE, QUANTITECOMMANDEE from LIGNE,PRODUIT where NOCOMMANDE=".$pNoCommande." AND LIGNE.NOPRODUIT=PRODUIT.NOPRODUIT" );
        return $requete->result_array(); // retour d'un tableau associatif
    }

    public function insererValidationCommande($pDonneesAInserer)
    {
        $this->db->where('NOCOMMANDE', $this->input->post("noCommande"));
        return $this->db->update('COMMANDE', $pDonneesAInserer);
    }
} // Fin Classe