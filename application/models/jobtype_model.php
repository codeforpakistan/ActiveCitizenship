<?php
class jobtype_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'jobtype_title', 
                     'label'   => 'Job Type Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobtype","jobtype_status=1","jobtype_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobtype","jobtype_status=0","jobtype_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","jobtype","","jobtype_title","","");
		return $data;		
	}
	
	public function deActiveJobtype($id)
	{		
		if($this->general_model->deactiveteEntry("jobtype","jobtype_id=".$id))return true; 		
	}
	public function ActiveJobtype($id)
	{
		
		if($this->general_model->activeteEntry("jobtype","jobtype_id=".$id))	return true;
		
		
	}
	
	public function getJobtypeById($id)
	{
		$jobtype=$this->general_model->selectRecord("*","jobtype","jobtype_id=?","","",array($id));
		return $jobtype->row();
		
	}
}
?>