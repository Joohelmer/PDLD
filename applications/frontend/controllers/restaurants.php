<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurants extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library("session");
		$this->load->model('filter_pagination_model');
		$this->load->helper('truncate');
    }

    public function index()
    {
        $data = array();
        $config = array();
        $filter = array();

        $data['menu'] = 'restaurants';
        
        //Ajouter un tableau pour faire le filtre.

		// Set base_url for every links
		$config["base_url"] = base_url()."/restaurants/page";

		$total_row = $this->filter_pagination_model->record_count("restaurants",$filter);
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;

		$config['first_url'] =  base_url()."/restaurants";

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

		$data["restaurants"] = $this->filter_pagination_model->fetch_data($config["per_page"], $page,"restaurants",$filter);
        
        $this->load->view('restaurants.php', $data);
    }

    public function filter_restaurants()
    {
        $data = array();
        $config = array();
        $filter = $this->uri->uri_to_assoc(2);

        //Ajouter un tableau pour faire le filtre.

		// Set base_url for every links
		$config["base_url"] = base_url('/restaurants/ville/').'/'.$filter['ville'].'/page';

		$total_row = $this->filter_pagination_model->record_count("restaurants",$filter);
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
		
		if($this->uri->segment(5)){
			$page = ($this->uri->segment(5)) ;
			$config['uri_segment'] = 5;
		}
		else{
			$page = 1;
		}

		

		$this->pagination->initialize($config);

		$data['ville_selected'] = $filter['ville'];

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

		$data['villes'] = $this->db->query('SELECT * FROM villes ORDER BY NOM ASC')->result();

		$data['carte'] = $this->db->query('SELECT * FROM carte')->result();

		$data["restaurants"] = $this->filter_pagination_model->fetch_data($config["per_page"], $page,"restaurants",$filter);
		
		$data['menu'] = 'restaurants';

        $this->load->view('restaurants.php', $data);
    }

    public function form_filter_restaurants(){

    	$url = base_url('restaurants');

    	if($_GET['villenom']){
    		$url .= '/ville/'.$_GET['villenom'];
    	}

    	echo json_encode(array('url'=>$url));
    }


    public function oneRestaurant($id){

    	$data = array($id);

       	if(isset($_SERVER['HTTP_REFERER'])) {
       		if (strpos($_SERVER['HTTP_REFERER'],base_url('restaurants')) !== false) {
            	$data['url_retour'] = $_SERVER['HTTP_REFERER'];
			}
			else{
				$data['url_retour'] = base_url('restaurants');
			}
    	}
    	else{
    		$data['url_retour'] = base_url('restaurants');
    	}
    	$data['menu'] = 'restaurants';

		$data["restaurant"] = $this->db->query('SELECT * FROM restaurants WHERE id = '.(int)$id)->row();

		//Permet de récupérer les restaurants
		$data["arounds"] = $this->db->query('SELECT *, ( 3959 * acos( cos( radians('.$data["restaurant"]->latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$data["restaurant"]->longitude.') ) + sin( radians('.$data["restaurant"]->latitude.') ) * sin( radians( latitude ) ) ) ) AS distance FROM restaurants WHERE id != '.$data["restaurant"]->id.' HAVING distance < 25  ORDER BY distance LIMIT 4')->result();
        $this->load->view('oneRestaurant.php', $data);
    }


}