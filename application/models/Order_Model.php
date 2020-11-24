<?php


class Order_Model extends CI_Model
{

	//Pass in the specific user id
	public function get_All($id)
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('users', 'users.id = orders.user_id');
		$this->db->join('products', 'products.id = orders.product_id');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_Id($id)
	{
//		$query = $this->db->get_where('products', array('id' =>$id));
//		return $query->row_array();
	}
	function add_order()
	{
		$user_id = $this->input->post('user_id');
		$product_id = $this->input->post('product_id');
		//Putting data into array
		$order_data = array(
			"user_id" => $user_id,
			"product_id" => $product_id,
		);
		$this->db->insert("Products", $order_data);
	}
	function update_product($id)
	{
//		$user_id = $this->input->post('user_id');
//		$product_id = $this->input->post('product_id');
//		//Putting data into array
//		$order_data = array(
//			"user_id" => $user_id,
//			"product_id" => $product_id,
//		);
//		$this->db->where('id', $id);
//		$this->db->update("Products", $product_data);
	}
	function delete_product_by_Id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('products');
	}
}
