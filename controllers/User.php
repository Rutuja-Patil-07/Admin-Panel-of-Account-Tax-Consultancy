<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
		$this->load->view('User/UserDetailsview');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{	$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('User/User_view',$data);
		$this->load->view('common/footer_view');
	

	}
	//  public function delete()
	// {
	// 	$this->load->view('common/header_view');
	// 	$this->load->view('User/UserDetailsviewdelete');
	// 	$this->load->view('common/footer_view');
	

	// }

	//  public function userlist()
	// {
	// 	$this->load->view('common/header_view');
	// 	$this->load->view('User/User_List');
	// 	$this->load->view('common/footer_view');
	

	// }


    // function insertEmployee(){
    //     $emp_name= $this->input->post('emp_name'); 
        
         
        
    //       $fields=array('emp_name'=>$emp_name,
                         
                         
                         
    //             'created_date'=>date('Y-m-d H:i:s'),
    //             'created_by'=>1);
    //         echo json_encode($fields);
    //     $this->Commonmodel->insertRecord("employee",$fields);
    //   } 
	
	
}