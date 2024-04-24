<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class District extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        $this->load->model('Studentedit_model');
        
    }
	
	
	public function index()
	{
        // $data['data']=$this->Branch_model->getallBranch();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view');
		$this->load->view('District/district_details');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('District/district',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertDistrict(){
		$country= $this->input->post('country'); 
		$state= $this->input->post('state');
		$district_name= $this->input->post('district_name');
		
		$short_name= $this->input->post('short_name');
		$district_code= $this->input->post('district_code');
		
		
		
	   
		 $fields=array('country'=>$country,
						'state'=>$state,
						'district_name'=>$district_name,
						'short_name'=>$short_name,
						'district_code'=>$district_code,
										
			   'created_date'=>date('Y-m-d H:i:s'),
			   'created_by'=>1);
		   echo json_encode($fields);
	   $this->Commonmodel->insertRecord("district",$fields);
	 } 
	
	 public function District()
	 {
		 $resultList = $this->Studentedit_model->fetchAllData('*','district',array());
		 
		 $result = array();
		 $i = 1;
		 foreach ($resultList as $key => $value) {
			 $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
			 $result['data'][] = array(
				 $i++,
				 $button,
				 
				 $value['district_name'],
				 $value['short_name'],
				 $value['district_code'],
				 $value['country'],
				 $value['state'],
				//  $value['std_department'],
				//  $value['std_branch'],
				//  $value['std_mobileno'],
				
			 );
		 }
		 echo json_encode($result);
	 }
}