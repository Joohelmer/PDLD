<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modepaiement extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// only admin role can access this controller
		if ( !verify_role('admin') )
		{
			redirect();
			exit;
		}

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
	
}