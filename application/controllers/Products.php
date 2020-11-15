<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {

	/*
	I used the construct method because to avoid implementing it in ever method.
	 This way the code is cleaner, when the controller is called it directly checks for the the session variable before executing any method
	*/
	function __construct()
	{
		//executing parent constructor so we don't lose the session variables
		// I still don't fully understand thhis
		parent::__construct();
		if (!$this->session->userdata('logged_in'))
		{
			$this->session->set_flashdata('error','You Must Log In First!');
			redirect('login');
		}
	}
	public function index()
	{

		$this->load->model('Product_Model');
		$data['products'] = $this->Product_Model->get_All();
//		print_r($data);
		$this->load->view('include/header');
		$this->load->view('products/index',$data);
		$this->load->view('include/footer');
	}
	public function create()
	{
		$this->load->view('include/header');
		$this->load->view('products/create');
		$this->load->view('include/footer');
	}
	public function edit($id)
	{
		//Retrieving the product by id
		$data['product'] = $this->Product_Model->get_by_Id($id);
// 		die($data);
		$this->load->view('include/header');
		$this->load->view('products/edit',$data);
		$this->load->view('include/footer');
	}

	public function update($id)
	{

//		echo "here 1";

		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');

//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->create();
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

	public function store()
	{

//		echo "here 1";

		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('category', 'Category','required');

//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->create();
//						echo "here 10";

		}else{
			//True
			$this->load->model('Product_Model');
//			echo "here 3";

			$title = $this->input->post('title');
			$category = $this->input->post('category');

			//Putting data into array
			$product_data = array(
				"title" => $title,
				"category" => $category,
			);

			$this->Product_Model->add_product($product_data);
			$this->session->set_flashdata('success','Product added Successfully');
//			echo "here 4";
			// don't use this->index() to redirect
			redirect('products');
		}
	}
	public function delete($id)
	{
		$this->Product_Model->delete_product_by_Id($id);
		$this->session->set_flashdata('success','Product Deleted Successfully');
		redirect('products');
	}

}
