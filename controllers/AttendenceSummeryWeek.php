<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendenceSummeryWeek extends CI_Controller {
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
		$this->load->view('AttendenceSummeryWeek/AttendenceSummeryWeekview');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('AttendenceSummeryWeek/AttendenceSummeryWeekview',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertBranch(){
     $branchname= $this->input->post('branchname');
     $department= $this->input->post('department'); 
     
      
     
       $fields=array('branchname'=>$branchname,
                      'department'=>$department);
                     
                     
                      
            //  'created_date'=>date('Y-m-d H:i:s'),
            //  'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("branch_master",$fields);
   } 
	
	
}