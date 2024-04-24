<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        $this->load->model('Studentedit_model');
        
    }
	
	
	public function index()
	{
        // $data['data']=$this->Employee_model->getallEmployee();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view');
		$this->load->view('Employee/EmployeeDetailsview');
		$this->load->view('common/footer_view');
	

	}

    
        function create()
	{
		$this->load->view('common/header_view');
		$this->load->view('Employee/Employee_view');
		$this->load->view('common/footer_view');
	

	}

    function insertEmployee(){
        $emp_name= $this->input->post('emp_name'); 
        $mobile= $this->input->post('mobile'); 
        $email= $this->input->post('email'); 
        $usertype= $this->input->post('usertype'); 
        $username= $this->input->post('username'); 
        $password= $this->input->post('password'); 
        $department= $this->input->post('department'); 
        $address= $this->input->post('address'); 
        $qualification= $this->input->post('qualification');
        $joindate= $this->input->post('joindate'); 
        $photo= $this->input->post('photo'); 
        $smobile= $this->input->post('smobile'); 
        $pincode= $this->input->post('pincode'); 
        $gender= $this->input->post('gender'); 
        $country= $this->input->post('country'); 
        $state= $this->input->post('state'); 
        $district= $this->input->post('district'); 
        $taluka= $this->input->post('taluka'); 
        $village= $this->input->post('village'); 
        $lic_info= $this->input->post('lic_info'); 
        $licence_no= $this->input->post('licence_no');
        $startdate= $this->input->post('startdate'); 
        $expirydate= $this->input->post('expirydate'); 
        $warning= $this->input->post('warning'); 
   
        
          $fields=array('emp_name'=>$emp_name,
                        'mobile'=>$mobile,
                        'email'=>$email,
                        'usertype'=>$usertype,
                        'username'=>$username,
                        'password'=>$password,
                        'department'=>$department,
                        'address'=>$address,
                        'qualification'=>$qualification,
                        'joindate'=>$joindate,
                        'photo'=>$photo,
                        'smobile'=>$smobile,
                        'pincode'=>$pincode,
                        'gender'=>$gender,
                        'country'=>$country,
                        'state'=>$state,
                        'district'=>$district,
                        'taluka'=>$taluka,
                        'village'=>$village,
                        'lic_info'=>$lic_info,
                        'licence_no'=>$licence_no,
                        'startdate'=>$startdate,
                        'expirydate'=>$expirydate,
                        'warning'=>$warning,
                         
                'created_date'=>date('Y-m-d H:i:s'),
                'created_by'=>1);
            echo json_encode($fields);
        $this->Commonmodel->insertRecord("employee",$fields);
      } 
       
      public function employee()
      {
          $resultList = $this->Studentedit_model->fetchAllData('*','employee',array());
          
          $result = array();
          $i = 1;
          foreach ($resultList as $key => $value) {
              $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
              $result['data'][] = array(
                  $i++,
                  $button,
                  
                  $value['emp_name'],
                  $value['mobile'],
                  $value['mobile'],
                  $value['usertype'],
                  $value['username'],
                  $value['password'],
                  $value['department'],
                  $value['address'],
                  $value['qualification'],
                  $value['joindate'],
                  $value['photo'],
                  $value['smobile'],
                  $value['pincode'],
                  $value['gender'],
                  $value['country'],
                  $value['state'],
                  $value['district'],
                  $value['taluka'],
                  $value['village'],
                  $value['lic_info'],
                  $value['licence_no'],
                  $value['startdate'],
                  $value['expirydate'],
                  $value['warning'],
                 
              );
          }
          echo json_encode($result);
      }
       
}