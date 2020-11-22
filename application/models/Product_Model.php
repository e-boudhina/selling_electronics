<?php


class Product_Model extends CI_Model
{

	public function get_All()
	{
		$query = $this->db->get('Products');
		return $query->result_array();
	}
	public function get_by_Id($id)
	{
		$query = $this->db->get_where('products', array('id' =>$id));
		return $query->row_array();
	}
	function add_product($data)
	{
		$this->db->insert("Products", $data);
	}
	function update_product($id)
	{
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		//Putting data into array
		$product_data = array(
			"name" => $name,
			"description" => $description,
		);
		$this->db->where('id', $id);
		$this->db->update("Products", $product_data);
	}
	function delete_product_by_Id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('products');
	}
}
