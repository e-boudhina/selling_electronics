<?php


class Order_Model extends CI_Model
{

	//Pass in the specific user id
	public function get_All($id)
	{
		$this->db->select('o.id,o.user_id,o.product_id,p.name,p.description,p.price,p.image,o.quantity');
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
	function update_product_quantity_by_adding_one($id)
	{
		//Fetching the order
		//method 1
//		$this->db->select('id');
//		$this->db->from('orders');
//		$this->db->where('id',$id);
//		$query=$this->db->get();

		// Method 2 simpler & shorter
		$query = $this->db->get_where('orders',array('id'=>$id));
		//using $query result will returnt and array. Meanwhile row ill get you just one
		$order = $query->row();
//		print "<pre>";
//		print_r($order->quantity);
//		print "</pre>";


		$current_quantity = $order->quantity;
		$new_quantity= $current_quantity + 1 ;

//		die($new_quantity);
		$this->db->where('id', $id);

		$this->db->update("orders",array("quantity" =>$new_quantity));
				return;

	}
	function update_product_quantity_by_removing_one($id)
	{
		$query = $this->db->get_where('orders',array('id'=>$id));
		//using $query result will return an array. Meanwhile row will get you just one
		$order = $query->row();
//		print "<pre>";
//		print_r($order->quantity);
//		print "</pre>";

		$current_quantity = $order->quantity;
		$new_quantity= $current_quantity - 1 ;

//		die($new_quantity);
		$this->db->where('id', $id);

		$this->db->update("orders",array("quantity" =>$new_quantity));
		return;
	}

	function delete_order_by_Id($id)
	{
//		die('here id = '.$id);
		$query = $this->db->where('id', $id);
//		die('here id = '.$id);
		$result = $this->db->delete('orders');
	}
}
