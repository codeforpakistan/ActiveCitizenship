<?php
class constituency_model extends CI_Model{
	
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
		
		$data=$this->general_model->selectRecord("*","constiuency  INNER JOIN city ON constiuency.city_id=city.city_id","constiuency_status=1","constiuency_name","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		$username=$data['username'];
		$password= md5($data['password']);//$this->encrypt->encode($data['password']);
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","constiuency INNER JOIN city ON constiuency.city_id=city.city_id","status=0","constiuency_name","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","constiuency INNER JOIN city ON constiuency.city_id=city.city_id","","constiuency_name","","");
		return $data;
		
	}
	
	public function deActiveCity($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("constiuency","constiuency_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveCity($id)
	{
		
		if($this->general_model->activeteEntry("constiuency","constiuency_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getCityById($id)
	{
		$constiuency=$this->general_model->selectRecord("*","constiuency","constiuency_id=?","","",array($id));
		//echo '<pre>';
		//print_r($constiuency); 
		return $constiuency->row();
		
	}
}
?>