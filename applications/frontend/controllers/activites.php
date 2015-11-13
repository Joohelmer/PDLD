<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activites extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library("session");
		$this->load->model('filter_pagination_model');
		$this->load->helper('truncate');

		$this->globalVar['mt_activites'] = $this->db->query('SELECT * FROM type_activite' )->result(); 
        foreach ($this->globalVar['mt_activites'] as $value) {
           $value->sous_types = $this->db->query('SELECT * FROM sous_activite WHERE menu = 1 AND id_type ='.(int)$value->id )->result();
        }
        $this->load->vars($this->globalVar);
    }

    public function index()
    {
        $data = array();
        $config = array();
        $filter = array();

        $data['menu'] = 'activites';
        
        //Ajouter un tableau pour faire le filtre.

		// Set base_url for every links
		$config["base_url"] = base_url()."/activites/page";

		$total_row = $this->filter_pagination_model->record_count("activites",$filter);
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;

		$config['first_url'] =  base_url()."/activites";

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

		$data['villes'] = $this->db->query('SELECT * FROM villes ORDER BY NOM ASC')->result();

		$data['ville_selected'] = "";

		$data['carte'] = $this->db->query('SELECT * FROM carte')->result();

		$data["activites"] = $this->filter_pagination_model->fetch_data($config["per_page"], $page,"activites",$filter);
        
        $this->load->view('activites.php', $data);
    }

    public function filter_activites()
    {
        $data = array();
        $config = array();
        $filter = $this->uri->uri_to_assoc(2);
        $url = "";
        $nb_sgement = 3;
        
        //Ajouter un tableau pour faire le filtre.
        foreach ($filter as $key => $value) {
        	if($key != "page"){
        		$url .= $key.'/'.(string)$value.'/';
        		$nb_sgement += 2;
        	}
        }

		// Set base_url for every links
		$config["base_url"] = base_url('/activites').'/'.$url.'page';
		$total_row = $this->filter_pagination_model->record_count("activites",$filter);
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;

		$config['use_page_numbers'] = TRUE;

		$config['num_links'] = $total_row;
		

		// Text pagination
		$config['next_link'] = '>';
		$config['prev_link'] = '<';

		// Add current class
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		
		if($this->uri->segment($nb_sgement)){
			$page = ($this->uri->segment($nb_sgement)) ;
			$config['uri_segment'] = $nb_sgement;
		}
		else{
			$page = 1;
		}

		$this->pagination->initialize($config);

		if(isset($filter['ville']))
			$data['ville_selected'] = $filter['ville'];
		else{
			$data['ville_selected'] = "";
		}

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

		$data['villes'] = $this->db->query('SELECT * FROM villes ORDER BY NOM ASC')->result();

		$data['carte'] = $this->db->query('SELECT * FROM carte')->result();

		$data["activites"] = $this->filter_pagination_model->fetch_data($config["per_page"], $page,"activites",$filter);
		
		$data['menu'] = 'activites';

        $this->load->view('activites.php', $data);
    }

    public function form_filter_activites(){

    	$url = base_url('activites');

    	if($_GET['villenom']){
    		$url .= '/ville/'.$_GET['villenom'];
    	}

    	echo json_encode(array('url'=>$url));
    }


    public function oneActivite($id){

    	$data = array($id);

       	if(isset($_SERVER['HTTP_REFERER'])) {
       		if (strpos($_SERVER['HTTP_REFERER'],base_url('activites')) !== false) {
            	$data['url_retour'] = $_SERVER['HTTP_REFERER'];
			}
			else{
				$data['url_retour'] = base_url('activites');
			}
    	}
    	else{
    		$data['url_retour'] = base_url('activites');
    	}
    	$data['menu'] = 'activites';

		$data["activite"] = $this->db->query('SELECT * FROM activite WHERE id = '.(int)$id)->row();

		//Permet de récupérer les activites aux alentours
		$data["arounds"] = $this->db->query('SELECT *, ( 3959 * acos( cos( radians('.$data["activite"]->latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$data["activite"]->longitude.') ) + sin( radians('.$data["activite"]->latitude.') ) * sin( radians( latitude ) ) ) ) AS distance FROM activites WHERE id != '.$data["activite"]->id.' HAVING distance < 25  ORDER BY distance LIMIT 4')->result();
        $this->load->view('oneActivite.php', $data);
    }


}