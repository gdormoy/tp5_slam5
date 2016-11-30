<?php

class FormulaireUtilisateur_modele extends CI_Model{
      public function __construct()  {
        $this->load->database();
        }
    
    
      public function getFormulaireUtilisateur($idclient){
        
        $query = $this->db->get_where('utilisateur',array('idclient' => $idclient));
        
   
        return $query->result_array();
    }
    public function verifierSiUtilisateurExiste($loginclient){
     
      $query = $this->db->get_where('utilisateur',array('loginclient' => $loginclient));
        $query->result_array();   
        if($result['loginclient'] == $loginclient){
            return true;
        }
        else{
            return false;
        } 
    }
    public function setFormulaireUtilisateur()
    {
        
        $this->load->helper('url');
        $login = $this->input->post('loginclient');
        $data = array(
            
            'nomclient'=>$this->input->post('nomclient'),
            'prenomclient'=>$this->input->post('prenomclient'),
            'adresseclient'=>$this->input->post('adresseclient'),
            'codepostal'=>$this->input->post('codepostal'),
            'telclient'=>$this->input->post('telclient'),
            'loginclient'=>$this->input->post('loginclient'),
            'mdpclient'=>$this->input->post('mdpclient')
                
        );
        if ($this->verifierSiUtilisateurExiste($login)) {
            $data['titre'] = "Login déja existant";
            $data['login'] = $login;
           $this->load->view('templates/header', $data);
           $this->load->view('formulaireutilisateur/error', $data);
           $this->load->view('templates/footer');
        } else {
             return $this->db->insert('utilisateur',$data);
        }
            
 
  
    }
    
    
}

