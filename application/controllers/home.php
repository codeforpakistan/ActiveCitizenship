<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	function __construct(){	
		// Call the Model constructor
        parent::__construct();	
		$config['upload_path'] = './uploads/';
		//echo $config['upload_path'];
			//echo (int)(bool)is_dir($config['upload_path']); die;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4000';
			$config['max_width']  = '4000';
			$config['max_height']  = '2000';
	
			$this->load->library('upload', $config);
	}
	public function index($message='')
	{			
			$data['message']=$message;
		$areas=$this->area_model->fetchAll();
		$arrarea['']="Select Your Area";
		if(count($areas)>0){
				foreach($areas->result_array() as $area)
				{
					$arrarea[$area['area_id']]=$area['area_title'];
				}			
		}
		$data['areas']=$arrarea;
		$sections=$this->authorities_model->fetchAll();
		$arrsections['']="Select Category";
		if(count($sections)>0){
				foreach($sections->result_array() as $area)
				{
					if($area['authorities_keywords']!=""){
						$keys=explode(",",$area['authorities_keywords']);
						foreach($keys as $val)
							$arrsections[$val]=$val;
					}
				}			
		}
		$data['sections']=$arrsections;
		
		$this->load->view('index',$data);
	}
	public function analytics($area='')
	{
		$cities=$this->city_model->fetchAll();
		
		//print_r($country->result_array());
		$arr['']="Select City";
		foreach($cities->result_array() as $row) {
			$arr[$row['city_id']]=$row['city_name'];
		}
		$data['cities']=$arr;
		$cities=$this->city_model->fetchAll();
		
		//print_r($country->result_array());
		$areas=$this->area_model->fetchAll();
		$arrarea['']="Select Area";
		foreach($areas->result_array() as $row) {
			$arrarea[$row['area_id']]=$row['area_title'];
		}
		$data['areas']=$arrarea;
		
		$constituencies=$this->constituency_model->fetchAll();
		$arrconstituencies['']="Select Constituency";
		foreach($areas->result_array() as $row) {
			$arrconstituencies[$row['constiuency_id']]=$row['constiuency_num'];
		}
		$data['constiuencies']=$arrconstituencies;
		$data['issues']=$this->reports_model->fetchAll();
		$this->load->view('analytics',$data);	
		
		
	}
	function view($id)
	{
		$report=$this->reports_model->getAreaById($id);
		$data['report']=$report;
		$this->load->view('view',$data);
		
	}
	function add()
	{
		$insertarray=$this->input->post();
		$insertarray['reports_date']=date('Y-m-d h:i:s');
		$insertarray['reports_progress']="0";
		if( isset($insertarray['reports_image']))
		{
			//die("here");
			 $this->upload->do_upload('reports_image');
		}
		$reports_id=$this->general_model->save("reports",$insertarray,true);
		if($reports_id){
			$data['message']="Your Report is successfully Submitted";
			$data['reports_id']=$reports_id;
			if(isset($insertarray['reports_contact']) && $insertarray['reports_contact']!=""){
			$this->sendsms($insertarray['reports_contact']);
			}
			redirect("home/index/Your Report is successfully Submitted");
			
		}
	}
	public function sendsms($number)
	{
		 $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://69.64.74.216/my/api/sms-http.php?username=a-citizen&password=citizen786&code=92&number=".$number."&msg=".urlencode("Your Report have been submitted")); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);   
		//$this->load->library('curl');
		//$result = file_get_contents('http://69.64.74.216/my/api/sms-http.php?username=a-citizen&password=citizen786&code=92&number=3464654696&msg=testingSMS');
		//var_dump($result);
	}
	public function sendanalytics()
	{
		$this->load->library('codebird');
 
\Codebird\Codebird::setConsumerKey("6n2Za9SzrU3p2GBx3Iw", "4c0wpT9ALAraGCGgGtxqZn1PhpWqiXFHM9zYgY8jk4");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("427599798-3wMJQvHyif3PxObP6MNLs1YMxHuy26Xdp787t3hS", "BVeQJHhOG83t6QLrgJIw9k0TFReOKge6YnCVHxVLHYxxd");
echo '<pre>';print_r($cb);
$params = array(
  'status' => '@suzairshah 11 Issue are reported in your constituency this week. #Severage #Police'
);
$reply = $cb->statuses_update($params);
print_r($reply);
	}
	public function signin()
	{
		$data=$this->input->post();
		//print_r($data);
		$rules=$this->login_model->validationrules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() === true) {
			$data=$this->login_model->validateuser($data);
			
			if($data->num_rows==0){
					echo json_encode(array("error_code"=>1,
										"msg"=>"incorrect username or password"));
			}else{
					$this->session->set_userdata($data->result_array());
					echo json_encode(array("error_code"=>0,
										"msg"=>"login Successful"));
			}
				
		}else{
				echo json_encode(array("error_code"=>1,
										"msg"=>"incorrect username or password")); 
		}
		//print_r($_POST);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */