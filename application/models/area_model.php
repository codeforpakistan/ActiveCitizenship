<?php
class area_model extends CI_Model{
	
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
		
		$data=$this->general_model->selectRecord("*","area  INNER JOIN constiuency ON area.constiuency_id=constiuency.constiuency_id","area_status=1","area_title","","");
		return $data;
		
	}
	public function fetchInActive()
	{
		$username=$data['username'];
		$password= md5($data['password']);//$this->encrypt->encode($data['password']);
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","area INNER JOIN constiuency ON area.constiuency_id=constiuency.constiuency_id","status=0","area_title","","");
		return $data;
		
	}
	public function fetchAll()
	{
		
		//echo md5($password);
		$data=$this->general_model->selectRecord("*","area INNER JOIN constiuency ON area.constiuency_id=constiuency.constiuency_id","","area_title","","");
		return $data;
		
	}
	
	public function deActiveArea($id)
	{
		//echo "Fdfd";
		if($this->general_model->deactiveteEntry("area","area_id=".$id))
		{
			//echo "Fdfd";
				return true;
		}
		
	}
	public function ActiveArea($id)
	{
		
		if($this->general_model->activeteEntry("area","area_id=".$id))
		{
			
				return true;
		}
		
	}
	
	public function getAreaById($id)
	{
		$area=$this->general_model->selectRecord("*","area","area_id=?","","",array($id));
		//echo '<pre>';
		//print_r($area); 
		return $area->row();
		
	}
}
?>