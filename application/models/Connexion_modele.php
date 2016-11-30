<?php

class Connexion_modele extends CI_Model{
    
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
    public function getClientId($loginClient){
        $query = $this->db->get_where('utilisateur', array('loginclient' => $loginClient));
        $result = $query->row_array();
        return $result['idclient'];
    }
    
  /**    
    //retourne true si le login et le mot de passe est présent dans la BDD
    public function ifClientExist($login, $mdp) {
        $bdd = $this->getBdd();
        //Préparation de la requete
        $reponse = $bdd->prepare("SELECT loginclient,mdpclient FROM utilisateur WHERE loginclient = ? AND mdpclient = ?");
        $reponse->bindValue(1, $login);
        $reponse->bindValue(2, $mdp);
        //Execution
        $reponse->execute();
        $row = $reponse->fetch();
        return $row['loginclient'] == $login && $row['mdpclient'] == $mdp;
    }
    
  public function getIdClient($login) {
        $bdd = $this->getBdd();
        $requete = $bdd->prepare("SELECT idclient FROM utilisateur WHERE loginclient=?");
        $requete->bindValue(1, $login);
        $requete->execute();
        $result = $requete->fetch();
        return $result['idclient'];
    } **/
}
