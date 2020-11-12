<?php


class Product_Model extends CI_Model
{

	public function get_All()
	{
		$query = $this->db->get('Products');
		return $query->result_array();
	}
	function add_product($data)
	{
		$this->db->insert("Products", $data);
	}
}
