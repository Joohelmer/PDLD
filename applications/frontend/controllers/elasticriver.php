<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Elasticriver extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->library("elasticsearch");
    }

    public function getRestaurants(){

		$restos = $this->db->query('SELECT * FROM restaurants' )->result(); 

        foreach ($restos as $value) {
            $id = $value->id;
            $data = array("titre"=>$value->titre,"type"=>"restaurant", "description"=>$value->description,"image"=>$value->image1,"url"=>base_url().'/restaurant/'.$value->id.'/'.url_title($value->titre));
            $this->elasticsearch->add("restaurants", $id, $data);
        }

        echo "Terminé.";
    }

    public function getEvents(){

		$events = $this->db->query('SELECT * FROM evenements' )->result();
        
        foreach ($events as $value) {
            $id = $value->id;
            $data = array("titre"=>$value->titre,"type"=>"evenement", "description"=>$value->description,"image"=>$value->image1,"url"=>base_url().'/evenement/'.$value->id.'/'.url_title($value->titre));
            $this->elasticsearch->add("evenements", $id, $data);
        }

        echo "Terminé.";
    }

    public function getActivites(){

        $events = $this->db->query('SELECT * FROM activites' )->result();

        foreach ($events as $value) {
            $id = $value->id;
            $data = array("titre"=>$value->titre,"type"=>"activite", "description"=>$value->description,"image"=>$value->image1,"url"=>base_url().'/activite/'.$value->id.'/'.url_title($value->titre));
            $this->elasticsearch->add("activites", $id, $data);
        }

        echo "Terminé.";
    }

    public function autocomplete(){
        $recherche = $this->input->get('recherche', TRUE);
        $type = $this->input->get('type', TRUE);

        $queryCmd ='{
            "from" : 0, "size" : 4,
            "query": {
                "bool": {
                    "should": [
                        {
                            "query_string": {
                                "query": "'.$recherche.'",
                                "fields": ["titre"]
                            }
                        }
                    ]
                }
            }
        }';

        if($type == "tout"){
            $ES = $this->elasticsearch->advancedquery('',$queryCmd);
        }
        else{
            $ES = $this->elasticsearch->advancedquery($type,$queryCmd);
        }
        
        echo json_encode(array('type'=>$type,'recherche'=>$ES['hits']['hits'],'mots'=>$recherche));
    }
 


}