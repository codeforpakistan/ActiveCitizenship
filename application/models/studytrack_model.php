<?php
class studytrack_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'studytrack_title', 
                     'label'   => 'Study Track Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","studytrack","studytrack_status=1","studytrack_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","studytrack","studytrack_status=0","studytrack_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		$data=$this->general_model->selectRecord("*","studytrack","","studytrack_title","","");
		return $data;		
	}
	
	public function deActiveStudyTrack($id)
	{		
		if($this->general_model->deactiveteEntry("studytrack","studytrack_id=".$id))return true; 		
	}
	public function ActiveStudyTrack($id)
	{
		
		if($this->general_model->activeteEntry("studytrack","studytrack_id=".$id))	return true;
		
		
	}
	
	public function getStudyTrackById($id)
	{
		$studytrack=$this->general_model->selectRecord("*","studytrack","studytrack_id=?","","",array($id));
		return $studytrack->row();
		
	}
}
?>