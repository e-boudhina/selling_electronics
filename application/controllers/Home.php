<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		//Fetching the products to be sent to the main page
		$this->load->model('Product_Model');
		$data['products'] = $this->Product_Model->get_All();

		$this->load->view('include/header');
		$this->load->view('home',$data);
		$this->load->view('include/footer');

	}

	public function test()
	{
		echo "here";
	}
}
