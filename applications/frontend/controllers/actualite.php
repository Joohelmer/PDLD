<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actualite extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library("session");
		$this->load->model('pagination_model');
		$this->load->helper('truncate');

    }


    public function actualites()
    {
        $data = array();
        $config = array();

        $data['menu'] = '';
        
        //Ajouter un tableau pour faire le filtre.

		// Set base_url for every links
		$config["base_url"] = base_url()."/actualites/page";

		$total_row = $this->pagination_model->record_count("actualites");
		$config["total_rows"] = $total_row;
		$config["per_page"] = 1;

		$config['first_url'] =  base_url()."/actualites.html";

		$config['use_page_numbers'] = TRUE;

		$config['num_links'] = $total_row;
		// Add current class
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';

		// Text pagination
		$config['next_link'] = '>';
		$config['prev_link'] = '<';

		$this->pagination->initialize($config);
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
		}
		else{
			$page = 1;
		}

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

		$data["actualites"] = $this->pagination_model->fetch_data($config["per_page"], $page,"actualites");
		
        $this->load->view('actualites.php', $data);
    }

    public function oneActualite($id,$titre){

    	$data = array();
    	$data['menu'] = '';
        $data['actualite'] = $this->db->query('SELECT * FROM actualites WHERE id = '.(int)$id )->row();
        
        $this->load->view('actualite.php', $data);
    }

}