<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public $data=array();

	function __construct(){	
		// Call the Model constructor
        parent::__construct();	
		
		// loading of specific libraries related to this controller
		/*$this->load->model('country_model'); 
		$this->load->model('city_model'); 
		$this->load->model('age_model');
		$this->load->model('careertrack_model'); 
		$this->load->model('education_model'); 
		$this->load->model('experience_model');
		$this->load->model('jobgroup_model'); 
		$this->load->model('jobsector_model');
		$this->load->model('jobtype_model'); 
		$this->load->model('salaryrange_model');
		$this->load->model('studytrack_model'); 
		$this->load->model('jobsource_model'); 
		$this->load->model('occupationgroup_model'); 
		$this->load->model('fieldofwork_model');
		$this->load->model('careertrack_model');
		$this->load->model('occupation_model'); 
		$this->load->model('organization_model'); */
		
		//print_r($countries->result_array());die;
		//$data['countries']=$countries;
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
			$data['admin']=$this->session->userdata[0];
		$data['title']=" Welcome to Active Citizenship | Dashboard";
		
	}
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
	public function index()
	{
		$data['admin']=$this->session->userdata[0];
		$data['title']=" Welcome to Active Citizenship | Dashboard";
		$data['view']="welcome";
		$this->load->view('admin/dashboard',$data);
	}
	
	/*
	* function to manage  coutry
	**/
	public function country($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="country";
		$data['title']=" Welcome to Active Citizenship | Add Country";
		$data['countries']=$this->country_model->fetchAll(); 
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Country";				
					$data['title']=" Welcome to Active Citizenship | Add Country";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$country_id=$this->general_model->save("country",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['country_logo']=="")
								//	unset($data['country_logo']);
								$this->general_model->update("country",$insertarray,"country_id=".$id);
								$country_id=$id;
						}
						//echo $id;
						if($country_id){
							//echo (int)(bool)$this->upload->do_upload('country_logo');
						
							if ( ! $this->upload->do_upload('country_logo') && isset($data['country_logo']))
								{
									$data['error'] =$this->upload->display_errors();					
									$data['view']="country";
									$data['subtitle']="Add Country";
									$data['title']=" Welcome to Active Citizenship | Add Country";		
									$this->load->view('admin/dashboard', $data);
								}
								else
								{
									$imagedata = $this->upload->data();
									if(count($imagedata)>0){
										$updatearray=array("country_logo"=>$imagedata['file_name']);
										$this->general_model->update("country",$updatearray,"country_id=".$country_id);
									}
									//print_r($data['upload_data']); die;
									$data['view']="country";
									$data['subtitle']="Add Country";	
									$data['title']=" Welcome to Active Citizenship | Add Country";
									$data['message']=" Record Entered Successfully";		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/country");
								}
								
						}
					}else{
							redirect("welcome/country");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add Country";				
					//$data['title']=" Welcome to Active Citizenship | Add Country";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->country_model->deActiveCountry($id))
					{
						redirect("welcome/country");
					}
			 	break;
			case 'active':
			 		if($this->country_model->ActiveCountry($id))
					{
						redirect("welcome/country");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Country Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Country";					
					//$data['method']='add';
					$country=$this->country_model->getCountryById($id);
					$data['country_name']=$country->country_name;
					$data['country_code']=$country->country_code;
					$data['country_id']=$country->country_id;
					$data['country_logo']=$country->country_logo;
					
					//print_r($country);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	/*
	* function to manage  city
	**/
	public function city($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="city";
		$data['title']=" Welcome to Active Citizenship | Add City";
		$country=$this->country_model->fetchActive();
		
		//print_r($country->result_array());
		$arr['']="Select One";
		foreach($country->result_array() as $row) {
			$arr[$row['country_id']]=$row['country_name'];
		}
		$data['countries']=$arr;
		$data['cities']=$this->city_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add City";				
					$data['title']=" Welcome to Active Citizenship | Add City";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$city_id=$this->general_model->save("city",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['city_logo']=="")
								//	unset($data['city_logo']);
								$this->general_model->update("city",$insertarray,"city_id=".$id);
								$city_id=$id;
						}
						//echo $id;
						if($city_id){							
									
									$data['view']="city";
									$data['subtitle']="Add City";	
									$data['title']=" Welcome to Active Citizenship | Add City";
									$data['message']=" Record Entered Successfully";
									$data['cities']=$this->city_model->fetchAll();		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/city");
								
								
						}
					}else{
							redirect("welcome/city");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add City";				
					//$data['title']=" Welcome to Active Citizenship | Add City";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->city_model->deActiveCity($id))
					{
						redirect("welcome/city");
					}
			 	break;
			case 'active':
			 		if($this->city_model->ActiveCity($id))
					{
						redirect("welcome/city");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update City Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  City";					
					
					$city=$this->city_model->getCityById($id);
					$data['city_name']=$city->city_name;
					$data['country_id']=$city->country_id;
					$data['city_id']=$city->city_id;
					
					
					//print_r($city);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	/**
	* manage age group section
	**/
	public function age($mode='view',$id=0)
	{
		$rules=$this->age_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="age";
		$data['title']=" Welcome to Active Citizenship | Add Age Group";		
		
		//print_r($country->result_array());
		
		$data['ages']=$this->age_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Age Group";				
					$data['title']=" Welcome to Active Citizenship | Add Age Group";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$age_id=$this->general_model->save("age",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['age_logo']=="")
									//	unset($data['age_logo']);
									$this->general_model->update("age",$insertarray,"age_id=".$id);
									$age_id=$id;
							}
							//echo $id;
							if($age_id){							
										
										$data['view']="age";
										$data['subtitle']="Add Age Group";	
										$data['title']=" Welcome to Active Citizenship | Add Age Group";
										$data['message']=" Record Entered Successfully";
										$data['ages']=$this->age_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/age");
									
									
							}
						}else{
								$data['view']="age";
								$data['subtitle']="Add Age Group";	
								$data['title']=" Welcome to Active Citizenship | Add Age Group";								
								$data['ages']=$this->age_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/age");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add Age Group";				
					//$data['title']=" Welcome to Active Citizenship | Add Age Group";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->age_model->deActiveAge($id))
					{
						redirect("welcome/age");
					}
			 	break;
			case 'active':
			 		if($this->age_model->ActiveAge($id))
					{
						redirect("welcome/age");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Age Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Age Group";					
					
					$age=$this->age_model->getAgeById($id);
					$data['age_title']=$age->age_title;					
					$data['age_id']=$age->age_id;
					
					
					//print_r($age);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	
	/**
	* manage age career section
	**/
	public function careertrack($mode='view',$id=0)
	{
		$rules=$this->careertrack_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="careertrack";
		$data['title']=" Welcome to Active Citizenship | Add Career Track";		
		
		//print_r($country->result_array());
		
		$data['careertracks']=$this->careertrack_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Career Track";				
					$data['title']=" Welcome to Active Citizenship | Add Career Track";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$careertrack_id=$this->general_model->save("careertrack",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['careertrack_logo']=="")
									//	unset($data['careertrack_logo']);
									$this->general_model->update("careertrack",$insertarray,"careertrack_id=".$id);
									$careertrack_id=$id;
							}
							//echo $id;
							if($careertrack_id){							
										
										$data['view']="careertrack";
										$data['subtitle']="Add Career Track";	
										$data['title']=" Welcome to Active Citizenship | Add Career Track";
										$data['messcareertrack']=" Record Entered Successfully";
										$data['careertracks']=$this->careertrack_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/careertrack");
									
									
							}
						}else{
								$data['view']="careertrack";
								$data['subtitle']="Add Career Track";	
								$data['title']=" Welcome to Active Citizenship | Add Career Track";								
								$data['careertracks']=$this->careertrack_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/careertrack");
					}
					// upload imcareertrack
						
					// update entry with imcareertrack
					
					//$data['subtitle']="Add Career Track";				
					//$data['title']=" Welcome to Active Citizenship | Add Career Track";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->careertrack_model->deActiveCareer($id))
					{
						redirect("welcome/careertrack");
					}
			 	break;
			case 'active':
			 		if($this->careertrack_model->ActiveCareer($id))
					{
						redirect("welcome/careertrack");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Career Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Career Track";					
					
					$careertrack=$this->careertrack_model->getCareerById($id);
					$data['careertrack_title']=$careertrack->careertrack_title;					
					$data['careertrack_id']=$careertrack->careertrack_id;
					
					
					//print_r($careertrack);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	// manage education section
	public function education($mode='view',$id=0)
	{
		$rules=$this->education_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="education";
		$data['title']=" Welcome to PakEducation | AddEducation";		
		
		//print_r($country->result_array());
		
		$data['educations']=$this->education_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="AddEducation";				
					$data['title']=" Welcome to PakEducation | AddEducation";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$education_id=$this->general_model->save("education",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['education_logo']=="")
									//	unset($data['education_logo']);
									$this->general_model->update("education",$insertarray,"education_id=".$id);
									$education_id=$id;
							}
							//echo $id;
							if($education_id){							
										
										$data['view']="education";
										$data['subtitle']="AddEducation";	
										$data['title']=" Welcome to PakEducation | AddEducation";
										$data['messeducation']=" Record Entered Successfully";
										$data['educations']=$this->education_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/education");
									
									
							}
						}else{
								$data['view']="education";
								$data['subtitle']="AddEducation";	
								$data['title']=" Welcome to PakEducation | AddEducation";								
								$data['educations']=$this->education_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/education");
					}
					// upload imeducation
						
					// update entry with imeducation
					
					//$data['subtitle']="AddEducation";				
					//$data['title']=" Welcome to PakEducation | AddEducation";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->education_model->deActiveEducation($id))
					{
						redirect("welcome/education");
					}
			 	break;
			case 'active':
			 		if($this->education_model->ActiveEducation($id))
					{
						redirect("welcome/education");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Education Data" ;				
					$data['title']=" Welcome to PakEducation | Update Education";					
					
					$education=$this->education_model->getEducationById($id);
					$data['education_title']=$education->education_title;					
					$data['education_id']=$education->education_id;
					
					
					//print_r($education);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	// experience
	public function experience($mode='view',$id=0)
	{
		$rules=$this->experience_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="experience";
		$data['title']=" Welcome to PakExperience | Add Experience";		
		
		//print_r($country->result_array());
		
		$data['experiences']=$this->experience_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="AddExperience";				
					$data['title']=" Welcome to PakExperience | Ad dExperience";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$experience_id=$this->general_model->save("experience",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['experience_logo']=="")
									//	unset($data['experience_logo']);
									$this->general_model->update("experience",$insertarray,"experience_id=".$id);
									$experience_id=$id;
							}
							//echo $id;
							if($experience_id){							
										
										$data['view']="experience";
										$data['subtitle']="AddExperience";	
										$data['title']=" Welcome to PakExperience | AddExperience";
										$data['messexperience']=" Record Entered Successfully";
										$data['experiences']=$this->experience_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/experience");
									
									
							}
						}else{
								$data['view']="experience";
								$data['subtitle']="AddExperience";	
								$data['title']=" Welcome to PakExperience | AddExperience";								
								$data['experiences']=$this->experience_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/experience");
					}
					// upload imexperience
						
					// update entry with imexperience
					
					//$data['subtitle']="AddExperience";				
					//$data['title']=" Welcome to PakExperience | AddExperience";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->experience_model->deActiveExperience($id))
					{
						redirect("welcome/experience");
					}
			 	break;
			case 'active':
			 		if($this->experience_model->ActiveExperience($id))
					{
						redirect("welcome/experience");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Experience Data" ;				
					$data['title']=" Welcome to PakExperience | Update Experience";					
					
					$experience=$this->experience_model->getExperienceById($id);
					$data['experience_title']=$experience->experience_title;					
					$data['experience_id']=$experience->experience_id;
					
					
					//print_r($experience);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	// job group
	public function jobgroup($mode='view',$id=0)
	{
		$rules=$this->jobgroup_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="jobgroup";
		$data['title']=" Welcome to PakJobgroup | Add Jobgroup";		
		
		//print_r($country->result_array());
		
		$data['jobgroups']=$this->jobgroup_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="AddJobgroup";				
					$data['title']=" Welcome to PakJobgroup | Ad dJobgroup";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$jobgroup_id=$this->general_model->save("jobgroup",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['jobgroup_logo']=="")
									//	unset($data['jobgroup_logo']);
									$this->general_model->update("jobgroup",$insertarray,"jobgroup_id=".$id);
									$jobgroup_id=$id;
							}
							//echo $id;
							if($jobgroup_id){							
										
										$data['view']="jobgroup";
										$data['subtitle']="AddJobgroup";	
										$data['title']=" Welcome to PakJobgroup | AddJobgroup";
										$data['messjobgroup']=" Record Entered Successfully";
										$data['jobgroups']=$this->jobgroup_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/jobgroup");
									
									
							}
						}else{
								$data['view']="jobgroup";
								$data['subtitle']="AddJobgroup";	
								$data['title']=" Welcome to PakJobgroup | AddJobgroup";								
								$data['jobgroups']=$this->jobgroup_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/jobgroup");
					}
					// upload imjobgroup
						
					// update entry with imjobgroup
					
					//$data['subtitle']="AddJobgroup";				
					//$data['title']=" Welcome to PakJobgroup | AddJobgroup";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->jobgroup_model->deActiveJobgroup($id))
					{
						redirect("welcome/jobgroup");
					}
			 	break;
			case 'active':
			 		if($this->jobgroup_model->ActiveJobgroup($id))
					{
						redirect("welcome/jobgroup");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Job group Data" ;				
					$data['title']=" Welcome to Pak Jobs | Update Jobgroup";					
					
					$jobgroup=$this->jobgroup_model->getJobgroupById($id);
					$data['jobgroup_title']=$jobgroup->jobgroup_title;					
					$data['jobgroup_id']=$jobgroup->jobgroup_id;
					
					
					//print_r($jobgroup);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function jobsector($mode='view',$id=0)
	{
		$rules=$this->jobsector_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="jobsector";
		$data['title']=" Welcome to PakJob Sector | Add Job Sector";		
		
		//print_r($country->result_array());
		
		$data['jobsectors']=$this->jobsector_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="AddJob Sector";				
					$data['title']=" Welcome to PakJob Sector | Ad dJob Sector";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$jobsector_id=$this->general_model->save("jobsector",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['jobsector_logo']=="")
									//	unset($data['jobsector_logo']);
									$this->general_model->update("jobsector",$insertarray,"jobsector_id=".$id);
									$jobsector_id=$id;
							}
							//echo $id;
							if($jobsector_id){							
										
										$data['view']="jobsector";
										$data['subtitle']="AddJob Sector";	
										$data['title']=" Welcome to PakJob Sector | AddJob Sector";
										$data['messjobsector']=" Record Entered Successfully";
										$data['jobsectors']=$this->jobsector_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/jobsector");
									
									
							}
						}else{
								$data['view']="jobsector";
								$data['subtitle']="AddJob Sector";	
								$data['title']=" Welcome to PakJob Sector | AddJob Sector";								
								$data['jobsectors']=$this->jobsector_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/jobsector");
					}
					// upload imjobsector
						
					// update entry with imjobsector
					
					//$data['subtitle']="AddJob Sector";				
					//$data['title']=" Welcome to PakJob Sector | AddJob Sector";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->jobsector_model->deActiveJobsector($id))
					{
						redirect("welcome/jobsector");
					}
			 	break;
			case 'active':
			 		if($this->jobsector_model->ActiveJobsector($id))
					{
						redirect("welcome/jobsector");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Job Sector Data" ;				
					$data['title']=" Welcome to Pak Jobs | Update Job Sector";					
					
					$jobsector=$this->jobsector_model->getJobsectorById($id);
					$data['jobsector_title']=$jobsector->jobsector_title;					
					$data['jobsector_id']=$jobsector->jobsector_id;
					
					
					//print_r($jobsector);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function jobtype($mode='view',$id=0)
	{
		$rules=$this->jobtype_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="jobtype";
		$data['title']=" Welcome to Pak Jobs | Add Job Type";		
		
		//print_r($country->result_array());
		
		$data['jobtypes']=$this->jobtype_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="AddJob Type";				
					$data['title']=" Welcome to PakJob Type | Ad dJob Type";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$jobtype_id=$this->general_model->save("jobtype",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['jobtype_logo']=="")
									//	unset($data['jobtype_logo']);
									$this->general_model->update("jobtype",$insertarray,"jobtype_id=".$id);
									$jobtype_id=$id;
							}
							//echo $id;
							if($jobtype_id){							
										
										$data['view']="jobtype";
										$data['subtitle']="AddJob Type";	
										$data['title']=" Welcome to PakJob Type | AddJob Type";
										$data['messjobtype']=" Record Entered Successfully";
										$data['jobtypes']=$this->jobtype_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/jobtype");
									
									
							}
						}else{
								$data['view']="jobtype";
								$data['subtitle']="AddJob Type";	
								$data['title']=" Welcome to PakJob Type | AddJob Type";								
								$data['jobtypes']=$this->jobtype_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/jobtype");
					}
					// upload imjobtype
						
					// update entry with imjobtype
					
					//$data['subtitle']="AddJob Type";				
					//$data['title']=" Welcome to PakJob Type | AddJob Type";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->jobtype_model->deActiveJobtype($id))
					{
						redirect("welcome/jobtype");
					}
			 	break;
			case 'active':
			 		if($this->jobtype_model->ActiveJobtype($id))
					{
						redirect("welcome/jobtype");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Job Type Data" ;				
					$data['title']=" Welcome to Pak Jobs | Update Job Type";					
					
					$jobtype=$this->jobtype_model->getJobtypeById($id);
					$data['jobtype_title']=$jobtype->jobtype_title;					
					$data['jobtype_id']=$jobtype->jobtype_id;
					
					
					//print_r($jobtype);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function fieldofwork($mode='view',$id=0)
	{
		$rules=$this->fieldofwork_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="fieldofwork";
		$data['title']=" Welcome to Pak Jobs | Add Job Type";		
		
		//print_r($country->result_array());
		
		$data['fieldofworks']=$this->fieldofwork_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Field of Work";				
					$data['title']=" Welcome to PakJob Type | Add Field of Work";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$fieldofwork_id=$this->general_model->save("fieldofwork",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['fieldofwork_logo']=="")
									//	unset($data['fieldofwork_logo']);
									$this->general_model->update("fieldofwork",$insertarray,"fieldofwork_id=".$id);
									$fieldofwork_id=$id;
							}
							//echo $id;
							if($fieldofwork_id){							
										
										$data['view']="fieldofwork";
										$data['subtitle']="AddJob Type";	
										$data['title']=" Welcome to PakJob Type | AddJob Type";
										$data['messfieldofwork']=" Record Entered Successfully";
										$data['fieldofworks']=$this->fieldofwork_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/fieldofwork");
									
									
							}
						}else{
								$data['view']="fieldofwork";
								$data['subtitle']="AddJob Type";	
								$data['title']=" Welcome to PakJob Type | AddJob Type";								
								$data['fieldofworks']=$this->fieldofwork_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/fieldofwork");
					}
					// upload imfieldofwork
						
					// update entry with imfieldofwork
					
					//$data['subtitle']="AddJob Type";				
					//$data['title']=" Welcome to PakJob Type | AddJob Type";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->fieldofwork_model->deActiveJobtype($id))
					{
						redirect("welcome/fieldofwork");
					}
			 	break;
			case 'active':
			 		if($this->fieldofwork_model->ActiveJobtype($id))
					{
						redirect("welcome/fieldofwork");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Job Type Data" ;				
					$data['title']=" Welcome to Pak Jobs | Update Job Type";					
					
					$fieldofwork=$this->fieldofwork_model->getJobtypeById($id);
					$data['fieldofwork_title']=$fieldofwork->fieldofwork_title;					
					$data['fieldofwork_id']=$fieldofwork->fieldofwork_id;
					
					
					//print_r($fieldofwork);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function salaryrange($mode='view',$id=0)
	{
		$rules=$this->salaryrange_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="salaryrange";
		$data['title']=" Welcome to Pak Jobs | Add Salary Range";		
		
		//print_r($country->result_array());
		
		$data['salaryranges']=$this->salaryrange_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="AddSalary Range";				
					$data['title']=" Welcome to PakSalary Range | Ad dSalary Range";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$salaryrange_id=$this->general_model->save("salaryrange",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['salaryrange_logo']=="")
									//	unset($data['salaryrange_logo']);
									$this->general_model->update("salaryrange",$insertarray,"salaryrange_id=".$id);
									$salaryrange_id=$id;
							}
							//echo $id;
							if($salaryrange_id){							
										
										$data['view']="salaryrange";
										$data['subtitle']="AddSalary Range";	
										$data['title']=" Welcome to PakSalary Range | AddSalary Range";
										$data['messsalaryrange']=" Record Entered Successfully";
										$data['salaryranges']=$this->salaryrange_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/salaryrange");
									
									
							}
						}else{
								$data['view']="salaryrange";
								$data['subtitle']="AddSalary Range";	
								$data['title']=" Welcome to PakSalary Range | AddSalary Range";								
								$data['salaryranges']=$this->salaryrange_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/salaryrange");
					}
					// upload imsalaryrange
						
					// update entry with imsalaryrange
					
					//$data['subtitle']="AddSalary Range";				
					//$data['title']=" Welcome to PakSalary Range | AddSalary Range";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->salaryrange_model->deActiveSalaryRange($id))
					{
						redirect("welcome/salaryrange");
					}
			 	break;
			case 'active':
			 		if($this->salaryrange_model->ActiveSalaryRange($id))
					{
						redirect("welcome/salaryrange");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Salary Range Data" ;				
					$data['title']=" Welcome to Pak Jobs | Update Salary Range";					
					
					$salaryrange=$this->salaryrange_model->getSalaryRangeById($id);
					$data['salaryrange_title']=$salaryrange->salaryrange_title;					
					$data['salaryrange_id']=$salaryrange->salaryrange_id;
					
					
					//print_r($salaryrange);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function studytrack($mode='view',$id=0)
	{
		$rules=$this->studytrack_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$data['admin']=$this->session->userdata[0];
		$data['view']="studytrack";
		$data['title']=" Welcome to Pak Jobs | Add Study Track";		
		
		//print_r($country->result_array());
		
		$data['studytracks']=$this->studytrack_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="AddStudy Track";				
					$data['title']=" Welcome to PakStudy Track | Ad dStudy Track";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if ($this->form_validation->run() === true) {
							if(!$id){
								$studytrack_id=$this->general_model->save("studytrack",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($data['studytrack_logo']=="")
									//	unset($data['studytrack_logo']);
									$this->general_model->update("studytrack",$insertarray,"studytrack_id=".$id);
									$studytrack_id=$id;
							}
							//echo $id;
							if($studytrack_id){							
										
										$data['view']="studytrack";
										$data['subtitle']="AddStudy Track";	
										$data['title']=" Welcome to PakStudy Track | AddStudy Track";
										$data['messstudytrack']=" Record Entered Successfully";
										$data['studytracks']=$this->studytrack_model->fetchAll();		
										$this->load->view('admin/dashboard', $data);
										//redirect("welcome/studytrack");
									
									
							}
						}else{
								$data['view']="studytrack";
								$data['subtitle']="AddStudy Track";	
								$data['title']=" Welcome to PakStudy Track | AddStudy Track";								
								$data['studytracks']=$this->studytrack_model->fetchAll();		
								$this->load->view('admin/dashboard', $data);
						}
					}else{
							redirect("welcome/studytrack");
					}
					// upload imstudytrack
						
					// update entry with imstudytrack
					
					//$data['subtitle']="AddStudy Track";				
					//$data['title']=" Welcome to PakStudy Track | AddStudy Track";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->studytrack_model->deActiveStudyTrack($id))
					{
						redirect("welcome/studytrack");
					}
			 	break;
			case 'active':
			 		if($this->studytrack_model->ActiveStudyTrack($id))
					{
						redirect("welcome/studytrack");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Study Track Data" ;				
					$data['title']=" Welcome to Pak Jobs | Update Study Track";					
					
					$studytrack=$this->studytrack_model->getStudyTrackById($id);
					$data['studytrack_title']=$studytrack->studytrack_title;					
					$data['studytrack_id']=$studytrack->studytrack_id;
					
					
					//print_r($studytrack);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	/*
	* function to manage  jobsource
	**/
	public function jobsource($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="jobsource";
		$data['title']=" Welcome to Active Citizenship | Add JobSource";
		$data['jobsources']=$this->jobsource_model->fetchAll(); 
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add JobSource";				
					$data['title']=" Welcome to Active Citizenship | Add JobSource";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$jobsource_id=$this->general_model->save("jobsource",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['jobsource_logo']=="")
								//	unset($data['jobsource_logo']);
								$this->general_model->update("jobsource",$insertarray,"jobsource_id=".$id);
								$jobsource_id=$id;
						}
						//echo $id;
						if($jobsource_id){
							//echo (int)(bool)$this->upload->do_upload('jobsource_logo');
						
							if ( ! $this->upload->do_upload('jobsource_logo') && isset($data['jobsource_logo']))
								{
									$data['error'] =$this->upload->display_errors();					
									$data['view']="jobsource";
									$data['subtitle']="Add JobSource";
									$data['title']=" Welcome to Active Citizenship | Add JobSource";		
									$this->load->view('admin/dashboard', $data);
								}
								else
								{
									$imagedata = $this->upload->data();
									if(count($imagedata)>0){
										$updatearray=array("jobsource_logo"=>$imagedata['file_name']);
										$this->general_model->update("jobsource",$updatearray,"jobsource_id=".$jobsource_id);
									}
									//print_r($data['upload_data']); die;
									$data['view']="jobsource";
									$data['subtitle']="Add JobSource";	
									$data['title']=" Welcome to Active Citizenship | Add JobSource";
									$data['message']=" Record Entered Successfully";		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/jobsource");
								}
								
						}
					}else{
							redirect("welcome/jobsource");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add JobSource";				
					//$data['title']=" Welcome to Active Citizenship | Add JobSource";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->jobsource_model->deActiveJobSource($id))
					{
						redirect("welcome/jobsource");
					}
			 	break;
			case 'active':
			 		if($this->jobsource_model->ActiveJobSource($id))
					{
						redirect("welcome/jobsource");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update JobSource Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  JobSource";					
					//$data['method']='add';
					$jobsource=$this->jobsource_model->getJobSourceById($id);
					$data['jobsource_title']=$jobsource->jobsource_title;
					$data['jobsource_code']=$jobsource->jobsource_code;
					$data['jobsource_id']=$jobsource->jobsource_id;
					$data['jobsource_logo']=$jobsource->jobsource_logo;
					
					//print_r($jobsource);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	/*
	* function to manage  occupationgroup
	**/
	public function occupationgroup($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="occupationgroup";
		$data['title']=" Welcome to Active Citizenship | Add OccupationGroup";
		$data['occupationgroups']=$this->occupationgroup_model->fetchAll(); 
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add OccupationGroup";				
					$data['title']=" Welcome to Active Citizenship | Add OccupationGroup";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$occupationgroup_id=$this->general_model->save("occupationgroup",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['occupationgroup_logo']=="")
								//	unset($data['occupationgroup_logo']);
								$this->general_model->update("occupationgroup",$insertarray,"occupationgroup_id=".$id);
								$occupationgroup_id=$id;
						}
						//echo $id;
						if($occupationgroup_id){
							//echo (int)(bool)$this->upload->do_upload('occupationgroup_logo');
						
							if ( ! $this->upload->do_upload('occupationgroup_logo') && isset($data['occupationgroup_logo']))
								{
									$data['error'] =$this->upload->display_errors();					
									$data['view']="occupationgroup";
									$data['subtitle']="Add OccupationGroup";
									$data['title']=" Welcome to Active Citizenship | Add OccupationGroup";		
									$this->load->view('admin/dashboard', $data);
								}
								else
								{
									
									//print_r($data['upload_data']); die;
									$data['view']="occupationgroup";
									$data['subtitle']="Add OccupationGroup";	
									$data['title']=" Welcome to Active Citizenship | Add OccupationGroup";
									$data['message']=" Record Entered Successfully";		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/occupationgroup");
								}
								
						}
					}else{
							redirect("welcome/occupationgroup");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add OccupationGroup";				
					//$data['title']=" Welcome to Active Citizenship | Add OccupationGroup";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->occupationgroup_model->deActiveOccupationGroup($id))
					{
						redirect("welcome/occupationgroup");
					}
			 	break;
			case 'active':
			 		if($this->occupationgroup_model->ActiveOccupationGroup($id))
					{
						redirect("welcome/occupationgroup");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update OccupationGroup Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  OccupationGroup";					
					//$data['method']='add';
					$occupationgroups=$this->occupationgroup_model->getOccupationGroupById($id);
					$data['occupationgroup_title']=$occupationgroups->occupationgroup_title;
					
					$data['occupationgroup_id']=$occupationgroups->occupationgroup_id;
					
					
					//print_r($occupationgroup);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	/*
	* function to manage  occupation
	**/
	public function occupation($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="occupation";
		$data['title']=" Welcome to Active Citizenship | Add Occupation";
		$occupationgroup=$this->occupationgroup_model->fetchActive();
        $fieldofwork=$this->fieldofwork_model->fetchActive();
        $careertrack=$this->careertrack_model->fetchActive();	
		
		//print_r($country->result_array());
		$arroccupationgroup['']="Select One";
		foreach($occupationgroup->result_array() as $row) {
			$arroccupationgroup[$row['occupationgroup_id']]=$row['occupationgroup_title'];
		}
		$data['occupationgroup']=$arroccupationgroup;
        $arrFieldOfWork['']="Select One";
		foreach($fieldofwork->result_array() as $row) {
			$arrFieldOfWork[$row['fieldofwork_id']]=$row['fieldofwork_title'];
		}
		$data['fieldofwork']=$arrFieldOfWork;
        $arrCareerTrack['']="Select One";
		foreach($careertrack->result_array() as $row) {
			$arrCareerTrack[$row['careertrack_id']]=$row['careertrack_title'];
		}
		$data['careerTrack']=$arrCareerTrack;
		$data['cities']=$this->occupation_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Occupation";				
					$data['title']=" Welcome to Active Citizenship | Add Occupation";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$occupation_id=$this->general_model->save("occupation",$insertarray,true);
						}else{
							
								// customization for logo field if not selected
								//if($data['occupation_logo']=="")
								//	unset($data['occupation_logo']);
								$this->general_model->update("occupation",$insertarray,"occupation_id=".$id);
								$occupation_id=$id;
						}
						//echo $id;
						if($occupation_id){							
									
									$data['view']="occupation";
									$data['subtitle']="Add Occupation";	
									$data['title']=" Welcome to Active Citizenship | Add Occupation";
									$data['message']=" Record Entered Successfully";
									$data['cities']=$this->occupation_model->fetchAll();		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/occupation");
								
								
						}
					}else{
							redirect("welcome/occupation");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add City";				
					//$data['title']=" Welcome to Active Citizenship | Add City";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->occupation_model->deActiveCity($id))
					{
						redirect("welcome/occupation");
					}
			 	break;
			case 'active':
			 		if($this->occupation_model->ActiveCity($id))
					{
						redirect("welcome/occupation");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Occupation Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Occupation";					
					
					$occupation=$this->occupation_model->getOccupationById($id);
					$data['occupation_title']=$occupation->occupation_title;
                    $data['occupation_othertitles']=$occupation->occupation_othertitles;
                    $data['occupation_video']=$occupation->occupation_video;
					
					$data['fieldofwork_id']=$occupation->fieldofwork_id;
                    $data['occupationgroup_id']=$occupation->occupationgroup_id;
					$data['fieldofwork_id']=$occupation->fieldofwork_id;
                    $data['careertrack_id']=$occupation->careertrack_id;
					$data['occupation_id']=$occupation->occupation_id;
					
					
					
					//print_r($occupation);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function constituency($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="constiuency";
		$data['title']=" Welcome to Active Citizenship | Add Constituent";
		$cities=$this->city_model->fetchActive();
		
		//print_r($country->result_array());
		$arr['']="Select One";
		foreach($cities->result_array() as $row) {
			$arr[$row['city_id']]=$row['city_name'];
		}
		$data['cities']=$arr;
		$data['constituencies']=$this->constituency_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Constituent";				
					$data['title']=" Welcome to Active Citizenship | Add Constituent";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$constiuency_id=$this->general_model->save("constiuency",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['constiuency_logo']=="")
								//	unset($data['constiuency_logo']);
								$this->general_model->update("constiuency",$insertarray,"constiuency_id=".$id);
								$constiuency_id=$id;
						}
						//echo $id;
						if($constiuency_id){							
									
									$data['view']="constiuency";
									$data['subtitle']="Add Constituent";	
									$data['title']=" Welcome to Active Citizenship | Add Constituent";
									$data['message']=" Record Entered Successfully";
									$data['cities']=$this->constituency_model->fetchAll();		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/constiuency");
								
								
						}
					}else{
							redirect("welcome/constiuency");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add Constituent";				
					//$data['title']=" Welcome to Active Citizenship | Add Constituent";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->constituency_model->deActiveConstituent($id))
					{
						redirect("welcome/constiuency");
					}
			 	break;
			case 'active':
			 		if($this->constituency_model->ActiveConstituent($id))
					{
						redirect("welcome/constiuency");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Constituent Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Constituent";					
					
					$constiuency=$this->constituency_model->getConstituentById($id);
					$constiuencyfields=$this->db->get("constiuency");
					foreach ($constiuencyfields->list_fields() as $field)
					{
						$this->data[$field]=$constiuencyfields->$field;	
					}
					//$data['constiuency_type']=$constiuency->constiuency_type;
//					$data['city']=$constiuency->city;
//					$data['constiuency_id']=$constiuency->constiuency_id;
					
					
					//print_r($constiuency);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function area($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="area";
		$data['title']=" Welcome to Active Citizenship | Add Area";
		$cities=$this->constituency_model->fetchActive();
		
		//print_r($country->result_array());
		$arr['']="Select One";
		foreach($cities->result_array() as $row) {
			$arr[$row['constiuency_id']]=$row['constiuency_num'];
		}
		$data['constiuencies']=$arr;
		$data['areas']=$this->area_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Area";				
					$data['title']=" Welcome to Active Citizenship | Add Area";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$area_id=$this->general_model->save("area",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['area_logo']=="")
								//	unset($data['area_logo']);
								$this->general_model->update("area",$insertarray,"area_id=".$id);
								$area_id=$id;
						}
						//echo $id;
						if($area_id){							
									
									$data['view']="area";
									$data['subtitle']="Add Area";	
									$data['title']=" Welcome to Active Citizenship | Add Area";
									$data['message']=" Record Entered Successfully";
									$data['cities']=$this->area_model->fetchAll();		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/area");
								
								
						}
					}else{
							redirect("welcome/area");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add Area";				
					//$data['title']=" Welcome to Active Citizenship | Add Area";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->area_model->deActiveArea($id))
					{
						redirect("welcome/area");
					}
			 	break;
			case 'active':
			 		if($this->area_model->ActiveArea($id))
					{
						redirect("welcome/area");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Area Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Area";					
					
					$area=$this->area_model->getAreaId($id);
					$areafields=$this->db->get("area");
					foreach ($areafields->list_fields() as $field)
					{
						$this->data[$field]=$areafields->$field;	
					}
					//$data['area_type']=$area->area_type;
//					$data['city']=$area->city;
//					$data['area_id']=$area->area_id;
					
					
					//print_r($area);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	public function authorities($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="authorities";
		$data['title']=" Welcome to Active Citizenship | Add Authorities";
		
		//$data['constiuencies']=$arr;
		$data['authorities']=$this->authorities_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Authorities";				
					$data['title']=" Welcome to Active Citizenship | Add Authorities";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$authorities_id=$this->general_model->save("authorities",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['authorities_logo']=="")
								//	unset($data['authorities_logo']);
								$this->general_model->update("authorities",$insertarray,"authorities_id=".$id);
								$authorities_id=$id;
						}
						//echo $id;
						if($authorities_id){							
									
									$data['view']="authorities";
									$data['subtitle']="Add Authorities";	
									$data['title']=" Welcome to Active Citizenship | Add Authorities";
									$data['message']=" Record Entered Successfully";
									$data['cities']=$this->authorities_model->fetchAll();		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/authorities");
								
								
						}
					}else{
							redirect("welcome/authorities");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add Authorities";				
					//$data['title']=" Welcome to Active Citizenship | Add Authorities";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->authorities_model->deActiveAuthorities($id))
					{
						redirect("welcome/authorities");
					}
			 	break;
			case 'active':
			 		if($this->authorities_model->ActiveAuthorities($id))
					{
						redirect("welcome/authorities");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Authorities Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Authorities";					
					
					$authorities=$this->authorities_model->getAuthoritiesById($id);
					$authoritiesfields=$this->db->get("authorities");
					foreach ($authoritiesfields->list_fields() as $field)
					{
						$this->data[$field]=$authoritiesfields->$field;	
					}
					//$data['authorities_type']=$authorities->authorities_type;
//					$data['city']=$authorities->city;
//					$data['authorities_id']=$authorities->authorities_id;
					
					
					//print_r($authorities);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	/*
	* function to manage  organization
	**/
	public function organization($mode='view',$id=0)
	{
		$data['admin']=$this->session->userdata[0];
		$data['view']="organization";
		$data['title']=" Welcome to Active Citizenship | Add Organization";
		$data['organizations']=$this->organization_model->fetchAll(); 
		switch($mode)
		{
			case 'view':	
					$data['subtitle']="Add Organization";				
					$data['title']=" Welcome to Active Citizenship | Add Organization";					
					//$data['method']='add';
					$this->load->view('admin/dashboard',$data);
				break;
			case 'add':
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					//print_r($insertarray); die;
					//$data['method']='add';
					if(count($_POST)>0){
						if(!$id){
							$organization_id=$this->general_model->save("organization",$insertarray,true);
						}else{
								// customization for logo field if not selected
								//if($data['organization_logo']=="")
								//	unset($data['organization_logo']);
								$this->general_model->update("organization",$insertarray,"organization_id=".$id);
								$organization_id=$id;
						}
						//echo $id;
						if($organization_id){
							//echo (int)(bool)$this->upload->do_upload('organization_logo');
						
							if ( ! $this->upload->do_upload('organization_logo') && isset($data['organization_logo']))
								{
									$data['error'] =$this->upload->display_errors();					
									$data['view']="organization";
									$data['subtitle']="Add Organization";
									$data['title']=" Welcome to Active Citizenship | Add Organization";		
									$this->load->view('admin/dashboard', $data);
								}
								else
								{
									$imagedata = $this->upload->data();
									if(count($imagedata)>0){
										$updatearray=array("organization_logo"=>$imagedata['file_name']);
										$this->general_model->update("organization",$updatearray,"organization_id=".$organization_id);
									}
									//print_r($data['upload_data']); die;
									$data['view']="organization";
									$data['subtitle']="Add Organization";	
									$data['title']=" Welcome to Active Citizenship | Add Organization";
									$data['message']=" Record Entered Successfully";		
									$this->load->view('admin/dashboard', $data);
									//redirect("welcome/organization");
								}
								
						}
					}else{
							redirect("welcome/organization");
					}
					// upload image
						
					// update entry with image
					
					//$data['subtitle']="Add Organization";				
					//$data['title']=" Welcome to Active Citizenship | Add Organization";					
					//$this->load->view('admin/dashboard',$data);
				break;
			 case 'delete':
			 		if($this->organization_model->deActiveOrganization($id))
					{
						redirect("welcome/organization");
					}
			 	break;
			case 'active':
			 		if($this->organization_model->ActiveOrganization($id))
					{
						redirect("welcome/organization");
					}
			 	break;
			case 'edit':
				if($id){
					$data['subtitle']="Update Organization Data" ;				
					$data['title']=" Welcome to Active Citizenship | Update  Organization";					
					//$data['method']='add';
					$organization=$this->organization_model->getOrganizationById($id);
					$data['organization_name']=$organization->organization_name;
					
					$data['organization_id']=$organization->organization_id;
					$data['organization_logo']=$organization->organization_logo;
					
					//print_r($organization);
					$this->load->view('admin/dashboard',$data);
				}
				break;
			
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */