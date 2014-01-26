<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public $data=array();
	public function __construct()
	{
		parent::__construct();
		if(!isset($this->session->userdata[0]['username']))
		{
			redirect('admin/index');
			
		}
		$config['upload_path'] = './uploads/';
			//echo $config['upload_path'];
			//echo (int)(bool)is_dir($config['upload_path']); die;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4000';
			$config['max_width']  = '4000';
			$config['max_height']  = '2000';
	
			$this->load->library('upload', $config);
		$this->populateDropDown();
	}
	
	public function index()
	{	
		/*$countries=$this->country_model->fetchActive();
		$arrcountries['']="Select One";
		foreach($countries->result_array() as $row) {
			$arrcountries[$row['country_id']]=$row['country_name'];
		}
		$this->data['countries']=$arrcountries;
		$occupationgroup=$this->occupationgroup_model->fetchActive();
		$arroccupationgroup['']="Select One";
		foreach($occupationgroup->result_array() as $row) {
			$arroccupationgroup[$row['occupationgroup_id']]=$row['occupationgroup_title'];
		}
		$this->data['occupationgroups']=$arroccupationgroup;
		$jobsectors=$this->jobsector_model->fetchActive();
		$arrjobsectors['']="Select One";
		foreach($jobsectors->result_array() as $row) {
			$arrjobsectors[$row['jobsector_id']]=$row['jobsector_title'];
		}
		$this->data['jobsectors']=$arrjobsectors;
		
		$countries=$this->country_model->fetchActive();
		$arrcountries['']="Select One";
		foreach($countries->result_array() as $row) {
			$arrcountriess[$row['country_id']]=$row['country_name'];
		}
		
		$jobgroups=$this->jobgroup_model->fetchActive();
		$arrjobs['']="Select One";
		foreach($jobgroups->result_array() as $row) {
			$arrjobgroups[$row['jobgroup_id']]=$row['jobgroup_title'];
		}
		$this->data['jobgroups']=$arrjobgroups;
		$cities=$this->city_model->fetchActive();
		$arrcities['']="Select One";
		foreach($cities->result_array() as $row) {
			$arrcities[$row['city_id']]=$row['city_name'];
		}
		$this->data['cities']=$arrcities;
		$educations=$this->education_model->fetchActive();
		$arreducation['']="Select One";
		foreach($educations->result_array() as $row) {
			$arreducation[$row['education_id']]=$row['education_title'];
		}
		$this->data['educations']=$arreducation;
		$experiences=$this->experience_model->fetchActive();
		$arrexperiences['']="Select One";
		foreach($experiences->result_array() as $row) {
			$arrexperiences[$row['experience_id']]=$row['experience_title'];
		}
		$this->data['experiences']=$arrexperiences;
		$salaryranges=$this->salaryrange_model->fetchActive();
		$arrsalaryranges['']="Select One";
		foreach($salaryranges->result_array() as $row) {
			$arrsalaryranges[$row['salaryrange_id']]=$row['salaryrange_title'];
		}
		$this->data['salaries']=$arrsalaryranges;
		$jobtypes=$this->jobtype_model->fetchActive();
		$arrjobtypes['']="Select One";
		foreach($jobtypes->result_array() as $row) {
			$arrjobtypes[$row['jobtype_id']]=$row['jobtype_title'];
		}
		$this->data['jobtypes']=$arrjobtypes;
		$organizations=$this->organization_model->fetchActive();
		$arrorganizations['']="Select One";
		foreach($organizations->result_array() as $row) {
			$arrorganizations[$row['organization_id']]=$row['organization_name'];
		}
		$this->data['organizations']=$arrorganizations;
		$jobsources=$this->jobsource_model->fetchActive();
		$arrjobsources['']="Select One";
		foreach($jobsources->result_array() as $row) {
			$arrjobsources[$row['jobsource_id']]=$row['jobsource_title'];
		}
		$this->data['jobsources']=$arrjobsources;
		$occupations=$this->occupation_model->fetchActive();
		$arroccupations['']="Select One";
		foreach($occupations->result_array() as $row) {
			$arroccupations[$row['occupation_id']]=$row['occupation_title'];
		}
		$this->data['occupations']=$arroccupations;
		$occupationgroups=$this->occupationgroup_model->fetchActive();
		$arroccupationgroupsn['']="Select One";
		foreach($occupationgroups->result_array() as $row) {
			$arroccupationgroups[$row['occupationgroup_id']]=$row['occupationgroup_title'];
		}
		$this->data['occupationgroups']=$arroccupationgroups;
        $fieldofwork=$this->fieldofwork_model->fetchActive();
		$arrfieldofwork['']="Select One";
		foreach($fieldofwork->result_array() as $row) {
			$arrfieldofwork[$row['fieldofwork_id']]=$row['fieldofwork_title'];
		}
		$this->data['fieldofworks']=$arrfieldofwork;
        $careertrack=$this->careertrack_model->fetchActive();
		$arrcareertrack['']="Select One";
		foreach($careertrack->result_array() as $row) {
			$arrcareertrack[$row['careertrack_id']]=$row['careertrack_title'];
		}
		$this->data['careertracks']=$arrcareertrack;
		$agegroups=$this->age_model->fetchActive();
		$arragegroups['']="Select One";
		foreach($agegroups->result_array() as $row) {
			$arragegroups[$row['age_id']]=$row['age_title'];
		}
		$this->data['agegroups']=$arragegroups;
	*/
		$this->data['jobs']=$this->job_model->fetchActive();
		$this->data['admin']=$this->session->userdata[0];
		$this->data['title']=" Welcome to Active Citizenship | Add Job";
		$this->data['subtitle']=" Add Job";
		$this->data['view']="addjob";
		$this->load->view('admin/dashboard',$this->data);
		
	}
	
	public function populateDropDown()
	{
		$countries=$this->country_model->fetchActive();
		$arrcountries['']="Select One";
		foreach($countries->result_array() as $row) {
			$arrcountries[$row['country_id']]=$row['country_name'];
		}
		$this->data['countries']=$arrcountries;
		$occupationgroup=$this->occupationgroup_model->fetchActive();
		$arroccupationgroup['']="Select One";
		foreach($occupationgroup->result_array() as $row) {
			$arroccupationgroup[$row['occupationgroup_id']]=$row['occupationgroup_title'];
		}
		$this->data['occupationgroups']=$arroccupationgroup;
		$jobsectors=$this->jobsector_model->fetchActive();
		$arrjobsectors['']="Select One";
		foreach($jobsectors->result_array() as $row) {
			$arrjobsectors[$row['jobsector_id']]=$row['jobsector_title'];
		}
		$this->data['jobsectors']=$arrjobsectors;
		
		$countries=$this->country_model->fetchActive();
		$arrcountries['']="Select One";
		foreach($countries->result_array() as $row) {
			$arrcountriess[$row['country_id']]=$row['country_name'];
		}
		
		$jobgroups=$this->jobgroup_model->fetchActive();
		$arrjobs['']="Select One";
		foreach($jobgroups->result_array() as $row) {
			$arrjobgroups[$row['jobgroup_id']]=$row['jobgroup_title'];
		}
		$this->data['jobgroups']=$arrjobgroups;
		$cities=$this->city_model->fetchActive();
		$arrcities['']="Select One";
		foreach($cities->result_array() as $row) {
			$arrcities[$row['city_id']]=$row['city_name'];
		}
		$this->data['cities']=$arrcities;
		$educations=$this->education_model->fetchActive();
		$arreducation['']="Select One";
		foreach($educations->result_array() as $row) {
			$arreducation[$row['education_id']]=$row['education_title'];
		}
		$this->data['educations']=$arreducation;
		$experiences=$this->experience_model->fetchActive();
		$arrexperiences['']="Select One";
		foreach($experiences->result_array() as $row) {
			$arrexperiences[$row['experience_id']]=$row['experience_title'];
		}
		$this->data['experiences']=$arrexperiences;
		$salaryranges=$this->salaryrange_model->fetchActive();
		$arrsalaryranges['']="Select One";
		foreach($salaryranges->result_array() as $row) {
			$arrsalaryranges[$row['salaryrange_id']]=$row['salaryrange_title'];
		}
		$this->data['salaries']=$arrsalaryranges;
		$jobtypes=$this->jobtype_model->fetchActive();
		$arrjobtypes['']="Select One";
		foreach($jobtypes->result_array() as $row) {
			$arrjobtypes[$row['jobtype_id']]=$row['jobtype_title'];
		}
		$this->data['jobtypes']=$arrjobtypes;
		$organizations=$this->organization_model->fetchActive();
		$arrorganizations['']="Select One";
		foreach($organizations->result_array() as $row) {
			$arrorganizations[$row['organization_id']]=$row['organization_name'];
		}
		$this->data['organizations']=$arrorganizations;
		$jobsources=$this->jobsource_model->fetchActive();
		$arrjobsources['']="Select One";
		foreach($jobsources->result_array() as $row) {
			$arrjobsources[$row['jobsource_id']]=$row['jobsource_title'];
		}
		$this->data['jobsources']=$arrjobsources;
		$occupations=$this->occupation_model->fetchActive();
		$arroccupations['']="Select One";
		foreach($occupations->result_array() as $row) {
			$arroccupations[$row['occupation_id']]=$row['occupation_title'];
		}
		$this->data['occupations']=$arroccupations;
		$occupationgroups=$this->occupationgroup_model->fetchActive();
		$arroccupationgroupsn['']="Select One";
		foreach($occupationgroups->result_array() as $row) {
			$arroccupationgroups[$row['occupationgroup_id']]=$row['occupationgroup_title'];
		}
		$this->data['occupationgroups']=$arroccupationgroups;
        $fieldofwork=$this->fieldofwork_model->fetchActive();
		$arrfieldofwork['']="Select One";
		foreach($fieldofwork->result_array() as $row) {
			$arrfieldofwork[$row['fieldofwork_id']]=$row['fieldofwork_title'];
		}
		$this->data['fieldofworks']=$arrfieldofwork;
        $careertrack=$this->careertrack_model->fetchActive();
		$arrcareertrack['']="Select One";
		foreach($careertrack->result_array() as $row) {
			$arrcareertrack[$row['careertrack_id']]=$row['careertrack_title'];
		}
		$this->data['careertracks']=$arrcareertrack;
		$agegroups=$this->age_model->fetchActive();
		$arragegroups['']="Select One";
		foreach($agegroups->result_array() as $row) {
			$arragegroups[$row['age_id']]=$row['age_title'];
		}
		$this->data['agegroups']=$arragegroups;
		
		/*$countries=$this->country_model->fetchActive();
		$cities=$this->city_model->fetchActive();
		$educations=$this->education_model->fetchActive();
		$experiences=$this->experience_model->fetchActive();
		$salaryranges=$this->salaryrange_model->fetchActive();
		$jobtypes=$this->jobtype_model->fetchActive();
		$organizations=$this->organization_model->fetchActive();
		$jobsources=$this->jobsource_model->fetchActive();
		$occupations=$this->occupation_model->fetchActive();
		$occupationgroups=$this->occupationgroup_model->fetchActive();
        $fieldofwork=$this->fieldofwork_model->fetchActive();
        $careertrack=$this->careertrack_model->fetchActive();	*/
		
	}
	function view($job_id)
	{
		
		$this->data['view']="jobsections";
		$this->data['subtitle']="Add Sections";	
		$this->data['title']=" Welcome to Pak career | Add Sub Sections";
		$this->data['messcareer']=" Record Entered Successfully";
		$this->data['job']=$this->job_model->getJobById($job_id);	
		
		$this->data['JF']=$this->job_model->fetchCareerFieldOfWork($job_id);
		
		$this->data['JT']=$this->job_model->fetchCareerTracks($job_id);
		$this->load->view('admin/dashboard', $this->data);
	}
	
	// job group
	public function job($mode='view',$id=0)
	{
		$rules=$this->job_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$this->data['admin']=$this->session->userdata[0];
		$this->data['view']="addjob";
		$this->data['title']=" Welcome to PakJobs | Add Jobs";		
		
		//print_r($country->result_array());
		
		$this->data['jobs']=$this->job_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$this->data['subtitle']="Add Jobs";				
					$this->data['title']=" Welcome to PakJobgroup | Add Job";					
					//$this->data['method']='add';
					$this->load->view('admin/dashboard',$this->data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					$insertarray['posted_date']=date('Y-m-d h:i:s',strtotime($insertarray['posted_date']));
					$insertarray['last_date']=date('Y-m-d h:i:s',strtotime($insertarray['last_date']));
					//print_r($insertarray); die;
					//$this->data['method']='add';
					if(count($_POST)>0){
						foreach($insertarray as $key=>$val)
						{
							$this->data[$key]=$val;
						}
						if ($this->form_validation->run() === true) {
							if(!$id){
								$job_id=$this->general_model->save("jobs",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($this->data['job_logo']=="")
									//	unset($this->data['job_logo']);
									$this->general_model->update("jobs",$insertarray,"job_id=".$id);
									$job_id=$id;
							}
							//echo $id;
							if($job_id){							
										if ( ! $this->upload->do_upload('job_image') && isset($data['job_image']))
										{
											$this->data['error'] =$this->upload->display_errors();					
													
											//$this->load->view('admin/dashboard', $this->data);
										}
										else
										{
											$imagedata = $this->upload->data();
											if(count($imagedata)>0){
												$updatearray=array("job_image"=>$imagedata['file_name']);
												$this->general_model->update("jobs",$updatearray,"job_id=".$job_id);
											}
											//print_r($data['upload_data']); die;											
											$this->data['message']=" Record Entered Successfully";		
											//$this->load->view('admin/dashboard', $this->data);
											//redirect("welcome/country");
										}
										$this->data['view']="addjob";
										$this->data['subtitle']="Add Jobs";	
										$this->data['title']=" Welcome to Pak Jobs | Add Jobs";
										$this->data['messjob']=" Record Entered Successfully";
										$this->data['jobs']=$this->job_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
										redirect("jobs/manage");
									
									
							}
						}
						else{
							$this->data['view']="addjob";
										$this->data['subtitle']="Add Jobs";	
										$this->data['title']=" Welcome to Pak Jobs | Add Jobs";
										//$this->data['messjob']=" Record Entered Successfully";
										$this->data['jobs']=$this->job_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
								//$this->data['view']="addjob";
//								$this->data['subtitle']="Add Jobs";	
//								$this->data['title']=" Welcome to Pak Jobs | Add Jobs";								
//								$this->data['jobs']=$this->job_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("jobs/index");
					}
					// upload imjob
						
					// update entry with imjob
					
					//$this->data['subtitle']="Add Jobs";				
					//$this->data['title']=" Welcome to PakJobgroup | Add Jobs";					
					//$this->load->view('admin/dashboard',$this->data);
				break;
			 case 'delete':
			 		if($this->job_model->deActiveJobs($id))
					{
						redirect("jobs/manage");
					}
			 	break;
			case 'active':
			 		if($this->job_model->ActiveJobs($id))
					{
						redirect("jobs/manage");
					}
			 	break;
			case 'edit':
				if($id){
					$this->data['subtitle']="Update Job group Data" ;				
					$this->data['title']=" Welcome to Pak Jobs | Update Jobs";					
					
					$job=$this->job_model->getJobById($id);
					$this->data['job_title']=$job->job_title;					
					$this->data['job_id']=$job->job_id;
					$this->data['jobsector_id']=$job->jobsector_id;
					$this->data['positions']=$job->positions;
					$this->data['city_id']=$job->city_id;
					$this->data['country_id']=$job->country_id;
					$this->data['gender']=$job->gender;
					$this->data['agegroup_id']=$job->agegroup_id;
					$this->data['education_id']=$job->education_id;
					$this->data['qualification']=$job->qualification;
					$this->data['experience_id']=$job->experience_id;
					$this->data['salaryrange_id']=$job->salaryrange_id;
					$this->data['jobtype_id']=$job->jobtype_id;
					$this->data['organization_id']=$job->organization_id;
					$this->data['where_to_apply']=$job->where_to_apply;
					$this->data['where_to_apply']=$job->where_to_apply;
					$this->data['occupation_id']=$job->occupation_id	;
					$this->data['jobgroup_id']=$job->jobgroup_id;
					$this->data['posted_date']=date('m/d/Y',strtotime($job->posted_date));
					$this->data['last_date']=date('m/d/Y',strtotime($job->last_date));
					$this->data['jobsource_id']=$job->jobsource_id;
					
					
					
					
					
					//print_r($job);
					$this->load->view('admin/dashboard',$this->data);
				}
				break;
			
		}
	}
	
	public function manage()
	{
		$page = $this->uri->segment(3)==""?0:($this->uri->segment(3)-1);
    	//echo $this->uri->segment(3)."   ".$page ."<br/>";
		/* Load the 'pagination' library */
		$this->load->library('pagination');
		$data['admin']=$this->session->userdata[0];
		$data['view']="managejob";
		$data['title']=" Welcome to Active Citizenship | Manage  Jobs";
		$total=$this->job_model->fetchAll();
		//echo count($total->result_array());
		//$config['first_link'] = 'First';
		$config['prev_tag_open'] = '<div class="btn btn-default">';
		$config['prev_tag_close'] = '</div>'; 
		$config['num_tag_open'] = '<div class="btn btn-default">';
		$config['num_tag_close'] = '</div>';
		//$config['first_tag_open'] = '<div>';
		//$config['first_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="btn btn-primary">';
		$config['cur_tag_close'] = '</div>';
		$config['next_tag_open'] = '<div class="btn btn-default">';
		$config['next_tag_close'] = '</div>';
		 $config['base_url'] = base_url().'/jobs/manage/';
		$config['total_rows'] = count($total->result_array());
		$config['per_page'] = 15; 
		$data['subtitle']="Manage Jobs";	
		//echo $page ."  ".$config['per_page'];
		$this->pagination->initialize($config);
		$data['jobs']=$this->job_model->fetchAll($config['per_page'],$page); 		
		//$data['title']=" Welcome to Active Citizenship | Add Job";					
		//$data['method']='add';
		$this->load->view('admin/dashboard',$data);
	}
	function jobfields($action='add',$job_id,$jf_id='')
	{
		$rules=$this->job_model->validationrulesfields;
		$this->form_validation->set_rules($rules);
		switch($action)
		{
			case 'add':

					$insertarray=$this->input->post();
					$insertarray['job_id']=$job_id;
				
					if(count($insertarray)>0){
						//echo (int)$this->form_validation->run() ;
						if ($this->form_validation->run() === true) {
							
								$CO_id=$this->general_model->save("jobs_fieldofwork",$insertarray,true);
								redirect("jobs/view/".$job_id);
							
						}
						else{
							//echo "fdsfsd";
							$this->data['view']="careersections";
							$this->data['subtitle']="Add career";	
							$this->data['title']=" Welcome to Pak career | Add Career Section";
							$this->data['messcareer']=" Record Entered Successfully";
									
							$this->load->view('admin/dashboard', $this->data);
							//echo "Fdfd"; die;
							//redirect("career/index");
								//$this->data['view']="addcareer";
//								$this->data['subtitle']="Add career";	
//								$this->data['title']=" Welcome to Pak career | Add career";								
//								$this->data['career']=$this->job_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("jobs/view/".$job_id);
					}
			break;
			case 'delete':
				$this->job_model->deleteFOW($jf_id);			
				redirect("jobs/view/".$job_id);

			break;
		}
	}
	
	function jobtrack($action='add',$job_id,$jc_id='')
	{
		$rules=$this->job_model->validationrulesjobtrack;
		$this->form_validation->set_rules($rules);
		switch($action)
		{
			case 'add':

					$insertarray=$this->input->post();
					$insertarray['job_id']=$job_id;
				
					if(count($insertarray)>0){
						//echo (int)$this->form_validation->run() ;
						if ($this->form_validation->run() === true) {
							
								$CO_id=$this->general_model->save("jobs_careertrack",$insertarray,true);
								redirect("jobs/view/".$job_id);
							
						}
						else{
							//echo "fdsfsd";
							$this->data['view']="careersections";
							$this->data['subtitle']="Add career";	
							$this->data['title']=" Welcome to Pak career | Add Career Section";
							$this->data['messcareer']=" Record Entered Successfully";
									
							$this->load->view('admin/dashboard', $this->data);
							//echo "Fdfd"; die;
							//redirect("career/index");
								//$this->data['view']="addcareer";
//								$this->data['subtitle']="Add career";	
//								$this->data['title']=" Welcome to Pak career | Add career";								
//								$this->data['career']=$this->job_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("jobs/view/".$job_id);
					}
			break;
			case 'delete':
				$this->job_model->deleteCT($jc_id);
				redirect("jobs/view/".$job_id);

			break;
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */