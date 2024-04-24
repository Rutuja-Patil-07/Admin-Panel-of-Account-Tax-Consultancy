
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        // $this->load->model('State_model');
        
    }
	
	
	public function index()
	{
        
		$this->load->view('common/header_view');
		$this->load->view('Project/Project_details');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        //$obj='';
        //$data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Project/Project_view');
		$this->load->view('common/footer_view');
	

	}

//     function insertCategory(){
//      $categoryname= $this->input->post('categoryname'); 
     
      
     
//        $fields=array('categoryname'=>$categoryname,
       
                      
                      
//              'created_date'=>date('Y-m-d H:i:s'),
//              'created_by'=>1);
//          echo json_encode($fields);
//      $this->Commonmodel->insertRecord("category_master",$fields);
//    } 
	
	
}