<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login2 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        // $this->load->model('Studentedit_model');
        
    }
	
	
	public function index()
	{
        //$data['data']=$this->Country_model->getallCountry();
        // echo "<pre>";
        // print_r($data);
       
		$this->load->view('common/header_view');
		$this->load->view('Login2/login2');
		// $this->load->view('common/footer_view');
	

	}
    public function create()
	{
        // $obj='';
        // $data['data']=$obj;
	  $this->load->view('common/header_view');
		$this->load->view('Login2/login2');
		// $this->load->view('common/footer_view');
	

	}

    // function insertCountry(){
	// 	$countryname= $this->input->post('countryname');
	// 	$countrycode= $this->input->post('countrycode');
		
		
		
	   
	// 	 $fields=array('countryname'=>$countryname,
	// 					'countrycode'=>$countrycode,
						
						
	// 		   'created_date'=>date('Y-m-d H:i:s'),
	// 		   'created_by'=>1);
	// 	   echo json_encode($fields);
	//    $this->Commonmodel->insertRecord("country",$fields);
	//  }
	

	//  public function fetchDatafromDatabase()
	//  {
	// 	 $resultList = $this->Studentedit_model->fetchAllData('*','country',array());
		 
	// 	 $result = array();
	// 	 $i = 1;
	// 	 foreach ($resultList as $key => $value) {
	// 		 $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
	// 		 $result['data'][] = array(
	// 			 $i++,
	// 			 $button,
				 
	// 			 $value['countryname'],
	// 			 $value['countrycode'],
	// 			//  $value['std_gender'],
	// 			//  $value['std_appliedfor'],
	// 			//  $value['std_qualification'],
	// 			//  $value['std_department'],
	// 			//  $value['std_branch'],
	// 			//  $value['std_mobileno'],
				
	// 		 );
	// 	 }
	// 	 echo json_encode($result);
	//  }
	
}