<?php
class experience_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'experience_title', 
                     'label'   => 'Experience Track Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","experience","experience_status=1","experience_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","experience","experience_status=0","experience_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","experience","","experience_title","","");
		return $data;		
	}
	
	public function deActiveExperience($id)
	{		
		if($this->general_model->deactiveteEntry("experience","experience_id=".$id))return true; 		
	}
	public function ActiveExperience($id)
	{
		
		if($this->general_model->activeteEntry("experience","experience_id=".$id))	return true;
		
		
	}
	
	public function getExperienceById($id)
	{
		$experience=$this->general_model->selectRecord("*","experience","experience_id=?","","",array($id));
		return $experience->row();
		
	}
}
?>