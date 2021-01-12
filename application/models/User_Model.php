<?php


class User_Model extends CI_Model
{
	//Loading database library, since we already did that in the config file it's not needed here
//	public function __construct()
//	{
//		$this->load->database();
//	}

	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function get_user_with_id($id)
	{
		$query = $this->db->get_where('users',array('id'=>$id));
		//using $query result will return an array. Meanwhile row will get you just one
//		return $query->row(); don't user row it will return an std class and generate problems
		return $query->row_array();

	}
	//Method 1
//	function insert_data($data)
//	{
//		$this->db->insert("Users", $data);
//	}
	// the password is encrypted in the controller
		function insert_data($enc_password)
		{
		$data = array(
			'username' =>$this->input->post('u_name'),
			'email'=>$this->input->post('u_email'),
			'password'=>$enc_password
);
		 $this->db->insert("Users", $data);
		 $user_id = $this->db->insert_id();
		 //return user id to be used to send email
		 return $user_id;

		}
		function update_data($id)
		{

			$username = $this->input->post('u_name');
			$email = $this->input->post('u_email');
			$pwd = $this->input->post('u_password');
//		die($email);
		$new_data = array(
			'username' => $username,
			'email' => $email,
		);

		if ($pwd != null) {
			$new_data['password'] = md5($pwd);
		}

			$this->db->where('id', $id);
			$this->db->update("Users", $new_data);

			// updating session with new info
			if ($this->session->userdata('u_name') != $username) {
				$this->session->set_userdata('username', $username);
			}
			if ($this->session->userdata('u_email') != $email){
				$this->session->set_userdata('email', $email);
			}

		 $user_id = $this->db->insert_id();
		 //return user id to be used to send email
		 return $user_id;

		}

		//Check username exists
	public function check_username_exists($username){
	$query = $this->db->get_where('users', array('username' =>$username));
	//in php 5.4 you use row_array()
   //row_array()
	//Returns a single result row. If your query has more than one row, it returns only the first row.
	//Identical to the row() method, except it returns an array.
	if (empty($query->row_array())){
		//empty
		return true;
	}else{
		//at least one row
		return false;
	}
	}
	//Check email exists
	public function check_email_exists($email){
	$query = $this->db->get_where('users', array('email' =>$email));
	//in php 5.4 you use row_array()
   //row_array()
	//Returns a single result row. If your query has more than one row, it returns only the first row.
	//Identical to the row() method, except it returns an array.
	if (empty($query->row_array())){
		//empty
		return true;
	}else{
		//at least one row
		return false;
	}
	}
	//Checking user credentials
	public function login($u_email, $u_pwd){
		$this->db->where('email', $u_email);
		$this->db->where('password', $u_pwd);
//		die($this->db->where('email', $u_email));
		$result = $this->db->get('users');
		if ($result->num_rows() == 1){
			//row 0 = column 0 which is the id that we need
			return $result->row(0);
		}else{
			return false;
		}
	}
}
