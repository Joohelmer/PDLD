<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hebergement extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('crud');
	}

	public function index()
	{
		// CRUD table
		$crud = generate_crud('modepaiement');

		$crud->set_subject('mode de paiement');

		$crud->set_field_upload('picto','assets/uploads/');
		
		$this->mTitle = "Mode de paiement";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}

	public function type_hebergement()
	{
		// CRUD table
		$crud = generate_crud('type_hebergement');

		$crud->set_subject('Type d\'hébergement');
		
		$this->mTitle = "Type d'hébergement";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}
	
}