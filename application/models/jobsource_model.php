<?php
class jobsource_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'jobsource_title', 
                     'label'   => 'Job Source', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{		
		return  $this->general_model->selectRecord("*","jobsource","jobsource_status=1","jobsource_title","","");
	}
	public function fetchInActive()
	{		
		$data=$this->general_model->selectRecord("*","jobsource","jobsource_status=0","jobsource_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","jobsource","","jobsource_title","","");
		return $data;
		
	}
	
	public function deActiveOccupationGroup($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("jobsource","jobsource_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveOccupationGroup($id)
	{
		
		if($this->general_model->activeteEntry("jobsource","jobsource_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getOccupationGroupById($id)
	{
		$jobsource=$this->general_model->selectRecord("*","jobsource","jobsource_id=?","","",array($id));
		//echo '<pre>';
		//print_r($jobsource); 
		return $jobsource->row();
		
	}
}
?>