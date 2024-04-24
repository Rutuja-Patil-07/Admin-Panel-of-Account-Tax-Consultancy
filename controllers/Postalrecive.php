<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postalrecive extends CI_Controller {
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
		$this->load->view('Postalrecive/PostalreciveDetails_view');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Postalrecive/Postalrecive_view',$data);
		$this->load->view('common/footer_view');
	

	}

    function insertPostalrecive(){
     $inwardno= $this->input->post('inwardno'); 
     $inwarddate= $this->input->post('inwarddate'); 
     $name= $this->input->post('name'); 
     $place= $this->input->post('place'); 
     $address= $this->input->post('address'); 
     $no_ref= $this->input->post('no_ref'); 
     $date_ref= $this->input->post('date_ref'); 
     $subject= $this->input->post('subject'); 
     $remark= $this->input->post('remark');
     $po_charges= $this->input->post('po_charges'); 

     
       $fields=array('inwardno'=>$inwardno,
                     'inwarddate'=>$inwarddate,
                     'name'=>$name,
                     'place'=>$place,
                     'address'=>$address,
                     'no_ref'=>$no_ref,
                     'date_ref'=>$date_ref,
                     'subject'=>$subject,
                     'remark'=>$remark,
                     'po_charges'=>$po_charges,
                      
             'created_date'=>date('Y-m-d H:i:s'),
             'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("postal_recive",$fields);
   } 
	
   public function postalrecive()
   {
       $resultList = $this->Studentedit_model->fetchAllData('*','postal_recive',array());
       
       $result = array();
       $i = 1;
       foreach ($resultList as $key => $value) {
           $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
           $result['data'][] = array(
               $i++,
               $button,
               
               $value['inwardno'],
               $value['inwarddate'],
               $value['name'],
               $value['place'],
               $value['address'],
               $value['no_ref'],
               $value['date_ref'],
               $value['subject'],
               $value['remark'],
               $value['po_charges'],
            //    $value['pan'],
            //    $value['password'],
              
           );
       }
       echo json_encode($result);
   }
   

}