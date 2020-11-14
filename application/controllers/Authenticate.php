<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller
{


	public function login()
	{
		//echo "Login";
		$this->load->view('include/header');
		$this->load->view('authenticate/login');
		$this->load->view('include/footer');
	}
	public function login_Process()
	{
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('u_email', 'Email', 'required');
		$this->form_validation->set_rules('u_password', 'Password', 'required');

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->login();
		} else {
			//Get user credentials
			$u_email = $this->input->post('u_email');
			$u_pwd = md5($this->input->post('u_password'));
//			die('email: '.$u_email.'and pwd: '.$u_pwd);

			//Login user
			$u_id = $this->User_Model->login($u_email, $u_pwd);
//			die('id: '.$u_id);

			//If user exists then an is is returned from the model,
			if ($u_id){
				//Create session
				$user_data = array(
					'u_id'=> $u_id,
					'u_email'=>$u_email,
					'logged_in'=> true
				);
				$this->session->set_userdata($user_data);
//				die('success');
				//Redirect with session message
				$this->session->set_flashdata('success', 'You are now logged-In');
				redirect('products');
			}else{
				$this->session->set_flashdata('error', 'Wrong credentials.');
				//don't use redirect you need to load the view or else you'll loose session data
//				die('here');
				$this->login();
			}

		}
	}
	public function register()
	{

		$this->load->view('include/header');
		$this->load->view('authenticate/register');
		$this->load->view('include/footer');

	}
	public function register_Process()
	{
//		echo "here 1";

		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('u_name', 'UserName', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('u_email', 'Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('u_password', 'Password', 'required');
//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->register();
		}else{
			//True, we already added models to auto load configuration file
			//$this->load->model('User_Model');

//			$u_name = $this->input->post('u_name');
//			$u_email = $this->input->post('u_email');
			//Encrypting password using md5
			$u_pwd = md5($this->input->post('u_password'));
			$this->User_Model->insert_data($u_pwd);
			$this->session->set_flashdata('success','Registration Successful, Please log-in to your account.');
			redirect('login');
			//Putting data into array
//			$user_data = array(
//				"username" => $u_name,
//				"email" => $u_email,
//				"password" => $u_pwd
//			);
//				if($this->User->insert_data($user_data) == true)
//			{
////				redirect('login');
////			}else{
////					//redirect with session error
////				}$this->session->set_flashdata('message','User added Successfully');
//
//				echo "<pre>";
//				var_dump($user_data);
//				echo "</pre>";

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

	public function logout()
	{
		//Unset the user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('success','You are logged out ! We hope you come back soon. ');
		redirect('login');
		}
}
