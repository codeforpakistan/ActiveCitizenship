<?php
class education_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'education_title', 
                     'label'   => 'Education Track Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","education","education_status=1","education_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","education","education_status=0","education_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","education","","education_title","","");
		return $data;		
	}
	
	public function deActiveEducation($id)
	{		
		if($this->general_model->deactiveteEntry("education","education_id=".$id))return true; 		
	}
	public function ActiveEducation($id)
	{
		
		if($this->general_model->activeteEntry("education","education_id=".$id))	return true;
		
		
	}
	
	public function getEducationById($id)
	{
		$education=$this->general_model->selectRecord("*","education","education_id=?","","",array($id));
		return $education->row();
		
	}
}
?>