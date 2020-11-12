<?php


class Authenticate extends CI_Controller
{
	public function login()
	{
		//echo "Login";
		$this->load->view('include/header');
		$this->load->view('authenticate/login');
		$this->load->view('include/footer');
	}
	public function register()
	{

		$this->load->view('include/header');
		$this->load->view('authenticate/register');
		$this->load->view('include/footer');

	}
	public function login_Process()
	{
		if ($this->input->post('u_login'))
		{
			$u_email = $this->input->post('u_email');
			$u_pwd = md5($this->input->post('u_password'));
			$user_data = array(
				"u_name" => $u_email,
				"u_pwd" => $u_pwd
			);
			echo "<pre>";
			var_dump($user_data);
			echo "</pre>";
		}else{
			redirect('home','refresh');
		}
	}
	public function register_Process()
	{
//		echo "here 1";

		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('u_name', 'UserName', 'required');
		$this->form_validation->set_rules('u_email', 'Email','required');
		$this->form_validation->set_rules('u_password', 'Password', 'required');
//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->register();
		}else{
			//True
			$this->load->model('User_Model');
			echo "here 3";

			$u_name = $this->input->post('u_name');
			$u_email = $this->input->post('u_email');
			$u_pwd = md5($this->input->post('u_password'));

			//Putting data into array
			$user_data = array(
				"username" => $u_name,
				"email" => $u_email,
				"password" => $u_pwd
			);
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
			$this->User_Model->insert_data($user_data);
			$this->session->set_flashdata('success','Registration Successful, Please log-in to your account.');
			redirect('login');
		}
	}
}
