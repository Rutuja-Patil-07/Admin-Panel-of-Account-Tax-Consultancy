<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Village extends CI_Controller {
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
		$this->load->view('Village/village_details');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Village/village',$data);
		$this->load->view('common/footer_view');
	

	}

	function insertVillage(){
		$country= $this->input->post('country'); 
		$state= $this->input->post('state');
		$district= $this->input->post('district');
		$taluka= $this->input->post('taluka');
		$village_name= $this->input->post('village_name');  
		
	   
		 $fields=array('country'=>$country,
						'state'=>$state,
						'district'=>$district,
						'taluka'=>$taluka,
						'village_name'=>$village_name,
					   
						
			   'created_date'=>date('Y-m-d H:i:s'),
			   'created_by'=>1);
		   echo json_encode($fields);
	   $this->Commonmodel->insertRecord("village",$fields);
	 } 

	 public function village()
	 {
		 $resultList = $this->Studentedit_model->fetchAllData('*','village',array());
		 
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
				 $value['taluka'],
				 $value['village_name'],
				//  $value['std_department'],
				//  $value['std_branch'],
				//  $value['std_mobileno'],
				
			 );
		 }
		 echo json_encode($result);
	 }
}