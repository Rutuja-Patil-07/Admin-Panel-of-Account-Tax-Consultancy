<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postaldispatch extends CI_Controller {
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
		$this->load->view('Postaldispatch/PostaldispatchDetails_view');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Postaldispatch/Postaldispatch_view',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertPostaldispatch(){
        $outwordno= $this->input->post('outwordno'); 
        $outwordletterno= $this->input->post('outwordletterno'); 
        $outworddate= $this->input->post('outworddate'); 
        $name= $this->input->post('name'); 
        $Place= $this->input->post('Place'); 
        $address= $this->input->post('address'); 
        $no_ref= $this->input->post('no_ref'); 
        $date_ref= $this->input->post('date_ref'); 
        $subject= $this->input->post('subject');
        $remark= $this->input->post('remark'); 
        $charges= $this->input->post('charges'); 
   
        
          $fields=array('outwordno'=>$outwordno,
                        'outwordletterno'=>$outwordletterno,
                        'outworddate'=>$outworddate,
                        'name'=>$name,
                        'Place'=>$Place,
                        'address'=>$address,
                        'no_ref'=>$no_ref,
                        'date_ref'=>$date_ref,
                        'subject'=>$subject,
                        'remark'=>$remark,
                        'charges'=>$charges,
                         
                'created_date'=>date('Y-m-d H:i:s'),
                'created_by'=>1);
            echo json_encode($fields);
        $this->Commonmodel->insertRecord("postal_dispatch",$fields);
      } 
       
      public function postaldispatch()
      {
          $resultList = $this->Studentedit_model->fetchAllData('*','postal_dispatch',array());
          
          $result = array();
          $i = 1;
          foreach ($resultList as $key => $value) {
              $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
              $result['data'][] = array(
                  $i++,
                  $button,
                  
                  $value['outwordno'],
                  $value['outwordletterno'],
                  $value['outworddate'],
                  $value['name'],
                  $value['Place'],
                  $value['address'],
                  $value['no_ref'],
                  $value['date_ref'],
                  $value['subject'],
                  $value['remark'],
                  $value['charges'],
                 
               //    $value['pan'],
               //    $value['password'],
                 
              );
          }
          echo json_encode($result);
      }
	
}