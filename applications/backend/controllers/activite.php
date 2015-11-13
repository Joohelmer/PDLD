<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activite extends MY_Controller {

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
		$crud = generate_crud('activites');

		$crud->set_subject('activites');

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

		$this->db->select('id, nom');
        $results = $this->db->get('sous_activite')->result();
        $types = array();
        foreach ($results as $result) {
            $types[$result->nom] = $result->nom;
        }

		$crud->field_type('type','dropdown',$types);


		$this->mTitle = "Activités";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}

	public function type_activite()
	{
		// CRUD table
		$crud = generate_crud('type_activite');

		$crud->set_subject('Type d\'activité');
		
		$this->mTitle = "Type d\'activité";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}

	public function sous_activite()
	{
		// CRUD table
		$crud = generate_crud('sous_activite');

		$crud->set_subject('Sous type d\'activité');
		$crud->set_field_upload('image','assets/uploads/');
		$crud->set_relation('id_type', 'type_activite', 'nom');
		
		$this->mTitle = "Sous type d\'activité";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}
	
}