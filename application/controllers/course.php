<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {

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
		
		$this->populateDropDown();
	}
	public function index()
	{	
		//die("fdfD");
		//$this->data['course']=$this->course_model->fetchActive();
		$this->data['admin']=$this->session->userdata[0];
		$this->data['title']=" Welcome to Active Citizenship | Add course";
		$this->data['subtitle']=" Add course";
		$this->data['view']="addcourse";
		$this->load->view('admin/dashboard',$this->data);
		
	}
	
	public function populateDropDown()
	{
		
		$cities=$this->city_model->fetchActive();
		$arrcities['']="Select One";
		foreach($cities->result_array() as $row) {
			$arrcities[$row['city_id']]=$row['city_name'];
		}
		$this->data['cities']=$arrcities;
		$studytracks=$this->studytrack_model->fetchActive();
		$arrstudytracks['']="Select One";
		foreach($studytracks->result_array() as $row) {
			$arrstudytracks[$row['studytrack_id']]=$row['studytrack_title'];
		}
		$this->data['studytracks']=$arrstudytracks;
		
		
	}
	
	// course group
	public function courses($mode='view',$id=0)
	{
		//die($mode);
		$rules=$this->course_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$this->data['admin']=$this->session->userdata[0];
		$this->data['view']="addcourse";
		$this->data['title']=" Welcome to Pakcourse | Add course";		
		
		//print_r($country->result_array());
		
		$this->data['course']=$this->course_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$this->data['subtitle']="Add course";				
					$this->data['title']=" Welcome to Pakcoursegroup | Add course";					
					//$this->data['method']='add';
					$this->load->view('admin/dashboard',$this->data);
				break;
			case 'add':
			
					// make entry
					
					//print_r($_POST); die;
					$insertarray=$this->input->post();
					$insertarray['course_admissiondeadline']=date('Y-m-d h:i:s',strtotime($insertarray['course_admissiondeadline']));
				//	print_r($insertarray); die;
					
					//$this->data['method']='add';
					if(count($_POST)>0){
						foreach($insertarray as $key=>$val)
						{
							$this->data[$key]=$val;
						}
						if ($this->form_validation->run() === true) {
							if(!$id){
								$course_id=$this->general_model->save("course",$insertarray,true);
							}else{
									// customization for logo field if not selected
									//if($this->data['course_logo']=="")
									//	unset($this->data['course_logo']);
									$this->general_model->update("course",$insertarray,"course_id=".$id);
									$course_id=$id;
							}
							//echo $id;
							if($course_id){							
										
										$this->data['view']="addcourse";
										$this->data['subtitle']="Add course";	
										$this->data['title']=" Welcome to Pak course | Add course";
										$this->data['messcourse']=" Record Entered Successfully";
										$this->data['course']=$this->course_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
										redirect("course/manage");
									
									
							}
						}
						else{
							redirect("course/index");
								//$this->data['view']="addcourse";
//								$this->data['subtitle']="Add course";	
//								$this->data['title']=" Welcome to Pak course | Add course";								
//								$this->data['course']=$this->course_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("course/index");
					}
					// upload imcourse
						
					// update entry with imcourse
					
					//$this->data['subtitle']="Add course";				
					//$this->data['title']=" Welcome to Pakcoursegroup | Add course";					
					//$this->load->view('admin/dashboard',$this->data);
				break;
			 case 'delete':
			 		if($this->course_model->deActivecourse($id))
					{
						redirect("course/manage");
					}
			 	break;
			case 'active':
			 		if($this->course_model->Activecourse($id))
					{
						redirect("course/manage");
					}
			 	break;
			case 'edit':
				if($id){
					$this->data['subtitle']="Update course group Data" ;				
					$this->data['title']=" Welcome to Pak course | Update course";					
					
					$course=$this->course_model->getcourseById($id);
					$coursefields=$this->db->get("course");
					foreach ($coursefields->list_fields() as $field)
					{
						$this->data[$field]=$course->$field;	
					}
					$this->data['course_admissiondeadline']=date('m/d/Y',strtotime($this->data['course_admissiondeadline']));
					echo $this->data['course_admissiondeadline'];
					/*$this->data['course_title']=$course->course_title;					
					$this->data['course_id']=$course->course_id;
					$this->data['courseector_id']=$course->courseector_id;
					$this->data['positions']=$course->positions;
					$this->data['city_id']=$course->city_id;
					$this->data['country_id']=$course->country_id;
					$this->data['gender']=$course->gender;
					$this->data['agegroup_id']=$course->agegroup_id;
					$this->data['education_id']=$course->education_id;
					$this->data['qualification']=$course->qualification;
					$this->data['experience_id']=$course->experience_id;
					$this->data['salaryrange_id']=$course->salaryrange_id;
					$this->data['coursetype_id']=$course->coursetype_id;
					$this->data['organization_id']=$course->organization_id;
					$this->data['where_to_apply']=$course->where_to_apply;
					$this->data['where_to_apply']=$course->where_to_apply;
					$this->data['occupation_id']=$course->occupation_id	;
					$this->data['coursegroup_id']=$course->coursegroup_id;
					$this->data['posted_date']=date('m/d/Y',strtotime($course->posted_date));
					$this->data['last_date']=date('m/d/Y',strtotime($course->last_date));
					$this->data['courseource_id']=$course->courseource_id;*/
					
					
					
					
					
					//print_r($course);
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
		$data['view']="managecourse";
		$data['title']=" Welcome to Active Citizenship | Manage  course";
		$total=$this->course_model->fetchAll();
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
		 $config['base_url'] = base_url().'/course/manage/';
		$config['total_rows'] = count($total->result_array());
		$config['per_page'] = 2; 
		$data['subtitle']="Manage course";	
		//echo $page ."  ".$config['per_page'];
		$this->pagination->initialize($config);
		$data['courses']=$this->course_model->fetchAll($config['per_page'],$page); 		
		//$data['title']=" Welcome to Active Citizenship | Add course";					
		//$data['method']='add';
		$this->load->view('admin/dashboard',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */