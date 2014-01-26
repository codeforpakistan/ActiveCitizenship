<?php
class organization_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'organization_name', 
                     'label'   => 'Organization', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{		
		return  $this->general_model->selectRecord("*","organization","organization_status=1","organization_name","","");
	}
	public function fetchInActive()
	{		
		$data=$this->general_model->selectRecord("*","organization","organization_status=0","organization_name","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","organization","","organization_name","","");
		return $data;
		
	}
	
	public function deActiveOrganization($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("organization","organization_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveOrganization($id)
	{
		
		if($this->general_model->activeteEntry("organization","organization_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getOrganizationById($id)
	{
		$organization=$this->general_model->selectRecord("*","organization","organization_id=?","","",array($id));
		//echo '<pre>';
		//print_r($organization); 
		return $organization->row();
		
	}
}
?>