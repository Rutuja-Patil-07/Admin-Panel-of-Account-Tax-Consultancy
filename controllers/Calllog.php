<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calllog extends CI_Controller {
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
		$this->load->view('Calllog/Calllog_Details');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Calllog/Calllog_view',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertCalllog(){
     $calltype	= $this->input->post('calltype'); 
      $callpersonname= $this->input->post('callpersonname');
      $empname= $this->input->post('empname'); 
      $calldate	= $this->input->post('calldate	'); 
      $reasontype= $this->input->post('reasontype');
      $calltime= $this->input->post('calltime'); 
      $nextfollowdate	= $this->input->post('nextfollowdate	'); 
      $calldescription= $this->input->post('calldescription');
      $feedback= $this->input->post('feedback'); 
      
     
       $fields=array('calltype	'=>$calltype,
                      'callpersonname'=>$callpersonname,
                      'empname'=>$empname,
					  'calldate	'=>$calldate,
                      'reasontype'=>$reasontype,
                      'calltime'=>$calltime,
					  'nextfollowdate	'=>$nextfollowdate,
                      'calldescription'=>$calldescription,
                      'feedback'=>$feedback,
                     
                      
             'created_date'=>date('Y-m-d H:i:s'),
             'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("call_log",$fields);
   } 
	
   public function call_Log()
   {
       $resultList = $this->Studentedit_model->fetchAllData('*','call_log',array());
       
       $result = array();
       $i = 1;
       foreach ($resultList as $key => $value) {
           $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
           $result['data'][] = array(
               $i++,
               $button,
               
               $value['calltype'],
               $value['callpersonname'],
               $value['empname'],
               $value['calldate'],
               $value['reasontype'],
               $value['calltime'],
               $value['nextfollowdate'],
               $value['calldescription'],
               $value['feedback'],
            //    $value['pincode'],
            //    $value['pan'],
            //    $value['password'],
              
           );
       }
       echo json_encode($result);
   }
}