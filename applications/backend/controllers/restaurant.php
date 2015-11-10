<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		

		$this->load->helper('crud');
	}

	public function index()
	{

		// only admin role can access this controller
		if ( !verify_role('admin') )
		{
			redirect();
			exit;
		}
		
		// CRUD table
		$crud = generate_crud('restaurants');

		$crud->set_subject('restaurant');

		$crud->set_field_upload('image1','assets/uploads/');
		$crud->set_field_upload('image2','assets/uploads/');
		$crud->set_field_upload('image3','assets/uploads/');
		$crud->set_field_upload('image4','assets/uploads/');
		$crud->set_field_upload('image5','assets/uploads/');

		$crud->display_as('id_modepaiement','Mode de paiement');
		$crud->display_as('id_service','Service');

		$this->load->model('restaurants_model');
		$myarrapaiement = array();
		$modepaiements = $this->restaurants_model->getInfos('modepaiement');

		if(count($modepaiements->result()) > 0){
			foreach ($modepaiements->result() as $row)
			{
				$myarrapaiement[$row->id] = $row->nom;
			}
			$crud->field_type('id_modepaiement','multiselect',$myarrapaiement);
		}

		$myarrayservice = array();
		$modepaiements = $this->restaurants_model->getInfos('modepaiement');

		if(count($modepaiements->result()) > 0){
			foreach ($modepaiements->result() as $row)
			{
				$myarrayservice[$row->id] = $row->nom;
			}
			$crud->field_type('id_service','multiselect',$myarrayservice);
		}

		$myarrayvilles = array();
		$villes = $this->restaurants_model->getVilles();

		if(count($villes->result()) > 0){
			foreach ($villes->result() as $row)
			{
				$myarrayvilles[$row->nom] = $row->nom;
			}
			$crud->field_type('ville','dropdown',$myarrayvilles);
		}


		$this->mTitle = "Restaurants";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}





	
}