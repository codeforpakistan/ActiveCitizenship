<?php
class jobgroup_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'jobgroup_title', 
                     'label'   => 'Job Group  Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobgroup","jobgroup_status=1","jobgroup_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobgroup","jobgroup_status=0","jobgroup_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","jobgroup","","jobgroup_title","","");
		return $data;		
	}
	
	public function deActiveJobGroup($id)
	{		
		if($this->general_model->deactiveteEntry("jobgroup","jobgroup_id=".$id))return true; 		
	}
	public function ActiveJobGroup($id)
	{
		
		if($this->general_model->activeteEntry("jobgroup","jobgroup_id=".$id))	return true;
		
		
	}
	
	public function getJobGroupById($id)
	{
		$jobgroup=$this->general_model->selectRecord("*","jobgroup","jobgroup_id=?","","",array($id));
		return $jobgroup->row();
		
	}
}
?>