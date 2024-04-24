<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    
        
        // $this->load->model('Branch_model');
        
    }
	
	
	public function index()
	{
        // $data['data']=$this->Branch_model->getallBranch();
        // echo "<pre>";
        // print_r($data);
		//$this->load->view('common/header_view');
		$this->load->view('Register/register');
		//$this->load->view('common/footer_view');
	

	}
    public function create()
	{
		//$this->load->view('common/header_view');
		$this->load->view('Register/register');
		//$this->load->view('common/footer_view');
	

	}

    
	
}