<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Elasticriver extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->library("elasticsearch");
    }

    public function getRestaurants(){

		$restos = $this->db->query('SELECT * FROM restaurants' )->result(); 
        var_dump($restos);die;
        foreach ($restos as $value) {
            $id = $value->id;
            $data = array("titre"=>$value->titre, "description"=>$value->description);
            $this->elasticsearch->add("restaurants", $id, $data);
        }

        echo "Terminé.";
    }

    public function getEvents(){

		$events = $this->db->query('SELECT * FROM evenements' )->result(); 
        
        foreach ($events as $value) {
            $id = $value->id;
            $data = array("titre"=>$value->titre, "description"=>$value->description);
            $this->elasticsearch->add("restaurants", $id, $data);
        }

        echo "Terminé.";
    }
 


}