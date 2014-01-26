<?php
class occupation_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'occupation_title', 
                     'label'   => 'Occupation Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				 array(
                     'field'   => 'occupation_othertitles', 
                     'label'   => 'Occupation Other Titles', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","occupation","occupation_status=1","occupation_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","occupation","occupation_status=0","occupation_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","occupation","","occupation_title","","");
		return $data;		
	}
	
	public function deActiveOccupation($id)
	{		
		if($this->general_model->deactiveteEntry("occupation","occupation_id=".$id))return true; 		
	}
	public function ActiveOccupation($id)
	{
		
		if($this->general_model->activeteEntry("occupation","occupation_id=".$id))	return true;
		
		
	}
	
	public function getOccupationById($id)
	{
		$occupation=$this->general_model->selectRecord("*","occupation","occupation_id=?","","",array($id));
		return $occupation->row();
		
	}
}
?>