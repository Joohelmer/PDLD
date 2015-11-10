<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->mTitle = "Accueil";
		$this->mViewFile = 'home';



	}

	public function slider_homepage()
	{
		if ( !verify_role('admin') )
		{
			redirect();
			exit;
		}

		$this->load->helper('crud');

		// CRUD table
		$crud = generate_crud('slider_homepage');

		$crud->set_subject('slider');

		$crud->set_field_upload('image','assets/uploads/');
		
		$this->mTitle = "Slider page d'accueil";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}


	public function seo()
	{
		if ( !verify_role('admin') )
		{
			redirect();
			exit;
		}

		$this->load->helper('crud');

		// CRUD table
		$crud = generate_crud('seo');

		$crud->field_type('page','dropdown',
            array(
                'accueil' => 'Accueil',
                'restaurants' => 'Se restaurer', 
                'sejourner' => 'Séjourner', 
                'divertir' => 'Se divertir', 
                'evenements' => 'Événements', 
                'commerces' => 'Commerces', 

            ));

		$crud->set_subject('seo');
		
		$this->mTitle = "SEO";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}
}