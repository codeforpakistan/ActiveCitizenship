<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{	
		//print_r($this->session->userdata); die;
		if(isset($this->session->userdata[0]['username']))
		{
			redirect('welcome/index');
		}
		else
			$this->load->view('admin/login');
	}
	public function signin()
	{
		$data=$this->input->post();
		//print_r($data);
		$rules=$this->login_model->validationrules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() === true) {
			$data=$this->login_model->validateuser($data);
			
			if($data->num_rows==0){
					echo json_encode(array("error_code"=>1,
										"msg"=>"incorrect username or password"));
			}else{
					$this->session->set_userdata($data->result_array());
					echo json_encode(array("error_code"=>0,
										"msg"=>"login Successful"));
			}
				
		}else{
				echo json_encode(array("error_code"=>1,
										"msg"=>"incorrect username or password")); 
		}
		//print_r($_POST);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */