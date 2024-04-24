<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        // $this->load->model('Branch_model');
        
    }
	
	
	public function index()
	{
        // $data['data']=$this->Branch_model->getallBranch();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view');
		$this->load->view('Report/Report_view');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		$this->load->view('common/header_view');
		$this->load->view('Report/Report_view');
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
	
}