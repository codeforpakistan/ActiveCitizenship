<?php
class age_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'age_title', 
                     'label'   => 'Age Group Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","age","age_status=1","age_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","age","age_status=0","age_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","age","","age_title","","");
		return $data;
		
	}
	
	public function deActiveAge($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("age","age_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveAge($id)
	{
		
		if($this->general_model->activeteEntry("age","age_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getAgeById($id)
	{
		$age=$this->general_model->selectRecord("*","age","age_id=?","","",array($id));
		//echo '<pre>';
		//print_r($age); 
		return $age->row();
		
	}
}
?>