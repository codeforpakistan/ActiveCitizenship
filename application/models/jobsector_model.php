<?php
class jobsector_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'jobsector_title', 
                     'label'   => 'Jobsector Track Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobsector","jobsector_status=1","jobsector_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobsector","jobsector_status=0","jobsector_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","jobsector","","jobsector_title","","");
		return $data;		
	}
	
	public function deActiveJobsector($id)
	{		
		if($this->general_model->deactiveteEntry("jobsector","jobsector_id=".$id))return true; 		
	}
	public function ActiveJobsector($id)
	{
		
		if($this->general_model->activeteEntry("jobsector","jobsector_id=".$id))	return true;
		
		
	}
	
	public function getJobsectorById($id)
	{
		$jobsector=$this->general_model->selectRecord("*","jobsector","jobsector_id=?","","",array($id));
		return $jobsector->row();
		
	}
}
?>