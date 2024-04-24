<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {
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
		$this->load->view('Branch/BranchDetailsview');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		$obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Branch/Branch_view',$data);
		$this->load->view('common/footer_view');
	

	}

	function insertBranch(){
		$branch_name= $this->input->post('branch_name'); 
		 $con_br_name= $this->input->post('con_br_name');
		 $con_no= $this->input->post('con_no');
		
		 
		
		  $fields=array('branch_name'=>$branch_name,
						 'con_br_name'=>$con_br_name,
						 'con_no'=>$con_no,
						
						
						 
				'created_date'=>date('Y-m-d H:i:s'),
				'created_by'=>1);
			echo json_encode($fields);
		$this->Commonmodel->insertRecord("branch",$fields);
	  }

	  public function branch()
	  {
		  $resultList = $this->Studentedit_model->fetchAllData('*','branch',array());
		  
		  $result = array();
		  $i = 1;
		  foreach ($resultList as $key => $value) {
			  $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
			  $result['data'][] = array(
				  $i++,
				  $button,
				  
				  $value['branch_name'],
				  $value['con_br_name'],
			      $value['con_no'],
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