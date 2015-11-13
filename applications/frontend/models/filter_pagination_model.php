<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter_Pagination_Model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	// Count all record of table "contact_info" in database.
	public function record_count($table,$filter) {


        foreach ($filter as $key => $value) {
        	if($key != "page")
        		$this->db->where($key,(string)$value);
        }

			$this->db->where('statut','actif');
			$this->db->from($table);
		
		return $this->db->count_all_results();
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $page,$table,$filter) {
		if($page == 1){
			$this->db->limit($limit);
		}
		else{
			$page = $page - 1;
			$this->db->limit($limit,$page);
		}

		foreach ($filter as $key => $value) {
			if($key != "page")
        		$this->db->where($key,(string)$value);
        }

		$this->db->where('statut','actif');
		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
}
?>