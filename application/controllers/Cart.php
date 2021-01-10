<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{

	/*
	I used the construct method because to avoid implementing it in ever method.
	 This way the code is cleaner, when the controller is called it directly checks for the the session variable before executing any method
	*/
	function __construct()
	{
		//executing parent constructor so we don't lose the session variables
		// I still don't fully understand thhis
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('error', 'You Must Log In First!');
			redirect('login');
		}
	}

	public function index()
	{
//		print_r('here1');
		$loggedIn_user_id = $this->session->userdata('u_id');
//		print_r($loggedIn_user_id);
//		die($this->session->userdata('u_name'));

		$this->load->model('Order_Model');


//		print_r($this->Order_Model->get_All($loggedIn_user_id));


		$data['orders'] = $this->Order_Model->get_All($loggedIn_user_id);
//		print "<pre>";
//		print_r($data);
//		print(count($data));
//		print "</pre>";
//		die($data);
		$this->load->view('include/header');
		$this->load->view('orders/index', $data);
		$this->load->view('include/footer');
	}


	public function edit($id)
	{
		//Retrieving the product by id
		$data['product'] = $this->Product_Model->get_by_Id($id);
// 		die($data);
		$this->load->view('include/header');
		$this->load->view('products/edit', $data);
		$this->load->view('include/footer');
	}

	public function update($id)
	{

//		echo "here 1";

		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->edit($id);
//						echo "here 10";

		} else {
			//True
			//Updating can be done here but it is recommended that it should be done in the model
			//I passed the id parameter to the model but you can choose not to and extract it within the model using $this->input
			$this->Product_Model->update_product($id);
			$this->session->set_flashdata('success', 'Product Updated Successfully');
//			echo "here 4";
			// don't use this->index() to redirect
			redirect('products');
		}
	}

	public function store($id1, $id2)
	{
//		die('user id : '.$id1.' , product_id : '.$id2);

		$this->Order_Model->add_order($id1, $id2);
		$this->session->set_flashdata('success', 'Product added To Cart Successfully');
//			echo "here 4";
		// don't use this->index() to redirect
		redirect('home');

	}

	public function delete($id)
	{
		$this->Order_Model->delete_order_by_Id($id);
		$this->session->set_flashdata('success', 'Order Deleted Successfully');
		redirect('customer/orders');
	}

	// 2 ways to resolve this you either use one method and send an input hidden field containing "add/decrease" or use the following basic method
	public function quantity_add_one($id)
	{
		$this->Order_Model->update_product_quantity_by_adding_one($id);
		$this->session->set_flashdata('success', 'Order Quantity Updated Successfully');
		redirect('customer/orders');
	}

	public function quantity_remove_one($id)
	{
		$this->Order_Model->update_product_quantity_by_removing_one($id);
		$this->session->set_flashdata('success', 'Order Quantity Updated Successfully');
		redirect('customer/orders');


	}
}
