<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Career extends CI_Controller {

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
		//die("fdfD");
		//$this->data['career']=$this->career_model->fetchActive();
		$this->data['admin']=$this->session->userdata[0];
		$this->data['title']=" Welcome to Active Citizenship | Add career";
		$this->data['subtitle']=" Add career";
		$this->data['view']="addcareer";
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
		// $careeroccupations=$this->career_model->fetchCareerOccupation();
		// $arrCO['']="Select One";
		// foreach($careeroccupations->result_array() as $row) {
		// 	$arrCO[$row['occupation_id']]=$row['occupation_title'];
		// }
		// $this->data['CO']=$arrCO;

		$studytracks=$this->studytrack_model->fetchActive();
		$arrstudytracks['']="Select One";
		foreach($studytracks->result_array() as $row) {
			$arrstudytracks[$row['studytrack_id']]=$row['studytrack_title'];
		}
		$this->data['studytrack']=$arrstudytracks;
		$careertrack=$this->careertrack_model->fetchActive();
		$arrcareertrack['']="Select One";
		foreach($careertrack->result_array() as $row) {
			$arrcareertrack[$row['careertrack_id']]=$row['careertrack_title'];
		}
		$this->data['careertrack']=$arrcareertrack;
		$fieldofwork=$this->fieldofwork_model->fetchActive();
		$arrfieldofwork['']="Select One";
		foreach($fieldofwork->result_array() as $row) {
			$arrfieldofwork[$row['fieldofwork_id']]=$row['fieldofwork_title'];
		}
		$this->data['fieldofwork']=$arrfieldofwork;

		$occupations=$this->occupation_model->fetchActive();
		$arroccupations['']="Select One";
		foreach($occupations->result_array() as $row) {
			$arroccupations[$row['occupation_id']]=$row['occupation_title'];
		}
		$this->data['occupations']=$arroccupations;
		$occupationgroups=$this->occupation_model->fetchActive();
		$arroccupationgroups['']="Select One";
		foreach($occupationgroups->result_array() as $row) {
			$arroccupationgroups[$row['occupationgroup_id']]=$row['occupation_title'];
		}
		$this->data['occupationgroups']=$arroccupationgroups;
		
		
	}
	
	// career group
	public function careers($mode='view',$id=0)
	{
		//die($mode);
		$rules=$this->career_model->validationrules;
		$this->form_validation->set_rules($rules);
		
		$this->data['admin']=$this->session->userdata[0];
		$this->data['view']="addcareer";
		$this->data['title']=" Welcome to Pak Career | Add career";		
		
		//print_r($country->result_array());
		
		$this->data['career']=$this->career_model->fetchAll();
		switch($mode)
		{
			case 'view':	
					$this->data['subtitle']="Add career";				
					$this->data['title']=" Welcome to Pak Careergroup | Add career";					
					//$this->data['method']='add';
					$this->load->view('admin/dashboard',$this->data);
				break;
			case 'add':
			
					// make entry
					//die*
				//	print_r($_POST); die;
					$insertarray=$this->input->post();
					//$insertarray['career_admissiondeadline']=date('Y-m-d h:i:s',strtotime($insertarray['career_admissiondeadline']));
				//	print_r($insertarray); die;
					//print_r(count($insertarray)); die;
					//$this->data['method']='add';
					if(count($insertarray)>0){
						foreach($insertarray as $key=>$val)
						{
							$this->data[$key]=$val;
						}
						
						if ($this->form_validation->run() === true) {
							if(!$id){
							//	echo "Fdfdf"; die;
								$career_id=$this->general_model->save("career",$insertarray,true);
								if($career_id)
								{
									
								}
							}else{
									// customization for logo field if not selected
									//if($this->data['career_logo']=="")
									//	unset($this->data['career_logo']);
									$this->general_model->update("career",$insertarray,"career_id=".$id);
									$career_id=$id;
							}
							//echo $id;
							if($career_id){							
										if ( ! $this->upload->do_upload('career_photo') && isset($data['career_photo']))
										{
											$this->data['error'] =$this->upload->display_errors();					
													
											//$this->load->view('admin/dashboard', $this->data);
										}
										else
										{
											$imagedata = $this->upload->data();
											if(count($imagedata)>0){
												$updatearray=array("career_photo"=>$imagedata['file_name']);
												$this->general_model->update("career",$updatearray,"career_id=".$career_id);
											}
											//print_r($data['upload_data']); die;											
											$this->data['message']=" Record Entered Successfully";		
											//$this->load->view('admin/dashboard', $this->data);
											//redirect("welcome/country");
										}
										$this->data['view']="addcareer";
										$this->data['subtitle']="Add career";	
										$this->data['title']=" Welcome to Pak career | Add career";
										$this->data['messcareer']=" Record Entered Successfully";
										$this->data['career']=$this->career_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
										redirect("career/manage");
									
									
							}
						}
						else{
							//echo "fdsfsd";
							$this->data['view']="addcareer";
							$this->data['subtitle']="Add career";	
							$this->data['title']=" Welcome to Pak career | Add career";
							$this->data['messcareer']=" Record Entered Successfully";
							$this->data['career']=$this->career_model->fetchAll();		
							$this->load->view('admin/dashboard', $this->data);
							//echo "Fdfd"; die;
							//redirect("career/index");
								//$this->data['view']="addcareer";
//								$this->data['subtitle']="Add career";	
//								$this->data['title']=" Welcome to Pak career | Add career";								
//								$this->data['career']=$this->career_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("career/index");
					}
					
				break;
			 case 'delete':
			 		if($this->career_model->deActivecareer($id))
					{
						redirect("career/manage");
					}
			 	break;
			case 'active':
			 		if($this->career_model->Activecareer($id))
					{
						redirect("career/manage");
					}
			 	break;
			case 'edit':
				if($id){
					$this->data['subtitle']="Update career  Data" ;				
					$this->data['title']=" Welcome to Pak career | Update career";					
					
					$career=$this->career_model->getcareerById($id);
					$careerfields=$this->db->get("career");
					foreach ($careerfields->list_fields() as $field)
					{
						$this->data[$field]=$career->$field;	
					}
					
					$this->load->view('admin/dashboard',$this->data);
				}
				break;
			
		}
	}
	
	function careeroccupation($action='add',$career_id,$careeroccupation_id='')
	{
		$rules=$this->career_model->validationrulesoccupation;
		$this->form_validation->set_rules($rules);
		switch($action)
		{
			case 'add':

					$insertarray=$this->input->post();
					$insertarray['career_id']=$career_id;
				
					if(count($insertarray)>0){
						//echo (int)$this->form_validation->run() ;
						if ($this->form_validation->run() === true) {
							if(!$id){
								$CO_id=$this->general_model->save("career_occupations",$insertarray,true);
							}
							//echo $id;
							if($CO_id){							
										
										$this->data['view']="careersections";
										$this->data['subtitle']="Add career";	
										$this->data['title']=" Welcome to Pak career | Add career";
										$this->data['messcareer']=" Record Entered Successfully";
										$this->data['career']=$this->career_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
										redirect("career/view/".$career_id);
									
									
							}
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
//								$this->data['career']=$this->career_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("career/view/".$career_id);
					}
			break;
			case 'delete':
				$this->career_model->deleteOccupations($careeroccupation_id);
				redirect("career/view/".$career_id);

			break;
		}
	}
	
	function careerfields($action='add',$career_id,$cf_id='')
	{
		$rules=$this->career_model->validationrulesfields;
		$this->form_validation->set_rules($rules);
		switch($action)
		{
			case 'add':

					$insertarray=$this->input->post();
					$insertarray['career_id']=$career_id;
				
					if(count($insertarray)>0){
						//echo (int)$this->form_validation->run() ;
						if ($this->form_validation->run() === true) {
							if(!$id){
								$CO_id=$this->general_model->save("career_fieldofwork",$insertarray,true);
							}
							//echo $id;
							if($CO_id){							
										
										$this->data['view']="careersections";
										$this->data['subtitle']="Add career";	
										$this->data['title']=" Welcome to Pak career | Add career";
										$this->data['messcareer']=" Record Entered Successfully";
										$this->data['career']=$this->career_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
										redirect("career/view/".$career_id);
									
									
							}
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
//								$this->data['career']=$this->career_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("career/view/".$career_id);
					}
			break;
			case 'delete':
				$this->career_model->deleteFOW($cf_id);
			
				redirect("career/view/".$career_id);

			break;
		}
	}
	
	function careertrack($action='add',$career_id,$ct_id='')
	{
		$rules=$this->career_model->validationrulescareertrack;
		$this->form_validation->set_rules($rules);
		switch($action)
		{
			case 'add':

					$insertarray=$this->input->post();
					$insertarray['career_id']=$career_id;
				
					if(count($insertarray)>0){
						//echo (int)$this->form_validation->run() ;
						if ($this->form_validation->run() === true) {
							if(!$id){
								$CO_id=$this->general_model->save("career_careertrack",$insertarray,true);
							}
							//echo $id;
							if($CO_id){							
										
										$this->data['view']="careersections";
										$this->data['subtitle']="Add career";	
										$this->data['title']=" Welcome to Pak career | Add career";
										$this->data['messcareer']=" Record Entered Successfully";
										$this->data['career']=$this->career_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
										redirect("career/view/".$career_id);
									
									
							}
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
//								$this->data['career']=$this->career_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("career/view/".$career_id);
					}
			break;
			case 'delete':
				$this->career_model->deleteCT($ct_id);
				redirect("career/view/".$career_id);

			break;
		}
	}
	
	function careerstudy($action='add',$career_id,$cs_id='')
	{
		$rules=$this->career_model->validationrulestudy;
		$this->form_validation->set_rules($rules);
		switch($action)
		{
			case 'add':

					$insertarray=$this->input->post();
					$insertarray['career_id']=$career_id;
				
					if(count($insertarray)>0){
						//echo (int)$this->form_validation->run() ;
						if ($this->form_validation->run() === true) {
							if(!$id){
								$CO_id=$this->general_model->save("career_studytrack",$insertarray,true);
							}
							//echo $id;
							if($CO_id){							
										
										$this->data['view']="careersections";
										$this->data['subtitle']="Add career";	
										$this->data['title']=" Welcome to Pak career | Add career";
										$this->data['messcareer']=" Record Entered Successfully";
										$this->data['career']=$this->career_model->fetchAll();		
										$this->load->view('admin/dashboard', $this->data);
										redirect("career/view/".$career_id);
									
									
							}
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
//								$this->data['career']=$this->career_model->fetchAll();		
//								$this->load->view('admin/dashboard', $this->data);
						}
					}else{
							redirect("career/view/".$career_id);
					}
			break;
			case 'delete':
				$this->career_model->deleteST($cs_id);
				redirect("career/view/".$career_id);

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
		$data['view']="managecareer";
		$data['title']=" Welcome to Active Citizenship | Manage  career";
		$total=$this->career_model->fetchAll();
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
		 $config['base_url'] = base_url().'/career/manage/';
		$config['total_rows'] = count($total->result_array());
		$config['per_page'] = 10; 
		$data['subtitle']="Manage career";	
		//echo $page ."  ".$config['per_page'];
		$this->pagination->initialize($config);
		$data['careers']=$this->career_model->fetchAll($config['per_page'],$page); 		
		//$data['title']=" Welcome to Active Citizenship | Add career";					
		//$data['method']='add';
		$this->load->view('admin/dashboard',$data);
	}
	function view($career_id)
	{
		
		$this->data['view']="careersections";
		$this->data['subtitle']="Add Sections";	
		$this->data['title']=" Welcome to Pak career | Add Sub Sections";
		$this->data['messcareer']=" Record Entered Successfully";
		$this->data['career']=$this->career_model->getcareerById($career_id);	
		$this->data['CO']=$this->career_model->fetchCareerOccupation($career_id);
		$this->data['CF']=$this->career_model->fetchCareerFieldOfWork($career_id);
		$this->data['CS']=$this->career_model->fetchCareerStudyTracks($career_id);
		$this->data['CT']=$this->career_model->fetchCareerTracks($career_id);
		$this->load->view('admin/dashboard', $this->data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */