<?php


class CartV2 extends CI_Controller
{
//	function __construct()
//	{
//		parent::__construct();
//		$basic_data= [
//			'cart' => true,
//
//		];
//		$this->session->set_userdata($basic_data);
//	}
	public function index()
	{
//		print "<pre>";
//		print_r(count($this->session->userdata('items')));
//		print "</pre>";
//		die('here2');
		if ($this->session->userdata('cart') && count($this->session->userdata('items')) == 0)
		{
			$this->session->set_flashdata('error','You Must Add One Item Before Accessing Your Cart!');
			redirect('home');
		}
	}
	public function add_item($product_id)
	{
//		$this->session->sess_destroy();
		$items[] = $this->session->userdata('items');
v
//		die('here');
//		print_r(count($items));
//		die('here');
		$item = array(
			'item_id' => $product_id,
			'quantity' => 1
		);
		array_push($items,$item);




		//Updating session items
		$this->session->set_userdata( 'items',$items);

		print "<pre>";
		print_r($items);
		print "</pre>";
		die('here');
		$this->session->set_flashdata('success','Product added To Cart Successfully');
		redirect('home');
	}
}
