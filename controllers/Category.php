<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        $this->load->model('Studentedit_model');
        
    }
	
	
	public function index()
	{
        
		$this->load->view('common/header_view');
		$this->load->view('Category/Category_Details');
		$this->load->view('common/footer_view');
	

	}
    public function create()
	{
        $obj='';
        $data['data']=$obj;
		$this->load->view('common/header_view');
		$this->load->view('Category/Category_view' ,$data);
		$this->load->view('common/footer_view');
	

	}

    function insertCategory(){
     $categoryname= $this->input->post('categoryname'); 
     
      
     
       $fields=array('categoryname'=>$categoryname,
       
                      
                      
             'created_date'=>date('Y-m-d H:i:s'),
             'created_by'=>1);
         echo json_encode($fields);
     $this->Commonmodel->insertRecord("category",$fields);
   } 
	
   public function category()
   {
       $resultList = $this->Studentedit_model->fetchAllData('*','category',array());
       
       $result = array();
       $i = 1;
       foreach ($resultList as $key => $value) {
           $button = '<a  href="create" data-mdb-toggle="tooltip onclick="editFun('.$value['id'].')" "title="edit"><i class="fas fa-edit animtxt fa-lg"style="color:#1977D3;"></i>&nbsp;Edit</a>';
           $result['data'][] = array(
               $i++,
               $button,
               
               $value['categoryname'],
            //    $value['middlename'],
            //    $value['lastName'],
            //    $value['state'],
            //    $value['group'],
            //    $value['email'],
            //    $value['address'],
            //    $value['phone'],
            //    $value['city'],
            //    $value['pincode'],
            //    $value['pan'],
            //    $value['password'],
              
           );
       }
       echo json_encode($result);
   }
}