<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ville extends MY_Controller {

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
		$crud = generate_crud('villes');

		$crud->set_subject('ville');

		$this->mTitle = "Villes";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}
	
}