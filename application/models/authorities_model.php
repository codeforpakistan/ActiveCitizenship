<?php
class authorities_model extends CI_Model{
	
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
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","authorities  ","authorities_status=1","authorities_name","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		$username=$data['username'];
		$password= md5($data['password']);//$this->encrypt->encode($data['password']);
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","authorities ","status=0","authorities_name","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","authorities ","","authorities_name","","");
		return $data;
		
	}
	
	public function deActiveAuthority($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("authorities","authorities_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveAuthority($id)
	{
		
		if($this->general_model->activeteEntry("authorities","authorities_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getAuthorityById($id)
	{
		$authorities=$this->general_model->selectRecord("*","authorities","authorities_id=?","","",array($id));
		//echo '<pre>';
		//print_r($authorities); 
		return $authorities->row();
		
	}
}
?>