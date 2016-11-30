<?php
session_start();
class Connexion extends CI_Controller { 
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Connexion_modele');
    }

    //Controlleur Connexion
    function formulaire(){
        $data['loginclient'] = 'loginclient';
        $data['mdpclient'] = 'mdpclient';
        $data['title']="Connexion";
        //Rend les champs obligatoires
        $this->form_validation->set_rules('loginclient','login','required');
        $this->form_validation->set_rules('mdpclient','mdp', 'required');
        
        if($this->form_validation->run() === FALSE){
            /*Chargement de la vue*/
            $this->load->view('templates/header',$data);
            $this->load->view('connexion/Connexion_vue',$data);
            $this->load->view('templates/footer');
        }
        else{
           $loginclient = $this->input->post('loginclient');
           $mdpclient = $this->input->post('mdpclient');
            if ($this->Connexion_modele->ifClientExist($loginclient, $mdpclient)){
                $_SESSION['idclient'] = $this->Connexion_modele->getClientId($loginclient);
                $_SESSION['loginclient'] = $loginclient;
                $this->load->view('connexion/success',$data);
            }
            else{
                echo 'Mot de passe ou login inexistant';
            }
        }
    }

        
public function deconnexion()
{       
	$this->load->view('connexion/success');
        //	Détruit la session
        session_destroy();

	//	Redirige vers la page d'accueil
	redirect('Connexion/formulaire');
}
}
