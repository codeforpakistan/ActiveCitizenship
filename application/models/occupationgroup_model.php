<?php
class occupationgroup_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'occupationgroup_title', 
                     'label'   => 'Job Source', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{		
		return  $this->general_model->selectRecord("*","occupationgroup","occupationgroup_status=1","occupationgroup_title","","");
	}
	public function fetchInActive()
	{		
		$data=$this->general_model->selectRecord("*","occupationgroup","occupationgroup_status=0","occupationgroup_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","occupationgroup","","occupationgroup_title","","");
		return $data;
		
	}
	
	public function deActiveOccupationGroup($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("occupationgroup","occupationgroup_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveOccupationGroup($id)
	{
		
		if($this->general_model->activeteEntry("occupationgroup","occupationgroup_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getOccupationGroupById($id)
	{
		$occupationgroup=$this->general_model->selectRecord("*","occupationgroup","occupationgroup_id=?","","",array($id));
		//echo '<pre>';
		//print_r($occupationgroup); 
		return $occupationgroup->row();
		
	}
}
?>