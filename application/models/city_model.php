<?php
class city_model extends CI_Model{
	
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
		
		$data=$this->general_model->selectRecord("*","city  INNER JOIN country ON city.country_id=country.country_id","city_status=1","city_name","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		$username=$data['username'];
		$password= md5($data['password']);//$this->encrypt->encode($data['password']);
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","city INNER JOIN country ON city.country_id=country.country_id","status=0","city_name","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","city INNER JOIN country ON city.country_id=country.country_id","","city_name","","");
		return $data;
		
	}
	
	public function deActiveCity($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("city","city_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveCity($id)
	{
		
		if($this->general_model->activeteEntry("city","city_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getCityById($id)
	{
		$city=$this->general_model->selectRecord("*","city","city_id=?","","",array($id));
		//echo '<pre>';
		//print_r($city); 
		return $city->row();
		
	}
}
?>