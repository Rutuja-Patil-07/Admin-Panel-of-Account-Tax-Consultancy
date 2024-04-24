<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {
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
		$this->load->view('Enquiry/EnquiryDetails_view');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Enquiry/Enquiry_view',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertEnquiry(){
		$enquiry_name= $this->input->post('enquiry_name'); 
		$time= $this->input->post('time');
		$date= $this->input->post('date');
		$ref_type= $this->input->post('ref_type');
		$ref_name= $this->input->post('ref_name');  
		$ref_no= $this->input->post('ref_no');
		$enq_reason= $this->input->post('enq_reason');  
		
	   
		 $fields=array('enquiry_name'=>$enquiry_name,
						'time'=>$time,
						'date'=>$date,
						'ref_type'=>$ref_type,
						'ref_name'=>$ref_name,
                        'ref_no'=>$ref_no,
						'enq_reason'=>$enq_reason,
					   
						
			   'created_date'=>date('Y-m-d H:i:s'),
			   'created_by'=>1);
		   echo json_encode($fields);
	   $this->Commonmodel->insertRecord("enquiry",$fields);
	 }  
	
	 public function enquiry()
      {
          $resultList = $this->Studentedit_model->fetchAllData('*','enquiry',array());
          
          $result = array();
          $i = 1;
          foreach ($resultList as $key => $value) {
              $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
              $result['data'][] = array(
                  $i++,
                  $button,
                  
                  $value['enquiry_name'],
                  $value['time'],
                  $value['date'],
                  $value['ref_type'],
                  $value['ref_name'],
                  $value['ref_no'],
                  $value['enq_reason'],
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