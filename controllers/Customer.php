<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
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
		$this->load->view('Customer/customerDetails');
		$this->load->view('common/footer_view');
	

	}

    
        function create()
	{
		$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Customer/customer',$obj);
		$this->load->view('common/footer_view');
	

	}

    function insertCustomer(){
     $firstname= $this->input->post('firstname'); 
      $middlename= $this->input->post('middlename');
      $lastName= $this->input->post('lastName'); 
	  $state= $this->input->post('state'); 
      $group= $this->input->post('group');
      $email	= $this->input->post('email	'); 
	  $address= $this->input->post('address'); 
      $phone= $this->input->post('phone');
      $city	= $this->input->post('city	'); 
	  $pincode	= $this->input->post('pincode	'); 
      $pan= $this->input->post('pan');
      $password	= $this->input->post('password	'); 
      
     
       $fields=array('firstname'=>$firstname,
                      'middlename'=>$middlename,
                      'lastName'=>$lastName,
					  'state'=>$state,
                      'group'=>$group,
					  'email	'=>$email	,
                      'address'=>$address,
					  'phone'=>$phone,
                      'city	'=>$city	,
					  'pincode	'=>$pincode	,
                      'pan'=>$pan,
					  'password'=>$password,
                     
                      
             'created_date'=>date('Y-m-d H:i:s'),
             'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("customer",$fields);
   } 
	
   public function customer()
   {
       $resultList = $this->Studentedit_model->fetchAllData('*','customer',array());
       
       $result = array();
       $i = 1;
       foreach ($resultList as $key => $value) {
           $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
           $result['data'][] = array(
               $i++,
               $button,
               
               $value['firstname'],
               $value['middlename'],
               $value['lastName'],
               $value['state'],
               $value['group'],
               $value['email'],
               $value['address'],
               $value['phone'],
               $value['city'],
               $value['pincode'],
               $value['pan'],
               $value['password'],
              
           );
       }
       echo json_encode($result);
   }
}