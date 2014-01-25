<?php
class login_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'username', 
                     'label'   => 'Username', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'trim|required|xss_clean'
                  )
             
			);
	}
	public function validateuser($data)
	{
		$username=$data['username'];
		$password= md5($data['password']);//$this->encrypt->encode($data['password']);
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","management","username=? and password=?","","",array($username,$password));
		return $data;
		
	}
}
?>