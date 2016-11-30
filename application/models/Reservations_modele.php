<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Reservations_modele extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('User_modele');
    }
    
    public function get_client($idClient){
        $query =$this->db->get_where('sejour', array('idclient' => $idClient));
        return $query->result_array();
    }

    public function get_chambre($idChambre){
        $query = $this->db->get_where('hebergement', array('idheb' => $idChambre));
        return $query->result_array();
    }

    public function get_reserv($idsejour){
        $query =$this->db->get_where('sejour', array('idsejour' => $idsejour));
        return $query->result_array();
    }
    
    public function set_reserv(){
        
        $this->load->helper('url');
         $data = array(
            'idclient' => $this->input->post('idclient'),
            'datedebut' => $this->input->post('arrive'),
            'datefin' => $this->input->post('depart'),
            'nbpersonnes' => $this->input->post('nb'),
            'lieusejour' => $this->input->post('lieu'),
            'menage' => $this->input->post('men'),
            'idheb' => $this->input->post('chambre')
        );
         
        return $this->db->insert('sejour', $data);
         
    }

    public function delete_reserv($idsejour){

        return $this->db->delete('sejour', array('idsejour' => $idsejour));

    }
}
