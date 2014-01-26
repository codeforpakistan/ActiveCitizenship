<?php
class course_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'course_name', 
                     'label'   => 'courseector Track Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'course_levelofeducation', 
                     'label'   => 'Level of Education', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'course_degreeprogram', 
                     'label'   => 'Degree Program', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'course_duration', 
                     'label'   => 'Course Duration', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'course_institution', 
                     'label'   => 'Institution', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'city_id', 
                     'label'   => 'City', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				   array(
                     'field'   => 'course_fieldofeducation', 
                     'label'   => 'Field of Education', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
              
             
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","course as j
														LEFT JOIN studytrack as st 
														 		     ON st.studytrack_id=j.studytrack_id
														 LEFT JOIN city as c
														 			ON j.city_id=c.city_id",
														"course_status=1","course_name","","");
		//echo '<pre>'; print_r($data->result_array()); die;
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","course as j
														 LEFT JOIN studytrack as st 
														 		     ON st.studytrack_id=j.studytrack_id
														 LEFT JOIN city as c
														 			ON j.city_id=c.city_id
														","course_status=0","course_name","","");
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
		$data=$this->general_model->selectRecord("*","course as j
														LEFT JOIN studytrack as st 
														 		     ON st.studytrack_id=j.studytrack_id
														 LEFT JOIN city as c
														 			ON j.city_id=c.city_id
														","","course_name",$limit,"");
			
		return $data;		
		
	}
	
	public function deActivecourse($id)
	{		
		if($this->general_model->deactiveteEntry("course","course_id=".$id))return true; 		
	}
	public function Activecourse($id)
	{
		
		if($this->general_model->activeteEntry("course","course_id=".$id))	return true;
		
		
	}
	
	public function getcourseById($id)
	{
		$course=$this->general_model->selectRecord("*","course","course_id=?","","",array($id));
		return $course->row();
		
	}
}
?>