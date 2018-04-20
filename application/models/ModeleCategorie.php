<?php
class ModeleCategorie extends CI_Model 
{

    public function __construct()
    {
    $this->load->database();
    }

    public function retournerCategories($pNoCategorie = FALSE)
    {
        if ($pNoCategorie === FALSE) // pas de n° de categorie en paramètre
        {  // on retourne toutes les categories
            $requete = $this->db->get('CATEGORIE');
            return $requete->result_array(); // retour d'un tableau associatif
        }
        // ici on va chercher le produit dont l'id est $pNoCategorie
        $requete = $this->db->get_where('CATEGORIE', array('NOCATEGORIE' => $pNoCategorie));
        return $requete->row_array(); // retour d'un tableau associatif
    } // fin retournerProduits

    public function retournerCategoriesLimite($nombreDeLignesARetourner, $noPremiereLigneARetourner)
    {// Nota Bene : surcharge non supportée par PHP    
        $this->db->limit($nombreDeLignesARetourner, $noPremiereLigneARetourner);    
        $requete = $this->db->get("CATEGORIE");    
         
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

    public function nombreDCategorie() 
    { // méthode utilisée pour la pagination
        return $this->db->count_all("CATEGORIE");        
    } // nombreDProduits

    public function produitsDansCategorie($pNoCategorie = FALSE)
    {
        if ($pNoCategorie === FALSE) // pas de n° de categorie en paramètre
        {  // on retourne tous les produits
            $requete = $this->db->get('PRODUIT');
            return $requete->result_array(); // retour d'un tableau associatif
        }
        // ici on va chercher les produit dont la categorie est $pNoCategorie
        $requete = $this->db->get_where('PRODUIT', array('NOCATEGORIE' => $pNoCategorie));
        return $requete->result_array(); // retour d'un tableau associatif 
    }
} // Fin Classe