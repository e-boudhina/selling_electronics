<?php


class Checkout extends CI_Controller
{
	function __construct()
	{
		//executing parent constructor so we don't lose the session variables
		// I still don't fully understand thhis
		parent::__construct();
//		die(count($this->Order_Model->get_All($this->session->userdata('u_id'))) ==2);

		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('error', 'You Must Log In First!');
			redirect('login');
		}
		elseif (count($this->Order_Model->get_All($this->session->userdata('u_id'))) == 0){
		$this->session->set_flashdata('error', 'You can not proceed to checkout with out ordering at least one product!');
		redirect('home');
		}
	}

	public function index()
	{
		die('here');
	}
}
