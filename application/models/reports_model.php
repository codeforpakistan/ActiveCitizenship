<?php
class reports_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'username', 
                     'label'   => 'Username', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'trim|required|xss_clean'
                  )
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","reports  INNER JOIN area ON area.area_id=reports.area_id","reports_status=1","reports_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		$username=$data['username'];
		$password= md5($data['password']);//$this->encrypt->encode($data['password']);
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","reports INNER JOIN constiuency ON reports.constiuency_id=constiuency.constiuency_id","status=0","reports_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","reports INNER JOIN area ON area.area_id=reports.area_id","","reports_title","","");
		return $data;
		
	}
	
	public function deActiveArea($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("reports","reports_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveArea($id)
	{
		
		if($this->general_model->activeteEntry("reports","reports_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getAreaById($id)
	{
		$reports=$this->general_model->selectRecord("*","reports","reports_id=?","","",array($id));
		//echo '<pre>';
		//print_r($reports); 
		return $reports->row();
		
	}
}
?>