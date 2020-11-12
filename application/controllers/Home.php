<?php


class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('home');
		$this->load->view('include/footer');

	}

	public function test()
	{
		echo "here";
	}
}
