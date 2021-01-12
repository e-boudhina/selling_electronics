<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function index()
	{
		$this->load->view('include/header');
		$this->load->view('user/user-dashboard');
		$this->load->view('include/footer');
	}

	public function edit_profile($id)
	{
//		die($id);
		//Retrieving the product by id
		$data['user'] = $this->User_Model->get_user_with_id($id);
//		echo "<pre>";
// 		var_dump($data);
//		echo "</pre>";
//		die('here');
		$this->load->view('include/header');
		$this->load->view('user/user-profile',$data);
		$this->load->view('include/footer');
	}
	public function profile_update()
	{
//		echo "here 1";

		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('u_name', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('u_email', 'Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('u_password', 'Password');
//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->edit_profile($this->session->userdata('u_id'));
			$this->session->set_flashdata('info','Make sure you enter valid info. ');
		}else{

			$user_id = $this->User_Model->update_data($this->session->userdata('u_id'));

		// session update is within the model

//die('here');

//				echo "<pre>";
//				var_dump($user_data);
//				echo "</pre>";
			$this->session->set_flashdata('success','Profile updated. ');
			redirect('user/profile/'.$this->session->userdata('u_id'));

		}


	}
	//Check if username exists
	public function check_username_exists($username){
		$this->form_validation->set_message(
			'check_username_exists', 'That username is taken. Please Choose a different one.'
		);
		if ($this->User_Model->check_username_exists($username)){
			//if true
			return true;
		}else{
			return false;
		}
	}
	//Check if email exists
	public function check_email_exists($email){
		$this->form_validation->set_message(
			'check_email_exists', 'That email is taken. Please Choose a different one.'
		);
		if ($this->User_Model->check_email_exists($email)){
			//if true
			return true;
		}else{
			return false;
		}
	}


}
