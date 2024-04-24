<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateAttendence extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        $this->load->model('Studentedit_model');
        
    }
	
	
	public function index()
	{
        // $data['data']=$this->Branch_model->getallBranch();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('common/header_view');
		$this->load->view('CreateAttendence/createattendence_details');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('CreateAttendence/createattendence',$obj);
		$this->load->view('common/footer_view');
	

	}

    function CreateAttendence(){
     $emp_id= $this->input->post('emp_id');
     $name= $this->input->post('name'); 
     $type= $this->input->post('type');
     $description= $this->input->post('description'); 
     
      
     
       $fields=array('emp_id'=>$emp_id,
                      'name'=>$name,
                      'type'=>$type,
                      'description'=>$description);
                     
                     
                      
            //  'created_date'=>date('Y-m-d H:i:s'),
            //  'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("attendence",$fields);
   } 
	
   public function attendence()
   {
       $resultList = $this->Studentedit_model->fetchAllData('*','attendence',array());
       
       $result = array();
       $i = 1;
       foreach ($resultList as $key => $value) {
           $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
           $result['data'][] = array(
               $i++,
               $button,
               $value['emp_id'],
               $value['name'],
               $value['type'],
              $value['description'],
            //    $value['emp_id'],
              //  $value['state'],
              //  $value['std_department'],
              //  $value['std_branch'],
              //  $value['std_mobileno'],
              
           );
       }
       echo json_encode($result);
   }
}