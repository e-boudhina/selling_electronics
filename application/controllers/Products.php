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
		// I still don't fully understand this
		parent::__construct();
		if (!$this->session->userdata('logged_in'))
		{
			$this->session->set_flashdata('error','You Must Log In First!');
			redirect('login');
		}elseif (!$this->session->userdata('u_admin'))
			{
				$this->session->set_flashdata('error','Not Authorized');
				redirect('home');
		}
//		print "<pre>";
//		print_r($this->session->userdata());
//		print "</pre>";
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
//		print "<pre>";
//		echo var_dump($this->input->post());
//		print "</pre>";
//		die();

		//Testing
		/*
		$config['upload_path'] = './assets/images/products';
		$config['allowed_types'] = 'jpeg|png';
		$config['max_size'] = '10';
		$this->load->library('upload',$config);

		$POST_ALL = $this->input->post();
		$FILE_ALL = $_FILES;
//				print "<pre>";
//		echo var_dump($FILE_ALL);
//		echo var_dump(isset($_FILES['image']));
//		print "</pre>";

		// This is the only way to get the file unlike laravel
		$file = $_FILES['image'];
		//Method 1
		$filenameWithExt = $_FILES['image']['name'];
		$filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
		$fileExt = pathinfo($filenameWithExt,PATHINFO_EXTENSION);


		//Method 2
		//Split the full name into an array based on the delimiter
		//$filenameArray = explode('.',$filenameWithExt);
		//$filename = $filenameArray[0];

		$fileNameToStore = $filename.'_'.time().'.'.$fileExt;

		var_dump($fileNameToStore);
		die("here");
		*/



		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Description', 'required|numeric');
//		$this->form_validation->set_rules('image', 'Image','jpg|png|jpeg');


//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
		$this->edit($id);
//						echo "here 10";

		} else {
			//True

			// If the request has an image
			if(!empty($_FILES['image']['name']))
			{
				// Handling the image

				//Setting config
				$config['allowed_types'] = 'jpeg||jpg|png';
				$config['upload_path'] = './assets/images/products/';
				$config['max_size'] = '20';
				//This must be set to false or else the saved name will contain "_" in place of space, by default it is set to True
				$config['remove_spaces'] = FALSE;
				$config['max_size'] = '0';
				// By default, for security reasons dots and other symbols are replaced by underscore
				/*
				 * Ref From CI DOC
				 * If set to TRUE, multiple filename extensions will be suffixed with an underscore in order to avoid triggering Apache mod_mime.
				 * DO NOT turn off this option if your upload directory is public, as this is a security risk.
				 */
				$config['mod_mime_fix'] = FALSE;

				//Changing filename
				$filenameWithExt = $_FILES['image']['name'];
//			die($filenameWithExt);
				$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
				$fileExt = pathinfo($filenameWithExt, PATHINFO_EXTENSION);

				$fileNameToStore = $filename . '_' . time() . '.' . $fileExt;
				$config['file_name'] = $fileNameToStore;
//			die($config['file_name']);
//			die($fileNameToStore);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
//			die("here 3");

				//Uploading file | do upload returns true or false
				//if error while trying to upload
				if (!$this->upload->do_upload('image')) {
					$errors = array('error' =>$this->upload->display_errors());
//					$this->load->view('products/error', $errors);
//					$this->edit($id);
					$this->session->set_flashdata('error', $errors['error']);
					 $this->edit($id);
//					print "<pre>";
//					echo var_dump($errors);
//		print "</pre>";
//		die('errors');
				}else{
					//If uploaded
					//delete old image
					$image_name_before_upload = $this->input->post('currentImageName');
					unlink("assets/images/products/".$image_name_before_upload);

					$data = array('upload_data' => $this->upload->data());

				}
				//			}else{die('image does not exist');}
			}

			if (empty($errors))
			{


			//Updating can be done here but it is recommended that it should be done in the model
			//I passed the id parameter to the model but you can choose not to and extract it within the model using $this->input
			$this->Product_Model->update_product($id,isset($fileNameToStore)?$fileNameToStore:null);
			$this->session->set_flashdata('success', 'Product Updated Successfully');
//			echo "here 4";
			// don't use this->index() to redirect
			redirect('products');
			}
		}
	}

	public function store()
	{

//		echo "here 1";
		//Loading the library
		$this->load->library('form_validation');
		//Form validation:
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description','required');
		$this->form_validation->set_rules('price', 'Price','required|numeric');
		$this->form_validation->set_rules('image', 'image','callback_check_image_exists');


//			echo "here 2";

		//Running validation:
		if ($this->form_validation->run() == false) {
			$this->create();

		}else {
			//True
			$this->load->model('Product_Model');


			// Handling the image

			//Setting config
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['upload_path'] = './assets/images/products/';
			$config['max_size'] = '20';

			//This must be set to false or else the saved name will contain "_" in place of space, by default it is set to True
			$config['remove_spaces'] = FALSE;
			$config['max_size'] = '0';
			// By default, for security reasons dots and other symbols are replaced by underscore
			$config['mod_mime_fix'] = FALSE;


			//Changing filename
			$filenameWithExt = $_FILES['image']['name'];
//			die($filenameWithExt);
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$fileExt = pathinfo($filenameWithExt, PATHINFO_EXTENSION);

			$fileNameToStore = $filename . '_' . time() . '.' . $fileExt;
			$config['file_name'] = $fileNameToStore;
//			die($config['file_name']);
//			die($fileNameToStore);
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
//			die("here 3");
			// Uploading
			if (!$this->upload->do_upload('image')) {
				$errors = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $errors['error']);
				$this->create();

			} else {
				//If uploaded
				$data = array('upload_data' => $this->upload->data());

			}


			if (empty($errors)) {
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$price = $this->input->post('price');
				$image = $fileNameToStore;

				//Putting data into array
				$product_data = array(
					"name" => $name,
					"description" => $description,
					"price" => $price,
					"image" => $image
				);

				$this->Product_Model->add_product($product_data);
				$this->session->set_flashdata('success', 'Product added Successfully');
//			echo "here 4";
				// don't use this->index() to redirect
				redirect('products');
			}
		}
	}

	public function check_image_exists()
	{
		//name of the message must match function name
		$this->form_validation->set_message('check_image_exists', 'Please select an image.');
		if (empty($_FILES['image']['name'])) {
			return false;
		}else{
			return true;
		}
	}
	public function delete($id)
	{
//		Fetching the product
		$data['product'] = $this->Product_Model->get_by_Id($id);
//		die($data['product']['image']);
		unlink("assets/images/products/".$data['product']['image']);
		$this->Product_Model->delete_product_by_Id($id);
		$this->session->set_flashdata('success','Product Deleted Successfully');
		redirect('products');
	}

}
