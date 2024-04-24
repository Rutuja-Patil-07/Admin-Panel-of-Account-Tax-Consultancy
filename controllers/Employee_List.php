<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_List extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        // $this->load->model('Employee_model');
        
    }
	
	
	public function index()
	{
        // $data['data']=$this->Employee_model->getallEmployee();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view');
		$this->load->view('Employee_List/Employee_List');
		$this->load->view('common/footer_view');
	

	}

    
        function create()
	{
		$this->load->view('common/header_view');
		$this->load->view('Employee_List/Employee_List');
		$this->load->view('common/footer_view');
	

	}

    function insertEmployee(){
     $Employeename= $this->input->post('Employeename'); 
      $phone= $this->input->post('phone');
      $subject= $this->input->post('subject'); 
      
     
       $fields=array('Employeename'=>$Employeename,
                      'phone'=>$phone,
                      'fksubjectId'=>$subject,
                     
                      
             'created_date'=>date('Y-m-d H:i:s'),
             'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("Employee_master",$fields);
   } 
	
	
}