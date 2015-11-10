<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actualite extends MY_Controller {

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
		$crud = generate_crud('actualites');

		$crud->set_subject('actualité');

		$crud->set_field_upload('photo_miniature','assets/uploads/');
		$crud->set_field_upload('photo_actualite','assets/uploads/');
		
		$this->mTitle = "Actualités";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}
	
}