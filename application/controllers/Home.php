<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
		$this->load->model('HomepageModel');	
		$this->load->model('PageModel');	
	}

	public function index()
	{

		$home_data = $this->HomepageModel->get_homepage_slider();
		if($home_data['Status'])
		{
			$home_data = $home_data['data'];
		}else{
			$home_data="";
		}
		$contact_data = $this->PageModel->get_contact_detail();
		if($contact_data['Status'])
		{
			$contact_data = $contact_data['data'];
		}else{
			$contact_data="";
		}
	
	
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/home',array("page_data"=>$home_data,"contact_data"=>$contact_data));
		$this->load->view('website/layout/footer');
	}
	

	public function over_view()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_overview');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_rates()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_rates');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_fha()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_fha');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_va_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_va_loan');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_jumbo_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_jumbo_loan');
		$this->load->view('website/layout/footer');
    }
	public function mortgage_arm_loan()
	{
		$this->load->view('website/layout/header');
		$this->load->view('website/pages/mortgage/mortgage_arm_loan');
		$this->load->view('website/layout/footer');
    }
    
    
}

