<?php


class User_Model extends CI_Model
{
	//Loading database library, since we already did that in the config file it's not needed here
//	public function __construct()
//	{
//		$this->load->database();
//	}

	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
	function insert_data($data)
	{
		$this->db->insert("Users", $data);
	}
}
