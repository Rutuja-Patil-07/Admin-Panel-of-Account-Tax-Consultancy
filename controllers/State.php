<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
         $this->load->model('Studentedit_model');
        
    }
	
	
	public function index()
	{
        //$data['data']=$this->State_model->getallState();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view');
		$this->load->view('State/StateDetailsview');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('State/State_view',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertState(){
		$country= $this->input->post('country'); 
		$state_name= $this->input->post('state_name');
		$short_name= $this->input->post('short_name');
		$state_code= $this->input->post('state_code');
		
		
	   
		 $fields=array('country'=>$country,
						'state_name'=>$state_name,
						'short_name'=>$short_name,
						'state_code'=>$state_code,
						
			   'created_date'=>date('Y-m-d H:i:s'),
			   'created_by'=>1);
		   echo json_encode($fields);
	   $this->Commonmodel->insertRecord("state",$fields);
	 }
	

	 public function state()
	 {
		 $resultList = $this->Studentedit_model->fetchAllData('*','state',array());
		 
		 $result = array();
		 $i = 1;
		 foreach ($resultList as $key => $value) {
			 $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
			 $result['data'][] = array(
				 $i++,
				 $button,
				 
				 $value['state_name'],
				 $value['short_name'],
				 $value['state_code'],
			     $value['country'],
				//  $value['std_qualification'],
				//  $value['std_department'],
				//  $value['std_branch'],
				//  $value['std_mobileno'],
				
			 );
		 }
		 echo json_encode($result);
	 }
	
}