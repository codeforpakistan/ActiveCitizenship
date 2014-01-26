<?php
class careertrack_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'careertrack_title', 
                     'label'   => 'Career Track Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","careertrack","careertrack_status=1","careertrack_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","careertrack","careertrack_status=0","careertrack_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","careertrack","","careertrack_title","","");
		return $data;		
	}
	
	public function deActiveCareer($id)
	{		
		if($this->general_model->deactiveteEntry("careertrack","careertrack_id=".$id))return true; 		
	}
	public function ActiveCareer($id)
	{
		
		if($this->general_model->activeteEntry("careertrack","careertrack_id=".$id))	return true;
		
		
	}
	
	public function getCareerById($id)
	{
		$careertrack=$this->general_model->selectRecord("*","careertrack","careertrack_id=?","","",array($id));
		return $careertrack->row();
		
	}
}
?>