<?php
class country_model extends CI_Model{
	
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
		return  $this->general_model->selectRecord("*","country","country_status=1","country_name","","");
	}
	public function fetchInActive()
	{		
		$data=$this->general_model->selectRecord("*","country","country_status=0","country_name","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","country","","country_name","","");
		return $data;
		
	}
	
	public function deActiveCountry($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("country","country_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveCountry($id)
	{
		
		if($this->general_model->activeteEntry("country","country_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getCountryById($id)
	{
		$country=$this->general_model->selectRecord("*","country","country_id=?","","",array($id));
		//echo '<pre>';
		//print_r($country); 
		return $country->row();
		
	}
}
?>