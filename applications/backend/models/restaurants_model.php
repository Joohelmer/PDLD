<?php


class Restaurants_model extends CI_Model  {
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getInfos($table)
	{
		$this->db->select('*');
		$this->db->order_by('id desc');
		return $this->db->get($table);
	}


	public function getVilles()
	{
		$this->db->select('*');
		$this->db->order_by('nom ASC');
		return $this->db->get('villes');
	}
}	