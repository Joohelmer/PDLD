<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxAdmin extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }

    public function getCpbyVille(){

        $this->db->select('*');
        $this->db->from('villes');
      
        $this->db->where('nom', $_GET['ville']);

        $query = $this->db->get()->row();

        echo json_encode(array('ville'=>$query));
    }

}