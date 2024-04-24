<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        $this->load->model('Studentedit_model');
        
    }
	
	
	public function index()
	{
       // $data['data']=$this->City_model->getallCity();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view');
		$this->load->view('City/CityDetailsview');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('City/City_view',$obj);
		$this->load->view('common/footer_view');
	

	}

    function insertCity(){
     $city_name= $this->input->post('city_name'); 
      $state= $this->input->post('state');
     
      
     
       $fields=array('city_name'=>$city_name,
                      'state'=>$state,
                     
                     
                      
             'created_date'=>date('Y-m-d H:i:s'),
             'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("city",$fields);
   } 
   public function city()
   {
       $resultList = $this->Studentedit_model->fetchAllData('*','city',array());
       
       $result = array();
       $i = 1;
       foreach ($resultList as $key => $value) {
           $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
           $result['data'][] = array(
               $i++,
               $button,
               
               $value['state'],
               $value['city_name'],
            //    $value['district'],
            //    $value['taluka_name'],
              //  $value['state'],
              //  $value['std_department'],
              //  $value['std_branch'],
              //  $value['std_mobileno'],
              
           );
       }
       echo json_encode($result);
   }
	
}