<?php
class ModeleClient extends CI_Model 
{
 
    public function __construct()
    {
        $this->load->database();
    } // __construct
 
    public function existe($pClient) // non utilisée retour 1 si connecté, 0 sinon
    {
        $this->db->where($pClient);
        $this->db->from('CLIENT');
        return $this->db->count_all_results(); // nombre de ligne retournées par la requeête
    } // existe
  
    public function retournerClient($pClient)
    {
        $requete = $this->db->get_where('CLIENT',$pClient);
        return $requete->row(); // retour d'une seule ligne !
        // retour sous forme d'objets
    } // retournerClient

} // Fin Classe