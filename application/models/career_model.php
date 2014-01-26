<?php
class career_model extends CI_Model{
	
	public $validationrules;
	public $validationrulesoccupation;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'occupation_id', 
                     'label'   => 'Occupation', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				array(
                     'field'   => 'career_worksummary', 
                     'label'   => 'Career Work Summary', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'career_duties', 
                     'label'   => 'Typical Duties', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'occupationgroup_id', 
                     'label'   => 'Occupation Group', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
			$this->validationrulesoccupation=array(
				array(
                     'field'   => 'occupation_id', 
                     'label'   => 'Occupation', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
			);
			$this->validationrulesfields=array(
				array(
                     'field'   => 'fieldofwork_id', 
                     'label'   => 'Field of Work', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
			);
			$this->validationrulescareertrack=array(
				array(
                     'field'   => 'careertrack_id', 
                     'label'   => 'Careertrack', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
			);
			$this->validationrulestudy=array(
				array(
                     'field'   => 'studytrack_id', 
                     'label'   => 'Study Track', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","career as j
														LEFT JOIN occupation as o 
														 		     ON o.occupation_id=j.occupation_id
														 LEFT JOIN occupationgroup as og
														 			ON j.occupationgroup_id=og.occupationgroup_id",
														"career_status=1","career_title","","");
		//echo '<pre>'; print_r($data->result_array()); die;
		return $data;
		
	}
	public function fetchCareerOccupation($career_id)
	{
		
		$data=$this->general_model->selectRecord("o.*,co.career_occupation_id","career_occupations as  co
														LEFT JOIN occupation as o 
														 		     ON o.occupation_id=co.occupation_id
														 LEFT JOIN career as c
														 			ON co.career_id=c.career_id
														","","occupation_title","","");
		return $data;
		
	}
	
	public function fetchCareerFieldOfWork($career_id)
	{
		
		$data=$this->general_model->selectRecord("o.*,co.cf_id","career_fieldofwork as  co
														LEFT JOIN fieldofwork as o 
														 		     ON o.fieldofwork_id=co.fieldofwork_id
														 LEFT JOIN career as c
														 			ON co.career_id=c.career_id
														","","fieldofwork_title","","");
		return $data;
		
	}
	public function fetchCareerTracks($career_id)
	{
		
		$data=$this->general_model->selectRecord("o.*,co.ct_id","career_careertrack as  co
														LEFT JOIN careertrack as o 
														 		     ON o.careertrack_id=co.careertrack_id
														 LEFT JOIN career as c
														 			ON co.career_id=c.career_id
														","","careertrack_title","","");
		return $data;
		
	}
	public function fetchCareerStudyTracks($career_id)
	{
		
		$data=$this->general_model->selectRecord("st.*,cs.cs_id","career_studytrack as  cs
														LEFT JOIN studytrack as st
														 		     ON st.studytrack_id=cs.studytrack_id
														 LEFT JOIN career as c
														 			ON cs.career_id=c.career_id
														","","studytrack_title","","");
		return $data;
		
	}

	public function deleteOccupations($id)
	{
		$this->db->delete("career_occupations",array("career_occupation_id"=>$id));
	}
	public function deleteFOW($id)
	{
		//echo $id;
		$this->db->delete("career_fieldofwork",array("cf_id"=>$id));
	}
	public function deleteCT($id)
	{
		//echo $id;
		$this->db->delete("career_careertrack",array("ct_id"=>$id));
	}
	public function deleteST($id)
	{
		//echo $id;
		$this->db->delete("career_studytrack",array("cs_id"=>$id));
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","career as j
														LEFT JOIN occupation as o 
														 		     ON o.occupation_id=j.occupation_id
														 LEFT JOIN occupationgroup as og
														 			ON j.occupationgroup_id=og.occupationgroup_id
														","career_status=0","career_title","","");
		return $data;
		
	}

	public function fetchAll($offset='',$pages="")
	{
		//echo "page".$pages;
		if($pages===""){
			//echo "FdfD";
			$limit="";
		}
		else{
		//	echo "33";
			$limit=$pages*$offset.",".$offset;
		}
			
		//echo "limit:".$limit."<br/>";
		$data=$this->general_model->selectRecord("*","career as j
														LEFT JOIN occupation as o 
														 		     ON o.occupation_id=j.occupation_id
														 LEFT JOIN occupationgroup as og
														 			ON j.occupationgroup_id=og.occupationgroup_id
														","","career_title",$limit,"");
			
		return $data;		
		
	}
	
	public function deActivecareer($id)
	{		
		if($this->general_model->deactiveteEntry("career","career_id=".$id))return true; 		
	}
	public function Activecareer($id)
	{
		
		if($this->general_model->activeteEntry("career","career_id=".$id))	return true;
		
		
	}
	
	public function getcareerById($id)
	{
		$career=$this->general_model->selectRecord("*","career","career_id=?","","",array($id));
		return $career->row();
		
	}
}
?>