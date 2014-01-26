<?php
class fieldofwork_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'fieldofwork_title', 
                     'label'   => 'Job Type Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","fieldofwork","fieldofwork_status=1","fieldofwork_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","fieldofwork","fieldofwork_status=0","fieldofwork_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","fieldofwork","","fieldofwork_title","","");
		return $data;		
	}
	
	public function deActiveJobtype($id)
	{		
		if($this->general_model->deactiveteEntry("fieldofwork","fieldofwork_id=".$id))return true; 		
	}
	public function ActiveJobtype($id)
	{
		
		if($this->general_model->activeteEntry("fieldofwork","fieldofwork_id=".$id))	return true;
		
		
	}
	
	public function getJobtypeById($id)
	{
		$fieldofwork=$this->general_model->selectRecord("*","fieldofwork","fieldofwork_id=?","","",array($id));
		return $fieldofwork->row();
		
	}
}
?>