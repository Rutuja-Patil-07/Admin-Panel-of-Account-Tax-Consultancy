<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffmessage extends CI_Controller {
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
		$this->load->view('Staffmessage/Staffmessagedetails_view');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Staffmessage/Staffmessage_view',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertStaffmessage(){
		$br_name= $this->input->post('br_name'); 
		$name= $this->input->post('name');
		$message= $this->input->post('message');
		$date= $this->input->post('date');
		$msg_type= $this->input->post('msg_type');  
		$source= $this->input->post('source');

		
	   
		 $fields=array('br_name'=>$br_name,
						'name'=>$name,
						'message'=>$message,
						'date'=>$date,
						'msg_type'=>$msg_type,
                        'source'=>$source,
						
					   
						
			   'created_date'=>date('Y-m-d H:i:s'),
			   'created_by'=>1);
		   echo json_encode($fields);
	   $this->Commonmodel->insertRecord("staff_msg",$fields);
	 }  
	
	 public function staffmessage()
      {
          $resultList = $this->Studentedit_model->fetchAllData('*','staff_msg',array());
          
          $result = array();
          $i = 1;
          foreach ($resultList as $key => $value) {
              $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
              $result['data'][] = array(
                  $i++,
                  $button,
                  
                  $value['br_name'],
                  $value['name'],
                  $value['message'],
                  $value['date'],
                  $value['msg_type'],
                  $value['source'],
                //   $value['enq_reason'],
                //   $value['date_ref'],
                //   $value['subject'],
                //   $value['remark'],
                //   $value['charges'],
                 
               //    $value['pan'],
               //    $value['password'],
                 
              );
          }
          echo json_encode($result);
      }
}