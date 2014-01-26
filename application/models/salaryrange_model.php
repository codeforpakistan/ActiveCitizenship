<?php
class salaryrange_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'salaryrange_title', 
                     'label'   => 'Salary Range Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","salaryrange","salaryrange_status=1","salaryrange_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","salaryrange","salaryrange_status=0","salaryrange_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","salaryrange","","salaryrange_title","","");
		return $data;		
	}
	
	public function deActiveSalaryRange($id)
	{		
		if($this->general_model->deactiveteEntry("salaryrange","salaryrange_id=".$id))return true; 		
	}
	public function ActiveSalaryRange($id)
	{
		
		if($this->general_model->activeteEntry("salaryrange","salaryrange_id=".$id))	return true;
		
		
	}
	
	public function getSalaryRangeById($id)
	{
		$salaryrange=$this->general_model->selectRecord("*","salaryrange","salaryrange_id=?","","",array($id));
		return $salaryrange->row();
		
	}
}
?>