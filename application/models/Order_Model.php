<?php


class Order_Model extends CI_Model
{

	//Pass in the specific user id
	public function get_All($id)
	{
		$this->db->select('o.id,o.user_id,o.product_id,p.name,p.description,p.price,o.quantity');
		$this->db->from('orders o');
		$this->db->join('users u', 'u.id = o.user_id');
		$this->db->join('products p', 'p.id = o.product_id');
		$this->db->order_by('o.id','asc');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_by_Id($id)
	{
//		$query = $this->db->get_where('products', array('id' =>$id));
//		return $query->row_array();
	}
	function add_order($u_id,$p_id)
	{
		//Putting data into array
		$order_data = array(
			"user_id" => $u_id,
			"product_id" => $p_id,
		);
		$this->db->insert("Orders", $order_data);
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
	function delete_order_by_Id($id)
	{
//		die('here id = '.$id);
		$query = $this->db->where('id', $id);
//		die('here id = '.$id);
		$result = $this->db->delete('orders');
	}
}
