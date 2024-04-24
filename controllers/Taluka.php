<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taluka extends CI_Controller {
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
		$this->load->view('Taluka/taluka_details');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Taluka/taluka',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertTaluka(){
		$country= $this->input->post('country'); 
		$state= $this->input->post('state');
		$district= $this->input->post('district');
		$taluka_name= $this->input->post('taluka_name');
		
		
	   
		 $fields=array('country'=>$country,
						'state'=>$state,
						'district'=>$district,
						'taluka_name'=>$taluka_name,						
			   'created_date'=>date('Y-m-d H:i:s'),
			   'created_by'=>1);
		   echo json_encode($fields);
	   $this->Commonmodel->insertRecord("taluka",$fields);
	 } 
	 public function taluka()
	 {
		 $resultList = $this->Studentedit_model->fetchAllData('*','taluka',array());
		 
		 $result = array();
		 $i = 1;
		 foreach ($resultList as $key => $value) {
			 $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
			 $result['data'][] = array(
				 $i++,
				 $button,
				 
				 $value['country'],
				 $value['state'],
				 $value['district'],
				 $value['taluka_name'],
				//  $value['state'],
				//  $value['std_department'],
				//  $value['std_branch'],
				//  $value['std_mobileno'],
				
			 );
		 }
		 echo json_encode($result);
	 }
}