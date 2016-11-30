<?php
session_start();
class User extends CI_Controller { 
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_modele');
          
    }

    //Controlleur Connexion
    function connexion(){
        $data['titre']="Connexion";
        //Rend les champs obligatoires
        $this->form_validation->set_rules('loginclient','login','required');
        $this->form_validation->set_rules('mdpclient','mdp', 'required');
        
        if($this->form_validation->run() === FALSE){
            /*Chargement de la vue*/
            $this->load->view('templates/header',$data);
            $this->load->view('index',$data);
            $this->load->view('templates/footer');
        }
        else{
           $loginclient = $this->input->post('loginclient');
           $mdpclient = $this->input->post('mdpclient');
            if ($this->User_modele->ifClientExist($loginclient, $mdpclient)){
                $loginclient = $this->User_modele->getClientLogin($loginclient);
                $idClient = $this->User_modele->getClientIdByLogin($loginclient);

                // $this->session->set_flashdata('idclient', '$idClient');
                // $this->session->keep_flashdata('idclient');
                // $this->session->loginclient = $this->User_modele->getClientLogin($loginclient);
                // $this->session->idclient = $this->User_modele->getClientIdByLogin($loginclient); 
              
                // $newdata = array(
                //     'loginclient' => $this->User_modele->getClientLogin($loginclient),
                //     'idclient' => $this->User_modele->getClientIdByLogin($loginclient),
                //     'logged_in' => TRUE);
                // $this->session->set_userdata($newdata);

                //$this->load->view('templates/header');
                //$this->load->view('connexion/success');

                redirect('Reservations/afficher/'.$idClient);
            }
            else{
                
            }
        }
    }

    public function deconnexion(){       
        //	Détruit la session
         $this->session->sess_destroy();
         //	Redirige vers la page d'accueil
         redirect(base_url());
    }

    public function inscription(){
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
         
       } else {
            $this->User_modele->inscription();
            $this->load->view('formulaireutilisateur/sucess');
        }
    }
}
