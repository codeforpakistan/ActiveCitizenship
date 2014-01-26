<?php
class job_model extends CI_Model{
	
	public $validationrules;
	
	function __construct()
	{
			parent::__construct();
			$this->validationrules=array(
				array(
                     'field'   => 'job_title', 
                     'label'   => 'Job Title', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'jobsector_id', 
                     'label'   => 'Jobsector', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'city_id', 
                     'label'   => 'City', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'country_id', 
                     'label'   => 'Country Name', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'posted_date', 
                     'label'   => 'Job Posted Date', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'organization_id', 
                     'label'   => 'Organization Name', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
				  array(
                     'field'   => 'jobsource_id', 
                     'label'   => 'Job Source', 
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
			$this->validationrulesjobtrack=array(
				array(
                     'field'   => 'careertrack_id', 
                     'label'   => 'Career Track', 
                     'rules'   => 'trim|required|xss_clean'
                  ),
			);
	}
	public function fetchActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobs as j
														 LEFT JOIN jobsector as js 
														 		     ON js.jobsector_id=j.jobsector_id
														 LEFT JOIN city as c
														 			ON j.city_id=c.city_id
														LEFT JOIN jobsource 
														 			ON j.jobsource_id=jobsource.jobsource_id",
														"jobs_status=1","job_title","","");
		//echo '<pre>'; print_r($data->result_array()); die;
		return $data;
		
	}
	public function fetchInActive()
	{
		
		$data=$this->general_model->selectRecord("*","jobs as j
														 LEFT JOIN jobsector as js 
														 		     ON js.jobsector_id=j.jobsector_id
														 LEFT JOIN city as c
														 			ON j.city_id=c.city_id
														LEFT JOIN jobsource 
														 			ON j.jobsource_id=jobsource.jobsource_id
														","jobs_status=0","job_title","","");
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
		$data=$this->general_model->selectRecord("*","jobs as j
														 LEFT JOIN jobsector as js 
														 		     ON js.jobsector_id=j.jobsector_id
														 LEFT JOIN city as c
														 			ON j.city_id=c.city_id
														LEFT JOIN jobsource 
														 			ON j.jobsource_id=jobsource.jobsource_id
														","","job_title",$limit,"");
			
		return $data;		
		
	}
	
	public function deActiveJobs($id)
	{		
		if($this->general_model->deactiveteEntry("jobs","job_id=".$id))return true; 		
	}
	public function ActiveJobs($id)
	{
		
		if($this->general_model->activeteEntry("jobs","job_id=".$id))	return true;
		
		
	}
	
	public function getJobById($id)
	{
		$job=$this->general_model->selectRecord("*","jobs","job_id=?","","",array($id));
		return $job->row();
		
	}
	public function deleteFOW($id)
	{
		//echo $id;
		$this->db->delete("jobs_fieldofwork",array("jf_id"=>$id));
	}
	public function deleteCT($id)
	{
		//echo $id;
		$this->db->delete("jobs_careertrack",array("jc_id"=>$id));
	}
	public function fetchCareerFieldOfWork($job_id)
	{
		
		$data=$this->general_model->selectRecord("o.*,co.jf_id","jobs_fieldofwork as  co
														LEFT JOIN fieldofwork as o 
														 		     ON o.fieldofwork_id=co.fieldofwork_id
														 LEFT JOIN jobs as c
														 			ON co.job_id=c.job_id
														","","fieldofwork_title","","");
		return $data;
		
	}
	public function fetchCareerTracks($job_id)
	{
		
		$data=$this->general_model->selectRecord("o.*,co.jc_id","jobs_careertrack as  co
														LEFT JOIN careertrack as o 
														 		     ON o.careertrack_id=co.careertrack_id
														 LEFT JOIN jobs as c
														 			ON co.job_id=c.job_id
														","","careertrack_title","","");
		return $data;
		
	}
}
?>