<?php

class FormulaireUtilisateur extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
        $this->load->model('FormulaireUtilisateur_modele');

    }  
    

 
    public function formulaireuser(){
        

        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title']="Inscription";
        
       $this->form_validation->set_rules('nomclient','nomclient','required');
       $this->form_validation->set_rules('prenomclient','prenomclient','required');
       $this->form_validation->set_rules('adresseclient','adresseclient','required');
       $this->form_validation->set_rules('codepostal','codepostal','required');
       $this->form_validation->set_rules('telclient','telclient','required');
       $this->form_validation->set_rules('loginclient','loginclient','required');
       $this->form_validation->set_rules('mdpclient','mdpclient','required');

       if ($this->form_validation->run() == FALSE ){
           
           $this->load->view('templates/header',$data);
           $this->load->view('formulaireutilisateur/formulaireuser');
           $this->load->view('templates/footer',$data);
         
       }
      else {
          
          $this->FormulaireUtilisateur_modele->setFormulaireUtilisateur();
          $this->load->view('formulaireutilisateur/sucess');

         
      }
     
        
        
    }
     
    
    
    
}
