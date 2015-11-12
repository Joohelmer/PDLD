<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('truncate');

    }

    public function index()
    {
        $data = array();

        $data['menu'] = 'accueil';

        $data['actualites'] = $this->db->query('SELECT * FROM actualites WHERE actif = 1 LIMIT 2' )->result();
        
        $data['sliders'] = $this->db->query('SELECT * FROM slider_homepage' )->result();

        $data['evenements'] = $this->db->query('SELECT * FROM evenements  WHERE fin >= "'. date('Y-m-d') .'" ORDER BY debut DESC LIMIT 3')->result();

        $data['restaurants'] = $this->db->query('SELECT * FROM restaurants  WHERE statut = "actif" LIMIT 6')->result();

        $data['seo'] = $this->db->query('SELECT * FROM seo  WHERE page = "accueil"')->row();

        $this->load->view('home.php', $data);
    }

    public function inscription_newsletter(){
        $recherche = $this->input->post('newsletter', TRUE);

        set_alert('success_newsletter', 'Inscription réussi.');

    }

    public function showMap(){

        $type = $this->input->post('type', TRUE);
        $id = $this->input->post('id', TRUE);


        switch ($type) {
            case 'restaurants':
                $infomap = $this->db->query('SELECT * FROM restaurants  WHERE id = '.(int)$id)->row();
                $allinfos = $this->db->query('SELECT * FROM restaurants')->result();
                break;
            case 'evenements':
                $infomap = $this->db->query('SELECT * FROM evenements  WHERE id = '.(int)$id)->row();
                $allinfos = $this->db->query('SELECT * FROM evenements')->result();
                break;
                break;
            case 'hebergements':
                # code...
                break;
            case 'commerces':
                # code...
                break;
            
            default:
                $infomap = false;
                break;
        }

        echo json_encode(array('infomap' => $infomap,'allinfos' => $allinfos));      
    }

    public function grep_db($db_name, $search_values,$type,$truncate)
    {
        // Init vars
        $table_fields = array();
        $cumulative_results = array();

        switch ($type) {
            case 'tout':
                $table_name = "restaurants' , 'evenements";
                break;
            case 'restaurants':
                $table_name = 'restaurants';
                break;
            case 'evenements':
                $table_name = 'evenements';
                break;        
            default:
                $table_name = "restaurants' , 'evenements";
                break;
        }

        // Pull all table columns that have character data types
        $result = $this->db->query("
            SELECT TABLE_NAME, COLUMN_NAME, DATA_TYPE
            FROM  `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE  `TABLE_SCHEMA` =  '{$db_name}'
            AND `TABLE_NAME` IN ('{$table_name}')
            AND `DATA_TYPE` IN ('varchar', 'char', 'text')
            AND `COLUMN_NAME` IN ('titre', 'description')
            ")->result_array();
        // Build table-keyed columns so we know which to query
        foreach ( $result  as $o ) 
        {
            $table_fields[$o['TABLE_NAME']][] = $o['COLUMN_NAME'];          
        }
        
        // Build search query to pull the affected rows
        // Search Each Row for matches
        foreach($table_fields as $table_name => $fields)
        {
            // Clear search array
            $search_array = array();
            
            // Add a search for each search match
            foreach($fields as $field)
            {
                $search_array[] = " `{$field}` LIKE '%{$search_values}%' collate utf8_general_ci";
            }
            // Implode $search_array
            $search_string = implode (' OR ', $search_array);
            $query_string = "SELECT * FROM `{$table_name}` WHERE {$search_string}";
            
            $table_results = $this->db->query($query_string)->result();
            if(count($table_results) > 0){
                foreach ($table_results as $v) {
                    $v->table = $table_name;
                }
            } 
            $cumulative_results = array_merge($cumulative_results, $table_results);
        }

        $cumulative_results_sort = $this->sortArray($cumulative_results, $search_values,$truncate);
      
        return $cumulative_results_sort;
    }

    public function sortArray($results = array(), $words = array(),$truncate){

        $sortArray = array();
        $bestpercent = 0;
        $lastpercent = 0;

        //Pour chaque Résultat trouvé en Base donnée
        foreach ($results as $key => $value) {
            //Pour chaque valeur de chaque correspondance
            foreach ($value as $v){
                similar_text(strtolower($words),strtolower($v),$percent);
                
                if($percent >= $bestpercent){
                    $bestpercent = $percent;
                }
            }

            $bestpercent = 0;
            
            if($lastpercent >= $bestpercent){
                $lastpercent = $bestpercent;
                array_unshift($sortArray, $value);
            }
            else{
                array_push($sortArray, $value);
            }
        }

        if($truncate > 0){
            return array_slice($sortArray, 0, $truncate);
        }
        else{
            return $sortArray;
        }
      
       
    }

    public function autocomplete(){
        $recherche = $this->input->get('recherche', TRUE);
        $type = $this->input->get('type', TRUE);

        $result = $this->grep_db('ci_bootstrap',$recherche,$type,4);

        $autocomplete = array();
        foreach ($result as $key => $r) {
            $autocomplete[$key]['titre'] = $r->titre;
            $autocomplete[$key]['image'] = $r->image1;
            $autocomplete[$key]['type'] = $r->table;
            $autocomplete[$key]['url'] = base_url().substr($r->table, 0, -1).'/'.$r->id.'/'.url_title($r->titre);
        }

        echo json_encode(array('type'=>$type,'recherche'=>$autocomplete,'mots'=>$recherche));
    }

    public function recherche(){
        $recherche = $this->input->get('query', TRUE);
        $type = $this->input->get('type', TRUE);
        $result = $this->grep_db('ci_bootstrap',$recherche,$type,0);

        var_dump($result);die;
    }


}