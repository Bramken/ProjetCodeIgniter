<?php
class ModeleProduit extends CI_Model 
{

    public function __construct()
    {
    $this->load->database();
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
    
} // Fin Classe