<?php

class User_modele extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function ifClientExist($loginclient,$mdpclient){
        $this -> db -> select('loginclient, mdpclient');
        $this -> db -> from('utilisateur');
        $this -> db -> where('loginclient', $loginclient);
        $this -> db -> where('mdpclient', $mdpclient);
        $query = $this -> db -> get();
        //recup premiere ligne
        $result = $query->row_array();
        //return true si le login et mot de passe presents dans la bdd
        if($result['loginclient'] == $loginclient && $result['mdpclient'] == $mdpclient){
            return true;
        }
        else{
            return false;
        }
        
    }
    public function getClientIdByLogin($loginClient){
        $query = $this->db->get_where('utilisateur', array('loginclient' => $loginClient));
        $result = $query->row_array();
        return $result['idclient'];
    }

    public function getClientLogin($loginClient){
        $query = $this->db->get_where('utilisateur', array('loginclient' => $loginClient));
        $result = $query->row_array();
        return $result['loginclient'];
    }
    public function getClientLoginById($numclient){
        $query = $this->db->get_where('utilisateur', array('idclient' => $numclient));
        $result = $query->row_array();
        return $result['loginclient'];
    }
    
    public function getFormulaireUtilisateur($idclient){
        
        $query = $this->db->get_where('utilisateur',array('idclient' => $idclient));
        
   
        return $query->result_array();
    }
    public function verifierSiUtilisateurExiste($loginclient){
     
      $query = $this->db->get_where('utilisateur',array('loginclient' => $loginclient));
        $result = $query->row_array();
        if($result['$loginclient'] == $loginclient){
            return true;
        }
        else{
            return false;
        } 
    }
    public function inscription()
    {
      
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